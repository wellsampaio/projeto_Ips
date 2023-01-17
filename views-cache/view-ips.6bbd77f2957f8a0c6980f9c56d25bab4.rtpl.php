<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script type="text/javascript" src="/res/site/js3/ips.js"></script>
<link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />


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
    document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><label class="col-md-2 control-label" for="prependedtext">Acionamentos<h11>*</h11></label><div class="col-md-2"><div class="input-group"><input id="acionamento" name="acionamento'+ controleCampo + '" placeholder="Tipo de acionamento" class="form-control" type="text" ></div></div><div class="col-md-2" style="margin-left: -50px"><div class="input-group"><input id="prependedtext" name="datah'+ controleCampo + '" class="form-control" type="datetime-local" ></div></div> <div class="col-md-1" style="margin-left: -55px"><div class="input-group"><input id="prependedtext" name="nome'+ controleCampo + '" class="form-control" placeholder="Nome" type="text" ></div></div>  <div class="col-md-2" style="margin-left: -20px"><div class="input-group"> <input id="prependedtext" name="contato'+ controleCampo + '" class="form-control" placeholder="Contato" type="text"></div></div><div class="col-md-2" style="margin-left: -50px"> <div class="input-group"><input id="local" name="local'+ controleCampo + '" class="form-control" placeholder="Local" type="text"></div>  </div><div class="col-md-2" style="margin-left: -55px"> <div class="input-group"><input id="descricao" name="descricao'+ controleCampo + '" class="form-control" placeholder="Descrição do acionamento" type="text"></div>  </div><input type="hidden" name="id' + controleCampo + '" id="id' + controleCampo + '" /><button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
    document.getElementById("qnt_campo").value = controleCampo;
}

function removerCampo(idCampo){
    document.getElementById('campo' + idCampo).remove();
} 

</script>


    
</head>
<body>




        

<!-- top-header -->
                <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                     <ul>
                        <!--<li><a href="/profile">Minha Conta</a></li>-->
                        <li><a href="/ips" target="blank">Solicitar Ips</a></li>
                        <li><a href="/ips/solicitacoes" target="blank">Solicitações</a></li>
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
                            <li><a href=""><i class="fa fa-lock"></i> Criar Conta</a></li>
                            <?php } ?>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>



      
        <!-- /top-header -->
<form class="form-horizontal" action="" method="post" name="ips">
<fieldset>



   

    <div class="panel-body">


