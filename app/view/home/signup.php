<html>

    <head>
        <meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/stylesheet.css" rel="stylesheet">
        <title><?php echo $data['pageTitle']; ?></title>
    </head>

	<body>	
		<div id="container" style="width: 80%; margin: 0em auto">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-brand"><?php echo $data['brandName']; ?></div>
				<ul class="nav navbar-nav navbar-right">
				<?php 
					if ( isset ($_SESSION['loggedin']) and ($_SESSION['loggedin'] == true) ) {
						echo '<li><a>'.$_SESSION['email'].'</a></li>';
						echo '<li><a href='."$data[signout]>".$data['signoutText'].'</a></li>';
					}
					else {
						echo '<li><a href='.$data['signin'].'>'.$data['signinText'].'</a></li>';
					}
				?>
				</ul>
			</div>
		</nav>

        <form action="<?php echo $data['action']; ?>" method="<?php echo $data['method']; ?>" id="<?php echo $data['formName']; ?>">

			<label 
				for="<?php echo $data['emailInputId']; ?>"
				style="display:none"
			>Email</label>
            <input required autofocus
			type='email'
			id="<?php echo $data['emailInputId']; ?>"
			name="<?php echo $data['emailInputName']; ?>"
			style="width: 30%; margin:0 auto"
			class="form-control"
			tabindex='1'
			placeholder="<?php echo $data['emailInputPlaceHolderText']; ?>";
			title='Insira seu email. Este campo é obrigatório.'
			size=30
			>
            
			<label 
				for="<?php echo $data['passwordInputId']; ?>"
				style="display:none"
			>Senha</label>
            <input required
			type='password'
			id="<?php echo $data['passwordInputId']; ?>"
			name="<?php echo $data['passwordInputName']; ?>"
			style="width: 30%; margin:0 auto"
			class="form-control"
			tabindex='2'
			placeholder="<?php echo $data['passwordInputPlaceHolderText']; ?>";
			title='Insira uma senha para o seu cadastro. Este campo é obrigatório.'
			size=30
			>
            
            <label 
				for="<?php echo $data['passwordConfirmationInputId']; ?>"
				style="display:none"
			>Confirmação de senha</label>
            <input required
			type='password'
			id="<?php echo $data['passwordConfirmationInputId']; ?>"
			name="<?php echo $data['passwordConfirmationInputName']; ?>"
			style="width: 30%; margin:0 auto"
			class="form-control"
			tabindex='3'
			placeholder="<?php echo $data['passwordConfirmationInputPlaceHolderText']; ?>";
			title='Repita a senha inserida anteriormente. Este campo é obrigatório.'
			size=30
			>

            <input 
			type='submit'
			value="<?php echo $data['signupText']; ?>"
			name="<?php echo $data['submit']; ?>"
			style="width: 30%; margin:1em auto"
			class="btn btn-lg btn-primary btn-block"
			tabindex='3'>

        </form>
        <a href="<?php echo $data['back']; ?>" class="btn btn-default" style="float: right">Voltar</a>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

    </body>

</html>

