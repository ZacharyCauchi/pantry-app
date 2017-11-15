$(document).ready(function(){
    $('.modal').modal();
    $(".button-collapse").sideNav();
    var pantryList = JSON.parse(localStorage.getItem('pantry'));
    console.log(pantryList)
    updateIngredientList(pantryList);
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
            url: "controller/dbFunctionsController.php?state=showUserDetails",
            data: { user: userID }
            })
            .done(function(userDetails) {
                console.log(userDetails);
                document.getElementById("updateFirstName").value = userDetails['firstName'];
                document.getElementById("updateLastName").value = userDetails['lastName'];
                document.getElementById("updateEmail").value = userDetails['email'];
                document.getElementById("updateUsername").value = userDetails['username'];
                userDetails['profileImage'] != '' ? profileImage = "../../uploads/" + userDetails['profileImage'] :  profileImage = 'view/images/user.png';
                document.getElementById("profileImageHeading").src = profileImage;
                Materialize.updateTextFields();
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
        url: "controller/dbFunctionsController.php?state=ingredientSearch",
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
    var pantryList = JSON.parse(localStorage.getItem('pantry'));
    pantryList = ( typeof pantryList != 'undefined' && pantryList instanceof Array ) ? pantryList : [];
    pantryList.push(name);
    localStorage.setItem('pantry', JSON.stringify(pantryList));
    console.log(pantryList);
    updateIngredientList(pantryList);
}

function updateIngredientList(pantryList){
    var ingredientSec = document.getElementById("ingredientSection")
    ingredientSec.innerHTML = '';
    for(i = 0; i < pantryList.length; i++){
        var n = document.createElement("div");
        var t = document.createTextNode(pantryList[i]);
        n.appendChild(t);
        n.className = "ingredientStyle card grey lighten-4";
        ingredientSec.appendChild(n);
        var a = document.createElement("a");
        a.setAttribute("class", "btn-floating waves-effect waves-light red ingRemoveBut");
        var icon = document.createElement("i")
        icon.setAttribute("class", "material-icons");
        iText = document.createTextNode("remove_circle_outline");
        icon.setAttribute("ingKey", i)
        a.setAttribute("ingKey", i)
        a.addEventListener("click", removeIng, false);
        icon.appendChild(iText);
        a.appendChild(icon);
        n.appendChild(t);
        n.appendChild(a)
    }
    document.getElementById("ingredientSearchList").innerHTML = '';
    recipeSearch(pantryList);
}

function removeIng(){
    var x = event.target.attributes.ingKey.value
    var pantryList = JSON.parse(localStorage.getItem('pantry'));
    pantryList.splice(x, 1);
    localStorage.setItem('pantry', JSON.stringify(pantryList));
    updateIngredientList(pantryList);

}

/* Recipe Search */

function recipeSearch(ingArr){
    var request = $.ajax({
    method: "POST",
    url: "controller/dbFunctionsController.php?state=recipeSearch",
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
            n.className = "recipeStyle card grey lighten-5";
            n2.setAttribute("onClick", "getRecipeInfo(" + recipeList[i].id + ")");
            recipeSec.appendChild(n);
            var a = document.createElement("a");
            a.setAttribute("class", "btn-floating btn-large waves-effect waves-light red likeIcon");
            var icon = document.createElement("img");
            icon.setAttribute("class", "likeButton");
            icon.setAttribute("src", "view/images/heartIcon.svg");
            icon.setAttribute("alt", "likeButton");
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
        url: "controller/dbFunctionsController.php?state=getRecipe",
        data: { recipeId: id }
    })
    .done(function(recipeInfo) {
        console.log(recipeInfo)
        modal = document.getElementById('recipeModal')
        modal.innerHTML = '';
        var n = document.createElement("div");
        n.setAttribute("class", "row likedRecipeStyle card grey lighten-3");
        var h4 = document.createElement("h4");
        var t = document.createTextNode(recipeInfo.title);
        var recipeRow = document.createElement("div");
        recipeRow.setAttribute("class", "row")
        var p1 = document.createElement("p");
        p1.setAttribute("class", "col s8")
        var p2 = document.createElement("p");
        p2.setAttribute("class", "col s4")
        if(recipeInfo.analyzedInstructions.length != 0){ //we're checking if this particular Recipe has the instructions in a nice list for us, and not a string of text
            var ol1 = document.createElement("ol")
            for(i = 0; i < recipeInfo.analyzedInstructions[0].steps.length; i++){
                var li = document.createElement("li")
                li.setAttribute("class", "listItem")
                var text = document.createTextNode(recipeInfo.analyzedInstructions[0].steps[i].step);
                li.appendChild(text)
                ol1.appendChild(li)
            }
            p1.appendChild(ol1);
        } else { //if they don't have the instructions ordered, just grab the string of text
            var instructions = document.createTextNode(recipeInfo.instructions)
            p1.appendChild(instructions)
        }
        var ol2 = document.createElement("ol")
        for(i = 0; i < recipeInfo.extendedIngredients.length; i++){
            var li = document.createElement("li")
            li.setAttribute("class", "listItem")
            var text = document.createTextNode(recipeInfo.extendedIngredients[i].originalString);
            li.appendChild(text)
            ol2.appendChild(li)
        }
        h4.appendChild(t);
        p2.appendChild(ol2);
        recipeRow.appendChild(p2)
        recipeRow.appendChild(p1)
        n.appendChild(h4)
        n.appendChild(recipeRow);
        modal.appendChild(n);    
        $('.modal').modal();
        $('#recipeModalContainer').modal('open');
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
        url: "controller/loginCheck.php"
    })
    .done(function(status) {
        console.log(status)
        if(status == "yes"){
            console.log(likedRecipe)
            var request2 = $.ajax({
                method: "POST",
                url: "controller/dbFunctionsController.php?state=likeRecipe",
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
       url: "controller/dbFunctionsController.php?state=showSavedRecipes",
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
                    url: "controller/dbFunctionsController.php?state=getRecipe",
                    data: { recipeId: recipes[i].savedRecipeID }
                    })
                        .done(function(recipeInfo){
                            console.log(recipeInfo);
                            var n = document.createElement("div");
                            n.setAttribute("class", "row likedRecipeStyle card grey lighten-3");
                            var h4 = document.createElement("h4");
                            var t = document.createTextNode(recipeInfo.title);
                            var recipeRow = document.createElement("div");
                            recipeRow.setAttribute("class", "row")
                            var p1 = document.createElement("p");
                            p1.setAttribute("class", "col s8")
                            var p2 = document.createElement("p");
                            p2.setAttribute("class", "col s4")
                            if(recipeInfo.analyzedInstructions.length != 0){ //we're checking if this particular Recipe has the instructions in a nice list for us, and not a string of text
                                var ol1 = document.createElement("ol")
                                for(i = 0; i < recipeInfo.analyzedInstructions[0].steps.length; i++){
                                    var li = document.createElement("li")
                                    li.setAttribute("class", "listItem")
                                    var text = document.createTextNode(recipeInfo.analyzedInstructions[0].steps[i].step);
                                    li.appendChild(text)
                                    ol1.appendChild(li)
                                }
                                p1.appendChild(ol1);
                            } else { //if they don't have the instructions ordered, just grab the string of text
                                var instructions = document.createTextNode(recipeInfo.instructions)
                                p1.appendChild(instructions)
                            }
                            var ol2 = document.createElement("ol")
                            for(i = 0; i < recipeInfo.extendedIngredients.length; i++){
                                var li = document.createElement("li")
                                li.setAttribute("class", "listItem")
                                var text = document.createTextNode(recipeInfo.extendedIngredients[i].originalString);
                                li.appendChild(text)
                                ol2.appendChild(li)
                            }
                            h4.appendChild(t);
                            p2.appendChild(ol2);
                            recipeRow.appendChild(p2)
                            recipeRow.appendChild(p1)
                            n.appendChild(h4)
                            n.appendChild(recipeRow);
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