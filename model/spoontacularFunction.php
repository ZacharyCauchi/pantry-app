<?php
function spoontacularFunction($startsWith, $conditions = array()){
    if($conditions['state'] = 'ingredientSearch'){
        header('X-Mashape-Key: j8WXEEslQQmshKa79XEbWBqgkWZgp1jOmTpjsnvFD4Ls46qndJ');
        $opts = array('http'=>array('header' => 'X-Mashape-Key: j8WXEEslQQmshKa79XEbWBqgkWZgp1jOmTpjsnvFD4Ls46qndJ')); 
        $context = stream_context_create($opts);
        $url = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/ingredients/autocomplete?metaInformation=false&number=10&query=' . $startsWith;
        $response = file_get_contents($url,false,$context);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
?>