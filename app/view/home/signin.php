<html>

	<head>
		<title>Entrar</title>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div id="container" style="width: 80%; margin: 0em auto">

		<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-brand">
				<?php echo $data['brandName']; ?>
			</div>
				<ul class="nav navbar-nav navbar-right">
				<?php echo '<li><a href='.$data['signup'].'>Registrar</a></li>'; ?>
				</ul>
			</div>
		</nav>


		<form action="<?php echo $data['action']; ?>" method="<?php echo $data['method']; ?>" id="<?php echo $data['formName']; ?>">

		<label
			for="<?php echo $data['emailInputId']; ?>"
			style="display:none"
		><?php echo $data['emailLabelText']; ?></label>

		<input required autofocus
			type='email'
			id="<?php echo $data['emailInputId']; ?>"
			style="width: 30%; margin:0 auto"
			class="form-control"
			name="<?php echo $data['emailInputName']; ?>"
			tabindex='1'
			placeholder="<?php echo $data['emailInputPlaceHolderText']; ?>"
			title="<?php echo $data['emailInputTitle']; ?>"
			size=30>
            
		<label
			for="<?php echo $data['passwordInputId']; ?>"
			style="display:none"
		>"<?php echo $data['passwordLabelText']; ?>"</label>

		<input required
			type='password'
			id="<?php echo $data['passwordInputId']; ?>"
			style="width: 30%; margin:0 auto"
			class="form-control"
			name="<?php echo $data['passwordInputName']; ?>"
			tabindex='2'
			placeholder="<?php echo $data['passwordInputPlaceHolderText']; ?>"
			title="<?php echo $data['passwordInputTitle']; ?>"
			size=30>

		<input 
			type='submit'
			value="<?php echo $data['submitValue']; ?>"
			name="<?php echo $data['submit']; ?>"
			class="btn btn-lg btn-primary btn-block"
			tabindex='3'
			style="width: 30%; margin:1em auto">

		</form>

		<a href="<?php echo $data['back']; ?>" class="btn btn-default" style="float: right">Voltar</a>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>

</html>

