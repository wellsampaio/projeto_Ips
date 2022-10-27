<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Order;
use \Hcode\Model\OrderReport;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\Cart;


$app->get('/admin', function() {

	User::verifyLogin();

	$users = User::listAllDash();
	$quantUsers = User::quantUsers();
	
	$listBestSellersTen = Cart::listBestSellersTen();

	$products = Product::listAllDash();

	$quantOrders = OrderReport::quantOrders();
	$quantOrdersPago = OrderReport::quantOrdersPago();
	$quantOrdersAgPagamento = OrderReport::quantOrdersAgPagamento();
	$quantOrdersEntregue = OrderReport::quantOrdersEntregue();
	$quantOrdersCancelados = OrderReport::quantOrdersCancelados();

	$somaVlTotal = Order::somaVlTotal();
	$somaVlTotalPago = OrderReport::somaVlTotalPago(); 
	$somaVlTotalAgPagamento = OrderReport::somaVlTotalAgPagamento();
	$somaVlTotalDevolvidos = OrderReport::somaVlTotalDevolvidos();
	$somaVlTotalCancelados = OrderReport::somaVlTotalCancelados();

	$somaVlTotalPago2019 = OrderReport::somaVlTotalPago2019();
	$somaVlTotalPago2020 = OrderReport::somaVlTotalPago2020();
	$somaVlTotalPago2021 = OrderReport::somaVlTotalPago2021();
	$somaVlTotalPago2022 = OrderReport::somaVlTotalPago2022();

	$quantProducts = Product::quantProducts();

	$quantCategory = Category::quantCategory();

	$totalPagoJan = Order::TotalPagoMesJan();
	$totalPagoFev = Order::TotalPagoMesFev();
	$totalPagoMar = Order::TotalPagoMesMar();
	$totalPagoAbril = Order::TotalPagoMesAbril();
	$totalPagoMaio = Order::TotalPagoMesMaio();
	$totalPagoJun= Order::TotalPagoMesJun();
	$totalPagoJul = Order::TotalPagoMesJul();
	$totalPagoAgo = Order::TotalPagoMesAgo();
	$totalPagoSet = Order::TotalPagoMesSet();
	$totalPagoOut = Order::TotalPagoMesOut();
	$totalPagoNov = Order::TotalPagoMesNov();
	$totalPagoDez = Order::TotalPagoMesDez();


	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("index2",[
		'totalPagoJan'=>$totalPagoJan,
		'totalPagoFev'=>$totalPagoFev,
		'totalPagoMar'=>$totalPagoMar,
		'totalPagoAbril'=>$totalPagoAbril,
		'totalPagoMaio'=>$totalPagoMaio,
		'totalPagoJun'=>$totalPagoJun,
		'totalPagoJul'=>$totalPagoJul,
		'totalPagoAgo'=>$totalPagoAgo,
		'totalPagoSet'=>$totalPagoSet,
		'totalPagoOut'=>$totalPagoOut,
		'totalPagoNov'=>$totalPagoNov,
		'totalPagoDez'=>$totalPagoDez,

		'somaVlTotalPago'=>$somaVlTotalPago,
		'somaVlTotalAgPagamento'=>$somaVlTotalAgPagamento,
		'somaVlTotal'=>$somaVlTotal,
		'somaVlTotalDevolvidos'=>$somaVlTotalDevolvidos,
		'somaVlTotalCancelados'=>$somaVlTotalCancelados,

		'somaVlTotalPago2019'=>$somaVlTotalPago2019,
		'somaVlTotalPago2020Tri'=>$somaVlTotalPago2020,
		'somaVlTotalPago2021Tri'=>$somaVlTotalPago2021,
		'somaVlTotalPago2022'=>$somaVlTotalPago2022,

		'quantOrders'=>$quantOrders,
		'quantOrdersPago'=>$quantOrdersPago,
		'quantOrdersAgPagamento'=>$quantOrdersAgPagamento,
		'quantOrdersEntregue'=>$quantOrdersEntregue,
		'quantOrdersCancelados'=>$quantOrdersCancelados,

		'quantUsers'=>$quantUsers,
		'quantProducts'=>$quantProducts,
		'quantCategory'=>$quantCategory,

		"users"=>$users,

		"orders"=>Order::listAllDash(),

		'products'=>Product::checkList($products),

		'listBestSellersTen'=>Product::checkList($listBestSellersTen),

		'listClientsOrders'=>Order::listClientsOrders()


	]);
    
	

});

