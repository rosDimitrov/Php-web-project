<!DOCTYPE html>
<html>
<head>
<?php 
	$pageTitle = "VFU Project - Index Page"
 ?>
 
<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>

	<?php echo $pageTitle ?>
	</title>


</head>
<body>

<header>

	<h1>Welcome to the PHP Online School</h1>
	<h2>We are coming soon</h2>

</header>
<body>
	<?php 
		session_start();
			if($_POST){
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
				if($username=='Ros' && $password=='2103873463'){
					$_SESSION['isAdmin'] = true;
					 header('Location:users.php');
					// exit;
				}
		}
		
		
 	?>
 	<h2><span class="red">Read</span>,<span class="red"> post</span> and <span class="red">learn</span>  <span class="orange">Php</span></h2>
<form method="POST">
	Admin Log-in:<br/>
	User name:<input type="text" name="username"><br/>
	Password: <input type="password" name="password"><br/>
	<input type="submit" value="Log in">
</form>

<?php 
	if($_SESSION['isAdmin'] ==true){
		echo '<a href="users.php">'.'See a list of registered users'.'</a>';
	}
 ?>
<br/>
<p><span class="red">New user ?</span> <a href="registration.php">Register For Free</a></p>
<p>We are going to contact you as soon as we are live.</p>

<img src="images\logo.jpg" alt="Php logo" width="320px" height="240px"/>

<footer class="footer">
	<a href="#">About us</a>
	<a href="#">Learn more about the project<a/a>
	<a href="#">Contacts</a>
	<a href="mailto:abv@abv.bg">Write us</a>
</footer>





</body>
</html>