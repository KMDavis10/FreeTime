<html>
<body>

<?php

// Name: Kyle Davis
// Course: CSC 415
// Semester: Spring 2015
// Instructor: Dr. Pulimood 
// Project name: Free Time Calculator
// Description: An application designed to calculate how much free time a student has 
// Filename: Test2.php
// Description: Retrieves information from user in form data and sends to "welcome.php" 
// Last modified on: 4/21/15

function __autoload($class_name) {
    include $class_name . '.php';
}
?>
<body background="background.png">
<link rel="stylesheet" href="style.css">
<div id="header">
<h1>Free Time Calculator</h1>
</div>
<form action="welcome.php" method="post">
What is the name of your first professor?:<input type="text" name="professor1"><br>
What is the name of your first course?:<input type="text" name="course1"><br>
What is the level of your first course?:<input type="text" name="level1"><br>
Is the first course a major requirement?:<input type="text" name="requirement1"><br>
<br/>
What is the name of your second professor?:<input type="text" name="professor2"><br>
What is the name of your second course?:<input type="text" name="course2"><br>
What is the level of your second course?:<input type="text" name="level2"><br>
Is the second course a major requirement?:<input type="text" name="requirement2"><br>
<br/>
What is the name of your third professor?:<input type="text" name="professor3"><br>
What is the name of your third course?:<input type="text" name="course3"><br>
What is the level of your third course?:<input type="text" name="level3"><br>
Is the third course a major requirement?:<input type="text" name="requirement3"><br>
<br/>
What is the name of your fourth professor?:<input type="text" name="professor4"><br>
What is the name of your fourth course?:<input type="text" name="course4"><br>
What is the level of your fourth course?:<input type="text" name="level4"><br>		
Is the fourth course a major requirement?:<input type="text" name="requirement4"><br>
<br/>
Do you play sports?:<input type = "button" name = "yes1" value = "yes" onClick = "show1();">
<input type = "button" name = "no1" value = "no" onClick = "hidden1();"><br>
<input type="text" name="sportsHours" id="t1" placeholder="Enter total hours"><br>
<br/>
Do you have a job?:<input type = "button" name = "yes2" value = "yes" onClick = "show2();">
<input type = "button" name = "no2" value = "no" onClick = "hidden2();"><br>
<input type="text" name="jobHours" id="t2" placeholder="Enter total hours"><br>
<br/>
Do you have clubs?:<input type = "button" name = "yes3" value = "yes" onClick = "show3();">
<input type = "button" name = "no3" value = "no" onClick = "hidden3();"><br>
<input type="text" name="clubHours" id="t3" placeholder="Enter total hours"><br>
<div class="button">
<button type="submit">Calculate total hours</button>
</div>
</form>
<script type= "text/javascript">
function hidden1() {
	document.getElementById("t1").style.visibility='hidden';
}
function show1() {
	document.getElementById("t1").style.visibility='visible';
}

function hidden2() {
	document.getElementById("t2").style.visibility='hidden';
}
function show2() {
	document.getElementById("t2").style.visibility='visible';
}

function hidden3() {
	document.getElementById("t3").style.visibility='hidden';
}
function show3() {
	document.getElementById("t3").style.visibility='visible';
}

</script>
</body>
</html>

