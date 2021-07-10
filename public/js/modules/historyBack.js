export default function historyBack(selector){
    
    document.addEventListener('click', (e) => { 
        if(e.target.matches(selector)) history.back(1) 
    });

}