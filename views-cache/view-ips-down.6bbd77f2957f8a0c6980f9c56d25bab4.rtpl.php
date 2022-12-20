<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="icon" type="image/png" href="/res/site/images/01_LOGO ORIGINAL.png" />
<script type="text/javascript" src="/res/site/js3/ips.js"></script>
<link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />
  <meta name="viewport" content="width=device-width" />


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
<title>Solicitação de Ips <?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
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


</script>


    
</head>
<body >       

<!-- top-header -->
  <div id="imprime">
        <div class="top-header">
            <div class="Container">

                <div class="top-header-center">
                    
                </div>
                <div class="top-header-right">
                    <ul style="margin-left: -400px">
                        <li class="hidden-print"><a href="/ips/solicitacoes"><i class="fa fa-lock"></i> Voltar</a></li>

                       
                            <li><a href=""><i class="fa fa-user"></i> Criado Por: <?php echo htmlspecialchars( $address["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                           
                            
                          
                            
                    </ul>
                </div>
                <div class="clearfix"> 
                </div>
            </div>

        </div>


        <!-- /top-header -->
<form class="form-horizontal" action="" method="post" name="ips">
<fieldset>



   

    <div class="panel-body">

      <div class="form-group" style="margin: 2px; margin-left: 1000px;">
    <img src="https://tomticket-assets.s3.amazonaws.com/logotipo-empresa/51702.png">
  </div>
<div >
    <div class="form-group">
  <label class="col-md-2 control-label" for="SM">Solicitação de SM <h11>*</h11></label>
  <div class="col-md-2">
    <input id="cep" name="NumSM" placeholder="Apenas números" class="form-control input-md" value="<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="search" required="" disabled="false">
  </div>

      <div class="col-md-2" id="print">
      <button type="button" onclick="window.print()" class="hidden-print">Gerar Ips</button>
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
      <input id="rua" name="nomeEmbarcador" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeEmbarcador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>

<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Transportador</span>
      <input id="cidade" name="nomeTransportador" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeTransportador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>

</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Seguradora</span>
      <select name="seguradora" id="cars" class="form-control" name="seguradora" disabled="false"> 

       <option value="<?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
        <?php $counter1=-1;  if( isset($seguradoras) && ( is_array($seguradoras) || $seguradoras instanceof Traversable ) && sizeof($seguradoras) ) foreach( $seguradoras as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
  </select>
    </div>
    
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Gerente Responsável</span>

    <select id="gerente" class="form-control" name="gerenteResponsavel" disabled="false">
    <option value="<?php echo htmlspecialchars( $address["gerenteResponsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $address["gerenteResponsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  <?php $counter1=-1;  if( isset($gerentes) && ( is_array($gerentes) || $gerentes instanceof Traversable ) && sizeof($gerentes) ) foreach( $gerentes as $key1 => $value1 ){ $counter1++; ?>
    <option value="<?php echo htmlspecialchars( $value1["nomeGerente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeGerente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
  <?php } ?>
  </select>
    </div>
    
  </div>
</div>


<!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Acionar Seguradora <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="acionar" id="enc" value="Nao"  onclick="desabilita('enc_instituicao')" <?php if( ($address["acionar"])!='Sim' ){ ?>  checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="acionar" id="enc" value="Sim" onclick="habilita('enc_instituicao')" <?php if( ($address["acionar"] )!='Nao' ){ ?>  checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="enc_instituicao" name="telefone" class="form-control" type="text" placeholder="Telefone" disabled="false" value="<?php echo htmlspecialchars( $address["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Protocolo</span>
      <input id="enc_instituicao"  name="Protocolo" class="form-control" placeholder=""  type="text" value="<?php echo htmlspecialchars( $address["Protocolo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
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
      <input id="prependedtext" name="isca" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["isca"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

    <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon">Tec. Isca</span>
      <input id="prependedtext" name="tec_isca" class="form-control" type="text" disabled="false">
    </div>
  </div>

  
 </div> 


<div class="form-group">
 <label class="col-md-2 control-label" for="radios">Iscas Posicionando<h11>*</h11></label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0" >

      <input name="iscaPosicionando" disabled="false" id="" value="Sim" type="radio">
      Sim
    </label> 
    <label class="radio-inline" for="radios-1">
      <input name="iscaPosicionando" id="" value="Não" type="radio" checked="" disabled="false">
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
      <input id="rua" name="Motorista" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["Motorista"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">CPF</span>
      <input id="cpf" name="CPF" placeholder="Apenas números" class="form-control input-md" type="text" readonly="readonly" value="<?php echo htmlspecialchars( $address["CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


  



<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Vinculo</span>
      <input id="rua" name="Vinculo" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["Vinculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
      <input id="rua" name="" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["viagemId"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
      <input id="cidade" name="Valor" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["Valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade Origem</span>
      <input id="rua" name="cidadeOrigem" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["cidadeOrigem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Cidade Destino</span>
      <input id="rua" name="cidadeDestino" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["cidadeDestino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Produtos</span>
      <input id="rua" name="Produtos" class="form-control" placeholder="" value="<?php echo htmlspecialchars( $address["Produtos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="text" disabled="false">
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
      <input id="rua" name="dtComunicado" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["dtComunicado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="<?php echo htmlspecialchars( $address["dtComunicado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Nome do comunicante</span>
      <input id="rua" name="nomeComunicante" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeComunicante"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Data e hora do sinistro</span>
      <input id="cidade" name="dtSinistro" class="form-control" placeholder=""  type="datetime-local" value="<?php echo htmlspecialchars( $address["dtSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Tipo de Sinistro</span>
      <select name="tipoSinistro" id="cars" class="form-control" disabled="false">  

       <option value="<?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
        <?php $counter1=-1;  if( isset($tiposSinistros) && ( is_array($tiposSinistros) || $tiposSinistros instanceof Traversable ) && sizeof($tiposSinistros) ) foreach( $tiposSinistros as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["nomeSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
      <input id="rua" name="localSinistro" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["localSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Km/Número</span>
      <input id="rua" name="Km" class="form-control" placeholder=""  type="text" value="<?php echo htmlspecialchars( $address["Km"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>
</div>  

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Latitude</span>
      <input id="rua" name="latitude" class="form-control" placeholder="" type="text"
      value="<?php echo htmlspecialchars( $address["latitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Longitude</span>
      <input id="rua" name="longitude" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["longitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
    
  </div>
</div>

<hr></hr>

<div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label>
  <div class="col-md-2">

    <div class="input-group">
      <input id="acionamento" name="tipo_acionamento" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["tipo_acionamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px;">
    <div class="input-group">
      <input id="prependedtext" name="datah" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -58px">
    <div class="input-group">
      <input id="prependedtext" name="nome" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -27px">
    <div class="input-group">
      <input id="prependedtext" name="contato" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
      
    </div>
  </div>

  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group" style="width: 330px">
      <input id="descricao" name="descricao" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false" >
    </div>
  </div>


 </div> 

    <?php if( ($address["acionamento2"])!='' ){ ?>

 <div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento2" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah2" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -58px">
    <div class="input-group">
      <input id="prependedtext" name="nome2" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -27px">
    <div class="input-group">
      <input id="prependedtext" name="contato2" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local2" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
      
    </div>
  </div>

  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group" style="width: 330px">
      <input id="descricao" name="descricao2" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>


 </div> 
<?php } ?>

    <?php if( ($address["acionamento3"])!='' ){ ?>

 <div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento3" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah3" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -58px">
    <div class="input-group">
      <input id="prependedtext" name="nome3" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -27px">
    <div class="input-group">
      <input id="prependedtext" name="contato3" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local3" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
      
    </div>
  </div>
<div class="col-md-2" style="margin-left: -50px">
    <div class="input-group" style="width: 330px">
      <input id="descricao"  class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="descricao3" disabled="false">
    </div>
  </div>

 </div> 
 <?php } ?>


    <?php if( ($address["acionamento4"])!='' ){ ?>

 <div class="form-group" id= "formulario" >
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento4" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah4" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -58px">
    <div class="input-group">
      <input id="prependedtext" name="nome4" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -27px">
    <div class="input-group">
      <input id="prependedtext" name="contato4" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local4" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
      
    </div>
  </div>
  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group" style="width: 330px">
      <input id="descricao" name="descricao4" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled="false">
    </div>
  </div>

 </div> 
<?php } ?>

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

          <?php if( ($address["perdaBateria"])!='Sim' ){ ?>
      <input type="radio" name="perdaBateria" id="bateria" value="Não"    <?php if( ($address["perdaBateria"])!='Sim' ){ ?>  checked <?php } ?> onclick="desabilita('tbateria')"  >
      Não
 <?php }else{ ?>
    

    </label> 
    
         <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="Sim" onclick="habilita('tbateria')"  <?php if( ($address["perdaBateria"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>

      </span>
      <input id="tbateria" name="dtAlertaBateria" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtAlertaBateria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
      
    </div>
    
  </div>
  
   <?php if( ($address["perdaTerminal"])!='Sim' ){ ?>
   <label class="col-md-1 control-label" for="encaminhamento">Perda de Terminal<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Não" <?php if( ($address["perdaTerminal"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tterminal')">
      Não
    </label>
    <?php }else{ ?> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Sim" <?php if( ($address["perdaTerminal"])=='Sim' ){ ?> checked <?php } ?>  onclick="habilita('tterminal')">
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tterminal" name="dtPerdaTerminal" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPerdaTerminal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
         <?php if( ($address["perdaSinal"])!='Sim' ){ ?>     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaSinal" id="sinal" value="Não" onclick="desabilita('tsinal')" <?php if( ($address["perdaSinal"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaSinal" id="sinal" value="Sim" onclick="habilita('tsinal')"  <?php if( ($address["perdaSinal"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tsinal" name="dtPerdaSinal" class="form-control" type="datetime-local" placeholder="Data/hora"  disabled="false" value="<?php echo htmlspecialchars( $address["dtPerdaSinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Desvio de rota<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon"> 
      <?php if( ($address["desvioRota"])!='Sim' ){ ?>    
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desvioRota" id="rota" value="Não" onclick="desabilita('drota')" <?php if( ($address["desvioRota"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desvioRota" id="rota" value="Sim" onclick="habilita('drota')" <?php if( ($address["desvioRota"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="drota" name="dtDesvioRota" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="true" value="<?php echo htmlspecialchars( $address["dtDesvioRota"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <?php if( ($address["btPanico"])!='Sim' ){ ?>   
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="btPanico" id="panico" value="Não" onclick="desabilita('tpanico')" <?php if( ($address["btPanico"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
      <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="btPanico" id="panico" value="Sim" onclick="habilita('tpanico')" <?php if( ($address["btPanico"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
     <?php } ?>
      </span>
      <input id="tpanico" name="dtBtPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtBtPanico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Porta Baú Traseira<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">    
       <?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> 
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Não" <?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('ttraseira')">
      Não
    </label>
    <?php }else{ ?> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Sim" onclick="habilita('ttraseira')" <?php if( ($address["portaBauTraseira"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="ttraseira" name="dtPortaBauTraseira" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaBauTraseira"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
        <?php if( ($address["portaBauLateral"])!='Sim' ){ ?> 
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauLateral" id="lateral" value="Não" onclick="desabilita('tlateral')" <?php if( ($address["portaBauLateral"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label>
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauLateral" id="lateral" value="Sim" onclick="habilita('tlateral')" <?php if( ($address["portaBauLateral"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tlateral" name="dtPortaBauLateral" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaBauLateral"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Arrombamento de baú <h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">
      <?php if( ($address["portaBauLateral"])!='Sim' ){ ?>      
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="arrombamentoBau" id="bau" value="Não" onclick="desabilita('tbau')" <?php if( ($address["arrombamentoBau"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="arrombamentoBau" id="bau" value="Sim" onclick="habilita('tbau')" <?php if( ($address["arrombamentoBau"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tbau" name="dtArrombamentoBau" class="form-control" type="datetime-local"  placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtArrombamentoBau"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <?php if( ($address["desengateCarreta"])!='Sim' ){ ?>  
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desengateCarreta" id="desengate" value="Não" onclick="desabilita('tdesengate')" <?php if( ($address["desengateCarreta"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label>
    <?php }else{ ?> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desengateCarreta" id="desengate" value="Sim" onclick="habilita('tdesengate')" <?php if( ($address["desengateCarreta"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tdesengate" name="dtDesengateCarreta" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtDesengateCarreta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Senha de Pânico<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">    
      <?php if( ($address["senhaPanico"])!='Sim' ){ ?>     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="senhaPanico" id="spanico" value="Não" <?php if( ($address["senhaPanico"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tspanico')">
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="senhaPanico" id="spanico" value="Sim" onclick="habilita('tspanico')" <?php if( ($address["senhaPanico"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tspanico" name="dtSenhaPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtSenhaPanico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
   <?php if( ($address["portaMotorista"])!='Sim' ){ ?>     
    
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaMotorista" id="motorista" value="Não" onclick="desabilita('tmotorista')" <?php if( ($address["portaMotorista"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaMotorista" id="motorista" value="Sim" onclick="habilita('tmotorista')" <?php if( ($address["portaMotorista"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tmotorista" name="dtPortaMotorista" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaMotorista"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Porta do Passageiro<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">
     <?php if( ($address["portaPassageiro"])!='Sim' ){ ?>        
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Não" <?php if( ($address["portaPassageiro"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tppassageiro')">
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Sim" onclick="habilita('tppassageiro')" <?php if( ($address["portaPassageiro"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tppassageiro" name="dtPortaPassageiro" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaPassageiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
        <?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?>        
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Não" onclick="desabilita('tignicao')" <?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Sim" onclick="habilita('tignicao')" <?php if( ($address["ignicaoDesligada"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tignicao" name="dtIgnicaoDesligada" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtIgnicaoDesligada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Violação de Painel<h11>*</h11></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon"> 
      <?php if( ($address["violacaoPainel"])!='Sim' ){ ?>        
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoPainel" id="painel" value="Não" <?php if( ($address["violacaoPainel"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tpainel')">
      Não
    </label>
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoPainel" id="painel" value="Sim" onclick="habilita('tpainel')" <?php if( ($address["violacaoPainel"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tpainel" name="dtViolacaoPainel" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtViolacaoPainel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <?php if( ($address["violacaoGrade"])!='Sim' ){ ?>   
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoGrade" id="grade" value="Não" onclick="desabilita('tgrade')" <?php if( ($address["violacaoGrade"])!='Sim' ){ ?> checked <?php } ?> >
      Não
    </label> 
    <?php }else{ ?>
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoGrade" id="grade" value="Sim" onclick="habilita('tgrade')" <?php if( ($address["violacaoGrade"])=='Sim' ){ ?> checked <?php } ?> >
      Sim
    </label>
    <?php } ?>
      </span>
      <input id="tgrade" name="dtViolacaoGrade" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtViolacaoGrade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
  
 </div>


 


        
 <!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Descritivo da Ocorrência<h11>*</h11></label>
  <div class="col-md-9">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
      <textarea id="story" name="Descritivo" disabled="false"
          rows="10" cols="100" style=" resize: none" class="form-control">
        <?php echo htmlspecialchars( $address["Descritivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
      </textarea>
    </div>
  </div>
</div>

<!-- Button (Double) -->

</div>
</div>
</div>


</fieldset>
</form>

</body>

</html>