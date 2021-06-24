<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body>

	<!--PHP Section -->
	<?php

	//Define Folder
	define("filepath", "dt.txt");

//Value Initializing
$convertion = $value = "";
$valueError = "";
$flag = false;


//Post method checking
if ($_SERVER['REQUEST_METHOD']==="POST") {
	
	//Validation
	if (empty($_POST['value'])) {
		
		$valueError = "Field can't be empty";
		$flag = true;
	}

	// If validation successfull
	if(!$flag)
	{

		$convertion = input_data($_POST['convertion']);
		if(is_numeric($_POST['value']))
		{
			$value = $_POST['value'];
		}
		else
		{
			$valueError = "Please Enter numeric number";
		}

	}
}

 function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }

  //File Write Logic 
   function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

	?>




	<!--Page name -->

	<h3 style="color: red;">Page 1 [Home]</h3>

	<!--Linking Page -->

	<?php include 'conversionSite.php'; ?>

	<h3 style="color: red;">Converter : </h3>

	<!--Form Starting -->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<!--Category Selection -->
	<select name="convertion" id="covertion">

		<?php
		$fileData = read();
		$users = json_decode($fileData);
		foreach ($users as $user) {
			echo "<option value='$user->converType'>$user->converType </option>" ;
		}

		?>
		
	</select><br><br>

<!--converting input taking -->
	<label for="value">Value :</label>
	<input type="text" name="value" placeholder="Enter numeric number">
	<span style="color: red;">
		
		<?php

		echo $valueError;

		?>

	</span><br><br>

	<!-- Submit Button -->
	<input type="submit" name="submit"value="Submit"><br><br>
	<!-- Result Printing area -->

	<?php 

	$result = "";
	$fileData = read();
		$users = json_decode($fileData);
		foreach ($users as $user) {
			 
			 if($user->converType === $convertion )
			 {
			 	$result = $value * $user->rate;
			 }
		}


	 ?>

		
	</form>
	<?php

	if(isset($_POST['submit'])){
		echo "Result : <input type='text' value='$result' readonly";
	}
	?>
<?php
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



</body>
</html>