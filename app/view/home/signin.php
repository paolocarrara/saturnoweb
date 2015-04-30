<html>

    <head>
        <title>Entrar</title>
        <meta charset='utf-8'>
    </head>

	<body>
        <form action="<?php echo $data['action']; ?>" method="<?php echo $data['method']; ?>" id="<?php echo $data['formName']; ?>">

            <label for="<?php echo $data['emailInputId']; ?>">Email</label>
            <input required autofocus
			type='email'
			id="<?php echo $data['emailInputId']; ?>"
			name="<?php echo $data['emailInputName']; ?>"
			tabindex='1'
			title='Insira seu email. Este campo é obrigatório.'
			size=30
			>
            
            <label for="<?php echo $data['passwordInputId']; ?>">Senha</label>
            <input required
			type='password'
			id="<?php echo $data['passwordInputId']; ?>"
			name="<?php echo $data['passwordInputName']; ?>"
			tabindex='2'
			title='Insira uma senha para o usuário cadastrado. Este campo é obrigatório.'
			size=30
			>

            <input type='submit' value='entrar' name="<?php echo $data['submit']; ?>">

        </form>

        <a href="<?php echo $data['back']; ?>">Voltar</a>

    </body>

</html>

