$(document).ready(function(){
    $('.modal').modal();
    $(".button-collapse").sideNav();
  });

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

function switchToLogin() {
    $('#registerModal').modal('close');
    $('#loginModal').modal('open');
}

function switchToRegister() {
    $('#loginModal').modal('close');
    $('#registerModal').modal('open');
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
            })
            .fail(function(msg){
                console.log(msg);
            });
    $('#updateModal').modal('open');
}

/*Ingredient Search*/ 

function ingredientPreview(){
    var search = document.getElementById("ingredientSearch").value;
    var request = $.ajax({
        method: "POST",
        url: "../controller/dbFunctionsController.php?state=ingredientSearch",
        data: { startsWith: search }
        })
        .done(function(ingredients) {
            console.log(ingredients)
            var ingredients = ingredients
            var ingBox = document.getElementById("ingredientSearchList")
            ingBox.innerHTML = "";
            for(i = 0; i < ingredients.length; i++){
                var n = document.createElement("div");
                var t = document.createTextNode(ingredients[i].name);
                n.appendChild(t);
                n.className = "ingredientListEle";
                n.setAttribute("onClick", "addIngredient('" + ingredients[i].name + "')");
                ingBox.appendChild(n);
            }
        });
}

function addIngredient(name){
    pantryList = ( typeof pantryList != 'undefined' && pantryList instanceof Array ) ? pantryList : [];
    pantryList.push(name);
    console.log(pantryList);
    var ingredientSec = document.getElementById("ingredientSection")
    ingredientSec.innerHTML = '';
    for(i = 0; i < pantryList.length; i++){
        var n = document.createElement("div");
        var t = document.createTextNode(pantryList[i]);
        n.appendChild(t);
        n.className = "ingredientStyle card grey lighten-4";
        ingredientSec.appendChild(n);
    }
    document.getElementById("ingredientSearchList").innerHTML = '';
    recipeSearch(pantryList);
}

/* Recipe Search */

function recipeSearch(ingArr){
    var request = $.ajax({
    method: "POST",
    url: "../controller/dbFunctionsController.php?state=recipeSearch",
    data: { ingArr: ingArr }
    })
    .done(function(recipes) {
        console.log(recipes);
        var recipeList = recipes
        var recipeSec = document.getElementById("recipeSection")
        recipeSec.innerHTML = '';
        for(i = 0; i < recipeList.length; i++){
            var n = document.createElement("div");
            var n2 = document.createElement("div");
            var t = document.createTextNode(recipeList[i].title);
            n2.setAttribute("class", "recipeTitle");
            n2.appendChild(t);
            n.appendChild(n2)
            n.className = "recipeStyle card";
            n2.setAttribute("onClick", "getRecipeInfo(" + recipeList[i].id + ")");
            recipeSec.appendChild(n);
            var a = document.createElement("a");
            a.setAttribute("class", "btn-floating btn-large waves-effect waves-light red likeIcon");
            var icon = document.createElement("img");
            icon.setAttribute("class", "likeButton");
            icon.setAttribute("src", "../view/images/heartIcon.svg");
            icon.setAttribute("recipeKey", recipeList[i].id)
            a.setAttribute("recipeKey", recipeList[i].id)
            a.appendChild(icon);
            n.appendChild(a);
            a.addEventListener("click", likeFunction, false);
        }
    })
    .fail(function(msg){
        console.log(msg);
    });
}

function getRecipeInfo(id){
    var request = $.ajax({
        method: "POST",
        url: "../controller/dbFunctionsController.php?state=getRecipe",
        data: { recipeId: id }
    })
    .done(function(recipe) {
        n = document.getElementById('recipeModalContainer')
        n.innerHTML = '';
        n.innerHTML =`<div id="recipeModal" class="modal">
        <div class="modal-content"><h4>${ recipe.title }</h4><p>${ recipe.instructions }</p></div>
        <div class="modal-footer"><a onclick="closeModal('#recipeModalContainer')"href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a></div>
        </div>`
        var recipeSec = document.getElementById("recipeSection")
        recipeSec.appendChild(n)      
        $('.modal').modal();
        $('#recipeModal').modal('open');
    })
    .fail(function(msg){
        console.log(msg);
    });
}

function closeModal(id){
    $(id).remove();
}

/*Like Recipe*/

function likeFunction(){
    var likedRecipe = event.target.attributes.recipeKey.value
    var request = $.ajax({
        method: "POST",
        url: "../controller/loginCheck.php"
    })
    .done(function(status) {
        console.log(status)
        if(status == "yes"){
            console.log(likedRecipe)
            var request2 = $.ajax({
                method: "POST",
                url: "../controller/dbFunctionsController.php?state=likeRecipe",
                data: { recipeId: likedRecipe }
            })
            .done(function(msg){
                console.log(msg);
            })
            .fail(function(msg){
                console.log(msg);
            });
        } else {
            console.log("you must log in to use this feature")
        }
        
    })
    .fail(function(msg){
        console.log(msg);
    });
}

/*Show Liked Recipes */
function showSavedRecipes(userID) {
    var request = $.ajax({
       method: "POST",
       url: "../controller/dbFunctionsController.php?state=showSavedRecipes",
       data: { user: userID }
       })
       .done(function(recipes) {
           console.log(recipes)
           var modal = document.getElementById('myRecipesContent');
           modal.innerHTML = '';
           var h4 = document.createElement("h4");
           var h4t =document.createTextNode("My Recipe Book");
           h4.appendChild(h4t);
           modal.appendChild(h4);
           for(i=0;i < recipes.length; i++){
                var request2 = $.ajax({
                    method: "POST",
                    url: "../controller/dbFunctionsController.php?state=getRecipe",
                    data: { recipeId: recipes[i].savedRecipeID }
                    })
                        .done(function(recipeInfo){
                            console.log(recipeInfo);
                            var n = document.createElement("div");
                            n.setAttribute("class", "row likedRecipeStyle card");
                            var h4 = document.createElement("h4");
                            var t = document.createTextNode(recipeInfo.title);
                            var p = document.createElement("p");
                            var t2 = document.createTextNode(recipeInfo.instructions);
                            h4.appendChild(t);
                            p.appendChild(t2);
                            n.appendChild(h4)
                            n.appendChild(p);
                            modal.appendChild(n);
                    })
                        .fail(function(msg){
                            console.log(msg);
                    });
           }
           $('#myRecipesModal').modal('open');
       })
       .fail(function(msg){
           console.log(msg);
       });
}