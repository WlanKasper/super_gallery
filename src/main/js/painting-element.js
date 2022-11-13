class PaintingElement {
    constructor(parentElement) {
        this.rootElement = parentElement;

        this.elements = {};

        const parser = new DOMParser();
        const templateString = ``;
        const templateElement = parser.parseFromString(templateString, 'text/html');
        this.template = templateElement.documentElement.querySelector("body > div");
    }

    init() {
        this.initElement();
        this.initEventListener();
    }

    initElement() {
        this.elements = {

        };
    }

    initEventListener() {

    }
}

export default PaintingElement;