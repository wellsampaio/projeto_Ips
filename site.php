 <?php

use \Hcode\Page;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\Cart;
use \Hcode\Model\Address;
use \Hcode\Model\Acionamento;
use \Hcode\Model\User;
use \Hcode\Model\Order;
use \Hcode\Model\OrderStatus;


$app->get('/', function() {

	$products = Product::newProducts();

	$productsBestSellers = Cart::listBestSellers();

	$page = new Page();

	$page->setTpl("index", [
		'products'=>Product::checkList($products),
		'productsBestSellers'=>Product::checkList($productsBestSellers)

	]);
});

$app->get('/about', function() {

	$page = new Page();

	$page->setTpl("about");

});

$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <=$pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/' .$category->getidcategory(). '?page=' .$i,
			'page'=>$i

		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages

	]);

});
$app->get("/products/:desurl", function($desurl){

	$product = new Product();

	$product->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);
	
});





$app->get('/ips/success', function(){

    User::verifyLogin(false);
 
    session_regenerate_id();

    $page = new Page([
    		'header'=>false,
    		'footer'=>false

    ]);

    $page->setTpl('ips-success',[
       
    ]);



});

$app->get("/ips", function(){

	User::verifyLogin(false);
	
	
	$address = new Address();

	$gerentes = Address::listGerentes();

	$seguradoras = Address::listSeguradoras();

	$tiposSinistros = Address::listTiposSinistros();




	if (!isset($_GET['NumSM']))$_GET['NumSM'] = $address->getNumSM();


	if (isset($_GET['NumSM'])) {

		$address->loadBuscarViagem($_GET['NumSM']);

		$address->setNumSM($_GET['NumSM']);
	}



	if (!$address->getNumSM()) $address->setNumSM('');
	if (!$address->getdataInicio()) $address->setdataInicio('');
	if (!$address->getnomeTransportador()) $address->setnomeTransportador('');
	if (!$address->getnomeEmbarcador()) $address->setnomeEmbarcador('');
	if (!$address->getdataInicio()) $address->setdataInicio('');
	if (!$address->getCliente()) $address->setCliente('');
	if (!$address->getplaca()) $address->setplaca('');
	if (!$address->getmarca()) $address->setmarca('');
	if (!$address->getmodelo()) $address->setmodelo('');
	if (!$address->getcor()) $address->setcor('');
	if (!$address->getnome_moto()) $address->setnome_moto('');
	if (!$address->getcpf_moto()) $address->setcpf_moto('');
	if (!$address->getvinculo_contratual()) $address->setvinculo_contratual('');
	if (!$address->getvtec_descricao()) $address->setvtec_descricao('');
	if (!$address->getterm_numero_terminal()) $address->setterm_numero_terminal('');
	if (!$address->getviagemId()) $address->setviagemId('');
	if (!$address->getdescorigem()) $address->setdescorigem('');
	if (!$address->getdescdestino()) $address->setdescdestino('');
	if (!$address->getviag_valor_carga()) $address->setviag_valor_carga('');
	if (!$address->getvloc_descricao_o()) $address->setvloc_descricao_o('');
	if (!$address->getvloc_descricao_d()) $address->setvloc_descricao_d('');
	if (!$address->getisca()) $address->setisca('');


	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("ips", [
		'address'=>$address->getValues(),
		'error'=>Address::getMsgError(),
		'gerentes'=>$gerentes,
		'seguradoras'=>$seguradoras,
		'tiposSinistros'=>$tiposSinistros 
	]);
});

$app->post("/ips", function(){

	User::verifyLogin(true);



	
	$user = User::getFromSession();




	$address = new Address();


	if (!isset($_POST['gerenteResponsavel']) || $_POST['gerenteResponsavel'] === '') {

		Address::setMsgError("Informe o Gerente responsável.");

		header('Location: /ips');
		exit;
	}


	if (Address::checkSmExist($_POST['NumSM']) === true) {

		Address::setMsgError("Já existe uma solicitação de Ips para esta SM.");
		header("Location: /ips");
		exit;
	}

	$_POST['idperson'] = $user->getidperson();

	$address->setData($_POST);
	$address->save();

	$address->setData($_POST);
	$address->saveAcionamento();

	$address->setData($_POST);
	$address->saveClientes();

	$address->setData($_POST);
	$address->saveIscas();

	$address->setData($_POST);
	$address->saveMotoristas();

	$address->setData($_POST);
	$address->saveViagens();

	$address->setData($_POST);
	$address->saveSinistros();

	$address->setData($_POST);
	$address->saveAlertas();

	header("Location: /ips/success");
	exit;


	

});


