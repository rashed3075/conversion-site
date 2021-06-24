<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>History Page</title>
</head>
<body>

	<!--Page Name -->
	<h3 style="color: red;">Page 3 [History]</h3>

	<!--link include -->
	<?php include 'conversionSite.php'; ?>

	<h3 style="color: red;">Conversion History : </h3>

	<!--History -->
	<fieldset>
		<?php
		//define file name
		define("filepath", "dt.txt");

		$fileData = read(); 
		$users=json_decode($fileData);
		//create list to read data
		echo "<ol>";
//read all Data 1 by 1
 if(isset($users)){
foreach($users as $user) 
			{ 
				echo "<li>" . "Convertion type : " .$user->converType."&nbsp;&nbsp;&nbsp;&nbsp;". "Unit :" . $user->unit . "&nbsp;&nbsp;&nbsp;&nbsp;". "Rate :" . $user->rate . "</li>";
			 }
 }
		

		echo "</ol>";

		//read function login applying
		function read() 
{
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}


		?>
	</fieldset>

		
		


</body>
</html>