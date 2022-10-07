let arr_pipes = new Array();

let last_pipe = {
    width: null,
    height: null,
    left: null,
    top: null
}

function createBlock(wrapper, max_width, max_height, number_blocks) {
    for (let index = 0; index < number_blocks; index++) {
        let new_pipe = document.createElement('div');
        let random_size_width = 0, random_size_height = 0, random_left, random_top, temp_rest;

        do {
            random_size_width = Math.floor(Math.random() * max_width);
            temp_rest = random_size_width % 50;
            random_size_width -= temp_rest;
        } while (random_size_width < 100 || random_size_width > max_width - 100 || random_size_width > max_height - 100);

        do {
            random_size_height = Math.floor(Math.random() * max_height);
            temp_rest = random_size_height % 50;
            random_size_height -= temp_rest;
        } while (random_size_height < 100 || random_size_height > max_width - 100 || random_size_height > max_height - 100);

        do {
            if (findStart()){
                if(findStart()[0] == 'os_y'){
                    random_left = Math.floor(Math.random() * findStart()[2] + findStart()[1]);
                    temp_rest = random_left % 40;
                    random_left -= temp_rest - 80;
    
                    random_top = Math.floor(Math.random() * max_height);
                    temp_rest = random_top % 40;
                    random_top -= temp_rest - 80;
                } else if (findStart()[0] == 'os_x'){
                    random_top = Math.floor(Math.random() * findStart()[2] + findStart()[1]);
                    temp_rest = random_top % 40;
                    random_top -= temp_rest - 80;
    
                    random_left = Math.floor(Math.random() * max_width);
                    temp_rest = random_left % 40;
                    random_left -= temp_rest - 80;
                } 
            } else {
                random_top = Math.floor(Math.random() * max_height);
                temp_rest = random_top % 40;
                random_top -= temp_rest - 80;
    
                random_left = Math.floor(Math.random() * max_width);
                temp_rest = random_left % 40;
                random_left -= temp_rest - 80;
            }
            
        } while (!isPositionFree(random_left, random_top) || ((random_top + random_size_height) > max_height)  || ((random_left + random_size_width) > max_width));

        if (Math.round(Math.random())) {
            new_pipe.setAttribute('class', 'pipe pipe_x');
            new_pipe.style.width = random_size_width + 'px';
            new_pipe.style.height = '10px';
        } else {
            new_pipe.setAttribute('class', 'pipe pipe_y');
            new_pipe.style.width = '10px';
            new_pipe.style.height = random_size_height + 'px';
        }

        new_pipe.style.left = random_left + 'px';
        new_pipe.style.top = random_top + 'px';

        arr_pipes.push(new_pipe);
        wrapper.appendChild(new_pipe);

        last_pipe.width = random_size_width;
        last_pipe.height = random_size_height;
        last_pipe.left = random_left;
        last_pipe.top = random_top;
    }
}

function isPositionFree(position_left, position_top) {
    arr_pipes.forEach(element => {
        if (element.style.left == position_left + 'px') {
            return false;
        }
        if (element.style.top == position_top + 'px') {
            return false;
        }
    });

    return true;
}

function findStart(){
    if (last_pipe.width == 0){
        return ['os_y',last_pipe.left, last_pipe.height];
    } else if (last_pipe.height == 0){
        return ['os_x',last_pipe.top, last_pipe.width];
    }
}

function rotatePipe() {
    let index = Math.floor(Math.random() * arr_pipes.length);
    if (arr_pipes[index].id == 'pipe') {
        arr_pipes[index].style.transform = 'rotate(0deg)';
        arr_pipes[index].id = '';
    } else if (Math.round(Math.random())) {
        arr_pipes[index].style.transform = 'rotate(90deg)';
        arr_pipes[index].id = 'pipe';
    } else {
        arr_pipes[index].style.transform = 'rotate(-90deg)';
        arr_pipes[index].id = 'pipe';
    }
}

setInterval(() => rotatePipe(), 6000);