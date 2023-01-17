<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="icon" type="image/png" href="/res/site/images/01_LOGO ORIGINAL.png" />
<script type="text/javascript" src="/res/site/js3/ips.js"></script>

<script type="text/javascript" src="/res/site/js/loading.js"></script>

<link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="/res/site/css/loading.min.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
  function myFunction() {
  document.getElementById("myText").required = true;
  document.getElementById("dtComunicado").required = true;
  document.getElementById("seguradora").required = true;
  document.getElementById("gerente").required = true;
  document.getElementById("sinistro").required = true;
  document.getElementById("lsinistro").required = true;
  document.getElementById("llatitude").required = true;
}

</script>

<script type="text/javascript">
  
document.addEventListener("keydown", function(e) {
  if(e.keyCode === 13) {
        
    e.preventDefault();
      
  }
});
    
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
            document.getElementById('cep').value=("");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    }

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i);
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 
function idade (){
    var data=document.getElementById("dtnasc").value;
    var dia=data.substr(0, 2);
    var mes=data.substr(3, 2);
    var ano=data.substr(6, 4);
    var d = new Date();
    var ano_atual = d.getFullYear(),
        mes_atual = d.getMonth() + 1,
        dia_atual = d.getDate();
        
        ano=+ano,
        mes=+mes,
        dia=+dia;
        
    var idade=ano_atual-ano;
    
    if (mes_atual < mes || mes_atual == mes_aniversario && dia_atual < dia) {
        idade--;
    }
return idade;
} 
  
  
function exibe(i) {
    
   
        
  document.getElementById(i).readOnly= true;
      
    
  
    
}

function desabilita(i){
    
     document.getElementById(i).disabled = true;
    document.getElementById('enc_instituicao').value=("");
  

    }
function habilita(i)
    {
        document.getElementById(i).disabled = false;
        
    }


function showhide()
 {
       var div = document.getElementById("newpost");
       
       if(idade()>=18){
 
    div.style.display = "none";
}
else if(idade()<18) {
    div.style.display = "inline";
}




 }


 

 






</script>


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
    document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><label class="col-md-2 control-label" for="prependedtext">Acionamentos</label><div class="col-md-2"><div class="input-group"><input id="acionamento" name="acionamento'+ controleCampo + '" placeholder="Tipo de acionamento" class="form-control" type="text" ></div></div><div class="col-md-2" style="margin-left: -50px"><div class="input-group"><input id="prependedtext" name="datah'+ controleCampo + '" class="form-control" type="datetime-local" ></div></div> <div class="col-md-1" style="margin-left: -55px"><div class="input-group"><input id="prependedtext" name="nome'+ controleCampo + '" class="form-control" placeholder="Nome" type="text" ></div></div>  <div class="col-md-2" style="margin-left: -30px"><div class="input-group"> <input id="prependedtext" name="contato'+ controleCampo + '" class="form-control" placeholder="Contato" type="text"></div></div><div class="col-md-2" style="margin-left: -50px"> <div class="input-group"><input id="local" name="local'+ controleCampo + '" class="form-control" placeholder="Local" type="text"></div>  </div><div class="col-md-2" style="margin-left: -55px"> <div class="input-group"><input id="descricao" name="descricao'+ controleCampo + '" class="form-control" placeholder="Descrição do acionamento" type="text"></div>  </div><input type="hidden" name="id' + controleCampo + '" id="id' + controleCampo + '" /><button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
    document.getElementById("qnt_campo").value = controleCampo;
}

function removerCampo(idCampo){
    document.getElementById('campo' + idCampo).remove();
} 

</script>


    
</head>
<body class="centralize">

<div class="loading" id="loading" >
<img src="/res/site/images/01_LOGO ORIGINAL.png" class="ld ld-ring ld-spin">

  </div>  

        

