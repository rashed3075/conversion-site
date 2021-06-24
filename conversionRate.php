<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Conversion Rate</title>
</head>
<body>

	<?php
	//Value Initializing
	$conversionType = $unit = $rate = "";
	$convertionError = $unitError = $rateError = "";
	$flag = false;
	$successfull = $error = "";

	//define file name
	define("filepath", "dt.txt");

	//Post method checking
	if($_SERVER['REQUEST_METHOD']==="POST")
	{

		//Validating--

		if(empty($_POST['conversionType']))
		{
			$convertionError = "Field cant be empty";
			$flag = true;
		}
		if (empty($_POST['unit'])) {
			$unitError = "Field can't be empty";
			$flag= true;
		}
		if(empty($_POST['rate']))
		{
			$rateError = "Field can't be empty";
			$flag = true;
		}

		// if validation successfully
		if(!$flag)
		{
			$conversionType = input_data($_POST['conversionType']);

			//Numeric value checking
			if(is_numeric($_POST['unit']))
			{
				$unit = input_data($_POST['unit']);
			}
			else
			{
				$unitError = "Please enter numeric value";
			}

			if(is_numeric($_POST['rate']))
			{
				$rate = input_data($_POST['rate']);
			}
			else
			{
				$rateError = "Please enter numeric value";
			}

 $fileData = read(); 
 if(empty($fileData))
  {
   $data[] = array("converType" => $conversionType, "unit" => $unit,"rate" => $rate); 
 } 
 else { 
 	$data = json_decode($fileData);
  array_push($data, array("converType" => $conversionType, "unit" => $unit,"rate" => $rate));
   } 
  $data_encode = json_encode($data); 
  write(""); 
  $res = write($data_encode);

			//Checking Writing Successful or not

			if ($res) {
				
				$successfull = "Saved Successfully";
			}
			else{
				$error = "Can't save it";
			}


		}

	}

	//Input Formate
function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }


  //File writing
  function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

	?>

	<!--Page Name -->
	<h3 style="color: red;">Page 3 [Conversion Rate]</h3>

	<!-- link include -->
	<?php
	include 'conversionSite.php';
	?>

	<h3 style="color: red;">Conversion Rate : </h3>

	<!-- Form Start -->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST">

		<!--Conversion Type -->
		<input type="text" name="conversionType" placeholder="ft to inch">
		<span style="color: red;"> <?php echo $convertionError; ?>  </span>

		<!--Unit intput taking -->
		<input type="text" name="unit" placeholder="Unit" value="1" readonly>
		<span style="color: red;"> <?php echo $unitError; ?>  </span>

		<!--Rate -->
		<input type="text" name="rate" placeholder="Rate">
		<span style="color: red;"><?php echo $rateError; ?>  </span><br><br>
		
		<!--Submit Button -->
		<input type="submit" name="submit" style="color: orange ;" value="submit"><br><br>
	</form>

	<!--Form Writing Successfull or not printing -->
	<span style="color: green;"> <?php echo $successfull; ?> </span>
	<span style="color: red;"><?php echo $error; ?></span>

	<?php
	function read() {
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