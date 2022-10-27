<?php if(!class_exists('Rain\Tpl')){exit;}?>
	<!---start-content----->
	<div class="details">
<div class="container">
<div class="row single">
<div class="col-md-9">
				  <div class="single_left">
				 
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-responsive"/>
									<img class="etalage_source_image" src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-responsive" title="" />
								</a>
							</li>
							
						</ul>
						 <div class="clearfix"></div>	
						 	
				  </div>
				  <div class="desc1 span_3_of_2">
				  	<br><br><br><br>
					<h3><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
					<p>R$ <?php echo formatPrice($product["vlprice"]); ?></p>
					
					<div class="det_nav1">
						<h4><?php echo htmlspecialchars( $product["vlfilling"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>

						<p class="prod-desc"></p>
							
							 <div class="clearfix"></div>
					</div>
					<form action="/cart/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="qtd" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Comprar</button>
                                </form>   
			   	 </div>

          	   </div>
          	    

		   	  </div>
	       </div>
	   
	</div>
	</div>
	</div>
	
