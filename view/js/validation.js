$(document).ready(function(){
    var loginInputs = document.getElementsByClassName("loginInput")
    console.log(loginInputs.length)
    for (i=0; i < loginInputs.length; i++){
        loginInputs[i].addEventListener("input",loginValidity,false)
    }
});

function loginValidity(){
    var loginInputs = document.getElementsByClassName("loginInput")
    var submit = document.getElementById("loginSubmit")
    for(i=0;i<loginInputs.length;i++){
        if(loginInputs[i].checkValidity() && loginInputs[i].value != ''){
            submit.removeAttribute("disabled", "")
        } 
        else {
        submit.setAttribute("disabled", "")
        return
    }
    }
}