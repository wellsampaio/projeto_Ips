<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript" src="/res/site/js3/ips.js"></script>
<link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/res/site/cssMenu/style.css" rel="stylesheet" type="text/css" media="all" />


<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">
<!DOCTYPE html>
<head>
<title>Solicitação de Ips</title>
<script type="text/javascript">
 async function pesquisarUsuario(registro) {
    //console.log(registro);
    //Receber os dados do formulario
    var cpf = document.querySelector("#cpf" + registro);

    //Recuperar o valor do atributo value
    var valorCpf = cpf.value;
    //console.log(valorCpf);

    //Verificar se o usuario digitou 11 numeros
    if (valorCpf.length == 11) {
        //Fazer a requisicao para o arquivo "visualizar_usuario.php"
        const dados = await fetch('visualizar_usuario.php?cpf=' + valorCpf);
        //Ler os dados
        const resposta = await dados.json();
        //console.log(resposta);
        //Se retornou erro, acessa o IF, senao acessa o ELSE e carrega os dados no formulario
        if (resposta['erro']) {
            document.getElementById("msgAlerta" + registro).innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlerta" + registro).innerHTML = "";
            document.getElementById("nome" + registro).value = resposta['dados'].nome;
            document.getElementById("email" + registro).value = resposta['dados'].email;
            document.getElementById("id" + registro).value = resposta['dados'].id;
        }
    }
}

var controleCampo = 1;
function adicionarCampo() {
    controleCampo++;
    document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label><div class="col-md-2"><div class="input-group"><input id="acionamento" name="acionamento" placeholder="Tipo de acionamento" class="form-control" type="text" ></div></div><div class="col-md-2"><div class="input-group"><input id="prependedtext" name="datah" class="form-control" type="datetime-local" ></div></div> <div class="col-md-1"><div class="input-group"><input id="prependedtext" name="nome" class="form-control" placeholder="Nome" type="text" ></div></div>  <div class="col-md-2"><div class="input-group"> <input id="prependedtext" name="contato" class="form-control" placeholder="Contato" type="text"></div></div><div class="col-md-2"> <div class="input-group"><input id="local" name="local" class="form-control" placeholder="Local" type="text"></div>  </div><input type="hidden" name="id' + controleCampo + '" id="id' + controleCampo + '" /><button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
    document.getElementById("qnt_campo").value = controleCampo;
}

function removerCampo(idCampo){
    document.getElementById('campo' + idCampo).remove();
} 

</script>


    
</head>
<body>


<a class="menu-bar" data-toggle="collapse" href="#menu">
            <span class="bars"></span>            
        </a>
      <div class="collapse menu" id="menu">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Works</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Works</a></li>
                <li><a href="#">Contact</a></li>
            </ul>   
      </div>

        

<!-- top-header -->
        <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                     <ul>
                        <!--<li><a href="/profile">Minha Conta</a></li>-->
                        <li><a href="" target="blank">Solicitação de IPS</a></li>
                        <li><a href="" target="blank">Editar Solicitação de IPS</a></li>
                        <li><a href="" target="blank">Contato</a></li>

                        <div class="clearfix"> </div>
                    </ul>
                </div>
                <div class="top-header-center">
                    
                </div>
                <div class="top-header-right">
                    <ul>
                        <?php if( checkLogin(false) ){ ?>
                            <li><a href="/profile"><i class="fa fa-user"></i> <?php echo getUserName(); ?></a></li>
                            <li><a href="/logout"><i class="fa fa-close"></i> Sair</a></li>
                            <?php }else{ ?>
                            <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="/login"><i class="fa fa-lock"></i> Criar Conta</a></li>
                            <?php } ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>



      
        <!-- /top-header -->
<form class="form-horizontal" action="/ips" method="post" name="ips">
<fieldset>



     <?php if( $error != '' ){ ?>
                  
                    <h3 style="text-align: center; color: red"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                  
                  <?php } ?>
    <div class="panel-body">


