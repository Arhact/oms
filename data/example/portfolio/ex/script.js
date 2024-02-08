"use strict";

let content_quantity = document.querySelector('#content_quantity');

let content_aact0 = document.querySelector('#content_aact0');
if(!!content_aact0){
    content_aact0.addEventListener('click', visibility0);
    let content0 = document.querySelector('#content0');
    
    function visibility0(){
        if(this.value == 'block'){
            content0.style.display = 'none';
            this.value = 'none';
        }else{
            content0.style.display = 'block';
            this.value = 'block';
        }
    }
}

let content_aact1 = document.querySelector('#content_aact1');
if(!!content_aact1){
    content_aact1.addEventListener('click', visibility1);
    let content1 = document.querySelector('#content1');

    function visibility1(){
        if(this.value == 'block'){
            content1.style.display = 'none';
            this.value = 'none';
        }else{
            content1.style.display = 'block';
            this.value = 'block';
        }
    }
}

let content_aact2 = document.querySelector('#content_aact2');
if(!!content_aact2){
    content_aact2.addEventListener('click', visibility2);
    let content2 = document.querySelector('#content2');

    function visibility2(){
        if(this.value == 'block'){
            content2.style.display = 'none';
            this.value = 'none';
        }else{
            content2.style.display = 'block';
            this.value = 'block';
        }
    }
}

let content_aact3 = document.querySelector('#content_aact3');
if(!!content_aact3){
    content_aact3.addEventListener('click', visibility3);
    let content3 = document.querySelector('#content3');

    function visibility3(){
        if(this.value == 'block'){
            content3.style.display = 'none';
            this.value = 'none';
        }else{
            content3.style.display = 'block';
            this.value = 'block';
        }
    }
}

let content_upload = document.querySelector('#content_upload');
if(!!content_upload){
    content_upload.addEventListener('click', visibility4);
    let upload = document.querySelector('#upload');

    function visibility4(){
        if(this.value == 'block'){
            upload.style.display = 'none';
            this.value = 'none';
        }else{
            upload.style.display = 'block';
            this.value = 'block';
        }
    }
}

// плеер
let video = document.querySelector('#video');
if(!!video){
    // let content_choose = document.querySelector('#content_choose');
    // content_choose.addEventListener('click', choose0);

    let i = 0;
    while (i < content_quantity.value) {
        let content_choose = document.querySelector('#content_choose'+String(i));
        content_choose.addEventListener('click', choose0);
        i++;
    }

    function choose0(){
        video.src=this.value;
    }

    let content_load = document.querySelector('#content_load');
    content_load.addEventListener('click', visibility5);
    let link_load = document.querySelector('#link_load');

    function visibility5(){
        if(this.value == 'block'){
            link_load.style.display = 'none';
            this.value = 'none';
        }else{
            link_load.style.display = 'block';
            this.value = 'block';
        }
    }

    let link_enter_field = document.querySelector('#link_enter_field');
    let link_enter = document.querySelector('#link_enter');
    link_enter.addEventListener('click', choose1);

    function choose1(){
        let request = link_enter_field.value.replace('\\', '/');
        link_enter_field.value='';
        window.location=link_enter.value+request+'/';
    }

    let content_del = document.querySelector('#content_del');
    content_del.addEventListener('click', visibility6);
    let del_load = document.querySelector('#del_load');

    function visibility6(){
        if(this.value == 'block'){
            del_load.style.display = 'none';
            this.value = 'none';
        }else{
            del_load.style.display = 'block';
            this.value = 'block';
        }
    }
}