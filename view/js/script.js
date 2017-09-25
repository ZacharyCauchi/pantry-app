$( document ).ready(function(){
    $(".button-collapse").sideNav();
})

function scrollFunction1(){
    $('html, body').animate({
        scrollTop: $("#resultID").offset().top - 90
    }, 1000);
}

function scrollFunction2(){
    $('html, body').animate({
        scrollTop: $("#aboutID").offset().top
    }, 1000);
}

function scrollFunction3(){
    $('html, body').animate({
        scrollTop: $("#body").offset().top
    }, 1000);
}

function closeModal() {
    document.getElementById("modalBackground").style.display = "none";
}

function loginModalOpen() {
    document.getElementById("modalBackground").style.display = "flex";
    document.getElementById("loginBox").style.display = "block";
    document.getElementById("registrationBox").style.display = "none";
    document.getElementById("updateDetailsBox").style.display = "none";
}

function switchToLogin() {
    document.getElementById("loginBox").style.display = "block";
    document.getElementById("registrationBox").style.display = "none";
    document.getElementById("updateDetailsBox").style.display = "none";
}

function switchToRegister() {
    document.getElementById("loginBox").style.display = "none";
    document.getElementById("registrationBox").style.display = "block";
    document.getElementById("updateDetailsBox").style.display = "none";
}

function showAccountUpdate(userID) {
         var request = $.ajax({
            method: "POST",
            url: "../controller/dbFunctionsController.php?state=showUserDetails",
            data: { user: userID }
            })
            .done(function(userDetails) {
                console.log(userDetails);
                document.getElementById("updateFirstName").value = userDetails['firstName'];
                document.getElementById("updateLastName").value = userDetails['lastName'];
                document.getElementById("updateEmail").value = userDetails['email'];
                document.getElementById("updateUsername").value = userDetails['username'];
            });
    document.getElementById("modalBackground").style.display = "flex";
    document.getElementById("loginBox").style.display = "none";
    document.getElementById("registrationBox").style.display = "none";
    document.getElementById("updateDetailsBox").style.display = "block";
}