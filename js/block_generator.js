let arr_pipes = new Array();

function createBlock(wrapper, max_width, max_height, number_blocks) {
    for (let index = 0; index < number_blocks; index++) {
        let new_pipe = document.createElement('div');
        let random_size_width = 0, random_size_height = 0, random_left, random_top, temp_rest;

        do {
            random_size_width = Math.floor(Math.random() * max_width);
            temp_rest = random_size_width % 50;
            random_size_width -= temp_rest;
        } while (random_size_width < 200 || random_size_width > max_width - 200 || random_size_width > max_height - 200);

        do {
            random_size_height = Math.floor(Math.random() * max_height);
            temp_rest = random_size_height % 50;
            random_size_height -= temp_rest;
        } while (random_size_height < 200 || random_size_height > max_width - 200 || random_size_height > max_height - 200);

        do {
            random_top = Math.floor(Math.random() * max_height);
            temp_rest = random_top % 40;
            random_top -= temp_rest;

            random_left = Math.floor(Math.random() * max_width);
            temp_rest = random_left % 40;
            random_left -= temp_rest;
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
    }
}

function isPositionFree(position_left, position_top) {
    arr_pipes.forEach(element => {
        if (element.style.left == position_left + 'px') {
            console.log("yes");
            return false;
        }
        if (element.style.top == position_top + 'px') {
            console.log("yes 2");
            return false;
        }
    });

    return true;
}

function findStart(){
    // ToDo
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