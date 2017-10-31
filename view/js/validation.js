$(document).ready(function(){
    var loginInputs = document.getElementsByClassName("loginInput")
    for (i=0; i < loginInputs.length; i++){
        loginInputs[i].addEventListener("input",loginValidity,false)
    }
    var registerInputs = document.getElementsByClassName("registerInput")
    for (i=0; i < registerInputs.length; i++){
        registerInputs[i].addEventListener("input",registerValidity,false)
    }
    var updateInputs = document.getElementsByClassName("updateInput")
    for (i=0; i < updateInputs.length; i++){
        updateInputs[i].addEventListener("input",updateValidity,false)
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

function registerValidity(){
    var registerInputs = document.getElementsByClassName("registerInput")
    console.log(registerInputs)
    var submit = document.getElementById("registerSubmit")
    for(i=0;i<registerInputs.length;i++){
        if(registerInputs[i].checkValidity() && registerInputs[i].value != ''){
            submit.removeAttribute("disabled", "")
            console.log('yes')
        } 
        else {
        submit.setAttribute("disabled", "")
        return
        }
    }
    if(document.getElementById("registerPassword").value == document.getElementById("repeatPassword").value){
        submit.removeAttribute("disabled", "")
    }
    else{
        submit.setAttribute("disabled", "")
        document.getElementById("repeatPassword").validity.customError == true
        return
    }

}

function updateValidity(){
    var updateInputs = document.getElementsByClassName("updateInput")
    var submit = document.getElementById("updateSubmit")
    for(i=0;i<updateInputs.length;i++){
        if(updateInputs[i].checkValidity()){
            submit.removeAttribute("disabled", "")
        } 
        else {
        submit.setAttribute("disabled", "")
        return
        }
    }
    if((document.getElementById("updatePassword").value == document.getElementById("updateRepeatPassword").value) || ((document.getElementById("updatePassword").value == '') && (document.getElementById("updateRepeatPassword").value == ''))){
        submit.removeAttribute("disabled", "")
    }
    else{
        submit.setAttribute("disabled", "")
        document.getElementById("repeatPassword").validity.customError == true
        return
    }

}