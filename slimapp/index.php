<?php 
session_start();
require('/var/www/html/share/slim4/vendor/autoload.php');
require('functions.php');

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

$app->setBasePath('/~assign223/slimapp');

$conn=new PDO("mysql:host=localhost;dbname=assign223;", "assign223", "phaemies");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$view = new \Slim\Views\PhpRenderer('views');

$app->get('/hello', function(Request $req, Response $res, array $args) {
	$res->getBody()->write('wassup');
	return $res;
});

$app->get('/login', function(Request $req, Response $res) use($view) {
	$res = $view->render($res, 'login.php', []);
	return $res;
});

$app->post('/login-attempt', function(Request $req, Response $res, array $args) use($conn) {
	
	$un = htmlentities($_POST["username"]);
	$pw = htmlentities($_POST["password"]);

	$statement = $conn->prepare("select username, password from poi_users where username=:username and password=:password");
	$statement->execute([":username"=>$un, "password"=>$pw]);
	
	$row = $statement->fetch();
	
	if($row== false){
		echo "Incorrect password!";
	} else {
		$_SESSION["gatekeeper"] = $un;			//Login doesnt work
	}
	return $res->withHeader("Location", "home");
});

$app->get('/home', function(Request $req, Response $res, array $args) use($conn, $view) {
	
	sessioncheck();
	$res = $view->render($res, 'home.php', []);
	links();
	return $res;
	
});

$app->get('/incorrectlogin', function(Request $req, Response $res, array $args) {
	$res->getBody()->write('You\'re not logged in. Go away!');
	return $res;
});

//addPOI
//adding
//searchResult
//Recommend location
//show review
//Create review
//Creating

$app->run();
?>