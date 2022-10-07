let body = document.body;
let first_sec = document.getElementById('first_sec');

let last_scroll_y = 0;

function changeBackgroun(scroll){
    let percentage = 100 - Math.round((100 * scroll) / (body.clientHeight - window.innerHeight + 400));
    body.style.background = 'linear-gradient(180deg, ' +
    '#E1E0D7 ' + (percentage - 20) + '%,' +
    '#FDD0A6 ' + percentage + '%)';
}

document.addEventListener('scroll', (ev) => {
    last_scroll_y = window.scrollY;
    changeBackgroun(last_scroll_y);
})