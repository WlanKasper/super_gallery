import UtilsForm from '../../common/js/utlis-form.js';
import UtilsFetch from '../../common/js/utils-fetch.js';

class ValidationRegistration {
    constructor(parentElement) {
        this.rootElement = parentElement;

        this.elements = {};

        this.utilsForm = new UtilsForm(this.rootElement);
    }

    init() {
        this.initElement();
        this.initEventListener();
    }

    initElement() {
        this.elements = {
            regForm: this.rootElement,
            regEmail: this.rootElement.querySelector('[name="user-email"]'),
            regPassword: this.rootElement.querySelector('[name="user-password"]'),
            regPasswordConf: this.rootElement.querySelector('[name="user-password-conf"]'),
            regPasswordHidden: this.rootElement.querySelector('[name="user-password-hidden"]'),
        }

        this.utilsForm.init();
    }

    initEventListener() {
        this.elements.regForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const emptyElements = this.utilsForm.getEmptyInput();

            if (!emptyElements) {
                this.initPasswordInput();

                if (this.elements.regPasswordHidden.value != '') {
                    const data = {
                        'email': this.elements.regEmail.value,
                        'password': this.elements.regPasswordHidden.value
                    };

                    UtilsFetch.postData('./php/registration-script.php', data)
                        .then(response => {
                            if (response.status == '200') {
                                UtilsFetch.postData('../common/php/authentication.php', data)
                                .then(response => {
                                    if (response.status == '200') {
                                        location.href = '../main/main.php';
                                    } else if (response.status == '420') {
                                        location.href = '../account/account.php?code=420';
                                    }
                                });
                            } else {
                                this.elements.regPassword.style.border = "2px solid red";
                                this.elements.regPasswordConf.style.border = "2px solid red";
                                this.elements.regPasswordHidden.value = '';
                            }
                        });
                } else {
                    this.elements.regPassword.style.border = "2px solid red";
                    this.elements.regPasswordConf.style.border = "2px solid red";
                }
            } else {
                emptyElements.forEach(element => {
                    element.style.border = "2px solid red";
                });
            }
        });
    }

    initPasswordInput() {
        const password = this.elements.regPassword.value;
        if (password == this.elements.regPasswordConf.value) {
            this.elements.regPasswordHidden.value = password;
        }

        this.elements.regPassword.value = '';
        this.elements.regPasswordConf.value = '';
    }
}

export default ValidationRegistration;