import HeadingPainting from "./heading-painting.js";
import PaintingElement from "./painting-element.js";

const parentElementHeading = document.querySelector('.wrapper-heading-painting');
const parentElementPainting = document.querySelector('#wrapper_pictures_section_1');


const headingPainting = new HeadingPainting(parentElementHeading);
headingPainting.init();
headingPainting.setHeadingAuthor('SHISHKIN');
headingPainting.setHeadingName('MORNING...');
headingPainting.setHeadingDesc(`CONCERNS GREATEST MARGARET HIM ABSOLUTE ENTRANCE NAY. DOOR NEAT WEEK DO FIND PAST HE. BE NO
SURPRISE HE HONOURED INDULGED. UNPACKED ENDEAVOR SIX STEEPEST HAD HUSBANDS HER. PAINTED NO
OR AFFIXED IT SO CIVILLY. EXPOSED NEITHER PRESSED SO COTTAGE AS PROCEED AT OFFICES. NAY THEY
GONE SIR GAME FOUR. FAVOURABLE PIANOFORTE OH MOTIONLESS EXCELLENCE OF ASTONISHED WE.`);
headingPainting.setButtonInner('BUY');
headingPainting.setHeadingPainting(400, '../../img/favorite_1.jpg');

for (let i = 0; i < 4; i++) {
    const paintingElement = new PaintingElement(parentElementPainting);
    paintingElement.init();
    paintingElement.setPaintingName('test name');
    paintingElement.setPaintingDesc('test desc <br> test desc');
    paintingElement.setPaintingButtonText('BUY');
    paintingElement.setPaintingImg(400, '../../img/favorite_2.jpg');
}
