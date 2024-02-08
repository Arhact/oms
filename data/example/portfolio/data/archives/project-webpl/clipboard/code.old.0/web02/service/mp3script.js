"use strict";
let mp3name = document.querySelector('#mp3name');
let myaudio = document.querySelector('#myaudio');
let lenght = document.querySelector('#listcnt');

let i = 0;
while (i < lenght.value) {
    let id = document.querySelector('#mp3key'+String(i));
    id.addEventListener('click', mp3func);
    i++;
}

function mp3func() {
    mp3name.innerHTML = this.innerHTML;
    myaudio.src=this.value;
    myaudio.play();
}