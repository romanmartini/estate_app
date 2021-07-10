'use strict'

export function removeDataProperties(selector){
    let $propertyData = document.querySelectorAll(selector);

    $propertyData.forEach(elm => {
        // Remove child
        if ( selector === '[data-expenses]' && elm.attributes['data-expenses'].value == 0 ) elm.parentNode.removeChild(elm);
        // Remove parentNode
        if ( selector === '[data-total-area]' && elm.attributes['data-total-area'].value == 0 ) elm.parentNode.remove();
        if ( selector === '[data-rooms]' && elm.attributes['data-rooms'].value == 0 ) elm.parentNode.remove();
        if ( selector === '[data-bedrooms]' && elm.attributes['data-bedrooms'].value == 0 ) elm.parentNode.remove();
        if ( selector === '[data-bathrooms]' && elm.attributes['data-bathrooms'].value == 0 ) elm.parentNode.remove();
        if ( selector === '[data-garage]' && elm.attributes['data-garage'].value == 0 ) elm.parentNode.remove();  
    })
}

export function carruselImg(images, btnPrev, btnNext){

    let $images = document.querySelectorAll(images);

    $images.forEach(elm => elm.querySelector('.card-property-img > img').classList.add('is-active'));

    document.addEventListener('click', e => {

        let $images = e.target.parentNode.querySelectorAll('img');

        if(e.target.matches(btnNext)){


            for(let i = 0; i < $images.length; i++){

                let img = $images[i]
                
                if(img.classList.contains('is-active') && i < $images.length-1){
                    
                    img.classList.remove('is-active')
                    img.parentNode.nextElementSibling.firstElementChild.classList.add('is-active')
                    break;
                }
            }

        } 

        if(e.target.matches(btnPrev)){
            
            for(let i = 0; i < $images.length; i++){

                let img = $images[i]
                
                if(img.classList.contains('is-active') && i > 0 ){
                    
                    img.classList.remove('is-active')
                    img.parentNode.previousElementSibling.firstElementChild.classList.add('is-active')
                    break;
                }
            }
        }

    })
}