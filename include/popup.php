<!DOCTYPE html>

<style>
.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
     zoom:1; /* hasLayout ie7 trigger */
}

.nav-tabs, .nav-pills {
    text-align:center;
}
        </style>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" align="left">
	<div class="modal-content">
	    <br>
	    <div class="bs-example bs-example-tabs">
		<ul id="myTab" class="nav nav-tabs">
		    <li class="active"><a href="#signin" data-toggle="tab"><h2 class="intro-text"><b>SIGN-IN</b></h2></a></li>
		    <li class=""><a href="#register" data-toggle="tab"><h2 class="intro-text"><b>REGISTER</b></h2></a></li>
		</ul>
	    </div>
	    <div class="modal-body">
		<div id="myTabContent" class="tab-content">
		    <div class="tab-pane fade active in" id="signin">

			<!-- Sign In Form -->
			<!-- Text input-->
			<div class="panel-body">
                            <form action="form-handlers/login-submit.php" role="form" method="post">
				<div class="form-group row">
				    <p class="col-sm-5"><b>Email Address:</b></p>
				    <div class="col-sm-7">
					<input type="email" class="form-control" id="email" name="email">
				    </div>
				</div>

				<!-- Password input-->
				<div class="form-group row">
				    <p class="col-sm-5"><b>Password:</b></p>
				    <div class="col-sm-7">
					<input type="password" class="form-control" id="password" name="password">
				    </div>
				</div>

<?php /*
				<p>Forgot your password? <a href="reset-password-form.php">Click here to reset it.</a></p>
*/ ?>

				<!-- Button -->
				<div class="control-group">
				    <label class="control-label" for="signin"></label>
				    <div class="controls">
					<button id="signin" name="signin" class="btn btn-success pull-right">SIGN-IN</button>
				    </div>
				</div>
			    </form>
			</div>

		    </div>
		    <div class="tab-pane fade" id="register">

			<!-- Sign Up Form -->
			<!-- Text input-->
			<div class="panel-body">
			    <p><font color="blue"><i>You must be registered to adopt or to find a home for a pet.</i></font></p>
			    <p>Give a pet a new home!</p>
			    </font>
			    <form action="form-handlers/save-user.php" role="form" method="post" enctype="multipart/form-data">
				<div class="form-group row">
				    <p class="col-sm-5"><b>Email Address:</b></p>
				    <div class="col-sm-7">
					<input type="email" class="form-control" id="email" name="email">
				    </div>
				</div>
				<div class="form-group row">
				    <p class="col-sm-5"><b>Display Name:</b></p>
				    <div class="col-sm-7">
					<input type="text" class="form-control" id="displayName" name="displayName">
				    </div>
				</div>
				<div class="form-group row">
				    <p class="col-sm-5"><b>Password:</b></p>
				    <div class="col-sm-7">
					<input type="password" class="form-control" id="password" name="password">
				    </div>
				</div>
				<div class="form-group row">
				    <p class="col-sm-5"><b>Confirm Password:</b></p>
				    <div class="col-sm-7">
					<input type="password" class="form-control" id="password2" name="password2">
				    </div>
				</div>
				<div class="checkbox">
				    <label>
					<input type="checkbox">I agree to the PAWS 
					<a href="#">Terms of Service</a> and 
					<a href="privacy.php">Privacy Policy</a>
				    </label>
				</div>
				<button type="submit" class="btn btn-success pull-right">REGISTER</button>
			    </form>
			</div>

		    </div>
		</div>
	    </div>
	    <div class="modal-footer">
		<center>
		    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</center>
	    </div>
	</div>
    </div>
</div>
