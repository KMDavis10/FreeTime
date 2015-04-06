<html>
<body>
<?php
function __autoload($class_name) {
    include $class_name . '.php';
}
?>
<form action="FileReader.php" method="post">
What is the name of your professor?:<input type="text" name="professors">
What is the name of your course?:<input type="text" name="course">
What is the level of your course?:<input type="text" name="level">
Is this course a major requirement?:<input type="text" name="requirement">
<input type="submit">
</form>
<?php 
	$file = new FileReader();
?>
</html>
</body>