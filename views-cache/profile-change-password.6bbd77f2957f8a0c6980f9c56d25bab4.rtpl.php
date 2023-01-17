<?php if(!class_exists('Rain\Tpl')){exit;}?><link rel="icon" type="image/png" href="/res/site/images/logo2.fw.png" />
        <link href="/res/site/css2/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/res/site/js2/jquery.min.js"></script>

        <link href="/res/site/css3/style.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet" href="/res/site/css/bootstrap.min.css">
         <!-- Custom Theme files -->

        <link rel="stylesheet" href="/res/site/css/style.css">
         <!-- Custom Theme files -->
         <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="ISO-8859-1">

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
<div class="single-product-area">
     <h2 style="text-align: center; font-size: 50px;">Minha Conta</h2><br>
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3">
                <?php require $this->checkTemplate("profile-menu");?>
            </div>
            <div class="col-md-9">
                <div class="cart-collaterals">
                    <h2 style="color: blue">Alterar Senha</h2>
                </div>

                <?php if( $changePassError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $changePassError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <?php if( $changePassSuccess != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $changePassSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                
                <form action="/profile/change-password" method="post">
                    <div class="form-group">
                    <label for="current_pass">Senha Atual</label>
                    <input type="password" class="form-control" id="current_pass" name="current_pass">
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="new_pass">Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                    </div>
                    <div class="form-group">
                    <label for="new_pass_confirm">Confirme a Nova Senha</label>
                    <input type="password" class="form-control" id="new_pass_confirm" name="new_pass_confirm">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: blue">Salvar</button>
                </form>

            </div>
        </div>
    </div>
</div>