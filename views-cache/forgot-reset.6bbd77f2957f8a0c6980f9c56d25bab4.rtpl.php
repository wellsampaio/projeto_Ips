<?php if(!class_exists('Rain\Tpl')){exit;}?>
<link href="/res/site/css2/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="/res/site/css/style.css">
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-12">
                <form id="login-form-wrap" class="login" method="post" action="/forgot/reset">
                    <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <h2>Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>, digite uma nova senha:</h2>
                    <p class="form-row form-row-first">
                        <label for="password">Nova senha <span class="required">*</span>
                        </label>
                        <input type="password" id="password" name="password" class="input-text" style="width:350px">
                    </p>
                    <div class="clear"></div>
                    <p class="form-row">
                        <input type="submit" value="Enviar" name="login" class="button" style="background-color: blue">
                        
                    </p>

                    <div class="clear"></div>
                </form>                    
            </div>
        </div>
    </div>
</div>