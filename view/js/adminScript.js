window.onload = getUsers;

function getUsers(){
    var request = $.ajax({
        method: "POST",
        url: "controller/dbFunctionsController.php?state=showUserDetailsAdmin",
        })
        .done(function(users) {
            console.table(users)
        })
        .fail(function(msg){
            console.log(msg);
        });
}