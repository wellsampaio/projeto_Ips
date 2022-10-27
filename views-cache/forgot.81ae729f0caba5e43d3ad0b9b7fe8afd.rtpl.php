<?php if(!class_exists('Rain\Tpl')){exit;}?>     <link href="/res/site/css2/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/res/site/js2/jquery.min.js"></script>

        <link rel="stylesheet" href="/res/site/css/bootstrap.min.css">
         <!-- Custom Theme files -->
        <link href="/res/site/css2/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="/res/site/css/style.css">
         <!-- Custom Theme files -->
         <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-12">
                <form id="login-form-wrap" class="login" method="post" action="/forgot">
                    <h2>Recuperar senha</h2>
                    <p class="form-row form-row-first">
                        <label for="email">E-mail <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="input-text" style="width:350px">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row">
                        <input type="submit" value="Enviar" style="background: #000;" name="login" class="button">
                        
                    </p>

                    <div class="clear"></div>
                </form>   
                
   <?php if( $error != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>                 
            </div>
        </div>
    </div>
</div>