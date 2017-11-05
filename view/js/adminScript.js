window.onload = getUsers;

function getUsers(){
    var request = $.ajax({
        method: "POST",
        url: "controller/dbFunctionsController.php?state=showUserDetailsAdmin",
        })
        .done(function(users) {
            console.log(users)
            var parent = document.getElementById('adminSection')
            parent.innerHTML="";
            for (var i = 0; i < users.length; i++) {
                var n = document.createElement("div");
                n.setAttribute('class', 'userStyle')
                var img = document.createElement("img");
                if (users[i].profileImage != ''){
                img.setAttribute('src', `../../uploads/${users[i].profileImage}`)
                } else {
                img.setAttribute('src', 'view/images/user.png')
                }
                img.setAttribute('class','userProfileImg')
                img.setAttribute('alt','user profile picture')
                var namediv = document.createElement('div')
                namediv.setAttribute('class','userNameDiv')
                var t = document.createTextNode(`${users[i].firstName} ${users[i].lastName}`);
                namediv.appendChild(t);
                var deleteDiv = document.createElement('div')
                deleteDiv.setAttribute('class', 'deleteButton');
                deleteDiv.setAttribute('userKey', users[i].userID);
                deleteDiv.addEventListener('click', deleteUser)                
                deleteText = document.createTextNode('delete')
                deleteDiv.appendChild(deleteText)
                n.appendChild(img)
                n.appendChild(namediv)
                n.appendChild(deleteDiv)
                parent.appendChild(n)
            }
        })
        .fail(function(msg){
            console.log(msg);
        });
}

function deleteUser(event){
    var user = event.target.attributes.userKey.value
    var request = $.ajax({
        method: "POST",
        url: "controller/dbFunctionsController.php?state=deleteUser",
        data: { user: user }
        })
        .done(function(msg) {
            console.log(msg)
            console.log('deleted')
            getUsers();
        })
        .fail(function(msg){
            console.log(msg);
        });
}