<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="invoice">

      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
        </div>
      </div>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
          
            <h2 class="page-header"><i class="fa fa-globe"></i> SM: #<?php echo htmlspecialchars( $address["NumSM"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
            <small class="pull-right"><img src="https://tomticket-assets.s3.amazonaws.com/logotipo-empresa/51702.png"></small>
          
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
            <td><?php echo formatDate($address["dataInicio"]); ?></td>
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
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Tipo de acionamento</th>
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
            <td><?php echo formatDate($value1["datah"]); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $address["contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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
                    
        </div>
      <div class="col-xs-4">
       

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:65%">Perda de Bateria:<?php if( ($address["perdaBateria"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaBateria"])=='Sim' ){ ?><?php echo formatDate($address["dtAlertaBateria"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="width:65%">Perda de Terminal:<?php if( ($address["perdaTerminal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaTerminal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaTerminal"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="width:65%">Perda de Sinal:<?php if( ($address["perdaSinal"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["perdaSinal"])=='Sim' ){ ?><?php echo formatDate($address["dtPerdaSinal"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="width:65%">Desvio de rota:<?php if( ($address["desvioRota"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["desvioRota"])=='Sim' ){ ?><?php echo formatDate($address["dtDesvioRota"]); ?> <?php } ?></td>
            </tr>

          </table>
        </div>


      </div>

       <div class="col-xs-4">
       

        <div class="table-responsive">
          <table class="table">
             <tr>
              <th style="width:70%">Botão de Pânico:<?php if( ($address["btPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["btPanico"])=='Sim' ){ ?><?php echo formatDate($address["dtBtPanico"]); ?> <?php } ?></td>
            </tr>

            <tr>
              <th style="width:65%">Porta Baú Traseira:<?php if( ($address["portaBauTraseira"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaBauTraseira"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauTraseira"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="width:65%">Porta Baú Lateral:<?php if( ($address["portaBauLateral"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaBauLateral"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaBauLateral"]); ?> <?php } ?></td>
            </tr>
            <tr>
               <th style="width:65%">Arrombamento de baú:<?php if( ($address["arrombamentoBau"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["arrombamentoBau"])=='Sim' ){ ?><?php echo formatDate($address["dtArrombamentoBau"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>


        
      </div>

       <div class="col-xs-4">
    

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:65%">Desengate de Carreta:<?php if( ($address["desengateCarreta"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["desengateCarreta"])=='Sim' ){ ?><?php echo formatDate($address["dtDesengateCarreta"]); ?> <?php } ?></td>
            </tr>
            <tr>
              <th style="width:65%">Senha de Pânico:<?php if( ($address["senhaPanico"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["senhaPanico"])=='Sim' ){ ?><?php echo formatDate($address["dtSenhaPanico"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th style="width:70%">Porta Motorista:<?php if( ($address["portaMotorista"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaMotorista"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaMotorista"]); ?> <?php } ?></td>
            </tr>
            <tr>
             <th style="width:70%">Porta Passageiro:<?php if( ($address["portaPassageiro"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["portaPassageiro"])=='Sim' ){ ?><?php echo formatDate($address["dtPortaPassageiro"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>

        
      </div>

    </div>
     <div class="row">

       <div class="col-xs-4">
       

        <div class="table-responsive">
          <table class="table">
             <tr>
              <th style="width:70%">Ignição Desligada:<?php if( ($address["ignicaoDesligada"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["ignicaoDesligada"])=='Sim' ){ ?><?php echo formatDate($address["dtIgnicaoDesligada"]); ?> <?php } ?></td>
            </tr>

            <tr>
              <th style="width:65%">Violação de Painel:<?php if( ($address["violacaoPainel"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["violacaoPainel"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoPainel"]); ?> <?php } ?></td>
            </tr>
            
            <tr>
               <th style="width:65%">Violação de Grade:<?php if( ($address["violacaoGrade"])!='Sim' ){ ?> Não <?php }else{ ?> Sim<?php } ?></th>
              <td> <?php if( ($address["violacaoGrade"])=='Sim' ){ ?><?php echo formatDate($address["dtViolacaoGrade"]); ?> <?php } ?></td>
            </tr>
          </table>
        </div>


        
      </div>
      <!-- accepted payments column -->
      <div class="col-xs-8">
        <p class="lead">Descrição:</p>
       
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
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
