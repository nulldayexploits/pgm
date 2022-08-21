<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
		body{
			font-family: sans-serif;
			background: #f7f8f8;
		}

		h1{
			text-align: center;
			/*ketebalan font*/
			font-weight: 300;
		}

		.tulisan_login{
			text-align: center;
			/*membuat semua huruf menjadi kapital*/
			text-transform: uppercase;
		}

		.kotak_login{
			width: 350px;
			background: white;
			/*meletakkan form ke tengah*/
			margin: 80px auto;
			padding: 30px 20px;
			border-radius: 10px;
		}

		label{
			font-size: 11pt;
		}

		.form_login{
			/*membuat lebar form penuh*/
			box-sizing : border-box;
			width: 100%;
			padding: 10px;
			font-size: 11pt;
			margin-bottom: 20px;
		}

		.tombol_login{
			background: #25308C;
			color: white;
			font-size: 11pt;
			width: 100%;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;
		}

		.link{
			color: #232323;
			text-decoration: none;
			font-size: 10pt;
		}
	</style>
</head>
<body>

	<div class="kotak_login">
		<p class="tulisan_login">Register</p>

		<form action="proses-register.php" method="POST"> 

			<label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Nama ..">

			<label>Email</label>
			<input type="text" name="email" class="form_login" placeholder="Email ..">

			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username ..">

			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password ..">

			<input type="submit" class="tombol_login" value="Register">

			<br><br>
			<a href="index.php">Login</a>

			<br/>
			<br/>
		</form>
		
	</div>


</body>
</html>