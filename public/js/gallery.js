'use strict'
let $pictureFrame = document.getElementById('show-img');

document.addEventListener('click', e => {

    if(e.target.matches('[data-show-img]')){
        console.dir(e.target.parentNode.parentNode.querySelector('img'))
        let $srcImg = e.target.parentNode.parentNode.querySelector('img').src;
        $pictureFrame.querySelector('img').src = $srcImg
        $pictureFrame.classList.add('is-active')
    }

    if(e.target.matches('[data-close]') || e.target.matches('#show-img')  || e.target.matches('#btn-cancel') ){
        $pictureFrame.classList.remove('is-active')
        $pictureFrame.querySelector('.picture > div').innerHTML = '';


    }

    if(e.target.matches('[data-delete-img]')){
        
        let $srcImg = e.target.parentNode.parentNode.querySelector('img').src;
        let $templateForm = `
            <p>¿Estas seguro que deseas eliminar esta imágen?</p>
            <form method='POST'>
                <input type='submit' value='Si' id='btn-delete'>
                <input type='hidden' name='action' value='delete'>
                <input type='hidden' name='rute' value=${$srcImg}>
                <input type='button' value='no' id='btn-cancel'>
            </form>`;
        $pictureFrame.querySelector('.picture > div').innerHTML = $templateForm;
        $pictureFrame.querySelector('img').src = $srcImg;
        $pictureFrame.classList.add('is-active');

    }
    
})
// document.addEventListener('keydown', e => {
//     if(e.key === 'Escape') $pictureFrame.classList.remove('is-active');
//     $pictureFrame.querySelector('.picture > div').innerHTML = '';

// })










// 
