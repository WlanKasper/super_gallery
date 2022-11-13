import PaintingElement from "./painting-element.js";

const parentElement = document.querySelector('#wrapper_pictures_section_1');

for (let i = 0; i < 4; i++) {
    const paintingElement = new PaintingElement(parentElement);
    paintingElement.init();
    paintingElement.setPaintingName('test name');
    paintingElement.setPaintingDesc('test desc <br> test desc');
    paintingElement.setPaintingButtonText('BUY');
    paintingElement.setPaintingImg(400, '../../img/favorite_2.jpg');
}