<div class="form-group">
    <div class="form-group">
  <label class="col-md-2 control-label" for="SM">Solicitação de SM <h11>*</h11></label>
  <div class="col-md-2">
    <input id="cep" name="NumSM" placeholder="Apenas números" class="form-control input-md" value="<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="search" required="" >
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
      <input id="cidade" name="nomeTransportador" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeTransportador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Seguradora <h11>*</h11></span>
      <select name="seguradora" id="cars" class="form-control" name="seguradora"> 

       <option value="<?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>  
        <?php $counter1=-1;  if( isset($seguradoras) && ( is_array($seguradoras) || $seguradoras instanceof Traversable ) && sizeof($seguradoras) ) foreach( $seguradoras as $key1 => $value1 ){ $counter1++; ?>
          <option value="<?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nomeSeguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
        <?php } ?>
  </select>
    </div>
    
  </div>

  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Gerente Responsável <h11>*</h11></span>

    <select id="gerente" class="form-control" name="gerenteResponsavel">
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
  <label class="col-md-2 control-label" for="encaminhamento">Acionar Seguradora </label>
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
      <input id="enc_instituicao"  name="Protocolo" class="form-control" placeholder=""  type="text" value="<?php echo htmlspecialchars( $address["Protocolo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
 <label class="col-md-2 control-label" for="radios">Iscas Posicionando</label>
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
      <span class="input-group-addon">Local Origem</span>
      <input id="rua" name="cidadeOrigem" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["cidadeOrigem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>


<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Local Destino</span>
      <input id="rua" name="cidadeDestino" class="form-control" placeholder="" readonly="readonly" type="text" value="<?php echo htmlspecialchars( $address["cidadeDestino"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Produtos</span>
      <input id="rua" name="Produtos" class="form-control" placeholder="" value="<?php echo htmlspecialchars( $address["Produtos"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="text">
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
      <input id="rua" name="dtComunicado" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["dtComunicado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="<?php echo htmlspecialchars( $address["dtComunicado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Nome do comunicante</span>
      <input id="rua" name="nomeComunicante" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["nomeComunicante"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
    </div>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Data e hora do sinistro</span>
      <input id="cidade" name="dtSinistro" class="form-control" placeholder=""  type="datetime-local" value="<?php echo htmlspecialchars( $address["dtSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Tipo de Sinistro</span>
      <select name="tipoSinistro" id="cars" class="form-control">  

       <option value="<?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option> 
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
      <input id="rua" name="localSinistro" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["localSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Km/Número</span>
      <input id="rua" name="Km" class="form-control" placeholder=""  type="text" value="<?php echo htmlspecialchars( $address["Km"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>  

<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Latitude</span>
      <input id="rua" name="latitude" class="form-control" placeholder="" type="text"
      value="<?php echo htmlspecialchars( $address["latitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>

  
<div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Longitude</span>
      <input id="rua" name="longitude" class="form-control" placeholder="" type="text" value="<?php echo htmlspecialchars( $address["longitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
  </div>
</div>

<hr></hr>

<div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos</label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="tipo_acionamento" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["tipo_acionamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -55px">
    <div class="input-group">
      <input id="prependedtext" name="nome" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -20px">
    <div class="input-group">
      <input id="prependedtext" name="contato" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
  </div>

  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="descricao" name="descricao" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>


 </div> 


 <div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos</label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento2" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah2" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -55px">
    <div class="input-group">
      <input id="prependedtext" name="nome2" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -20px">
    <div class="input-group">
      <input id="prependedtext" name="contato2" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local2" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
  </div>

  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="descricao" name="descricao2" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>


 </div> 



 <div class="form-group" id= "formulario">
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos</label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento3" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah3" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -55px">
    <div class="input-group">
      <input id="prependedtext" name="nome3" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -20px">
    <div class="input-group">
      <input id="prependedtext" name="contato3" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local3" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
  </div>
<div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="descricao"  class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao3"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="descricao3">
    </div>
  </div>

 </div> 



 <div class="form-group" id= "formulario" >
  <label class="col-md-2 control-label" for="prependedtext">Acionamentos</label>
  <div class="col-md-2">
    <div class="input-group">
      <input id="acionamento" name="acionamento4" placeholder="Tipo de acionamento" class="form-control" type="text" value="<?php echo htmlspecialchars( $address["acionamento4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
    </div>
  </div>

     <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="prependedtext" name="datah4" class="form-control" type="datetime-local" value="<?php echo htmlspecialchars( $address["datah4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div >
  </div>
  <div class="col-md-1" style="margin-left: -55px">
    <div class="input-group">
      <input id="prependedtext" name="nome4" class="form-control" placeholder="Nome" type="text" value="<?php echo htmlspecialchars( $address["nome4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>

  </div>

  <div class="col-md-2" style="margin-left: -20px">
    <div class="input-group">
      <input id="prependedtext" name="contato4" class="form-control" placeholder="Contato" type="text" value="<?php echo htmlspecialchars( $address["contato4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

   <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      
      <input id="local" name="local4" class="form-control" placeholder="Local" type="text" value="<?php echo htmlspecialchars( $address["local4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
  </div>
  <div class="col-md-2" style="margin-left: -50px">
    <div class="input-group">
      <input id="descricao" name="descricao4" class="form-control" placeholder="Descrição do Acionamento" type="text" value="<?php echo htmlspecialchars( $address["descricao4"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
  </div>

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

          
      <input type="radio" name="perdaBateria" id="bateria" value="Não"    <?php if( ($address["perdaBateria"])!='Sim' ){ ?>  checked <?php } ?> onclick="desabilita('tbateria')"  >
      Não
 
    

    </label> 
    
         <label class="radio-inline" for="radios-0">
      <input type="radio" name="perdaBateria" id="bateria" value="Sim" onclick="habilita('tbateria')"  <?php if( ($address["perdaBateria"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>

      </span>
      <input id="tbateria" name="dtAlertaBateria" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtAlertaBateria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Perda de Terminal</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Não" <?php if( ($address["perdaTerminal"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tterminal')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaTerminal" id="terminal" value="Sim" <?php if( ($address["perdaTerminal"])=='Sim' ){ ?> checked <?php } ?>  onclick="habilita('tterminal')">
      Sim
    </label>
      </span>
      <input id="tterminal" name="dtPerdaTerminal" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPerdaTerminal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <input type="radio" name="perdaSinal" id="sinal" value="Não" onclick="desabilita('tsinal')" <?php if( ($address["perdaSinal"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="perdaSinal" id="sinal" value="Sim" onclick="habilita('tsinal')"  <?php if( ($address["perdaSinal"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tsinal" name="dtPerdaSinal" class="form-control" type="datetime-local" placeholder="Data/hora"  disabled="false" value="<?php echo htmlspecialchars( $address["dtPerdaSinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Desvio de rota</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="desvioRota" id="rota" value="Não" onclick="desabilita('drota')" <?php if( ($address["desvioRota"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desvioRota" id="rota" value="Sim" onclick="habilita('drota')" <?php if( ($address["desvioRota"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="drota" name="dtDesvioRota" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="true" value="<?php echo htmlspecialchars( $address["dtDesvioRota"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Botão de Pânico</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="btPanico" id="panico" value="Não" onclick="desabilita('tpanico')" <?php if( ($address["btPanico"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="btPanico" id="panico" value="Sim" onclick="habilita('tpanico')" <?php if( ($address["btPanico"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tpanico" name="dtBtPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtBtPanico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" >
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Porta Baú Traseira</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Não" <?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('ttraseira')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauTraseira" id="traseira" value="Sim" onclick="habilita('ttraseira')" <?php if( ($address["portaBauTraseira"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="ttraseira" name="dtPortaBauTraseira" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaBauTraseira"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Porta Baú Lateral</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaBauLateral" id="lateral" value="Não" onclick="desabilita('tlateral')" <?php if( ($address["portaBauLateral"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaBauLateral" id="lateral" value="Sim" onclick="habilita('tlateral')" <?php if( ($address["portaBauLateral"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tlateral" name="dtPortaBauLateral" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaBauLateral"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Arrombamento de baú</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="arrombamentoBau" id="bau" value="Não" onclick="desabilita('tbau')" <?php if( ($address["arrombamentoBau"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="arrombamentoBau" id="bau" value="Sim" onclick="habilita('tbau')" <?php if( ($address["arrombamentoBau"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tbau" name="dtArrombamentoBau" class="form-control" type="datetime-local"  placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtArrombamentoBau"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <input type="radio" name="desengateCarreta" id="desengate" value="Não" onclick="desabilita('tdesengate')" <?php if( ($address["desengateCarreta"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="desengateCarreta" id="desengate" value="Sim" onclick="habilita('tdesengate')" <?php if( ($address["desengateCarreta"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tdesengate" name="dtDesengateCarreta" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtDesengateCarreta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Senha de Pânico</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="senhaPanico" id="spanico" value="Não" <?php if( ($address["senhaPanico"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tspanico')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="senhaPanico" id="spanico" value="Sim" onclick="habilita('tspanico')" <?php if( ($address["senhaPanico"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tspanico" name="dtSenhaPanico" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtSenhaPanico"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
 </div>
 
 <!-- Text input-->

 <!-- Prepended text-->


<div class="form-group">
  <label class="col-md-2 control-label" for="encaminhamento">Porta Motorista </label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaMotorista" id="motorista" value="Não" onclick="desabilita('tmotorista')" <?php if( ($address["portaMotorista"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaMotorista" id="motorista" value="Sim" onclick="habilita('tmotorista')" <?php if( ($address["portaMotorista"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tmotorista" name="dtPortaMotorista" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaMotorista"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
   
   <label class="col-md-1 control-label" for="encaminhamento">Porta do Passageiro</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Não" <?php if( ($address["portaPassageiro"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tppassageiro')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="portaPassageiro" id="ppassageiro" value="Sim" onclick="habilita('tppassageiro')" <?php if( ($address["portaPassageiro"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tppassageiro" name="dtPortaPassageiro" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtPortaPassageiro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Não" onclick="desabilita('tignicao')" <?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?> checked <?php } ?>>
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="ignicaoDesligada" id="ignicao" value="Sim" onclick="habilita('tignicao')" <?php if( ($address["ignicaoDesligada"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tignicao" name="dtIgnicaoDesligada" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtIgnicaoDesligada"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
    </div>
    
  </div>
  
  
   <label class="col-md-1 control-label" for="encaminhamento">Violação de Painel</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="violacaoPainel" id="painel" value="Não" <?php if( ($address["violacaoPainel"])!='Sim' ){ ?> checked <?php } ?> onclick="desabilita('tpainel')">
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoPainel" id="painel" value="Sim" onclick="habilita('tpainel')" <?php if( ($address["violacaoPainel"])=='Sim' ){ ?> checked <?php } ?>>
      Sim
    </label>
      </span>
      <input id="tpainel" name="dtViolacaoPainel" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtViolacaoPainel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
      <input type="radio" name="violacaoGrade" id="grade" value="Não" onclick="desabilita('tgrade')" <?php if( ($address["violacaoGrade"])!='Sim' ){ ?> checked <?php } ?> >
      Não
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="violacaoGrade" id="grade" value="Sim" onclick="habilita('tgrade')" <?php if( ($address["violacaoGrade"])=='Sim' ){ ?> checked <?php } ?> >
      Sim
    </label>
      </span>
      <input id="tgrade" name="dtViolacaoGrade" class="form-control" type="datetime-local" placeholder="Data/hora" disabled="false" value="<?php echo htmlspecialchars( $address["dtViolacaoGrade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
      
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
        <?php echo htmlspecialchars( $address["Descritivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
      </textarea>
    </div>
  </div>
</div>
 
 

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Atualizar</button>
    
  </div>
</div>

</div>
</div>


</fieldset>
</form>

</body>

</html>