<html>
<head>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Submeter Name</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($submeters as $submeter): ?>				
				<?php echo "<tr><td>"?>
				<?php echo $submeter['submeterName']; ?>
				<?php echo "</td></tr>"?>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>