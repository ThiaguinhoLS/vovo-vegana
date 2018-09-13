<?php 
session_start();
require_once("vendor/autoload.php");

define("DIR_ROOT", dirname(__FILE__));

use \Slim\Slim;
use \Src\Page;
use \Src\PageAdmin;
use \Src\Models\User;

$app = new Slim();
$app->config("debug", true);

$app->get("/", function() {
	$page = new Page();
	$page->setTpl("index");	
});

$app->get("/admin", function() {
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");
});

$app->get("/admin/login", function() {
	$page = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$page->setTpl("login");
});

$app->post("/admin/login", function() {
	User::login($_POST["username"], $_POST["password"]);
	header("Location: /admin");
	exit;
});

$app->get("/admin/logout", function() {
	User::logout();
	header("Location: /admin/login");
	exit;
});

$app->get("/quem-somos", function() {
	$page = new Page();
	$page->setTpl("quem-somos");
});

$app->get("/produtos", function() {
	echo "Produtos";
});

$app->get("/contato", function() {
	$page = new Page();
	$page->setTpl("contato");
});

$app->run();
 ?>