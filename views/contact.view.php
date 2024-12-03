<?php include 'partials/inicio-doc.part.php';?>
<?php include 'partials/nav.part.php';?>

<!-- Principal Content Start -->
   <div id="contact">
   	  <div class="container">
   	    <div class="col-xs-12 col-sm-8 col-sm-push-2">
       	   <h1>CONTACT US</h1>
       	   <hr>
       	   <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
			  <div class="<?php echo (!empty($errores)) ? 'alert alert-danger' : ''; ?>">	
			<?php if(!empty($errores)){echo '<ul>';foreach($errores as $error){echo	'<li>'.($error).'</li>';}echo '</ul>';} ?>
			</div>
			
			<div class="<?php echo (!empty($noErrores)&& empty($errores)) ? 'alert alert-info' : ''; ?>">	
			<?php if(!empty($noErrores)&& empty($errores)){foreach($noErrores as $clave => $valor){echo $clave . '=' . $valor .'<br>';}}; ?>
		</div>
	       <form class="form-horizontal" method="post">
	       	  <div class="form-group">
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">First Name</label>
	       	  		<input class="form-control" type="text" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : '' ; ?>"> 
	       	  	</div>
	       	  	<div class="col-xs-6">
	       	  	    <label class="label-control">Last Name</label>
	       	  		<input class="form-control" type="text" name="apellido" value="<?php  echo isset($apellido) ? htmlspecialchars($apellido) : ''  ; ?>"> 
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Email</label>
	       	  		<input class="form-control" type="text" name="email" value="<?= $correo ?? '' ?>">	
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Subject</label>
	       	  		<input class="form-control" type="text" name="asunto" value="<?php echo isset($asunto) ? htmlspecialchars($asunto) : '' ; ?>"> 
	       	  	</div>
	       	  </div>
	       	  <div class="form-group">
	       	  	<div class="col-xs-12">
	       	  		<label class="label-control">Message</label>
	       	  		<textarea class="form-control" name="mensaje"><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : '' ; ?></textarea>
	       	  		<button class="pull-right btn btn-lg sr-button">SEND</button>
	       	  	</div>
	       	  </div>
	       </form>
	       <hr class="divider">
	       <div class="address">
	           <h3>GET IN TOUCH</h3>
	           <hr>
	           <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
		       <div class="ending text-center">
			        <ul class="list-inline social-buttons">
			            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
			            </li>
			            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
			            </li>
			        </ul>
				    <ul class="list-inline contact">
				       <li class="footer-number"><i class="fa fa-phone sr-icons"></i>  (00228)92229954 </li>
				       <li><i class="fa fa-envelope sr-icons"></i>  kouvenceslas93@gmail.com</li>
				    </ul>
				    <p>Photography Fanatic Template &copy; 2017</p>
		       </div>
	       </div>
	    </div>   
   	  </div>
   </div>
<!-- Principal Content Start -->

<?php include 'partials/fin-doc.part.php';?>