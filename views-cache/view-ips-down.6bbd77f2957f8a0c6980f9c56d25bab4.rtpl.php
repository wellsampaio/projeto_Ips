<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Solicitação de Ips <?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/res/admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


    <!-- Header Navbar: style can be found in header.less -->
   
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="margin: 0;">
    <!-- Content Header (Page header) -->
    <section class="invoice" >

      <div class="row no-print">
        <div class="col-xs-12">
          <a onclick="gerarPDF()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
        </div>
      </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
          
            <h2 class="page-header"><i class="fa fa-globe"></i> SM: #<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
            <small class="pull-right"><img src="https://tomticket-assets.s3.amazonaws.com/logotipo-empresa/51702.png" width="100" height="40"></small>
          
        </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12">
          Dados do Cliente:
          <address>
            <strong>Embarcador: </strong><?php echo htmlspecialchars( $address["nomeEmbarcador"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Transportador: </strong><?php echo htmlspecialchars( $address["nomeTransportador"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Gerente Responsável: </strong><?php echo htmlspecialchars( $address["gerenteResponsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </address>
        </div>
      </div>
 <div class="row invoice-info">
      <!-- /.col -->
     <div class="col-sm-3 invoice-col">
          Dados Seguradora:
          <address>
            <strong>Seguradora: </strong><?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Acionamento: </strong><?php if( ($address["acionar"])!='Sim' ){ ?> Não <?php }else{ ?> Sim <?php } ?><br>
            <strong>Contato: </strong><?php echo htmlspecialchars( $address["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Protocolo: </strong><?php echo htmlspecialchars( $address["Protocolo"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </address>
        </div>

         <div class="col-sm-3 invoice-col">
          Tecnologia Rastreamento:
          <address>
            <strong>Nome: </strong><?php echo htmlspecialchars( $address["vtec_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Terminal: </strong><?php echo htmlspecialchars( $address["term_numero_terminal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Isca: </strong><?php echo htmlspecialchars( $address["isca"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
             <strong>Isca Pocisionando </strong><?php if( ($address["iscaPosicionando"])!='Não' ){ ?> Sim <?php }else{ ?> Não<?php } ?><br>
            
            </address>
        </div>

         <div class="col-sm-3 invoice-col">
          Dados do Veiculo:
          <address>
            <strong>Placa: </strong><?php echo htmlspecialchars( $address["placa"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Marca: </strong><?php echo htmlspecialchars( $address["marca"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Modelo: </strong><?php echo htmlspecialchars( $address["modelo"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Cor: </strong><?php echo htmlspecialchars( $address["cor"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </address>
        </div>

      <!-- /.col -->
    </div>

   

    <!-- Table row -->
    <div class="row">
            <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Motorista</th>
            <th>Cpf</th>
            <th>Vinculo</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo htmlspecialchars( $address["Motorista"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["Vinculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
   
       <div class="col-xs-12 table-responsive">
        <p class="lead"><b>Dados da viagem:</b></p> 
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Dt Inicio SM</th>
            <th>Vinculo</th>
            <th>Valor</th>
            <th>Local Origem</th>
            <th>Local Destino</th>
            <th>Produtos</th>

          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="width: 130px"><?php echo formatDate($address["dataInicio"]); ?></td>
            <td><?php echo htmlspecialchars( $address["Vinculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["Valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["cidadeOrigem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["cidadeDestino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["Produtos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
   
       <div class="col-xs-12 table-responsive">
        <p class="lead"><b>Dados do Sinistro:</b></p> 

        <table class="table table-striped">
          <thead>
          <tr>
            <th>Dt/hr comunicado</th>
            <th>Comunicante</th>
            <th>Dt/hora sinistro</th>
            <th>Tipo Sinistro</th>
          

          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo formatDate($address["dtComunicado"]); ?></td>
             <td><?php echo htmlspecialchars( $address["nomeComunicante"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo formatDate($address["dtSinistro"]); ?></td>
            <td><?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

     <div class="row">
   
       <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Local do sinistro</th>
            <th>Km/Número</th>
            <th>Latitude</th>
            <th>Longitude</th>
          

          </tr>
          </thead>
          <tbody>
          <tr>
            <td><?php echo htmlspecialchars( $address["localSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
             <td><?php echo htmlspecialchars( $address["Km"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["latitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["longitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

     <div class="row">
       <div class="col-xs-12 table-responsive">
         <p class="lead"><b>Acionamentos:</b></p>      
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Acionamento</th>
            <th>Data</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Local</th>
            <th>Descrição Acionamento</th>

          </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($acionamento) && ( is_array($acionamento) || $acionamento instanceof Traversable ) && sizeof($acionamento) ) foreach( $acionamento as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["tipo_acionamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="width: 130px"><?php if( ($value1["datah"])!='' ){ ?><?php echo formatDate($value1["datah"]); ?><?php } ?></td>
            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="width: 130px"><?php echo htmlspecialchars( $address["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["local"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

          </tr>
          <?php } ?>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>


    <!-- /.row -->

     <div class="row">
      <div class="col-xs-12">
              
        <p class="lead"><b>Alertas Gerados:</b></p>      
        </div>
      <div class="col-xs-4">
       

        <div class="table table-striped">
          <table class="table table-striped">
            <tr>
              <th>Perda de Bateria:<?php if( ($address["perdaBateria"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaBateria"])=='Sim' ){ ?><?php echo formatDate($address["dtAlertaBateria"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th>Perda de Terminal:<?php if( ($address["perdaTerminal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaTerminal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaTerminal"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th>Perda de Sinal:<?php if( ($address["perdaSinal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaSinal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaSinal"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th>Desvio de rota:<?php if( ($address["desvioRota"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["desvioRota"])=='Sim' ){ ?><?php echo formatDate($address["dtDesvioRota"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="width:70%;">Ignição Desligada:<?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["ignicaoDesligada"])=='Sim' ){ ?><?php echo formatDate($address["dtIgnicaoDesligada"]); ?> <?php } ?></td>
            </tr>

          </table>
        </div>


      </div>

       <div class="col-xs-4">
       

        <div class="table-responsive">
          <table class="table table-striped">
             <tr>
              <th>Botão de Pânico:<?php if( ($address["btPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["btPanico"])=='Sim' ){ ?> <?php echo formatDate($address["dtBtPanico"]); ?> <?php } ?></td>
            </tr>

            <tr>
              <th>Porta Baú Traseira:<?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaBauTraseira"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauTraseira"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th>Porta Baú Lateral:<?php if( ($address["portaBauLateral"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaBauLateral"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauLateral"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th>Arrombamento de baú:<?php if( ($address["arrombamentoBau"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["arrombamentoBau"])=='Sim' ){ ?><?php echo formatDate($address["dtArrombamentoBau"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th>Violação de Painel:<?php if( ($address["violacaoPainel"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["violacaoPainel"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoPainel"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>


        
      </div>

       <div class="col-xs-4">
    

        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th>Desengate de Carreta:<?php if( ($address["desengateCarreta"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["desengateCarreta"])=='Sim' ){ ?><?php echo formatDate($address["dtDesengateCarreta"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th>Senha de Pânico:<?php if( ($address["senhaPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["senhaPanico"])=='Sim' ){ ?><?php echo formatDate($address["dtSenhaPanico"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th>Porta Motorista:<?php if( ($address["portaMotorista"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaMotorista"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaMotorista"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th>Porta Passageiro:<?php if( ($address["portaPassageiro"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaPassageiro"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaPassageiro"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th>Violação de Grade:<?php if( ($address["violacaoGrade"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["violacaoGrade"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoGrade"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>

        
      </div>

    </div>
     <div class="row">

      <!-- accepted payments column -->
      <div class="col-xs-12">
        <p class="lead"><b>Descrição:</b></p>
       
        <p class="well well-sm no-shadow" style="margin-top: 10px;">
         <?php echo htmlspecialchars( $address["Descritivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
        </p>
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section> 
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  
  <script src="/res/site/js/html2pdf.bundle.js"></script>

  <script>
        function gerarPDF() {
            // Selecione o conteúdo a ser convertido em PDF
            const content = document.querySelector('.invoice');

            // Use html2pdf para gerar o PDF
            html2pdf(content, {
                margin: 0,
                filename: 'documento_a3.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'cm', format: 'a3', orientation: 'portrait' },
            });
        }
    </script>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/res/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/res/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/res/admin/dist/js/demo.js"></script>
</body>
</html>