$app->get("/ips/solicitacoes", function(){

	User::verifyLogin(false);
	$user = User::getFromSession();

	

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

 	if ($search != '') {

 		 
 		 $pagination = Address::getPageSearchIps($search, $page);


 	} else {

 		
 		$pagination = Address::getPageIps($page);


 	}

 	$pages = [];

 	for ($x = 0; $x < $pagination['pages']; $x++)
	{
 		array_push($pages, [
			'href'=>'/ips/solicitacoes?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
 	}


	

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("ipss", [
		"address"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,


		
	]);

});


$app->get("/ips/solicitacoes/:idNumSm", function($idNumSm) {

	User::verifyLogin(false);

	$address = new Address();

	$address->getIps($idNumSm);

	$tiposSinistros = Address::listTiposSinistros();

	$seguradoras = Address::listSeguradoras();

	$gerentes = Address::listGerentes();


	$page = new Page([
			'header'=>false,
			'footer'=>false
	]);

	$page->setTpl("view-ips", [
		'address'=>$address->getValues(),
		'seguradoras'=>$seguradoras,
		'gerentes'=>$gerentes,
		'tiposSinistros'=>$tiposSinistros 

	]);
	
});


$app->post("/ips/solicitacoes/:idNumSm", function($idNumSm) {

	User::verifyLogin(false);

	$address = new Address();

	$address->getIps($idNumSm);

	$address->setData($_POST);

	$address->updateIps();

	header("Location: /ips/solicitacoes");
	exit;
});



$app->get("/checkout", function(){

	User::verifyLogin(false);
	
	$address = new Address();

	$cart = Cart::getFromSession();

	if (!isset($_GET['zipcode']))$_GET['zipcode'] = $cart->getdeszipcode();

	if (isset($_GET['zipcode'])) {

		$address->loadFromCEP($_GET['zipcode']);

		$cart->setdeszipcode($_GET['zipcode']);

		$cart->save();

		$cart->getCalculateTotal();


	}

	if (!$address->getdesaddress()) $address->setdesaddress('');
	if (!$address->getdesnumber()) $address->setdesnumber('');
	if (!$address->getdescomplement()) $address->setdescomplement('');
	if (!$address->getdesdistrict()) $address->setdesdistrict('');
	if (!$address->getdesdelivery()) $address->setdesdelivery('');
	if (!$address->getdescity()) $address->setdescity('');
	if (!$address->getdesstate()) $address->setdesstate('');
	if (!$address->getdescountry()) $address->setdescountry('');
	if (!$address->getdeszipcode()) $address->setdeszipcode('');

	$page = new Page();

	$page->setTpl("checkout", [
		'cart'=>$cart->getValues(),
		'address'=>$address->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Address::getMsgError()

	]);
});

/*$app->post("/checkout", function(){

	User::verifyLogin(false);

	if (!isset($_POST['zipcode']) || $_POST['zipcode'] === '') {

		Address::setMsgError("Informe o CEP.");

		header('Location: /checkout');
		exit;
	}

	$entrega=$_POST['desdelivery'];
 
	if ($entrega < date('Y-m-d', strtotime("+5 day")))
	{
		Address::setMsgError("Data Retroativa ou não correspondem o prazo de 5 dias");

		header('Location: /checkout');
		exit;
	}
	 

	if (!isset($_POST['desaddress']) || $_POST['desaddress'] === '') {

		Address::setMsgError("Informe o endereço.");

		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desdelivery']) || $_POST['desdelivery'] === '') {

		Address::setMsgError("Informe a Data de Entrega.");

		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desconf_delivery']) || $_POST['desconf_delivery'] === '') {

		Address::setMsgError("Confirme a Data de Entrega.");

		header('Location: /checkout');
		exit;
	}

	if ($_POST['desconf_delivery'] !== $_POST['desdelivery']){

		Address::setMsgError("Data de entrega não correspondem");
		header("Location: /checkout");
		exit;

	}

		if (!isset($_POST['desnumber']) || $_POST['desnumber'] === '') {

		Address::setMsgError("Informe o Número.");

		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desdistrict']) || $_POST['desdistrict'] === '') {

		Address::setMsgError("Informe o bairro.");

		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['descity']) || $_POST['descity'] === '') {

		Address::setMsgError("Informe a cidade.");
		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['desstate']) || $_POST['desstate'] === '') {

		Address::setMsgError("Informe o estado.");

		header('Location: /checkout');
		exit;
	}

	if (!isset($_POST['descountry']) || $_POST['descountry'] === '') {

		Address::setMsgError("Informe o país.");

		header('Location: /checkout');
		exit;
	}

	$user = User::getFromSession();

	$address = new Address();

	$_POST['deszipcode'] = $_POST['zipcode'];

	$_POST['idperson'] = $user->getidperson();

	$address->setData($_POST);

	$address->save();

	$cart = Cart::getFromSession();

	$totals = $cart->getCalculateTotal();

	$order = new Order();

	$order->setData([
		'idcart'=>$cart->getidcart(),
		'idaddress'=>$address->getidaddress(),
		'iduser'=>$user->getiduser(),
		'idstatus'=>OrderStatus::EM_ABERTO,
		'vltotal'=>$cart->getvltotal()
	]);
	
	/**switch ((int)$_POST['payment-method']) {

		case 1:
		header("Location: /order/".$order->getidorder()."/pagseguro");
		break;

		case 2:
		header("Location: /order/".$order->getidorder()."/paypal");
		break;
	}**/

	/*$order->save();

	$order->toSession();

	header("Location: /payment");
	exit;

});*/





/**$app->get("/order/:idorder/pagseguro", function($idorder){

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$cart = $order->getCart();

	$page = new Page([
		'header'=>false,
		'footer'=>false

	]);

	$page->setTpl("payment-pagseguro", [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts(),
		'phone'=>[
			'areaCode'=>substr($order->getnrphone(), 0, 2),
			'number'=>substr($order->getnrphone(), 2, strlen($order->getnrphone()))
		]
	]);
});**/

/**$app->get("/order/:idorder/paypal", function($idorder){

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$cart = $order->getCart();

	$page = new Page([
		'header'=>false,
		'footer'=>false

	]);

	$page->setTpl("payment-paypal", [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);
});**/

$app->get("/login", function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("login", [
		'error'=>User::getError(),
		'errorRegister'=>User::getErrorRegister(),
		'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
	]);
});

$app->post("/login", function(){
	
	try {
		
		User::login($_POST['login'], $_POST['password']);

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /login");
		exit;
	}

	header("Location: /ips");
	exit;
});

$app->get("/logout", function(){

	User::logout();

	Cart::removeFromSession();
	
    session_regenerate_id();

	header("Location: /login");
	exit; 
});

$app->post("/register", function(){

	$_SESSION['registerValues'] = $_POST;

	if (!isset($_POST['name']) || $_POST['name'] == '' ) {

		User::setErrorRegister("Preencha o seu nome");
		header("Location: /login");
		exit;
	}


	if (!isset($_POST['email']) || $_POST['email'] == '' ) {

		User::setErrorRegister("Preencha o seu e-mail");
		header("Location: /login");
		exit;
	}

	if (!isset($_POST['password']) || $_POST['password'] == '' ) {

		User::setErrorRegister("Preencha a senha");
		header("Location: /login");
		exit;
	}

		if ($_POST['confirm_password'] !== $_POST['password']){

		User::setErrorRegister("As senhas digitadas não conferem");
		header("Location: /login");
		exit;

	}


	if (User::checkLoginExist($_POST['email']) === true) {

		User::setErrorRegister("Este endereço de e-mail já está sendo usado por outro usuário.");
		header("Location: /login");
		exit;
	}

	if(!preg_match("/^([a-z-0-9 ]+)$/i",($_POST['password']))) {
		User::setErrorRegister("Favor digitar apenas letras e números");
		header("Location: /login");
		exit;
	} 

	if(!preg_match("/^[\w$@]{6,}$/",($_POST['password']))) {
		User::setErrorRegister("Senha digitada é Menor que 6 Caracteres ");
		header("Location: /login");
		exit;
	} 





	$user = new User();

	$user->setData([
		'inadmin'=>0,
		'deslogin'=>$_POST['email'],
		'desperson'=>$_POST['name'],
		'desemail'=>$_POST['email'],
		'despassword'=>$_POST['password'],
		'nrphone'=>$_POST['phone']
	]);

	$user->save();

	User::login($_POST['email'], $_POST['password']);

	header('Location: /cart');
	exit;

});

$app->get("/forgot", function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("forgot", [
		'error'=>User::getError()
	]);


});

