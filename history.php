<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>History Page</title>
</head>
<body>

		<h3 style="color: red;">Page 3 [History]</h3>
<h3 style="color: red;">Conversion site</h3>


<span style="color: blue;">1.</span>
<a href="home.php" style="color: blue;">Home</a>

<span style="color: blue;">2.</span>
<a href="conversion_rate.php" style="color: blue;">Conversion Rate</a>

<span style="color: blue;">3.</span>
<a href="history.php" style="color: blue;">History</a>

<h3 style="color: red;">Convertion History : </h3>

<textarea name="history" rows="10" cols="30">
	<?php
$myfile = fopen("data.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data.txt"));
fclose($myfile);

	?>
</textarea>

</body>
</html>