<!-- top-header -->
        <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                     <ul>
                        <!--<li><a href="/profile">Minha Conta</a></li>-->
                        <li><a href="#" target="blank" style="color: #08cc9e"><b>Solicitar IPS</b></a></li>
                        <li><a href="/ips/solicitacoes" target="blank">Solicitações</a></li>
                        <li><a href="#" target="blank">Pronta Resposta</a></li>
                        <li><a href="" >Contato</a></li>

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
    <input id="NumSM" name="NumSM" placeholder="Apenas números" class="form-control input-md" value="<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="search" required="" >
  </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary" formaction="/ips" formmethod="get" onclick="login()">Pesquisar</button>
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
      <span class="input-group-addon">Seguradora<h11> *</h11></span>
      <select name="seguradora" id="seguradora" class="form-control" name="seguradora">
      <option value=""></option> 
        <?php $counter1=-1;  if( isset($seguradoras) && ( is_array($seguradoras) || $seguradoras instanceof Traversable ) && sizeof($seguradoras) ) foreach( $seguradoras as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
  </select>
    </div>
    
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Gerente Responsável<h11> *</h11></span>

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
 
 <label class="col-md-2 control-label" for="encaminhamento">Acionar Seguradora </label>
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
      </span>      <input id="enc_instituicao" name="telefone" class="form-control" type="text" placeholder="Telefone" disabled="false">
      
    </div>
    
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Protocolo</span>
      <input id="enc_instituicao"  name="Protocolo" class="form-control" placeholder=""  type="text">
    </div>
    
  </div>
  </div>

<!-- Text input-->

<hr></hr>
<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Dados do Veiculo</label>
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
  <label class="col-md-2 control-label" for="prependedtext">Tecnologia Rastreamento</label>
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
      <span class="input-group-addon">Possui Isca</span>
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
   <label class="col-md-2 control-label" for="encaminhamento">Necessário Isca? </label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="nIsca" id="enc" value="Nao"  onclick="desabilita('nTerminal')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="nIsca" id="enc" value="Sim" onclick="habilita('nTerminal')">
      Sim
    </label>
      </span>      <input id="nTerminal" name="nTerminal" class="form-control" type="text" placeholder="Terminal" disabled="false">
      
    </div>
    
  </div>
 <label class="col-md-2 control-label" for="radios">Iscas Posicionando?</label>
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
      <span class="input-group-addon">Local Origem</span>
      <input id="rua" name="cidadeOrigem" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["vloc_descricao_o"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Local Destino</span>
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
      <span class="input-group-addon">Data e hora do comunicado<h11>*</h11></span>
      <input id="dtComunicado" name="dtComunicado" class="form-control" placeholder="" type="datetime-local">
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
      <span class="input-group-addon">Data e hora do sinistro<h11>*</h11></span>
      <input id="myText" name="dtSinistro" class="form-control" placeholder=""  type="datetime-local">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Tipo de Sinistro<h11>*</h11></span>
      <select name="tipoSinistro" id="sinistro" class="form-control">
        <option value=""></option>
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
      <input id="lsinistro" name="localSinistro" class="form-control" placeholder="" type="text">
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
      <input id="llatitude" name="latitude" class="form-control" placeholder="" type="text">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Logintude</span>
      <input id="rua" name="longitude" class="form-control" placeholder="" type="text">
    </div>
    
  </div>
</div>

<hr></hr>


<div class="form-group" id= 'formulario'>
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos</label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="tipo_acionamento" placeholder="Tipo de acionamento" class="form-control" type="text" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah" class="form-control" type="datetime-local" >
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -45px">
    <div class="input-group">
      <input id="prependedtext" name="nome" class="form-control" placeholder="Nome" type="text" >
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -30px">
    <div class="input-group">
      <input id="prependedtext" name="contato" class="form-control" placeholder="Contato" type="text">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="local" name="local" class="form-control" placeholder="Local" type="text">
    </div>
  </div>

  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="descricao" name="descricao" class="form-control" placeholder="Descrição do Acionamento" type="text">
    </div>
  </div>
   <button type="button" onclick="adicionarCampo()" id="qtd" name="qtd"> + </button>

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
  <label class="col-md-2 control-label" for="encaminhamento">Perda de Bateria</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="Não" checked onclick="desabilita('tbateria')"  >
      Não
    </label> 
    <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="Sim" onclick="habilita('tbateria')">
      Sim
    </label>
      </span>
      <input id="tbateria" name="dtAlertaBateria" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Perda de Terminal</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Não" checked onclick="desabilita('tterminal')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Sim" onclick="habilita('tterminal')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Perda de Sinal</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaSinal" id="sinal" value="Não" onclick="desabilita('tsinal')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaSinal" id="sinal" value="Sim" onclick="habilita('tsinal')">
      Sim
    </label>
      </span>
      <input id="tsinal" name="dtPerdaSinal" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Desvio de rota</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desvioRota" id="rota" value="Não" onclick="desabilita('drota')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desvioRota" id="rota" value="Sim" onclick="habilita('drota')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Botão de Pânico </label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="btPanico" id="panico" value="Não" onclick="desabilita('tpanico')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="btPanico" id="panico" value="Sim" onclick="habilita('tpanico')">
      Sim
    </label>
      </span>
      <input id="tpanico" name="dtBtPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Porta Baú Traseira</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Não" checked onclick="desabilita('ttraseira')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Sim" onclick="habilita('ttraseira')" >
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
  <label class="col-md-2 control-label" for="encaminhamento">Porta Baú Lateral </label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauLateral" id="lateral" value="Não" onclick="desabilita('tlateral')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauLateral" id="lateral" value="Sim" onclick="habilita('tlateral')">
      Sim
    </label>
      </span>
      <input id="tlateral" name="dtPortaBauLateral" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Arrombamento de baú </label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="arrombamentoBau" id="bau" value="Não" onclick="desabilita('tbau')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="arrombamentoBau" id="bau" value="Sim" onclick="habilita('tbau')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Desengate de Carreta</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desengateCarreta" id="desengate" value="Não" onclick="desabilita('tdesengate')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desengateCarreta" id="desengate" value="Sim" onclick="habilita('tdesengate')">
      Sim
    </label>
      </span>
      <input id="tdesengate" name="dtDesengateCarreta" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Senha de Pânico</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="senhaPanico" id="spanico" value="Não" checked onclick="desabilita('tspanico')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="senhaPanico" id="spanico" value="Sim" onclick="habilita('tspanico')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Porta Motorista</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaMotorista" id="motorista" value="Não" onclick="desabilita('tmotorista')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaMotorista" id="motorista" value="Sim" onclick="habilita('tmotorista')">
      Sim
    </label>
      </span>
      <input id="tmotorista" name="dtPortaMotorista" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" >
      
    </div>
    
  </div>
  
   
   <label class="col-md-1 control-label" for="encaminhamento">Porta do Passageiro</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Não" checked onclick="desabilita('tppassageiro')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Sim" onclick="habilita('tppassageiro')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Ignição Desligada</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Não" onclick="desabilita('tignicao')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Sim" onclick="habilita('tignicao')">
      Sim
    </label>
      </span>
      <input id="tignicao" name="dtIgnicaoDesligada" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Violação de Painel</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoPainel" id="painel" value="Não" checked onclick="desabilita('tpainel')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoPainel" id="painel" value="Sim" onclick="habilita('tpainel')">
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
  <label class="col-md-2 control-label" for="encaminhamento">Violação de Grade</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoGrade" id="grade" value="Não" onclick="desabilita('tgrade')" checked>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoGrade" id="grade" value="Sim" onclick="habilita('tgrade')">
      Sim
    </label>
      </span>
      <input id="tgrade" name="dtViolacaoGrade" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false">
      
    </div>
    
  </div>
  
 </div>


 


        
 <!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Descritivo da Ocorrência</label>
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
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit" onclick="myFunction()">Cadastrar</button>
    
  </div>
</div>

</div>
</div>


</fieldset>
</form>

</body>

</html>