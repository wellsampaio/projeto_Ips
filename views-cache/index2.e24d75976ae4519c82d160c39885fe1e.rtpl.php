<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="/res/site/images/logo2.fw.png" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Casa de Dona Brasilina</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/res/admin/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/res/admin/dist/img/avatar6.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo getUserName(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/res/admin/dist/img/avatar6.png" class="img-circle" alt="User Image">

                <p>
                  Usuario - <?php echo getUserName(); ?>
                  <small>Membro do admin</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
          
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
                
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/res/admin/dist/img/avatar6.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo getUserName(); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li> <a href="/admin"> <i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
        <li> <a href="/admin/graphic_orders"> <i class="fa fa-line-chart"></i><span>Graficos Pedidos</span></a></li>
        <li><a href="/admin/users"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
        <li><a href="/admin/administrators"><i class="fa fa-users"></i> <span>Funcionários</span></a></li>
        <li><a href="/admin/categories"><i class="fa fa-link"></i> <span>Categorias</span></a></li>
        <li><a href="/admin/products"><i class="fa fa-gift"></i> <span>Produtos</span></a></li>
        <li><a href="/admin/orders"><i class="fa fa-shopping-cart"></i> <span>Pedidos</span></a></li>
        <li><a href="/admin/ordersstatuspago"><i class="fa fa-dollar"></i> <span>Pedidos Pagos</span></a></li>
         <li><a href="/admin/orders_aguardando_pag"><i class="fa fa-spinner"></i> <span>Pedidos Aguard Pagamento</span></a></li>
         <li><a href="/admin/orders_cancelados"><i class="fa fa-folder-open"></i> <span>Pedidos Cancelados</span></a></li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo htmlspecialchars( $quantProducts, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

              <p>Produtos Cadastrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-gift"></i>
            </div>
            <a href="/admin/products" class="small-box-footer">
              Ver Produtos <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo htmlspecialchars( $quantCategory, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="fa fa fa-link"></i>
            </div>
            <a href="/admin/categories" class="small-box-footer">
              Ver Categorias <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo htmlspecialchars( $quantOrders, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

              <p>Pedidos</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="/admin/orders" class="small-box-footer">
             Ver Pedidos <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <!-- /.col -->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo htmlspecialchars( $quantUsers, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

              <p>Usuários Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/users" class="small-box-footer">
              Ver Usuários <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Relatório de Vendas 2019</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Valor das Vendas: 1 Jan, 2019 - 31 Dez, 2019</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Quantidade de Pedidos Por Status</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Pedidos Pagos</span>
                    <span class="progress-number"><b><?php echo htmlspecialchars( $quantOrdersPago, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>/<?php echo htmlspecialchars( $quantOrders, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?php echo htmlspecialchars( $quantOrdersPago, ENT_COMPAT, 'UTF-8', FALSE ); ?>px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Pedidos Aguardando Pagamento</span>
                    <span class="progress-number"><b><?php echo htmlspecialchars( $quantOrdersAgPagamento, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>/<?php echo htmlspecialchars( $quantOrders, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-blue" style="width: <?php echo htmlspecialchars( $quantOrdersAgPagamento, ENT_COMPAT, 'UTF-8', FALSE ); ?>px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Pedidos Devolvidos </span>
                    <span class="progress-number"><b><?php echo htmlspecialchars( $quantOrdersEntregue, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>/<?php echo htmlspecialchars( $quantOrders, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: <?php echo htmlspecialchars( $quantOrdersEntregue, ENT_COMPAT, 'UTF-8', FALSE ); ?>px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <div class="progress-group">
                    <span class="progress-text">Pedidos Cancelados</span>
                    <span class="progress-number"><b><?php echo htmlspecialchars( $quantOrdersCancelados, ENT_COMPAT, 'UTF-8', FALSE ); ?></b>/<?php echo htmlspecialchars( $quantOrders, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?php echo htmlspecialchars( $quantOrdersCancelados, ENT_COMPAT, 'UTF-8', FALSE ); ?>px"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-usd"></i></span>
                    <h5 class="description-text"><b>VALOR DOS PEDIDOS PAGOS<b></h5>
                    <span class="description-header">R$ <?php echo formatPrice($somaVlTotalPago); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-blue"><i class="fa fa-usd"></i></span>
                    <h5 class="description-text"><b>VALOR DOS PEDIDOS AGUARDANDO PAGAMENTO</b></h5>
                    <span class="description-text">R$ <?php echo formatPrice($somaVlTotalAgPagamento); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-usd"></i></span>
                    <h5 class="description-text"><b>VALOR DOS PEDIDOS DEVOLVIDOS</b></h5>
                    <span class="description-text">R$ <?php echo formatPrice($somaVlTotalDevolvidos); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-usd"></i></span>
                    <h5 class="description-text"><b>VALOR DOS PEDIDOS CANCELADOS</b></h5>
                    <span class="description-text">R$ <?php echo formatPrice($somaVlTotalCancelados); ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
         
          <!-- /.box -->
          <div class="row">
            
            <!-- /.col -->

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuários Mais Recentes</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 Novos Usuários</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">

                    <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                    <li>
                      <img src="/res/admin/dist/img/1485477097-avatar_78580.png" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                      <span class="users-list-date">Data de Registro <?php echo formatDate($value1["dtregister"]); ?></span>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="/admin/users" class="uppercase">Ver todos os Usuários</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Clientes que mais Compraram</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Id User</th>
                    <th>Cliente</th>
                    <th>Total de pedidos</th>
                    <th>Valor Total dos pedidos</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($listClientsOrders) && ( is_array($listClientsOrders) || $listClientsOrders instanceof Traversable ) && sizeof($listClientsOrders) ) foreach( $listClientsOrders as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><a href=""><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                    <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><span class="label label-success"><?php echo htmlspecialchars( $value1["totaldepedidos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">R$ <?php echo formatPrice($value1["valortotal"]); ?></div>
                    </td>
                  </tr>
                  <?php }else{ ?>
                  <tr>
                      <td colspan="6">Nenhum pedido foi encontrado.</td>
                  </tr>
                  <?php } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!--<a href="/admin/ordersstatuspago" class="btn btn-sm btn-default btn-flat pull-right">Ver Todos Pedidos Pagos</a>-->
            </div>
            <!-- /.box-footer -->
          </div>

                    <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Últimos pedidos Pagos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Cliente</th>
                    <th>Status</th>
                    <th>Valor Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><a href="/admin/orders/<?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["idorder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></td>
                    <td><?php echo htmlspecialchars( $value1["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><span class="label label-success"><?php echo htmlspecialchars( $value1["desstatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">R$ <?php echo formatPrice($value1["vltotal"]); ?></div>
                    </td>
                  </tr>
                  <?php }else{ ?>
                  <tr>
                      <td colspan="6">Nenhum pedido foi encontrado.</td>
                  </tr>
                  <?php } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/admin/ordersstatuspago" class="btn btn-sm btn-default btn-flat pull-right">Ver Todos Pedidos Pagos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          
          <!-- /.info-box -->
          
          <!-- /.info-box -->
          
          <!-- /.info-box -->
          
          <!-- /.info-box -->

          
          <!-- /.box -->

           <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Os 10 Produtos Mais Vendidos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php $counter1=-1;  if( isset($listBestSellersTen) && ( is_array($listBestSellersTen) || $listBestSellersTen instanceof Traversable ) && sizeof($listBestSellersTen) ) foreach( $listBestSellersTen as $key1 => $value1 ){ $counter1++; ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      <span class="label label-warning pull-right">QTD <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span></a>
                        <span class="product-description">
                          <?php echo htmlspecialchars( $value1["vlfilling"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </span>
                  </div>
                </li>
                <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="/admin/products" class="uppercase">Ver todos os produtos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produtos adicionados recentemente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                      <span class="label label-warning pull-right">R$ <?php echo formatPrice($value1["vlprice"]); ?></span></a>
                        <span class="product-description">
                          <?php echo htmlspecialchars( $value1["vlfilling"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </span>
                  </div>
                </li>
                <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="/admin/products" class="uppercase">Ver todos os produtos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2018<a href="https://www.casadedonabrasilina.com.br"> Casa de Dona Brasilina</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  

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
<!-- Sparkline -->
<script src="/res/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/res/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/res/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/res/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/res/admin/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  $(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["Janeiro", "Fevereiro","Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    datasets: [
      {
        label: "Digital Goods",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [<?php echo htmlspecialchars( $totalPagoJan, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoFev, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoMar, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoAbril, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoMaio, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoJun, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoJul, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoAgo, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoSet, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoOut, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoNov, ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $totalPagoDez, ENT_COMPAT, 'UTF-8', FALSE ); ?>]
      }
    ]
  };

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: 700,
      color: "#f56954",
      highlight: "#f56954",
      label: "Chrome"
    },
    {
      value: 500,
      color: "#00a65a",
      highlight: "#00a65a",
      label: "IE"
    },
    {
      value: 400,
      color: "#f39c12",
      highlight: "#f39c12",
      label: "FireFox"
    },
    {
      value: 600,
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Safari"
    },
    {
      value: 300,
      color: "#3c8dbc",
      highlight: "#3c8dbc",
      label: "Opera"
    },
    {
      value: 100,
      color: "#d2d6de",
      highlight: "#d2d6de",
      label: "Navigator"
    }
  ];
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%> users"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  //-----------------
  //- END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(210, 214, 222, 1)',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      },
      hover: {
        "fill-opacity": 0.7,
        cursor: 'pointer'
      },
      selected: {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle: {
      initial: {
        fill: '#00a65a',
        stroke: '#111'
      }
    },
    markers: [
      {latLng: [41.90, 12.45], name: 'Vatican City'},
      {latLng: [43.73, 7.41], name: 'Monaco'},
      {latLng: [-0.52, 166.93], name: 'Nauru'},
      {latLng: [-8.51, 179.21], name: 'Tuvalu'},
      {latLng: [43.93, 12.46], name: 'San Marino'},
      {latLng: [47.14, 9.52], name: 'Liechtenstein'},
      {latLng: [7.11, 171.06], name: 'Marshall Islands'},
      {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
      {latLng: [3.2, 73.22], name: 'Maldives'},
      {latLng: [35.88, 14.5], name: 'Malta'},
      {latLng: [12.05, -61.75], name: 'Grenada'},
      {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
      {latLng: [13.16, -59.55], name: 'Barbados'},
      {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
      {latLng: [-4.61, 55.45], name: 'Seychelles'},
      {latLng: [7.35, 134.46], name: 'Palau'},
      {latLng: [42.5, 1.51], name: 'Andorra'},
      {latLng: [14.01, -60.98], name: 'Saint Lucia'},
      {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
      {latLng: [1.3, 103.8], name: 'Singapore'},
      {latLng: [1.46, 173.03], name: 'Kiribati'},
      {latLng: [-21.13, -175.2], name: 'Tonga'},
      {latLng: [15.3, -61.38], name: 'Dominica'},
      {latLng: [-20.2, 57.5], name: 'Mauritius'},
      {latLng: [26.02, 50.55], name: 'Bahrain'},
      {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
    ]
  });

  /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

  //-----------------
  //- SPARKLINE BAR -
  //-----------------
  $('.sparkbar').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type: 'bar',
      height: $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    });
  });

  //-----------------
  //- SPARKLINE PIE -
  //-----------------
  $('.sparkpie').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type: 'pie',
      height: $this.data('height') ? $this.data('height') : '90',
      sliceColors: $this.data('color')
    });
  });

  //------------------
  //- SPARKLINE LINE -
  //------------------
  $('.sparkline').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type: 'line',
      height: $this.data('height') ? $this.data('height') : '90',
      width: '100%',
      lineColor: $this.data('linecolor'),
      fillColor: $this.data('fillcolor'),
      spotColor: $this.data('spotcolor')
    });
  });
});


</script>
</body>
</html>
