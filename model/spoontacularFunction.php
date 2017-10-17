<?php
function spoontacularFunction($searchTerm = array(), $conditions = array()){
    $opts = array('http'=>array('header' => 'X-Mashape-Key: j8WXEEslQQmshKa79XEbWBqgkWZgp1jOmTpjsnvFD4Ls46qndJ')); 
    $context = stream_context_create($opts);
    if($conditions['state'] == 'ingredientSearch'){
        $url = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/ingredients/autocomplete?metaInformation=false&number=10&query=' . $searchTerm;  
    }
    else if($conditions['state'] == 'recipeSearch'){
        $url = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?fillIngredients=true&ingredients=';
        $query = '';
        for ($i = 0; $i < count($searchTerm); $i++) {
            $query .= $searchTerm[$i] . ',';
        }
        $query = substr($query, 0, -1); 
        $url .= $query . '&limitLicense=false&number=5&ranking=2';
    }
    $response = file_get_contents($url,false,$context);
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>