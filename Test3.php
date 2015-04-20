<html>
<body>

<?php
function __autoload($class_name) {
    include $class_name . '.php';
}
?>

<?php
	$num = $_POST('totalClasses');
 		for($i = 1; $i <= $num; $i++){ ?>
			<p>Whatever your text</p>
		<?php}?>
</body>
</html>