import UtilsForm from '../../common/js/utlis-form.js';
import UtilsFetch from '../../common/js/utils-fetch.js';

class ValidationLogin {
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
            loginForm: this.rootElement,
            loginEmail: this.rootElement.querySelector('[name="user-email"]'),
            loginPassword: this.rootElement.querySelector('[name="user-password"]'),
            loginPasswordHidden: this.rootElement.querySelector('[name="user-password-hidden"]'),
        }

        this.utilsForm.init();
    }

    initEventListener() {
        this.elements.loginForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const emptyElements = this.utilsForm.getEmptyInput();

            if (!emptyElements) {
                this.initPasswordInput();

                const data = {
                    'email': this.elements.loginEmail.value,
                    'password': this.elements.loginPasswordHidden.value
                };

                UtilsFetch.postData('../common/php/authentication.php', data)
                    .then(response => {
                        console.log(response);
                        if (response.status == '200') {
                            location.href = '../main/main.php';
                        } else {
                            this.elements.loginEmail.style.border = "2px solid red";
                            this.elements.loginPassword.style.border = "2px solid red";
                            this.elements.loginPasswordHidden.value = '';
                        }
                    });
            } else {
                emptyElements.forEach(element => {
                    element.style.border = "2px solid red";
                });
            }
        });
    }

    initPasswordInput() {
        const password = this.elements.loginPassword.value;
        this.elements.loginPasswordHidden.value = password;
        this.elements.loginPassword.value = '';
    }
}

export default ValidationLogin;