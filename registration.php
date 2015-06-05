<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css\styles.css">
	<title><?php echo $pageTitle ?></title>
</head>

<body>

<?php 
//database setup
	//prave connection parvo
	$connection = mysqli_connect('localhost','rosdimitrov','2103873463','VFU');
	if(!$connection){
		echo 'there is no such database';
	}

	$query = mysqli_query($connection,"Select * FROM users");
	if(!query){
		echo "There is no such table  - error in database ";
		//echo mysqli_error($connection);
	}

	// echo $query->fetch_assoc(); //makes a query and hides the first query below
	while($row=$query->fetch_assoc()){
		echo'<pre>'.print_r($row,true).'</pre>';
	}
//end of database setup


	$pageTitle = "VFU Project - New User Registration";
	$gender = array(1=>'Male',2=>'Female' );
	$languages = array(1=>'English',2=>'Bulgarian',3=>'Deutsch');
	if($_POST){
		$userName =trim($_POST['username']);
		$userName = mysqli_real_escape_string($connection,$userName);
		$userPassword = trim($_POST['password']);
		$userPassword = mysqli_real_escape_string($connection,$userPassword);
		$repeatPassword = trim($_POST['repeatPassword']);
		$userNickName = trim($_POST['nickname']);
		$userNickName = mysqli_real_escape_string($connection,$userNickName);
		$userGender = $_POST['gender'];
		$userGender = mysqli_real_escape_string($connection,$userGender);
		$userPreferences = $_POST['languages'];
		$userPreferences = mysqli_real_escape_string($connection,$userPreferences);

		//make sql to insert into the table
		$sql = 'INSERT INTO users (username,password,nickname,gender,languages) VALUES
		("'.$userName.'","'.$userPassword.'","'.$userNickName.'","'.$userGender.'","'.$userPreferences.'")';
		//echo $sql; //test the sql statement

		mysqli_query($connection,$sql); //send the query to
		

		echo '<h1>'.'Thank you for registering. You will hear from us shortly'.'</h1>';

	 }
	//echo '<pre>'.print_r($_POST,true).'</pre>';
 ?>

<form method="POST">
	<p>Please fill the required information below and we will contact you as soon as we oficially launch</p>
	<div>userName:<input type="text" name="username"></div>
	<div>Password:<input type="password" name="password"></div>
	<div>Repeat Password:<input type="password" name="repeatPassword"></div>
 	<div>NickName:<input type="text" name="nickname"></div>
	<div>Gender:
		<select name="gender">
			<?php 
					foreach ($gender as $key =>$value) {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
			?>
		</select>
	</div>
	<div>Preferred language of teaching:
		<select name="languages">
			<?php 
				foreach ($languages as $key => $value) {
					echo '<option value="'.$key.'">'.$value.'</option>';
				}

			 ?>
		</select>
	</div>
	<input type="submit" value="Register">

</form>

</body>
</html>