"use strict";

function getCookie(name) {
	var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

if (getCookie('pagecd')=='00a') {
    let mp3name = document.querySelector('#mp3name');
    let myaudio = document.querySelector('#myaudio');
    let lenght = document.querySelector('#listcnt');
    let title = document.querySelector('#title');
    let i = 0;
    while (i < lenght.value) {
        let id = document.querySelector('#mp3key'+String(i));
        id.addEventListener('click', mp3func);
        i++;
    }
    function mp3func() {
        mp3name.innerHTML = this.textContent.replace('- ','');
        title.innerHTML = this.textContent.replace('- ','');
        myaudio.src=this.value;
        document.cookie = "mp3l="+this.value+";max-age=604800";
        document.cookie = "mp3num="+this.id.replace('mp3key','')+";max-age=604800";
        myaudio.play();
    }
    myaudio.onended=function() {
        let resco = Number(getCookie('mp3num'));
        let id = document.querySelector('#mp3key'+String(resco+1));
        mp3name.innerHTML = id.textContent.replace('- ','');
        title.innerHTML = id.textContent.replace('- ','');
        myaudio.src=id.value;
        document.cookie = "mp3l="+id.value+";max-age=604800";
        document.cookie = "mp3num="+id.id.replace('mp3key','')+";max-age=604800";
        myaudio.play();
    }
}