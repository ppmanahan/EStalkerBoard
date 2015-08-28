<html>
<head>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Building Name</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($buildings as $building): ?>				
				<?php echo "<tr><td>"?>
				<?php echo $building['buildingName']; ?>
				<?php echo "</td></tr>"?>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>