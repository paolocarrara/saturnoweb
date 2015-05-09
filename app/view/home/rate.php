<?php
	session_start ();
?>
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

	<div class="container" style="width: 80%; margin: 0em auto">

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

		<?php
			if (isset ($_SESSION['loggedin']) and $_SESSION['loggedin'] == true) {
			}
			else {
				header ('location: ?url=home/signin');
			}
		?>

		<div class="jumbotron">
			<form action="<?php echo $data['action']?>" method="<?php echo $data['method']?>"> <!-- Fazer funcionar em qualquer navegador!!!-->
				<table class="table table-hover">
				<caption><?php echo $data['professorName']; ?></caption>
				<thead>
					<tr>
						<th></th>

						<th><label 
						for="<?php echo $data['generalRangeInputId']; ?>"
						style="float: left;"><?php echo $data['generalText']; ?>
						</label></th>

						<th><label
						for="<?php echo $data['knowledgeRangeInputId']; ?>"
						style="float: left"><?php echo $data['knowledgeText']; ?>
						</label></th>

						<th><label
						for="<?php echo $data['didacticismRangeInputId']; ?>"
						style="float: left"><?php echo $data['didacticismText']; ?>
						</label></th>

						<th><label
						for="<?php echo $data['clarityRangeInputId']; ?>"
						style="float: left"><?php echo $data['clarityText']; ?>
						</label></th>

						<th><label
						for="<?php echo $data['difficultyRangeInputId']; ?>"
						style="float: left"><?php echo $data['difficultyText']; ?>
						</label></th>

						<th><label
						for="<?php echo $data['speechRangeInputId']; ?>"
						style="float: left"><?php echo $data['speechText']; ?>
						</label></th>
					</tr>
				<thead>

				<tr>
					<td>Outros usuários</td>
					<td><?php echo $data['professorGeneralRating']; ?></td>
					<td><?php echo $data['professorKnowledgeRating']; ?></td>
					<td><?php echo $data['professorDidacticismRating']; ?></td>
					<td><?php echo $data['professorClarityRating']; ?></td>
					<td><?php echo $data['professorDifficultyRating']; ?></td>
					<td><?php echo $data['professorSpeechRating']; ?></td>
				</tr>

				<tr>
					<td>Você</td>
					<td><output for="<?php echo $data['generalRangeInputId']; ?>" id="generalOutput">2.5</output></td>
					<td><output for="<?php echo $data['knowledgeRangeInputId']; ?>" id="knowledgeOutput">2.5</output></td>
					<td><output for="<?php echo $data['didacticismRangeInputId']; ?>" id="didacticismOutput">2.5</output></td>
					<td><output for="<?php echo $data['clarityRangeInputId']; ?>" id="clarityOutput">2.5</output></td>
					<td><output for="<?php echo $data['difficultyRangeInputId']; ?>" id="difficultyOutput">2.5</output></td>
					<td><output for="<?php echo $data['speechRangeInputId']; ?>" id="speechOutput">2.5</output></td>
				</tr>

				<tr>
					<td></td>

					<td><input type="range"
					id="<?php echo $data['generalRangeInputId']; ?>"
					name="<?php echo $data['generalRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5" 
					value="2.5" 
					step="0.1" 
					class="verticalSlider"
					orient="vertical">
					</input></td>

					<td><input type="range"
					id="<?php echo $data['knowledgeRangeInputId']; ?>"
					name="<?php echo $data['knowledgeRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5"
					value="2.5"
					step="0.1"
					class="verticalSlider"
					orient="vertical">
					</input></td>

					<td><input type="range"
					id="<?php echo $data['didacticismRangeInputId']; ?>"
					name="<?php echo $data['didacticismRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5"
					value="2.5"
					step="0.1"
					class="verticalSlider"
					orient="vertical">
					</input></td>

					<td><input type="range"
					id="<?php echo $data['clarityRangeInputId']; ?>"
					name="<?php echo $data['clarityRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5"
					value="2.5"
					step="0.1"
					class="verticalSlider"
					orient="vertical">
					</input></td>

					<td><input type="range"
					id="<?php echo $data['difficultyRangeInputId']; ?>"
					name="<?php echo $data['difficultyRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5"
					value="2.5"
					step="0.1"
					class="verticalSlider"
					orient="vertical">
					</input></td>

					<td><input type="range"
					id="<?php echo $data['speechRangeInputId']; ?>"
					name="<?php echo $data['speechRangeInputId']; ?>"
					oninput="updateRangeOutput (value, id)"
					min="0" max="5"
					value="2.5"
					step="0.1"
					class="verticalSlider"
					orient="vertical">
					</input></td>
				</tr>
				</table>
				<input type="hidden" name="professorId" value="<?php echo $data['professorId']; ?>">
				<input type="submit" name="<?php echo $data['submit']?>" value="Enviar avaliação!" class="btn btn-success">
			</form>
			<a href="<?php echo $data['back']; ?>" class="btn btn-warning"><?php echo $data['backText']; ?></a>
		</div>
	</body>

	<script>
	function updateRangeOutput (rate, id) {

		switch (id) {
			case "<?php echo $data['generalRangeInputId']; ?>":
				document.querySelector('#generalOutput').value = rate;
				break;
			case "<?php echo $data['knowledgeRangeInputId']; ?>":
				document.querySelector('#knowledgeOutput').value = rate;
				break;
			case "<?php echo $data['didacticismRangeInputId']; ?>":
				document.querySelector('#didacticismOutput').value = rate;
				break;
			case "<?php echo $data['clarityRangeInputId']; ?>":
				document.querySelector('#clarityOutput').value = rate;
				break;
			case "<?php echo $data['difficultyRangeInputId']; ?>":
				document.querySelector('#difficultyOutput').value = rate;
				break;
			case "<?php echo $data['speechRangeInputId']; ?>":
				document.querySelector('#speechOutput').value = rate;
				break;
		}
	}
	</script>

</html>
