'use strict'
const $imgList = document.getElementById('img-list');
const $templateImg = document.getElementById('template-img').content;
const $fragment = document.createDocumentFragment();

const $gallery = document.getElementById('gallery');
const $img = document.querySelectorAll('.img img');

let imgPathArr = Array();

document.addEventListener('click', e => {

    // selected
    if(e.target.matches('.img img')){

        e.target.classList.toggle('is-active');

        if( !imgPathArr.includes(e.target.src) ){
            imgPathArr.push(e.target.src);
        }else{
            imgPathArr.splice(imgPathArr.indexOf(e.target.src), 1);

        }
        e.target.previousElementSibling.classList.toggle('is-active');
    }


    if( e.target.matches('[data-close]') || e.target.matches('[data-open]') || e.target.matches('#gallery') || e.target.matches('#add-img') ){


        // add img
        imgPathArr.forEach(elm => {

            $templateImg.children[0].setAttribute('src', elm);
            $templateImg.children[1].setAttribute('value', elm);
            let $clone = document.importNode($templateImg, true);
            $fragment.appendChild($clone);
        })
        if( $imgList.childNodes.length >= 1 ){
            $imgList.innerHTML = '';
        }
        $imgList.appendChild($fragment);

        // toggle frame
        $gallery.classList.toggle('is-active');
        


    }  






    

})