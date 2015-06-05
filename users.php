<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<?php 
	echo "What's uuuup ".'<br/>';
	$connection = mysqli_connect('localhost','rosdimitrov','2103873463','VFU');
	if(!$connection){
		echo 'there is no such database';
	}

	$query = mysqli_query($connection,"Select * FROM users");
	if(!query){
		echo "There is no such table  - error in database ";
	}
	//echo mysqli_error($connection);
	$genders = array(1=>'Male',2=>'Female' );
	$languagePreferences = array(1=>'English',2=>'Bulgarian',3=>'Deutsch');

	$query = mysqli_query($connection,'SELECT * FROM users');

	echo "here";
	echo '<table><tr><th>Username</th><th>Password</th><th>Nickname</th><th>Gender</th><th>Preference</th></tr>';
	while ($row =$query->fetch_assoc()) {
		echo'<tr><td>'.$row['username'].'</td>
			  <td>'.$row['password'].'</td>
			  <td>'.$row['nickname'].'</td>
			  <td>'.$genders[$row['gender']].'</td>
			  <td>'.$languagePreferences[$row['languages']].'</td></tr>';
	}
	echo "";
	
 ?>



</body>
</html>''