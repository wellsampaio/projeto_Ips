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
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="invoice" style="margin: 0;">

      <div class="row no-print">
        <div class="col-xs-12">
          <a onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
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
            <strong style="font-size: 13px">Embarcador: </strong><?php echo htmlspecialchars( $address["nomeEmbarcador"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong style="font-size: 13px">Transportador: </strong><?php echo htmlspecialchars( $address["nomeTransportador"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong style="font-size: 13px">Gerente Responsável: </strong><?php echo htmlspecialchars( $address["gerenteResponsavel"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </address>
        </div>
      </div>
 <div class="row invoice-info">
      <!-- /.col -->
     <div class="col-sm-3 invoice-col">
          Dados Seguradora:
          <address style="font-size: 12px">
            <strong>Seguradora: </strong><?php echo htmlspecialchars( $address["seguradora"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Acionamento: </strong><?php if( ($address["acionar"])!='Sim' ){ ?> Não <?php }else{ ?> Sim <?php } ?><br>
            <strong>Contato: </strong><?php echo htmlspecialchars( $address["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Protocolo: </strong><?php echo htmlspecialchars( $address["Protocolo"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
          </address>
        </div>

         <div class="col-sm-3 invoice-col">
          Tecnologia Rastreamento:
          <address style="font-size: 12px">
            <strong>Nome: </strong><?php echo htmlspecialchars( $address["vtec_descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Terminal: </strong><?php echo htmlspecialchars( $address["term_numero_terminal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
            <strong>Isca: </strong><?php echo htmlspecialchars( $address["isca"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
             <strong>Isca Pocisionando </strong><?php if( ($address["iscaPosicionando"])!='Não' ){ ?> Sim <?php }else{ ?> Não<?php } ?><br>
            
            </address>
        </div>

         <div class="col-sm-3 invoice-col">
          Dados do Veiculo:
          <address style="font-size: 12px">
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
            <th style="font-size: 12px">Motorista</th>
            <th style="font-size: 12px">Cpf</th>
            <th style="font-size: 12px">Vinculo</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Motorista"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Vinculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
   
       <div class="col-xs-12 table-responsive">
        <p class="lead">Dados da viagem:</p> 
        <table class="table table-striped">
          <thead>
          <tr>
            <th style="font-size: 12px">Dt Inicio SM</th>
            <th style="font-size: 12px">Vinculo</th>
            <th style="font-size: 12px">Valor</th>
            <th style="font-size: 12px">Local Origem</th>
            <th style="font-size: 12px">Local Destino</th>
            <th style="font-size: 12px">Produtos</th>

          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="font-size: 12px; width: 130px"><?php echo formatDate($address["dataInicio"]); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Vinculo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["cidadeOrigem"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["cidadeDestino"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Produtos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
   
       <div class="col-xs-12 table-responsive">
        <p class="lead">Dados do Sinistro:</p> 

        <table class="table table-striped">
          <thead>
          <tr>
            <th style="font-size: 12px">Dt/hr comunicado</th>
            <th style="font-size: 12px">Comunicante</th>
            <th style="font-size: 12px">Dt/hora sinistro</th>
            <th style="font-size: 12px">Tipo Sinistro</th>
          

          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="font-size: 12px"><?php echo formatDate($address["dtComunicado"]); ?></td>
             <td style="font-size: 12px"><?php echo htmlspecialchars( $address["nomeComunicante"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo formatDate($address["dtSinistro"]); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["tipoSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
            <th style="font-size: 12px">Local do sinistro</th>
            <th style="font-size: 12px">Km/Número</th>
            <th style="font-size: 12px">Latitude</th>
            <th style="font-size: 12px">Longitude</th>
          

          </tr>
          </thead>
          <tbody>
          <tr>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["localSinistro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
             <td style="font-size: 12px"><?php echo htmlspecialchars( $address["Km"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["latitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["longitude"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

     <div class="row">
       <div class="col-xs-12 table-responsive">
         <p class="lead">Acionamentos:</p>      
        <table class="table table-striped">
          <thead>
          <tr>
            <th style="font-size: 12px">Acionamento</th>
            <th style="font-size: 12px">Data</th>
            <th style="font-size: 12px">Nome</th>
            <th style="font-size: 12px">Contato</th>
            <th style="font-size: 12px">Local</th>
            <th style="font-size: 12px">Descrição Acionamento</th>

          </tr>
          </thead>
          <tbody>
            <?php $counter1=-1;  if( isset($acionamento) && ( is_array($acionamento) || $acionamento instanceof Traversable ) && sizeof($acionamento) ) foreach( $acionamento as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["tipo_acionamento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px; width: 130px"><?php if( ($value1["datah"])!='' ){ ?><?php echo formatDate($value1["datah"]); ?><?php } ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px; width: 130px"><?php echo htmlspecialchars( $address["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["local"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td style="font-size: 12px"><?php echo htmlspecialchars( $address["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

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
              
        <p class="lead">Alertas Gerados:</p>      
        </div>
      <div class="col-xs-4">
       

        <div class="table table-striped">
          <table class="table table-striped">
            <tr>
              <th style="font-size:12px;">Perda de Bateria:<?php if( ($address["perdaBateria"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px; "> <?php if( ($address["perdaBateria"])=='Sim' ){ ?><?php echo formatDate($address["dtAlertaBateria"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="font-size:12px">Perda de Terminal:<?php if( ($address["perdaTerminal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["perdaTerminal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaTerminal"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="font-size:12px">Perda de Sinal:<?php if( ($address["perdaSinal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["perdaSinal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaSinal"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="font-size:12px">Desvio de rota:<?php if( ($address["desvioRota"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["desvioRota"])=='Sim' ){ ?><?php echo formatDate($address["dtDesvioRota"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="width:70%; font-size: 12px">Ignição Desligada:<?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["ignicaoDesligada"])=='Sim' ){ ?><?php echo formatDate($address["dtIgnicaoDesligada"]); ?> <?php } ?></td>
            </tr>

          </table>
        </div>


      </div>

       <div class="col-xs-4">
       

        <div class="table-responsive">
          <table class="table table-striped">
             <tr>
              <th style="font-size: 12px">Botão de Pânico:<?php if( ($address["btPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["btPanico"])=='Sim' ){ ?> <?php echo formatDate($address["dtBtPanico"]); ?> <?php } ?></td>
            </tr>

            <tr>
              <th style="font-size:12px">Porta Baú Traseira:<?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["portaBauTraseira"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauTraseira"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="font-size:12px">Porta Baú Lateral:<?php if( ($address["portaBauLateral"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["portaBauLateral"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauLateral"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="font-size:12px">Arrombamento de baú:<?php if( ($address["arrombamentoBau"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["arrombamentoBau"])=='Sim' ){ ?><?php echo formatDate($address["dtArrombamentoBau"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="font-size:12px">Violação de Painel:<?php if( ($address["violacaoPainel"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["violacaoPainel"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoPainel"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>


        
      </div>

       <div class="col-xs-4">
    

        <div class="table-responsive">
          <table class="table table-striped">
            <tr>
              <th style="font-size:12px">Desengate de Carreta:<?php if( ($address["desengateCarreta"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["desengateCarreta"])=='Sim' ){ ?><?php echo formatDate($address["dtDesengateCarreta"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="font-size:12px">Senha de Pânico:<?php if( ($address["senhaPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["senhaPanico"])=='Sim' ){ ?><?php echo formatDate($address["dtSenhaPanico"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th style="font-size: 12px">Porta Motorista:<?php if( ($address["portaMotorista"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["portaMotorista"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaMotorista"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th style="font-size: 12px">Porta Passageiro:<?php if( ($address["portaPassageiro"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["portaPassageiro"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaPassageiro"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="font-size:12px">Violação de Grade:<?php if( ($address["violacaoGrade"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td style="font-size:12px"> <?php if( ($address["violacaoGrade"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoGrade"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>

        
      </div>

    </div>
     <div class="row">

      <!-- accepted payments column -->
      <div class="col-xs-12">
        <p class="lead">Descrição:</p>
       
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
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
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
