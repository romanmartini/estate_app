'use strict'

export function selectedOptions(dataName){
    let $select = document.querySelector(dataName);
    for( let i = 0; i < $select.children.length; i++ ){
        if ($select.dataset.value === $select.children[i].value){
            $select.children[i].setAttribute('selected', '')        
        }
    }
}

export function checkedRadio(id){
    let $inputParent = document.getElementById(id);
    let $input = $inputParent.querySelectorAll('input')
    
    $input.forEach( input => {
        if( input.attributes['value'].value === $inputParent.attributes['data-value'].value ) {
            input.setAttribute('checked', '');
            input.parentNode.classList.add('is-active')
        }
    })

}

export function disabledInput(inputSelect, inputCheckboxAll){

    let $inputSelect = (typeof inputSelect === 'object') ? inputSelect : document.querySelector(inputSelect);

    let $inputCheckboxAll = (typeof inputCheckboxAll === 'object') ? inputCheckboxAll :  document.querySelectorAll(inputCheckboxAll);

    if($inputSelect.matches('[name="rooms"]')){

        let newArr = [];
        $inputCheckboxAll.forEach(elm => (elm.matches('[value="9"]') || elm.matches('[value="8"]')) ? newArr.push(elm) : false);

        $inputCheckboxAll = newArr;
    };

    let checked = false;

    $inputCheckboxAll.forEach(elm => checked = ( elm.attributes.checked ) ? true : checked );

    (checked) ? $inputSelect.setAttribute('disabled', '') : $inputSelect.removeAttribute('disabled');
    
}

export function selectCheckbox(dataSelector){

    let $typeCheckbox = document.querySelectorAll(dataSelector);
    let $bedroomsSelect = document.querySelector('[name="bedrooms"]');
    let $roomsSelect = document.querySelector('[name="rooms"]');


    $typeCheckbox.forEach(elm => {

        elm.addEventListener('change', e => {
            
            if(e.target.attributes.checked){
                e.target.removeAttribute('checked');
            }else{
                e.target.setAttribute('checked', '');
            }

            disabledInput($bedroomsSelect, $typeCheckbox);
            disabledInput($roomsSelect, $typeCheckbox);
            
            
        })
    })
}