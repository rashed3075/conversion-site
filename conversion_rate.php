<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Convertion Settings</title>
</head>
<body>

	<?php

	define("filepath", "data.txt");

$convertion_type = $unit = $rate = "";


$convertion_type_error=$unitError=$rateError="";

$successfulMessage = $errorMessage = "";

$flag=true;

if ($_SERVER["REQUEST_METHOD"]==="POST") {

	if(empty($_POST['converterType']))
	{
		$convertion_type_error="Field can't be empty";
		$flag = false;
	}

	if(empty($_POST['unit']))
	{
		$unitError="Field can't be empty";
		$flag = false;
	}

	if(empty($_POST['rate']))
	{
		$rateError="Field can't be empty";
		$flag = false;
	}

	if (!$flag) {
		

		$convertion_type = input_data($_POST['converterType']);

		$unit = input_data($_POST['unit']);

		$rate = input_data($_POST['rate']);

		$data = array("converterType" => $convertion_type , "unit" => $unit , "rate" =>$rate);
		$date_encode = json_encode($data);
		$res = write($date_encode);
		if($res){

			$successfulMessage = "Data saved successfuly";
		}
		else{
			 $errorMessage = "Data cant be saved";
		}

	}


	
}

 function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }

  function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}

?>

	<h3 style="color: red;">Page 2 [Convertion Rate]</h3>
<h3 style="color: red;">Conversion site</h3>


<span style="color: blue;">1.</span>
<a href="home.php" style="color: blue;">Home</a>

<span style="color: blue;">2.</span>
<a href="conversion_rate.php" style="color: blue;">Conversion Rate</a>

<span style="color: blue;">3.</span>
<a href="history.php" style="color: blue;">History</a>

<h3 style="color: red;">Convertion Rate : </h3>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

	<input type="text" name="converterType" placeholder="ft to inch" >
<span style="color: red;"><?php echo $convertion_type_error; ?></span>

<input type="text" name="unit" placeholder="Unit" >
<span style="color: red;"><?php echo $unitError; ?>


<input type="text" name="rate" placeholder="Rate" >
<span style="color: red;"><?php echo $rateError; ?></span><br><br>

<input type="submit" name="submit">

</form><br>
<span style="color: green;"><?php echo $successfulMessage; ?></span>

<span style="color: red;"><?php echo $errorMessage; ?></span>

</body>
</html>