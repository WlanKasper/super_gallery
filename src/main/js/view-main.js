import UtilsFetch from "../../common/js/utils-fetch.js";
import HeadingPainting from "./heading-painting.js";
import PaintingElement from "./painting-element.js";
import PipeComponent from "../../common/js/pipe-component.js";

const parentElementHeading = document.querySelector('.wrapper-heading-painting');
const wrapperElementPaintings = document.querySelector('#wrapper-paintings');
const parentElementPaintingTitle = document.querySelector('#painting-section-title');

let parentElementPainting = null;
let paintingsList = null;
let counterPaintingParent = 0;


const headingPainting = new HeadingPainting(parentElementHeading);
headingPainting.init();
headingPainting.setHeadingAuthor('MIKHAIL VRUBEL');
headingPainting.setHeadingName('PEARL OYSTER (1904)');
headingPainting.setHeadingDesc(`VRUBEL È UN ARTISTA RUSSO CHE HA DIPINTO IN QUASI TUTTE LE TECNICHE E GENERI, CHE HA CERCATO INSTANCABILMENTE E CON ENERGIA RIBOLLENTE LA PROPRIA, PRIVILEGIANDO TRAME MITICHE E LETTERARIE. MIKHAIL ALEKSANDROVICH VRUBEL (TRASLITTERATO ANCHE COME MIKHAIL) È STATO UN ARTISTA, DISEGNATORE E SCULTORE NATO A OMSK, UNA CITTÀ DELL'IMPERO RUSSO CHE ATTUALMENTE APPARTIENE AL DISTRETTO FEDERALE SIBERIANO. LA SUA FIGURA È STRETTAMENTE ASSOCIATA AL SIMBOLISMO RUSSO, ED È ANCHE CONSIDERATO UN PIONIERE DELL'ART NOUVEAU.`);
headingPainting.setHeadingPainting(400, '../../images/favorite_2.jpg');

initPaintings({countryId: 0, private: 'n'});

UtilsFetch.postData('./php/main-get-filters-script.php', {})
    .then(response => {
        if (response.status == 200) {
            const filters = JSON.parse(response.data);

            initFilter('ALL', 0);
            filters.forEach(filter => {
                initFilter(filter['nazionalita'].toString().toUpperCase(), filter['id']);
            });
        }
    });

function initNewPaintingParent() {
    counterPaintingParent += 1;

    const parser = new DOMParser();
    const templateString = `<div class="wrapper_pictures" id="wrapper_pictures_section_${counterPaintingParent}"> <div class="wrapper_pipe"> </div></div>`;
    const templateElement = parser.parseFromString(templateString, 'text/html');
    const template = templateElement.documentElement.querySelector("body > div");

    const pipeComponent = new PipeComponent(template.querySelector('.wrapper_pipe'), 20, 900, 700);
    pipeComponent.init();

    wrapperElementPaintings.appendChild(template);
    return template;
}

function initFilter(name, countryId) {
    const parser = new DOMParser();
    const templateString = `<button class="heading-button"> <h4 class="heading-button-inner">${name}</h4> </button>`;
    const templateElement = parser.parseFromString(templateString, 'text/html');
    const template = templateElement.documentElement.querySelector("body > button");

    template.addEventListener('click', async (event) => {
        destroyPaintings();
        const data = {
            countryId: countryId,
            private: 'n',
        };
        return initPaintings(data);
    });

    parentElementPaintingTitle.appendChild(template);
}

async function initPaintings(data) {
    return UtilsFetch.postData('./php/main-get-painting-script.php', data)
        .then(response => {
            if (response.status == 200) {
                paintingsList = JSON.parse(response.data);

                let counter = 0;

                paintingsList.forEach(painting => {
                    if (counter % 4 == 0) {
                        parentElementPainting = initNewPaintingParent();
                    }

                    const paintingElement = new PaintingElement(parentElementPainting, painting['id']);
                    paintingElement.init();
                    paintingElement.setPaintingName(painting['titolo'].toUpperCase());
                    paintingElement.setPaintingDesc(`${painting['autore'].toUpperCase()}<br>${painting['descrizione'].toUpperCase()}`);
                    if(painting['prenotato'] == 'n') {
                        paintingElement.setPaintingButtonText('BUY');
                    } else {
                        paintingElement.setPaintingButtonText('SOLD');
                        paintingElement.setPaintingButtonStatus(true);
                    }
                    paintingElement.setPaintingImg(400, `../../${painting['path']}`);

                    counter += 1;
                });
            } else {
                console.log(response);
                wrapperElementPaintings.innerHTML = `<h4 style="text-align: center;margin-top: 100px;">PER IL MOMENTO NON SONO DISPONIBILI</h4>`;
            }
            
        });
}

function destroyPaintings() {
    while (wrapperElementPaintings.lastElementChild) {
        wrapperElementPaintings.removeChild(wrapperElementPaintings.lastElementChild);
    }
}