<div class="form-group">
    <div class="form-group">
  <label class="col-md-2 control-label" for="SM">Solicitação de SM <h11>*</h11></label>
  <div class="col-md-2">
    <input id="cep" name="NumSM" placeholder="Apenas números" class="form-control input-md" value="<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="search" required="" >
  </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary" formaction="/ips" formmethod="get">Pesquisar</button>
    </div>

<!--<div class="form-group">   
<div class="col-md-4 control-label">
    <img id="logo" src="http://blogdoporao.com.br/wp-content/uploads/2016/12/Faculdade-pitagoras.png"/>
</div>
<div class="col-md-4 control-label">
    
</div>
</div>-->

<div class="col-md-11 control-label">

</div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados do Cliente</label>
  

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Embarcador</span>
      <input id="rua" name="nomeEmbarcador" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeEmbarcador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Transportador</span>
      <input id="cidade" name="nomeTransportador" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["nomeTransportador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Seguradora</span>
      <select name="seguradora" id="cars" class="form-control" name="seguradora"> 

       <option value=""></option>  
        <?php $counter1=-1;  if( isset($seguradoras) && ( is_array($seguradoras) || $seguradoras instanceof Traversable ) && sizeof($seguradoras) ) foreach( $seguradoras as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
  </select>
    </div>
    
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Gerente Responsável</span>

    <select id="gerente" class="form-control" name="gerenteResponsavel">
    <option value=""></option>
  <?php $counter1=-1;  if( isset($gerentes) && ( is_array($gerentes) || $gerentes instanceof Traversable ) && sizeof($gerentes) ) foreach( $gerentes as $key1 => $value1 ){ $counter1++; ?>
    <option value="<?php echo htmlspecialchars( $value1["nomeGerente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeGerente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  <?php } ?>
  </select>
    </div>
    
  </div>
</div>


<!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Necessidade de acionar <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="acionar" id="enc" value="Nao"  onclick="desabilita('enc_instituicao')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="acionar" id="enc" value="Sim" onclick="habilita('enc_instituicao')">
      Sim
    </label>
      </span>
      <input id="enc_instituicao" name="telefone" class="form-control" type="text" placeholder="Telefone" disabled="false">
      
    </div>
    
  </div>
  </div>

<!-- Text input-->

<hr></hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados do Veiculo<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Placa</span>
      <input id="prependedtext" name="placa" class="form-control" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["placa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

     <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Marca</span>
      <input id="prependedtext" name="marca" class="form-control" placeholder="" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["marca"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div >
  </div>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Modelo</span>
      <input id="prependedtext" name="modelo" class="form-control" placeholder="" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["modelo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>

  </div>

  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Cor</span>
      <input id="prependedtext" name="cor" class="form-control" placeholder="" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["cor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>
 </div> 



<hr></hr>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Tecnologia Rastreamento<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Nome</span>
      <input id="prependedtext" name="vtec_descricao" class="form-control" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["vtec_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

     <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Terminal</span>
      <input id="prependedtext" name="term_numero_terminal" class="form-control" placeholder="" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["term_numero_terminal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

   <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Isca</span>
      <input id="prependedtext" name="isca" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["isca"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

    <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Tec. Isca</span>
      <input id="prependedtext" name="tec_isca" class="form-control" type="text">
    </div>
  </div>

  
 </div> 


<div class="form-group">
 <label class="col-md-2 control-label" for="radios">Iscas Posicionando<h11>*</h11></label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0" >
      <input name="iscaPosicionando" id="" value="Sim" type="radio">
      Sim
    </label> 
    <label class="radio-inline" for="radios-1">
      <input name="iscaPosicionando" id="" value="Não" type="radio" checked="">
      Não
    </label>
  </div>

</div>

<hr></hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados do Motorista</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Nome</span>
      <input id="rua" name="Motorista" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["nome_moto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">CPF</span>
      <input id="cpf" name="CPF" placeholder="Apenas números" class="form-control input-md" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["cpf_moto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


  



<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Vinculo</span>
      <input id="rua" name="Vinculo" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["vinculo_contratual"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  

  </div>

<hr></hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados da Viagem</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Número SM</span>
      <input id="rua" name="viagemId" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["viagemId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Data do Inicio da SM</span>
      <input id="rua" name="dataInicio" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["dataInicio"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Valor</span>
      <input id="cidade" name="Valor" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["viag_valor_carga"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade Origem</span>
      <input id="rua" name="cidadeOrigem" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["vloc_descricao_o"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade Destino</span>
      <input id="rua" name="cidadeDestino" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["vloc_descricao_d"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Produtos</span>
      <input id="rua" name="Produtos" class="form-control" placeholder="" type="text">
    </div>
    
  </div>
</div>


  




<hr></hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados do Sinistro</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Data e hora do comunicado</span>
      <input id="rua" name="dtComunicado" class="form-control" placeholder="" type="datetime-local">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Nome do comunicante</span>
      <input id="rua" name="nomeComunicante" class="form-control" placeholder="" type="text">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Data e hora do sinistro</span>
      <input id="cidade" name="dtSinistro" class="form-control" placeholder=""  type="datetime-local">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Tipo de Sinistro</span>
      <select name="tipoSinistro" id="cars" class="form-control">   
        <?php $counter1=-1;  if( isset($tiposSinistros) && ( is_array($tiposSinistros) || $tiposSinistros instanceof Traversable ) && sizeof($tiposSinistros) ) foreach( $tiposSinistros as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
  </select>
    </div>
    
  </div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Local do sinistro</span>
      <input id="rua" name="localSinistro" class="form-control" placeholder="" type="text">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Km/Número</span>
      <input id="rua" name="Km" class="form-control" placeholder=""  type="text">
    </div>
    
  </div>
</div>  

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Latitude</span>
      <input id="rua" name="latitude" class="form-control" placeholder="" type="text">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Logintude</span>
      <input id="rua" name="logintude" class="form-control" placeholder="" type="text">
    </div>
    
  </div>
</div>

<hr></hr>

<div class="form-group" id= 'formulario'>
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="tipo_acionamento" placeholder="Tipo de acionamento" class="form-control" type="text" >
    </div>
  </div>

     <div class="col-md-2">
    <div class="input-group">
      <input id="prependedtext" name="datah" class="form-control" type="datetime-local" >
    </div >
  </div>
  <div class="col-md-1">
    <div class="input-group">
      <input id="prependedtext" name="nome" class="form-control" placeholder="Nome" type="text" >
    </div>

  </div>

  <div class="col-md-2">
    <div class="input-group">
      <input id="prependedtext" name="contato" class="form-control" placeholder="Contato" type="text">
    </div>
  </div>

   <div class="col-md-2">
    <div class="input-group">
      <input id="local" name="local" class="form-control" placeholder="Local" type="text">
    </div>
  </div>
   <button type="button" onclick="adicionarCampo()"> + </button>

 </div> 

<hr></hr>

<div id="newpost">
   <div class="form-group">
    <div class="col-md-2 control-label">
        <h3>Alertas Gerados</h3>
    </div>
    </div>




<!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Perda de Bateria<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="Nao" checked onclick="desabilita('tbateria')"  >
      Não
    </label> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="sim" onclick="habilita('tbateria')">
      Sim
    </label>
      </span>
      <input id="tbateria" name="dtAlertaBateria" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Perda de Terminal<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Nao" checked onclick="desabilita('tterminal')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="sim" onclick="habilita('tterminal')">
      Sim
    </label>
      </span>
      <input id="tterminal" name="dtPerdaTerminal" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
 </div>
 
 <!-- Text input-->


 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Perda de Sinal <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaSinal" id="sinal" value="Nao" onclick="desabilita('tsinal')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaSinal" id="sinal" value="sim" onclick="habilita('tsinal')">
      Sim
    </label>
      </span>
      <input id="tsinal" name="dtPerdaSinal" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Desvio de rota<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desvioRota" id="rota" value="Nao" onclick="desabilita('drota')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desvioRota" id="rota" value="sim" onclick="habilita('drota')">
      Sim
    </label>
      </span>
      <input id="drota" name="dtDesvioRota" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="true" >
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Botão de Pânico <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="btPanico" id="panico" value="Nao" onclick="desabilita('tpanico')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="btPanico" id="panico" value="sim" onclick="habilita('tpanico')">
      Sim
    </label>
      </span>
      <input id="tpanico" name="dtBtPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Porta Baú Traseira<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Nao" checked onclick="desabilita('ttraseira')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauTraseira" id="traseira" value="sim" onclick="habilita('ttraseira')" >
      Sim
    </label>
      </span>
      <input id="ttraseira" name="dtPortaBauTraseira" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Porta Baú Lateral <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauLateral" id="lateral" value="Nao" onclick="desabilita('tlateral')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauLateral" id="lateral" value="sim" onclick="habilita('tlateral')">
      Sim
    </label>
      </span>
      <input id="tlateral" name="dtPortaBauLateral" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Arrombamento de baú <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="arrombamentoBau" id="bau" value="Nao" onclick="desabilita('tbau')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="arrombamentoBau" id="bau" value="sim" onclick="habilita('tbau')">
      Sim
    </label>
      </span>
      <input id="tbau" name="dtArrombamentoBau" class="form-control" type="datetime-local"  placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Desengate de Carreta <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desengateCarreta" id="desengate" value="Nao" onclick="desabilita('tdesengate')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desengateCarreta" id="desengate" value="sim" onclick="habilita('tdesengate')">
      Sim
    </label>
      </span>
      <input id="tdesengate" name="dtDesengateCarreta" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Senha de Pânico<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="senhaPanico" id="spanico" value="Nao" checked onclick="desabilita('tspanico')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="senhaPanico" id="spanico" value="sim" onclick="habilita('tspanico')">
      Sim
    </label>
      </span>
      <input id="tspanico" name="dtSenhaPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Porta Motorista <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaMotorista" id="motorista" value="Nao" onclick="desabilita('tmotorista')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaMotorista" id="motorista" value="sim" onclick="habilita('tmotorista')">
      Sim
    </label>
      </span>
      <input id="tmotorista" name="dtPortaMotorista" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
   
   <label class="col-md-1 control-label" for="encaminhamento">Porta do Passageiro<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Nao" checked onclick="desabilita('tppassageiro')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="sim" onclick="habilita('tppassageiro')">
      Sim
    </label>
      </span>
      <input id="tppassageiro" name="dtPortaPassageiro" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Ignição Desligada <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Nao" onclick="desabilita('tignicao')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="sim" onclick="habilita('tignicao')">
      Sim
    </label>
      </span>
      <input id="tignicao" name="dtIgnicaoDesligada" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Violação de Painel<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoPainel" id="painel" value="Nao" checked onclick="desabilita('tpainel')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoPainel" id="painel" value="sim" onclick="habilita('tpainel')">
      Sim
    </label>
      </span>
      <input id="tpainel" name="dtViolacaoPainel" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Violação de Grade <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoGrade" id="grade" value="Nao" onclick="desabilita('tgrade')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoGrade" id="grade" value="sim" onclick="habilita('tgrade')">
      Sim
    </label>
      </span>
      <input id="tgrade" name="dtViolacaoGrade" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
 </div>


 


        
 <!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Descritivo da Ocorrência<h11>*</h11></label>
  <div class="col-md-9">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <textarea id="story" name="Descritivo"
          rows="10" cols="100" style=" resize: none" class="form-control">
</textarea>
    </div>
  </div>
</div>
 
 

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
    
  </div>
</div>

</div>
</div>


</fieldset>
</form>

</body>

</html>