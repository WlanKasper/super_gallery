class PipeComponent {
    constructor(parentElement, quantity, maxWidth, maxHeight) {
        this.parentElement = parentElement;
        this.rootElement = null;

        this.quantity = quantity;
        this.elements = [];

        this.maxWidth = maxWidth;
        this.maxHeight = maxHeight;
        this.currentPosition = null;
        this.position = {
            width: 0,
            height: 0,
            left: 0,
            top: 0,
        };
    }

    init() {
        this.initElements();
        this.initEventListeners();
    }

    initElements() {
        this.rootElement = this.parentElement;

        for (let i = 0; i < this.quantity; i++) {
            const pipe = this.initPipe();
            this.elements.push(pipe);
            this.rootElement.appendChild(pipe);
        }
    }

    initEventListeners() {
        setInterval(async () => {
            return rotatePipe(this.elements);
        }, 6000);

        async function rotatePipe(elements) {
            const index = Math.floor(Math.random() * elements.length);
            if (elements[index]) {
                if (elements[index].id == 'pipe') {
                    elements[index].style.transform = 'rotate(0deg)';
                    elements[index].id = '';
                } else if (Math.round(Math.random())) {
                    elements[index].style.transform = 'rotate(90deg)';
                    elements[index].id = 'pipe';
                } else {
                    elements[index].style.transform = 'rotate(-90deg)';
                    elements[index].id = 'pipe';
                }
            }
        }
    }

    initPipe() {
        const rootElement = document.createElement('div');

        do {
            this.position.width = Math.floor(Math.random() * this.maxWidth);
            this.position.width -= this.position.width % 50;
        } while (this.position.width < 100 || this.position.width > this.maxWidth - 100 || this.position.width > this.maxHeight - 100);

        do {
            this.position.height = Math.floor(Math.random() * this.maxHeight);
            this.position.height -= this.position.height % 50;
        } while (this.position.height < 100 || this.position.height > this.maxWidth - 100 || this.position.height > this.maxHeight - 100);

        do {
            const start = this.findStart();
            if (start) {
                if (start[0] == 'os_y') {
                    this.position.left = Math.floor(Math.random() * start[2] + start[1]);
                    this.position.left -= this.position.left % 40 - 80;

                    this.position.top = Math.floor(Math.random() * this.maxHeight);
                    this.position.top -= this.position.top % 40 - 80;
                } else if (start[0] == 'os_x') {
                    this.position.top = Math.floor(Math.random() * start[2] + start[1]);
                    this.position.top -= this.position.top % 40 - 80;

                    this.position.left = Math.floor(Math.random() * this.maxWidth);
                    this.position.left -= this.position.top % 40 - 80;
                }
            } else {
                this.position.top = Math.floor(Math.random() * this.maxHeight);
                this.position.top -= this.position.top % 40 - 80;

                this.position.left = Math.floor(Math.random() * this.maxWidth);
                this.position.left -= this.position.left % 40 - 80;
            }

        } while (!this.isPositionFree(this.position.left, this.position.top) || ((this.position.top + this.position.height) > this.maxHeight) || ((this.position.left + this.position.width) > this.maxWidth));

        if (Math.round(Math.random())) {
            rootElement.setAttribute('class', 'pipe pipe_x');
            rootElement.style.width = this.position.width + 'px';
            rootElement.style.height = '10px';
        } else {
            rootElement.setAttribute('class', 'pipe pipe_y');
            rootElement.style.width = '10px';
            rootElement.style.height = this.position.height + 'px';
        }

        rootElement.style.left = this.position.left + 'px';
        rootElement.style.top = this.position.top + 'px';

        this.currentPosition = this.position;
        return rootElement;
    }

    isPositionFree(position_left, position_top) {
        this.elements.forEach(element => {
            if (element.style.left == position_left + 'px') {
                return false;
            }
            if (element.style.top == position_top + 'px') {
                return false;
            }
        });

        return true;
    }

    findStart() {
        if (this.currentPosition) {
            if (this.currentPosition.width == 0) {
                return ['os_y', this.currentPosition.left, this.currentPosition.height];
            } else if (this.currentPosition.height == 0) {
                return ['os_x', this.currentPosition.top, this.currentPosition.width];
            }
        }
    }
}

export default PipeComponent;