$app->post("/forgot", function(){

	try {
		$user = User::getForgot($_POST["email"], false);

	} catch(Exception $e) {

		User::setError($e->getMessage());
		header("Location: /forgot");
		exit;
	}

	header("Location: /forgot/sent");
	exit;

});

$app->get("/forgot/sent", function(){

	$page = new Page([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("forgot-sent");
});

$app->get("/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]

	));
});

$app->post("/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);

	User::setForgotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12

	]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");

});

$app->get("/profile", function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	]);

});

$app->post("/profile", function(){

	User::verifyLogin(false);

	if (!isset($_POST['desperson']) || $_POST['desperson'] === '') {
		User::setError("Preencha o seu nome.");
		header("Location: /profile");
		exit;
	}

	if (!isset($_POST['desemail']) || $_POST['desemail'] === '') {
		User::setError("Preencha o seu email.");
		header("Location: /profile");
		exit;
	}

	$user = User::getFromSession();

	if ($_POST['desemail'] !== $user->getdesemail()) {

		if (User::checkLoginExist($_POST['desemail']) === true) {

			User::setError("Este endereço de e-mail já está cadastrado.");
			header("Location: /profile");
			exit;
		}
	}

	$_POST['iduser'] = $user->getiduser();
	$_POST['inadmin'] = $user->getinadmin();
	$_POST['despassword'] = $user->getdespassword();
	$_POST['deslogin'] = $_POST['desemail'];

	$user->setData($_POST);

	$user->update();

	$_SESSION[User::SESSION] = $user->getValues();

	User::setSuccess("Dados alterados com sucesso!");

	header("Location: /profile");
	exit;

});

