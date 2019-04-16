<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Finmart - Login</title>
<link type="text/css" rel="stylesheet" href="<?php echo e(url('stylesheets/sidebar.css')); ?>">
	<link type="text/css" rel="stylesheet" href="<?php echo e(url('stylesheets/bootstrap.min.css')); ?>"> 
	<link type="text/css" rel="stylesheet" href="<?php echo e(url('stylesheets/style.css')); ?>">

	<link type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo e(url('javascripts/jquery.min.js')); ?>"></script>
	 <script type="text/javascript" src="<?php echo e(url('javascripts/bootstrap.min.js')); ?>"></script>
	 <script type="text/javascript" src="<?php echo e(url('javascripts/filter.js')); ?>"></script>
	 <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script type="text/javascript" src="<?php echo e(url('javascripts/bootstrap-datepicker.js')); ?>"></script>
	 <link href="<?php echo e(url('stylesheets/datepicker.css')); ?>" rel="stylesheet" type="text/css" />
</head>

<body class="bg">
	
	<div class="continer">
	</br></br></br></br>
	 <div class="col-md-4"></div>
		<div class="col-md-4">
		<div class="login">
			<div class="logo-bg"><img src="images/logo.png" class="img-responsive img-center"/></div>
			<div class="login-bdy">
			 <h2 class="text-center">SIGN IN</h2>
			 <br>
			 <h4 class="text-center" style="color: #fff;">To Login use your Registered Email-id and Password of Magic Finmart App.</h4>
			<form action="<?php echo e(url('admin-login')); ?>" method="post" >
				<?php echo e(csrf_field()); ?>

			   <div class="form-group">
			  <input type="text" name="email"  class="form-control input-cs" placeholder="Email"  />
			  <?php if($errors->has('email')): ?><label class="control-label" for="inputError"> <?php echo e($errors->first('email')); ?></label>  <?php endif; ?>
			  </div>
			  <div class="form-group">
			  <input type="password" name="password" class="form-control input-cs" placeholder="Password"  />
			   <?php if($errors->has('password')): ?> <label class="control-label" for="inputError"><?php echo e($errors->first('password')); ?> </label> <?php endif; ?>
			  </div>
			  <div class="form-group has-error">
                                <?php if(Session::has('msg')): ?> <label class="control-label" for="inputError"><?php echo e(Session::get('msg')); ?> </label><?php endif; ?>
               </div>

			  <input type="Submit" class="btn btn-default submit-btn" value="Submit"/>
			  <!--  <button type="button" class="btn btn-default submit-btn"  data-target="#pwdModal" data-toggle="modal" value=""/>Forget Password</button> -->
 			 <!--  <a href="forgot-password.php" class="forgot-pass pull-right">Forgot Password</a> -->
			</form>
			</div>			
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>




<!--modal-->
<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">What's My Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p>If you have forgotten your password you can reset it here.</p>

                          <form method="post" action="<?php echo e(url('forgot-password')); ?>">
                          <?php echo e(csrf_field()); ?>

                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address"  value="" name="email" type="email">
                                    </div>
                                    <input type="submit" class="btn btn-primary"  value="Send My Password">
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>



















	
</body>
</html>
