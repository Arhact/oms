'use strict'

let date = new Date();
let datespan = document.querySelector('#date');

datespan.textContent = date;
window.setInterval(function(){
    let date = new Date();
    datespan.textContent = date;
},1000);

let title = document.querySelector('#title');
let timeset = document.querySelector('#timeset');

window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
    }, 600);
}


// let n = document.querySelector('#n');    //поиск по id
// let n = document.querySelector('.n');    //поиск по class
// let n = document.querySelector('n');    //поиск по <n>
// let n = document.querySelector('div.user-panel.main input[name="login"]'); // поиск <div class="user-panel main"><input name="login"></div>

// n.addEventListener('event', function)    //выполнение function() по событию 'event' ('click', 'mouseover', 'mouseout', etc)

// date.getFullYear()		//год
// date.getMonth()			//месяц
// date.getDate()			//день
// date.getHours()			//часы
// date.getMinutes()		//минуты
// date.getSeconds()		//секунды