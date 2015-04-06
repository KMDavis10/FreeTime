<!DOCTYPE html>
<html>
<body>

<h1>Free Time Calculator</h1>
<html>
<body>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<form action="welcome.php" method="post">
<input type="radio" name="clubs" value="0">Yes<br>
<input type="text" title="How many hours a week?" hidden name="clubHours" hidden>
<br>
<input type="radio" name="clubs" value="1" checked>No
<input type="submit">
</form>
<script>
$('input[name="clubs"]').on('change', function() {
$('input[name="clubHours"]').attr('hidden', false).focus();
$('input[title="How many hours a week?"]').attr('hidden', false).focus();
});
</script>
</body>
</html>
