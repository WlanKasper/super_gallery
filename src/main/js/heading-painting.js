class HeadingPainting {
    constructor (parentElement) {
        this.rootElement = parentElement;

        this.elements = {};
    }

    init() {
        this.initElement();
        this.initEventListener();
    }

    initElement() {
        this.elements = {
            headingAuthor: this.rootElement.querySelector('.heading-author'),
            headingName: this.rootElement.querySelector('.heading-name'),
            headingDesc: this.rootElement.querySelector('.heading-desc'),
            headingButton: this.rootElement.querySelector('.heading-button'),
            headingButtonInner: this.rootElement.querySelector('.heading-button-inner'),
            headingPainting: this.rootElement.querySelector('.heading-painting'),
        }
    }

    initEventListener() {
        this.elements.headingButton.addEventListener('click', (event) => {
            console.log('click');
        });
    }

    setHeadingAuthor(author) {
        this.elements.headingAuthor.innerHTML = author;
    }

    setHeadingName(name) {
        this.elements.headingName.innerHTML = name;
    }

    setHeadingDesc(desc) {
        this.elements.headingDesc.innerHTML = desc;
    }

    setButtonInner(inner) {
        this.elements.headingButtonInner.innerHTML = inner;
    }

    setHeadingPainting(height, src) {
        this.rootElement.style.height = `${height + 100}px`;
        
        this.elements.headingPainting.style.height = `${height}px`;
        this.elements.headingPainting.src = src;
    }
}

export default HeadingPainting;