$app->get("/order/:idorder", function($idorder) {

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$page = new Page();

	$page->setTpl("payment", [
		'order'=>$order->getValues()
	]);

});

$app->get("/boleto/:idorder", function($idorder){

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	// DADOS DO BOLETO PARA O SEU CLIENTE
	$dias_de_prazo_para_pagamento = 10;
	$taxa_boleto = 0.00;
	$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
	$valor_cobrado = formatPrice($order->getvltotal()); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(".", "",$valor_cobrado);
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

	$dadosboleto["nosso_numero"] = $order->getidorder();  // Nosso numero - REGRA: Máximo de 8 caracteres!
	$dadosboleto["numero_documento"] = $order->getidorder();	// Num do pedido ou nosso numero
	$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
	$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
	$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = $order->getdesperson();
	$dadosboleto["endereco1"] = $order->getdesaddress() . " " . $order->getdesdistrict();
	$dadosboleto["endereco2"] = $order->getdescity() . " - " . $order->getdesstate() . " - " . $order->getdesdescountry() . " - " . $order->getnrzipcode();

	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Confeitaria Casa de Dona Brasilina";
	$dadosboleto["demonstrativo2"] = "Taxa bancária - R$ 0,00";
	$dadosboleto["demonstrativo3"] = "";
	$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
	$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
	$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: casadedonabrasilina@gmail.com";
	$dadosboleto["instrucoes4"] = "";

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] = "";
	$dadosboleto["valor_unitario"] = "";
	$dadosboleto["aceite"] = "";		
	$dadosboleto["especie"] = "R$";
	$dadosboleto["especie_doc"] = "";


	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


	// DADOS DA SUA CONTA - ITAÚ
	$dadosboleto["agencia"] = "1690"; // Num da agencia, sem digito
	$dadosboleto["conta"] = "48781";	// Num da conta, sem digito
	$dadosboleto["conta_dv"] = "2"; 	// Digito do Num da conta

	// DADOS PERSONALIZADOS - ITAÚ
	$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

	// SEUS DADOS
	$dadosboleto["identificacao"] = "Casa de Dona Brasilina";
	$dadosboleto["cpf_cnpj"] = "00.000.000/0000-00";
	$dadosboleto["endereco"] = "Rua Irapuru, 00 - Freguesia do Ó - SP, 02960070";
	$dadosboleto["cidade_uf"] = "Freguesia do Ó - SP";
	$dadosboleto["cedente"] = "CONFEITARIA CASA DE DONA BRASILINA";

	// NÃO ALTERAR!
	$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "boletophp" . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR;

	require_once($path . "funcoes_itau.php");
	require_once($path . "layout_itau.php");

});

$app->get("/profile/orders", function(){
	
	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl('profile-orders', [
		'orders'=>$user->getOrders()
	]);

});

$app->get("/profile/orders/:idorder", function($idorder){

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$cart = new Cart();

	$cart->get((int)$order->getidcart());

	$cart->getCalculateTotal();

	$page = new Page();

	$page->setTpl('profile-orders-detail', [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);


});

$app->get("/profile/change-password", function(){

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("profile-change-password", [
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	]);
});

$app->post("/profile/change-password", function(){

	User::verifyLogin(false);

	if (!isset($_POST['current_pass']) || $_POST['current_pass'] === ''){

		User::setError("Digite a senha atual");
		header("Location: /profile/change-password");
		exit;
	}

	if (!isset($_POST['new_pass']) || $_POST['new_pass'] === ''){

		User::setError("Digite a nova senha");
		header("Location: /profile/change-password");
		exit;
	}

	if (!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === ''){

		User::setError("Confirme a nova senha");
		header("Location: /profile/change-password");
		exit;
	}

	if ($_POST['current_pass'] === $_POST['new_pass']){

		User::setError("A sua nova senha deve ser difente da atual");
		header("Location: /profile/change-password");
		exit;

	}

	$user = User::getFromSession();

	if (!password_verify($_POST['current_pass'], $user->getdespassword())) {

		User::setError("A senha está inválida");
		header("Location: /profile/change-password");
		exit;

	}

	$user->setdespassword(User::getPasswordHash($_POST['new_pass']));

	$user->update();

	User::setSuccess("Senha alterada com sucesso");

	header("Location: /profile/change-password");
	exit;
});



?>
