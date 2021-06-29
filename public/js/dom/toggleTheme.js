'user strict'

function getStorageTheme(){

    let classTheme = localStorage.getItem('theme');
    return classTheme;
}

function setStorageTheme(classTheme){
    
    localStorage.setItem('theme', classTheme);

}

function setDOMIconTheme(removeClass, addClass, selector){

    let $iconTheme = document.querySelector(selector);

    $iconTheme.classList.remove(removeClass);
    $iconTheme.classList.add(addClass);

}

function setDOMTheme(removeClass, addClass, $body){

    $body.classList.remove(removeClass);
    $body.classList.add(addClass);

    (addClass === 'dark-theme') 
        ? setDOMIconTheme('icon-sun', 'icon-moon', '#icon-theme')
        : setDOMIconTheme('icon-moon', 'icon-sun', '#icon-theme');

    setStorageTheme(addClass);

    
}

function toggleTheme(selectorBody, selectorIcon){

    let $iconTheme = document.querySelector(selectorIcon);
    let $body = document.querySelector(selectorBody);

    $iconTheme.addEventListener('click', () => {

        ($body.classList.contains('ligth-theme'))
            ? setDOMTheme('ligth-theme', 'dark-theme', $body)
            : setDOMTheme('dark-theme', 'ligth-theme', $body);

    })


    let storageTheme = getStorageTheme();

    (storageTheme === 'dark-theme' )
        ? setDOMTheme('ligth-theme', 'dark-theme', $body)
        : setDOMTheme('dark-theme', 'ligth-theme', $body);
    
}

document.addEventListener('DOMContentLoaded', () =>{
    toggleTheme('body', '#icon-theme');
})
