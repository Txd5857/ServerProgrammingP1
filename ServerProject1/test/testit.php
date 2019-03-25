<?php
/**
 * Created by PhpStorm.
 * User: tenzinkhedup
 * Date: 2019-03-20
 * Time: 14:22
 */
function createAPIurl($array = Array()){
    $url = "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/findByIngredients?number=20&ranking=1&fillIngredients=true&ingredients=";

    foreach ($array as $v) {
        $v = str_replace(" ", "+", $v);
        $url .= $v . "%2C";
    }

    $url = substr($url,0, -3);
    return $url;

}
$array = Array("apples","flour","sugar","beef", "chicken","rice","salt","carrots","celery","apple cider","baking soda","fish","eggs","milk","garlic","lemon juice","corned beef","butter","heavy cream");


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $headers = array (
    "X-RapidAPI-Key: 9c7d878d29msh838715c2b27adfbp132ac0jsn0536b7f5db0f" );
    curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($curl);


    curl_close($curl);

    return $result;
}

$json = json_decode(CallAPI("get",createAPIurl($array)), true);
//var_dump($json);
//var_dump(json_decode($output));
function parser($output){
    $food = array();
    for ($i=0;$i < count($output); $i++) {
//        $usedingred = array();
        $missedingred = array();
        for ($j=0; $j < count($output[$i]['usedIngredients']);$j++) {
            $item = $output[$i]['usedIngredients'][$j];
            $usedingred[$item["name"]] = array(
                "IngredientID" => $item["id"],
                "Amount" => trim($item["amount"] . " " . $item["unitLong"]),
                "Detail" => $item["originalString"]
            );


        }

        for ($j=0; $j < count($output[$i]['missedIngredients']);$j++) {
            $missedingred[] = $output[$i]['missedIngredients'][$j]["name"];
        }

        $food[$output[$i]['title']] = array(
            "RecipeID" => $output[$i]['id'],
            "RecipeImage" => $output[$i]['image'],
            "IngredientsUsed" => $usedingred,
            "MissedIngredients" => $missedingred
        );
    }
    return $food;
}

//echo parser($json);
$food = parser($json);
echo json_encode($food, JSON_PRETTY_PRINT);