<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des Personnages</title>
</head>

<body>

	<h1>Liste des Personnages</h1>

	<table border="1">
		<tr>
			<th>Nom</th>
		</tr>
		<?php
		require_once('../../model/fighter.php');
		$fighterObj = new Personnage();
		$fighters = $fighterObj->listPersonnages();

		foreach ($fighters as $fighterItem) {
			echo "<tr>";
			echo "<td>{$fighterItem['name']}</td>";
			echo "<td><a href='javascript:void(0);' onclick='loadDetails({$fighterItem['id']})'>Voir les détails</a></td>";
			echo "</tr>";
		}
		?>
	</table>


	<div id="details-container">
		<!-- Les détails du personnage seront affichés ici -->
	</div>

	<script>
		function loadDetails(id) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var detailsForm = createForm(JSON.parse(this.responseText));
					detailsForm.setAttribute('data-id', id); // Add this line to set the id as a data attribute
					document.getElementById("details-container").innerHTML = detailsForm.outerHTML;
				}
			};
			xhttp.open("GET", "../../controllers/getPersonnage.controller.php?id=" + id, true);
			xhttp.send();
		}

		function createForm(personnage) {
			var form = document.createElement("form");
			form.id = "details-form";
			form.dataset.id = personnage.id;

			var tableHtml = "<table border='1'>";
			tableHtml += "<tr><th>ID</th><th>Nom</th><th>Attaque</th><th>Vie</th><th>Couleur</th></tr>";
			tableHtml += "<tr>";
			tableHtml += "<td>" + personnage.id + "</td>";
			tableHtml += "<td><input type='text' name='name' value='" + personnage.name + "'></td>";
			tableHtml += "<td><input type='number' name='atk' value='" + personnage.atk + "'></td>";
			tableHtml += "<td><input type='number' name='life' value='" + personnage.life + "'></td>";
			tableHtml += "<td><input type='text' name='color' value='" + personnage.color + "'></td>";
			tableHtml += "</tr>";
			tableHtml += "</table>";
			tableHtml += "<input type='submit' value='Enregistrer'>";

			form.innerHTML = tableHtml;

			return form;
		}


		document.addEventListener("submit", function(event) {

			event.preventDefault();

			var id = document.getElementById('details-form').getAttribute('data-id');


			var formData = new FormData(document.getElementById("details-form"));
			formData.append('id', id);

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {

					console.log(this.responseText);
				}
			};
			xhttp.open("POST", "../../controllers/updatePersonnage.controller.php", true);
			xhttp.send(formData);
		});
	</script>



</html>