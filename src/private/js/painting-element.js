import CookieManager from "../../common/js/cookie-manager.js";
import UtilsFetch from "../../common/js/utils-fetch.js";

class PaintingElement {
    constructor(parentElement, idPainting) {
        this.rootElement = parentElement;

        this.elements = {};

        const parser = new DOMParser();
        const templateString = `<div class="wrapper-painting"><div class="wrapper-section"><img class="painting-img" src=""><div class="wrapper-glass"><div class="wrapper-glass-text"><h3 class="glass-text glass-text-name"></h3><h4 class="glass-text glass-text-desc"></h4></div><button class="glass-button"><h4 class="glass-button-text">BUY</h4></button></div></div></div>`;
        const templateElement = parser.parseFromString(templateString, 'text/html');
        this.template = templateElement.documentElement.querySelector("body > div");

        this.idPainting = idPainting;
    }

    init() {
        this.initElement();
        this.initEventListener();
        this.initPaintingShadow();
    }

    initElement() {
        this.elements = {
            wrapperPainting: this.template.querySelector('.wrapper-section'),
            paintingImg: this.template.querySelector('.painting-img'),
            paintingGlass: this.template.querySelector('.wrapper-glass'),
            paintingName: this.template.querySelector('.glass-text-name'),
            paintingDesc: this.template.querySelector('.glass-text-desc'),
            paintingButton: this.template.querySelector('.glass-button'),
            paintingButtonText: this.template.querySelector('.glass-button-text'),
        };

        this.rootElement.appendChild(this.template);
    }

    initEventListener() {
        this.elements.paintingButton.addEventListener('click', (event) => {
            if (!this.elements.paintingButtonText.disabled) {
                if (CookieManager.getCookie('user_id')) {    
                    const data = {
                        idPainting: this.idPainting,
                        idUser: CookieManager.getCookie('user_id'),
                    };
                    UtilsFetch.postData('./php/buy-painting-script.php', data)
                        .then(response => {
                            if (response.status == 200) {
                                this.setPaintingButtonText('SOLD');
                                this.setPaintingButtonStatus(true);
                            }
                            console.log(response);
                        });
                } else {
                    location.href = '../login/login.php';
                }
            }
        });
    }

    initPaintingShadow() {
        const position = this.findPosition();
        const shadow_color = 'rgba(0, 0, 0, 0.3)';
        const shadow_dim = '20px';
        let shadow_x = '10px';
        let shadow_y = '15px';

        switch (position) {
            case 'left-top':
                shadow_x = '-' + shadow_x;
                shadow_y = '-' + shadow_y;
                break;
            case 'left-bott':
                shadow_x = '-' + shadow_x;
                break;
            case 'right-top':
                shadow_y = '-' + shadow_y;
                break;
            case 'right-bott':
                break;
            default:
                break;
        }

        this.elements.paintingImg.style.boxShadow = (shadow_x + ' ' + shadow_y + ' ' + shadow_dim + ' ' + shadow_color);
    }

    setPaintingName(name) {
        this.elements.paintingName.innerHTML = name;
    }

    setPaintingDesc(desc) {
        this.elements.paintingDesc.innerHTML = desc;
    }

    setPaintingButtonStatus(status) {
        this.elements.paintingButton.disabled = status;
    }

    setPaintingButtonText(text) {
        this.elements.paintingButtonText.innerHTML = text;
    }

    setPaintingImg(maxHeight, path) {
        this.elements.paintingImg.src = path;

        if (maxHeight > 500) {
            this.elements.paintingImg.style.marginTop = '100px';
        }

        this.elements.paintingImg.style.height = `${maxHeight}px`;
    }

    findPosition() {
        const wrapper_bounds = this.rootElement.getBoundingClientRect();
        const pic_bounds = this.template.getBoundingClientRect();
        const centerX = pic_bounds.left;
        const centerY = pic_bounds.top;


        if ((wrapper_bounds.width / 2) > centerX && (wrapper_bounds.top + 100) > centerY) {
            return 'left-top';
        } else if ((wrapper_bounds.width / 2) > centerX && (wrapper_bounds.top + 100) < centerY) {
            return 'left-bott';
        } else if ((wrapper_bounds.width / 2) < centerX && (wrapper_bounds.top + 100) > centerY) {
            return 'right-top';
        } else if ((wrapper_bounds.width / 2) < centerX && (wrapper_bounds.top + 100) < centerY) {
            return 'right-bott';
        }
    }
}

export default PaintingElement;