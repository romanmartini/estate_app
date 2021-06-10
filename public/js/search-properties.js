'use strict'
// ===================================================================
// home 
// ===================================================================
function removeDataProperties(selector){
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
removeDataProperties('[data-expenses]');
removeDataProperties('[data-total-area]');
removeDataProperties('[data-rooms]');
removeDataProperties('[data-bedrooms]');
removeDataProperties('[data-bathrooms]');
removeDataProperties('[data-garage]');



// ===================================================================
// search-filter 
// ===================================================================

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

checkedRadio('search-contract')
checkedRadio('search-currency');

selectedOptions('[name="type"]');
selectedOptions('[name="rooms"]');
selectedOptions('[name="bedrooms"]');

document.addEventListener('click', e => {
    let checkedRent = document.querySelector('.contract .label-rent');
let checkedSale = document.querySelector('.contract .label-sale');
    if(e.target.matches('#rent')){
        checkedSale.classList.remove('is-active')
        checkedRent.classList.add('is-active');
    }
    if(e.target.matches('#sale')){
        checkedRent.classList.remove('is-active')
        checkedSale.classList.add('is-active');
    }
})
