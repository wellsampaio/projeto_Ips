<?php if(!class_exists('Rain\Tpl')){exit;}?>	<div class="content">
	<div class="main">
	   <div class="container">
		  <div class="register">
		  	  <form action="/checkout" method="post" name="checkout"> 
				 <div class="register-top-grid">

				 	

									<?php if( $error != '' ){ ?>
									
										<h3 style="text-align: center; color: red"><?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
									
									<?php } ?>
									
					<h3>Endereço de Entrega</h3>
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span>Cep<label>*</label></span>
						<input type="text" value="<?php echo htmlspecialchars( $cart["deszipcode"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="00000-000" id="billing_cep_1" name="zipcode" class="input-text"> 
						<br><br>
						<input type="submit" value="Buscar Endereço" id="place_order" formaction="/checkout" formmethod="get">
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Endereço<label>*</label></span>
						<input type="text" value="<?php echo htmlspecialchars( $address["desaddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Logradouro, número e bairro" id="billing_address_1" name="desaddress" class="input-text"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Número<label>*</label></span>
						<input type="text" value="<?php echo htmlspecialchars( $address["desnumber"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Número" id="billing_address_1" name="desnumber" class="input-text ">
					 </div>
					  <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Complemento</span>
						<input type="text" value="<?php echo htmlspecialchars( $address["descomplement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Complemento (opcional)" id="billing_address_2" name="descomplement" class="input-text ">
					 </div>
					  <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Bairro<label>*</label></span>
						<input type="text" value="<?php echo htmlspecialchars( $address["desdistrict"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_district" name="desdistrict" class="input-text ">
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Cidade<label>*</label></span>
						<input type="text" value="<?php echo htmlspecialchars( $address["descity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_city" name="descity" class="input-text ">
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>Estado<label>*</label></span>
						<input type="text" id="billing_state" name="desstate" placeholder="Estado" value="<?php echo htmlspecialchars( $address["desstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
					 </div>
					  <div class="wow fadeInRight" data-wow-delay="0.4s">
						<span>País<label>*</label></span>
						<input type="text" id="billing_state" name="descountry" placeholder="País" value="<?php echo htmlspecialchars( $address["descountry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Data de Entrega<label>* </label> <label style="color: red; font-size: 9px"> *Obs: Data Retroativa não será aceita e só será aceita data posterior a 5 dias </label></span>
						 <input type="date" id="billing_state" name="desdelivery" placeholder="Data de entrega" value="<?php echo htmlspecialchars( $address["desdelivery"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-date"> 
					 </div>
					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Confirmar Data de Entrega<label>*</label></span>
						 <input type="date" id="billing_state" name="desconf_delivery" placeholder="Data de entrega" value="<?php echo htmlspecialchars( $address["desdelivery"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-date"> 
					 </div>


					
				

				<h3 id="order_review_heading" style="margin-top:30px;">Detalhes do Pedido</h3>
										<div id="order_review" style="position: relative;">
											<table class="shop_table">
												<thead>
													<tr>
														<th class="product-name">Produto</th>
														<th class="product-total">Total</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
													<tr class="cart_item">
														<td class="product-name">
															<?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <strong class="product-quantity">× <?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong> 
														</td>
														<td class="product-total">
															<span class="amount">R$<?php echo formatPrice($value1["vltotal"]); ?></span>
														</td>
                                                    </tr>
                                                    <?php } ?>
												</tbody>
												<tfoot>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td><span class="amount">R$<?php echo formatPrice($cart["vlsubtotal"]); ?></span>
														</td>
													</tr>
													<tr class="shipping">
														<th>Frete</th>
														<td>
															Frete Grátis
															<input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
														</td>
													</tr>
													<tr class="order-total">
														<th>Total do Pedido</th>
														<td><strong><span class="amount">R$<?php echo formatPrice($cart["vltotal"]); ?></span></strong> </td>
													</tr>
												</tfoot>


											</table>
											


											 
				  
					  <input type="submit" data-value="Place order" value="Continuar" id="place_order" name="woocommerce_checkout_place_order">


					   
				   
						
					 
				    
				</form>
				
		   </div>
	     </div>
	    </div>
		</div>
	
