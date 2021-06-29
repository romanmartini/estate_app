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

function selectedOptions(dataName){
    let $select = document.querySelector(dataName);
    for( let i = 0; i < $select.children.length; i++ ){
        if ($select.dataset.value === $select.children[i].value){
            $select.children[i].setAttribute('selected', '')        
        }
    }
}
function checkedRadio(id){
    let $inputParent = document.getElementById(id);
    let $input = $inputParent.querySelectorAll('input')
    
    $input.forEach( input => {
        if( input.attributes['value'].value === $inputParent.attributes['data-value'].value ) {
            input.setAttribute('checked', '');
            input.parentNode.classList.add('is-active')
        }
    })

}

checkedRadio('currency');

selectedOptions('[name="type"]');
selectedOptions('[name="new"]');
selectedOptions('[name="status"]');
selectedOptions('[name="contract"]');