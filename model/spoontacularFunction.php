<?php
function spoontacularFunction($searchTerm = array(), $conditions = array()){
    $opts = array('http'=>array('header' => 'X-Mashape-Key: j8WXEEslQQmshKa79XEbWBqgkWZgp1jOmTpjsnvFD4Ls46qndJ')); 
    $context = stream_context_create($opts);
    if($conditions['state'] == 'ingredientSearch'){
        $searchTerm = str_replace(' ', '%20', $searchTerm);
        $url = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/ingredients/autocomplete?metaInformation=false&number=10&query=' . $searchTerm;  
    }
    else if($conditions['state'] == 'recipeSearch'){
        $url = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?fillIngredients=true&ingredients=';
        $searchTerm = json_decode(str_replace(' ', '%20',  json_encode($searchTerm))); 
        $query = '';
        if(is_array($searchTerm) == true) {
            for ($i = 0; $i < count($searchTerm); $i++) {
                $query .= $searchTerm[$i] . ',';
            }
        }
        $query = substr($query, 0, -1); 
        $url .= $query . '&limitLicense=false&number=10&ranking=2';
    }
    else if($conditions['state'] == 'getRecipe'){
        $url = "https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" . $searchTerm . "/information?includeNutrition=false";
    }
    $response = file_get_contents($url,false,$context);
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>