<?php if(!class_exists('Rain\Tpl')){exit;}?>
<link rel="icon" type="image/png" href="/res/site/images/logo2.fw.png" />
        <link href="/res/site/css2/bootstrap.css" rel='stylesheet' type='text/css'/>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/res/site/js2/jquery.min.js"></script>

        <link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" href="/res/site/css/bootstrap.min.css">
         <!-- Custom Theme files -->

        <link rel="stylesheet" href="/res/site/css/style.css">
         <!-- Custom Theme files -->
         <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="ISO-8859-1">
         <!-- top-header -->
        <div class="top-header">
            <div class="container">
                <div class="top-header-left">
                     <ul>
                        <!--<li><a href="/profile">Minha Conta</a></li>-->
                        <li><a href="/ips" target="blank" >Solicitar IPS</a></li>
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
                            <li><a href="" style="color: #08cc9e"><i class="fa fa-user"></i> <b><?php echo getUserName(); ?></b></a></li>
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

<div class="single-product-area" style="background-color: #fff;">
    <h2 style="text-align: center; font-size: 50px;">Minha Conta</h2><br>
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3">
                <?php require $this->checkTemplate("profile-menu");?>
            </div>
            <div class="col-md-9">

                                <div class="cart-collaterals">
                    <h2 style="color: blue">Editar dados</h2>
                </div>
                <?php if( $profileMsg != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $profileMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                <?php if( $profileError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $profileError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>                
                <form method="post" action="/profile">
                    <div class="form-group">
                    <label for="desperson"><b>Nome e Sobrenome</b></label>
                    <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome aqui" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    <label for="desemail"><b>E-mail</b></label>
                    <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail aqui" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <div class="form-group">
                    <label for="nrphone"><b>Telefone</b></label>
                    <input type="tel" class="form-control" id="nrphone" name="nrphone" placeholder="Digite o telefone aqui" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: blue">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>