$app->get('/admin/graphic_orders', function() {

	User::verifyLogin();

	$somaVlTotalCancelados = Order::somaVlTotalCancelados();

	$quantOrdersCancelados = Order::quantOrdersCancelados();

	$quantUsers = User::quantUsers();

	$quantOrders = Order::quantOrders();

	$quantOrdersPago = Order::quantOrdersPago();

	$quantOrdersEntregue = Order::quantOrdersEntregue();

	$quantOrdersAgPagamento = Order::quantOrdersAgPagamento();

	$somaVlTotal = Order::somaVlTotal();

	$somaVlTotalPago = Order::somaVlTotalPago(); 

	$somaVlTotalAgPagamento = Order::somaVlTotalAgPagamento();

	$somaVlTotalPago2019 = OrderReport::somaVlTotalPago2019();
	$somaVlTotalPago2020 = OrderReport::somaVlTotalPago2020();
	$somaVlTotalPago2021 = OrderReport::somaVlTotalPago2021();
	$somaVlTotalPago2022 = OrderReport::somaVlTotalPago2022();

	$quantOrdersPagoJan = OrderReport::quantOrdersPagoJan();
	$quantOrdersPagoFev = OrderReport::quantOrdersPagoFev();
	$quantOrdersPagoMar = OrderReport::quantOrdersPagoMar();
	$quantOrdersPagoAbril = OrderReport::quantOrdersPagoAbril();
	$quantOrdersPagoMaio= OrderReport::quantOrdersPagoMaio();
	$quantOrdersPagoJun = OrderReport::quantOrdersPagoJun();
	$quantOrdersPagoJul = OrderReport::quantOrdersPagoJul();
	$quantOrdersPagoAgo = OrderReport::quantOrdersPagoAgo();
	$quantOrdersPagoSet = OrderReport::quantOrdersPagoSet();
	$quantOrdersPagoOut = OrderReport::quantOrdersPagoOut();
	$quantOrdersPagoNov = OrderReport::quantOrdersPagoNov();
	$quantOrdersPagoDez = OrderReport::quantOrdersPagoDez();



	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("morris",[
		"quantUsers"=>$quantUsers,
		"quantOrders"=>$quantOrders,
		"quantOrdersPago"=>$quantOrdersPago,
		"quantOrdersEntregue"=>$quantOrdersEntregue,
		"quantOrdersAgPagamento"=>$quantOrdersAgPagamento,
		'somaVlTotalCancelados'=>$somaVlTotalCancelados,
		"somaVlTotal"=>$somaVlTotal,
		"somaVlTotalPago"=>$somaVlTotalPago,
		"somaVlTotalAgPagamento"=>$somaVlTotalAgPagamento,
		'quantOrdersCancelados'=>$quantOrdersCancelados,

		'somaVlTotalPago2019'=>$somaVlTotalPago2019,
		'somaVlTotalPago2020Tri'=>$somaVlTotalPago2020,
		'somaVlTotalPago2021Tri'=>$somaVlTotalPago2021,
		'somaVlTotalPago2022'=>$somaVlTotalPago2022,

		'quantOrdersPagoJan'=>$quantOrdersPagoJan,
		'quantOrdersPagoFev'=>$quantOrdersPagoFev,
		'quantOrdersPagoMar'=>$quantOrdersPagoMar,
		'quantOrdersPagoAbril'=>$quantOrdersPagoAbril,
		'quantOrdersPagoMaio'=>$quantOrdersPagoMaio,
		'quantOrdersPagoJun'=>$quantOrdersPagoJun,
		'quantOrdersPagoJul'=>$quantOrdersPagoJul,
		'quantOrdersPagoAgo'=>$quantOrdersPagoAgo,
		'quantOrdersPagoSet'=>$quantOrdersPagoSet,
		'quantOrdersPagoOut'=>$quantOrdersPagoOut,
		'quantOrdersPagoNov'=>$quantOrdersPagoNov,
		'quantOrdersPagoDez'=>$quantOrdersPagoDez,



	]);
    
	

});

$app->get('/admin/login', function(){

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("login", [
		'error'=>User::getError()
	]);
});

$app->post("/admin/login", function(){

	try {
		
		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());
	}

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function(){

	User::logout();

	header("Location: /admin/login");
	exit;
});

$app->get("/admin/forgot", function(){

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot", [
		'error'=>User::getError()
	]);


});

$app->post("/admin/forgot", function(){

	try {
	$user = User::getForgot($_POST["email"]);

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /admin/forgot");
		exit;
	}

	header("Location: /admin/forgot/sent");
	exit;

});

$app->get("/admin/forgot/sent", function(){

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot-sent");
});

$app->get("/admin/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]

	));
});

$app->post("/admin/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12

	]);

	$user->setPassword($password);

	$page = new PageAdmin([

		"header"=>false,
		"footer"=>false

	]);

	$page->setTpl("forgot-reset-success");

});

?>