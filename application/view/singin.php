<div class="container">
	<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == 'loginforblog') {
				?>
                <div class="alert alert-danger" role="alert">
                    Please login see the blog
                </div>
				<?php
			}
			if ($_GET['error'] == 'emptyfields') {
				?>
                <div class="alert alert-danger" role="alert">
                    Please insert your information
                </div>
				<?php
			}
			if ($_GET['error'] == 'wrongpassword') {
				?>
                <div class="alert alert-danger" role="alert">
                    your password or email was wrong
                </div>
				<?php
			}
		}
		if (isset($_GET['succescreate'])) {
			if ($_GET['succescreate'] == 'true') {
				?>
                <div class="alert alert-success" role="alert">
                    Your profile has been created
                </div>
				<?php
			}
		}
	?>
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form action="" method="post">
                        <div class="form-label-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                   name="mail" autofocus>
                        </div>
                        <div class="form-label-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                   name="password">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submitform">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>