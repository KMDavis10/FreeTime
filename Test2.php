<html>
<body>
<?php
function __autoload($class_name) {
    include $class_name . '.php';
}
?>
<form action="welcome.php" method="post">
What is the name of your first professor?:<input type="text" name="professor1"><br>
What is the name of your first course?:<input type="text" name="course1"><br>
What is the level of your first course?:<input type="text" name="level1"><br>
Is the first course a major requirement?:<input type="text" name="requirement1"><br>
What is the name of your second professor?:<input type="text" name="professor2"><br>
What is the name of your second course?:<input type="text" name="course2"><br>
What is the level of your second course?:<input type="text" name="level2"><br>
Is the second course a major requirement?:<input type="text" name="requirement2"><br>
What is the name of your third professor?:<input type="text" name="professor3"><br>
What is the name of your third course?:<input type="text" name="course3"><br>
What is the level of your third course?:<input type="text" name="level3"><br>
Is the third course a major requirement?:<input type="text" name="requirement3"><br>
What is the name of your fourth professor?:<input type="text" name="professor4"><br>
What is the name of your fourth course?:<input type="text" name="course4"><br>
What is the level of your fourth course?:<input type="text" name="level4"><br>
Is the fourth course a major requirement?:<input type="text" name="requirement4"><br>
<input type="submit">
</form>
</html>
</body>
