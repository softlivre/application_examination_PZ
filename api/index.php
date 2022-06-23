<?php
header('Content-Type: application/json; charset=utf-8');

// our htaccess will always redirect here for routing
// get the requested url
$request = $_SERVER['REQUEST_URI'];
$arrayRequest = explode('/', $request);

// in this example, we will only serve the following route:
// api/v1/databases/3434/retail/user-promotions/redeem
// full url: https://softlivre.com.br/provapropz/api/v1/databases/3434/retail/user-promotions/redeem

$route1 = $arrayRequest[3];
$route2 = $arrayRequest[4];
$route3 = $arrayRequest[5];
$route4 = $arrayRequest[6];
$route5 = $arrayRequest[7];
$route6 = $arrayRequest[8];
$route7 = $arrayRequest[9];
$routeLevels = count ($arrayRequest);

if ($route1 !== "v1" || $route2 !== "databases" || $route3 !== "3434" || $route4 !== "retail" || $route5 !== "user-promotions" || $route6 !== "redeem") {
    $data = "route not implemented";
    echo json_encode($data);
    sleep(1);
    exit;
}

// if we get here, we have a valid route
// we can now start to process the request

$value = rand();

$data = array("partnerPromotionId" => "123",
"customerId" => "3434",
"value" => $value);

echo json_encode($data);