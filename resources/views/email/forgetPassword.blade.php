

<html>
<head></head>
<body>

<style type="text/css">
	@media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }

	.container { background-color: rgb(52, 55, 56) !important; }

	p { font-family: 'Avenir', Helvetica, sans-serif; font-size:18px; text-align: left; }
	img { width:100%; height:auto; }
	a { text-decoration: none; }

	.header { background:#231f20; }
    .header img { width: 212px; height: 100px; margin: 4%; }
	.content { padding: 2% 6%; color: rgb(171, 175, 182) !important; }
	.footer { background:#231f20; height: 150px; padding:4%; color: white; }
	.footer p { font-size: .8rem; text-align: center; }
</style>

<div class="container" style="background-color: rgb(52, 55, 56) !important;">
	<div class="header" style="background:#231f20;">
		<a href="{{ config('app.url') }}" style="text-decoration: none;">
			<center><img src="{{ asset('/assets/images/logo-img2.jpg')}}" alt="Fact:Sources Logo" style="width: 212px; height: 100px; margin: 4%;"></center>
		</a> 
	</div>
	<br><br>
	<p class="content" style="font-family: 'Avenir', Helvetica, sans-serif; font-size:18px; text-align: left; padding: 2% 6%; color: rgb(171, 175, 182) !important;">
        <h1>¿Olvido su contraseña?</h1>
  Inicialize su cuenta haciendo click en el siguiente enlace.
        <a href="{{ route('reset.password.get', $token) }}">Reset Password</a>
	</p>
	<br><br>
	<div class="footer" style="background:#231f20; height: 150px; padding:4%; color: white;">
		<p style="font-family: 'Avenir', Helvetica, sans-serif; font-size: .8rem; text-align: center;">
			&copy; {{ date('Y') }} Factoring:Sources Argentina. @lang('mails.derechosreservados')
			<br>
			
		</p>
	</div>
</div>

</body>
</html>
