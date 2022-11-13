import ValidationRegistration from "./validation-registration.js";
import PipeComponent from "../../common/js/pipe-component.js";

const elementForm = document.querySelector('form');
const elementPipeWrapper = document.querySelector('main');

const validationRegistration = new ValidationRegistration(elementForm);
validationRegistration.init();

const pipeComponent = new PipeComponent(elementPipeWrapper, 20, 1000, 700);
pipeComponent.init();
