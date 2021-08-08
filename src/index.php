<?php
//echo "Good Morning";

$mysqli = new mysqli("db","root","example","6470");
if($mysqli->connect_error){
	echo "Connection Error,create the database";
}


	if (isset($_POST['submit_login'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		//echo $uname."        ".$pass;

		//$sql_1="select * from 6470exerciseusers";
		//$result=$mysqli->query($sql_1);
		// if($result){
		// 	while ($data=$result->fetch_object()) {
		// 		echo $data->username;
		// 	}
		// }

		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\" and password=\"".$pass."\"";
		//echo $sql;
		$result = $mysqli->query($sql);
		//echo $result;
		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt>0) {
			echo $uname." has Logged In Successfully";
			
		}
		else{
			echo "Invalid Username or password , Try Again or SignUp";
		}

	}
	if (isset($_POST['submit_register'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$phone=$_POST['phone'];
		//echo $uname."        ".$pass;

		//$sql_1="select * from 6470exerciseusers";
		//$result=$mysqli->query($sql_1);
		// if($result){
		// 	while ($data=$result->fetch_object()) {
		// 		echo $data->username;
		// 	}
		// }

		$sql = "SELECT * FROM 6470exerciseusers where username=\"".$uname."\"";
		//echo $sql;
		$result = $mysqli->query($sql);
		//echo $result;
		$cnt=0;
		while ($data=$result->fetch_object()) {
		 		$cnt=$nt+1;
		}
		if ($cnt>0) {
			echo "Username is Taken";
			
		}
		else{
			$sql="INSERT INTO 6470exerciseusers(USERNAME,PASSWORD,PHONE) VALUES(\"".$uname."\",\"".$pass."\",\"".$phone."\")";
			$mysqli->query($sql);
			echo "USER REGISTERED,Its Details are NAME: ".$uname." and PHONE NUMBER: ".$phone;
		}

	}

?>

<form action="<?php echo $PHP_SELF ;?>" method="post">
	Welcome to Login System
	<br>
	<label for="uname">Enter User Name:</label>
	<input type="text" name="uname" id="uname">
	<br>
	<label for="pass">Enter Password:</label>
	<input type="password" name="pass" id="pass">
	<br>
	<input type="submit" name="submit_login" value="Login">
	<br>
	<label for="phone">Enter Phone Number:</label>
	<input type="text" name="phone" id="phone">
	<br>
	<input type="submit" name="submit_register" value="Register">
	<br>

</form>