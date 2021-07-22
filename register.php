<?php 
	session_start();

	// variable declaration
	$nombre = "";
	$correo = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	require_once "database.php";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
		$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
		$password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($nombre)) { array_push($errors, "nombre is required"); }
		if (empty($correo)) { array_push($errors, "correo is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (nombre, correo, password) 
					  VALUES('$nombre', '$correo', '$password')";
			mysqli_query($mysqli, $query);

			$_SESSION['nombre'] = $nombre;
			$_SESSION['success'] = "You are now logged in";
			header('location: indexcliente.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$correo = mysqli_real_escape_string($mysqli, $_POST['correo']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);

		if (empty($correo)) {
			array_push($errors, "correo is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}


		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE correo='$correo' AND password='$password'";
			$results = mysqli_query($mysqli, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['correo'] = $correo;
				$_SESSION['success'] = "You are now logged in";
				header('location: indexcliente.php');
			}else {
				array_push($errors, "Wrong correo/password combination");
			}
			if($correo == 'jeff.0318@gmail.com'){
				header('Location: admin.php');
			}
		}
	}

?>