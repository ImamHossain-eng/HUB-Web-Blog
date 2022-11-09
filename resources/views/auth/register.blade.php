<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>Registration Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form action="{{ route('register') }}" method="POST" class="login100-form validate-form">
                    @csrf()
					<span class="login100-form-title p-b-40">
						Register
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter name: John Doe">
						<input class="input100" type="text" name="name" placeholder="Full Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password again">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="Password Confirmation">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="flex-col-c p-t-224">
						<span class="txt2 p-b-10">
							Already have an account?
						</span>

						<a href="/login" class="txt3 bo1 hov1">
							Sign in now
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
</body>

</html>