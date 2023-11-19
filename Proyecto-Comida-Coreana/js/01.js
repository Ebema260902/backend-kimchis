var check=document.querySelector('.check');
check.addEventListener('click', idiom)

function idiom(){
    let id=check.checked;
    if(id==true){
        location.href="Corean/Corean.html";
    } else{
        location.href="../Dish.html";
    }
}