<html>
<?php
$table=$_GET['table'];
$rows=100;
?>

<head>
	<title>sample</title>
</head>

<body>
	<table>
		<tr>
			<th>Multiplicant</th>
			<th></th>
			<th>Multiplier</th>
			<th>Value</th>
		</tr>
		<?php
for ($i=0;$i<=$rows;$i++) {
    ?>
		<tr>
			<td>
				<?=$i?>
			</td>
			<td>x</td>
			<td>
				<?=$table?>
			</td>
			<td>
				<?=$table*$i?>
			</td>
		</tr>
		<?php
}
?>
	</table>
</body>

</html>