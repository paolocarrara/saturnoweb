<?php
	session_start ();
?>

<html>
	<head>
		<title>Bem vindo!</title>
		<meta charset='utf-8'>
	</head>


	<body>
		<p>
			<?php 
				if ( isset ($_SESSION['loggedin']) and ($_SESSION['loggedin'] == true) ) {
					echo 'Bem vindo '.$_SESSION['email'];
					echo '<a href='."$data[signout]>".'Sair</a>';
				}
				else {
					echo 'Registre-se para avaliar os professores! <br>';
					echo '<a href='.$data['signup']>.'Registrar</a> / ';
					echo '<a href='.$data['signin']>.'Entrar</a>';
				}
			?>
		</p>

		<table>
			<tr>
				<th><?php echo $data['professorTableHeader']; ?></th>
				<th><?php echo $data['gradesTableHeader']?></th>
			<tr>
			<?php
				$professors = $data['professorsList'];
				$professorsRatings = $data['professorsRatings'];

				foreach ($professors as $professor) {
					$professorRating = $professorsRatings[$professor['id']];
					echo '<tr>';
						echo '<td>';
							echo "$professor[name]<br>";
						echo '</td>';
						echo '<td>';
							echo '<ul>';
								echo "<li>Geral: $professorRating[general]</li>";
								echo "<li>Conhecimento: $professorRating[knowledge]</li>";
								echo "<li>Didática: $professorRating[didacticism]</li>";
								echo "<li>Clareza: $professorRating[clarity]</li>";
								echo "<li>Dificuldade: $professorRating[difficulty]</li>";
								echo "<li>Fala: $professorRating[speech]</li>";
							echo '</ul>';
						echo '</td>';
					echo '</tr>';
				}
			?>

		</table>

	</body>
</html>
