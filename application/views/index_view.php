<script src="<?=base_url()?>public/js/bootstrap-table.js"></script>
<script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>public/js/jquery-form.js"></script>
<script src="<?=base_url()?>public/js/jquery-ui.js"></script>
<script src="<?=base_url()?>public/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>public/js/jquery.dataTables.js" type="text/javascript" charset="utf8" ></script>
<script src="<?=base_url()?>public/js/jquery.dataTables.min.js" type="text/javascript" charset="utf8" ></script>

<link rel="stylesheet" href="<?=base_url()?>public/css/flat-ui.css"	/>
<link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css"	/>
<link rel="stylesheet" href="<?=base_url()?>public/css/flat-ui.min.css"	/>
<link rel="stylesheet" href="<?=base_url()?>public/css/demo.css"	/>
<link rel="stylesheet" href="<?=base_url()?>public/css/style.css"	/>
<link rel="shortcut icon" href="<?=base_url()?>public/img/logoimg.ico"	/>


<script src="<?=base_url()?>public/js/jquery.js"></script>
<script src="<?=base_url()?>public/js/flat-ui.min.js"></script>
<script src="<?=base_url()?>public/js/application.js"></script>

<style type="text/css">
html, body{
	background-image: url('<?=base_url()?>/public/img/bg.png');
}
</style>
</head>

<body>


<div id="index" class="container" style="width:970px !important;">
<div class="row" style="padding-top: 90px;">
<!-- WELCOME DIV -->
<div class="col-xs-8">
  <div class="parWrap">
    <h2>Welcome!</h2>
    <div class="login-icon">
      <img src="<?=base_url()?>public/img/logo.png" width="89%" height="150"/>
    </div>
    <h6><br /><br /><br /><br /><br /><br />Electricity and Water Consumption Database of the University of the Philippines Diliman.</h6>
  </div>  <!--parWrap -->
</div><!-- col-xs-8 -->
<!-- WELCOME DIV -->


<!-- LOG-IN DIV -->
<div class="col-xs-4">
<div id="logincon">
<div class="login-form"><h3>LOG-IN<br></h3>
<?php echo form_open('index/login'); ?>

	<div class="form-group">
    	<input required="required" type="text" class="form-control login-field" value="" placeholder="Username" name="username" id="username" />
    	<label class="login-field-icon fui-user" for="username"></label>    	
    </div> <!-- form-group -->    
    <div class="form-group">
    	<input required="required" type="password" class="form-control login-field" value="" placeholder="Password" name="password" id="password" />
    	<label class="login-field-icon fui-lock" for="password"></label>
    </div> <!-- form-group -->
    
    <input required="required" type="submit" class="btn btn-info btn-lg btn-block" value="Log in" name="login" id="login" />
    <?="<p class='login-link' style='color: red'>" . $errorMessage . "</p>"?>
</form>

<a class="login-link" href="#forgotPasswordModal" data-toggle="modal">Forgot your password?</a>	
</div> <!-- login-form -->
</div> <!-- loginicon -->
</div>  <!-- .col-xs-4 -->
<!-- LOG-IN DIV -->

</div> <!-- row demo samples -->

<!-- FORGOT PASSWORD MODAL -->
<div class="modal fade bs-example-modal-sm" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
<div class="modal-content">

  <div class="modal-header modal-header-info">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Forgot Password?</h4>
  </div> <!-- modal-header -->
  
  <div class="modal-body">
  <p>Email Address:</p>
  
    <?php echo form_open('index/forgotPassword'); ?>
    <div class="form-group">
    <div class="col-md-12 input-group">
      <span class="input-group-addon">@</span>
      <input required="required" type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
    </div> <!-- end of col-md-->       
    </div> <!-- form-group -->    
  </div><!-- modal-body -->
  
  <div class="modal-footer">
    <input required="required" type="submit" class="btn btn-info pull-right" value="Send to email" name="fPSubmit" id="fPSubmit" />                                      
  </div><!-- modal-footer -->
  </form>


</div><!-- modal-Content -->
</div><!-- modal-dialog -->
</div><!-- modal -->
<!-- FORGOT PASSWORD MODAL -->
 
<div class = "push"></div>
</div> <!-- end of container div -->