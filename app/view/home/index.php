<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/stylesheet.css" rel="stylesheet">
		<title>Bem vindo!</title>
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
						echo '<li><a href='.$data['signup'].'>'.$data['signupText'].'</a></li>';
						echo '<li><a href='.$data['signin'].'>'.$data['signinText'].'</a></li>';
					}
				?>
				</ul>
			</div>
		</nav>

		<table class="table table-hover">
			<thead>
				<tr>
					<th><?php echo $data['professorTableHeader']; ?></th>
					<th class='centralizedTdContent'><?php echo $data['gradesTableHeader']; ?></th>
					<th class='centralizedTdContent'><?php echo $data['studentEvaluationTableHeader']; ?></th>
				<tr>
			</thead>
			<?php
				$professors = $data['professorsList'];
				$professorsRatings = $data['professorsRatings'];
				$professorsRated = $data['professorsRated'];
				$professorsTotalRatings = $data['professorsTotalRatings'];

				foreach ($professors as $professor) {
					$professorRating = $professorsRatings[$professor['id']];
					echo '<tr>';
						echo "<td class='centralizedTdContent'>";
							echo "$professor[name]<br>";
						echo '</td>';
						echo '<td>';
							echo '<ul>';
								echo "<li>Avaliações feitas: ".$professorsTotalRatings[$professor['id']]."</li>";
								echo "<li>$data[generalText]: $professorRating[general]</li>";
								echo "<li>$data[knowledgeText]: $professorRating[knowledge]</li>";
								echo "<li>$data[didacticismText]: $professorRating[didacticism]</li>";
								echo "<li>$data[clarityText]: $professorRating[clarity]</li>";
								echo "<li>$data[difficultyText]: $professorRating[difficulty]</li>";
								echo "<li>$data[speechText]: $professorRating[speech]</li>";
							echo '</ul>';
						echo '</td>';
						echo "<td class='centralizedTdContent'>";
							if (isset ($_SESSION['loggedin']) and $_SESSION['loggedin'] == true) {
								if (isset($professorsRated[$professor['id']])) {
									echo '<p>Você já avaliou esse professor,<br> próximo!</p>';
								}
								else {
									echo '<p>'.$data['notRatedText'].'</p><br>';
									echo '<a href="'.$data['rateLink'].'/'.$professor['id'].'">'.$data['rateText'].'</a>';
								}
							}
							else {
								echo 'Você precisa estar logado para avaliar os professores.';
							}
						echo '</td>';
					echo '</tr>';
				}
			?>

		</table>

		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function updateGeneralRangeOutput (grade) {
			document.querySelector ('#generalRangeOutput').value = grade;
		}
	</script>
	</body>
</html>
