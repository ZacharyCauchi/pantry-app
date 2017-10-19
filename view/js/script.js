$(document).ready(function(){
    $('.modal').modal();
  });

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
            });
    document.getElementById("modalBackground").style.display = "flex";
    document.getElementById("loginBox").style.display = "none";
    document.getElementById("registrationBox").style.display = "none";
    document.getElementById("updateDetailsBox").style.display = "block";
}

/*Ingredient Search*/ 

function ingredientPreview(search){
    var request = $.ajax({
        method: "POST",
        url: "../controller/dbFunctionsController.php?state=ingredientSearch",
        data: { startsWith: search }
        })
        .done(function(ingredients) {
            var ingredients = JSON.parse(ingredients);
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
        n.className = "ingredientStyle card red lighten-3";
        ingredientSec.appendChild(n);
    }
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
        console.log(JSON.parse(recipes));
        var recipeList = JSON.parse(recipes)
        var recipeSec = document.getElementById("recipeSection")
        recipeSec.innerHTML = '';
        for(i = 0; i < recipeList.length; i++){
            var n = document.createElement("div");
            var t = document.createTextNode(recipeList[i].title);
            n.appendChild(t);
            n.className = "recipeStyle card";
            n.setAttribute("onClick", "getRecipeInfo(" + recipeList[i].id + ")");
            recipeSec.appendChild(n);
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
        recipe = JSON.parse(recipe);
        var n = document.createElement("div");
        n.setAttribute("id", "recipeModalContainer");
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