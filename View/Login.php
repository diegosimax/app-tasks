<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jestor Tasks</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=constant('APP_URL')?>View/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=constant('APP_URL')?>View/css/main.css">
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=constant('APP_URL')?>View/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=constant('APP_URL')?>View/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?=constant('APP_URL')?>View/js/main.js"></script>
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=constant('APP_URL')?>View/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" id="formLogin" name="formLogin">

					<div class="wrap-input100 validate-input" data-validate = "Digite seu e-mail">
						<input class="input100" type="text" name="email" placeholder="Seu E-mail">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite sua senha">
						<input class="input100" type="password" name="senha" placeholder="Sua Senha">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>						
					</div>

					<div id="mensagem"></div>

				</form>
			</div>
		</div>
	</div>
</body>
</html>

<script>
    
    $("#formLogin").submit(function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?=constant('APP_URL')?>Login/logarUsuario",
            data: form.serialize(),
            success: function(response)
            {
                if (response.success === false) {
					if (response.message) {
						$('#mensagem').html('Senha ou Usuário inválidos!');
					}
				} 

				if (response.success === true) {
					window.location.href = "<?=constant('APP_URL')?>task";
				}
            }
		});
		
    });

</script>