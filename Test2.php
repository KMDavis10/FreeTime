<html>
<body>
<?php
function __autoload($class_name) {
    include $class_name . '.php';
}
?>
<form action="welcome.php" method="post">
What is the name of your professor?:<input type="text" name="professors">
</form>
</html>
</body>