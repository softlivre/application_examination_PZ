<?php
header('Content-Type: application/json; charset=utf-8');

// our htaccess will always redirect here for routing
// get the requested url
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$arrayRequest = explode('/', $request);

// create connection class
class Conexao extends PDO {
    private $dsn	  = 'pgsql:dbname=propz;host=127.0.0.1';
    private $user 	  = 'xxx';
    private $password = 'xxx';
    public  $handle;  
    function __construct( ) {
        try	{
            $dbh = parent::__construct( $this->dsn , $this->user , $this->password);
            $this->handle = $dbh;				
            return $this->handle; 
        }catch ( PDOException $e ) {
            // echo 'Conexão falhou: ' . $e->getMessage( ); //only used on debug
            return false;
        }
    }
}

// in this example, we will only serve the following route:
// api/v1/databases/3434/retail/user-promotions/redeem
// full url: https://softlivre.com.br/provapropz/api/v1/databases/3434/retail/user-promotions/redeem

@$route1 = htmlspecialchars($arrayRequest[3]);
@$route2 = htmlspecialchars($arrayRequest[4]);
@$route3 = htmlspecialchars($arrayRequest[5]);
@$route4 = htmlspecialchars($arrayRequest[6]);
@$route5 = htmlspecialchars($arrayRequest[7]);
@$route6 = htmlspecialchars($arrayRequest[8]);
@$route7 = htmlspecialchars($arrayRequest[9]);

if ($route1 !== "v1" || $route2 !== "databases" || $route3 !== "3434" || $route4 !== "retail" || $route5 !== "user-promotions" || $route6 !== "redeem") {
    $data = array("response" => "route not implemented");
    echo json_encode($data);
    sleep(1); //prevent brute force finding the route
    exit;
}

// if we get here, we have a valid route
// we can now start to process the request
// lets check the payload and method

if ($method !== "POST"){
    $data = array("response" => "method not implemented");
    echo json_encode($data);
    exit;
}

@$partnerPromotionId = (int) htmlspecialchars($_POST['partnerPromotionId']);
@$customerId = (int) htmlspecialchars($_POST['customerId']);

if ($partnerPromotionId === 123 && $customerId === 3434) {

    $conn = new Conexao();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $value = (int) getCurrentValue();    

    $data = array(  "partnerPromotionId" => "$partnerPromotionId",
                    "customerId" => "$customerId",
                    "value" => $value);

    if ($value >= 1){
        // lets decrement the value, as the user the sale has been validated
        decrementValue();
    }
    else{
        // for demonstration purposes, lets reset our counter to 5 on the DB when it reaches zero
        resetValue();
    }

    echo json_encode($data);
    exit;
}
else{
    $data = array("response" => "invalid POST payload");
    echo json_encode($data);
    exit;
}

// end of script. find below auxiliary functions and classes

function resetValue(){
    global $conn;
    $sql = "UPDATE propz SET propzcounter = 5 WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getCurrentValue(){
    global $conn;
    $sqlCounter = "SELECT propzcounter FROM propz where id = 1";
    $stmtCounter = $conn->prepare($sqlCounter);
    $stmtCounter->execute();
    $resultCounter = $stmtCounter->fetch(PDO::FETCH_ASSOC);
    return $resultCounter['propzcounter'];
}

function decrementValue(){
    global $conn;
    $sql = "UPDATE propz SET propzcounter = propzcounter - 1 WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

/* SQL:
CREATE TABLE PROPZ (
id integer NOT NULL,
propzcounter integer NOT NULL)
*/
