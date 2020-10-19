<?php
// Sessão
session_start();
// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: verification.php');
endif;
?>
<html lang="pt-br" >
 
<head>
<meta charset="UTF-8">
<title>HYUPAI</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'>
<style>
    body {
    background: url("wallpaper.jpg");
	display: table;
    width: 100%;
  height: 100vh;
  padding: 100px 0;
  
  

  background-position: 30% 45%;
  background-size: cover;
	}
	
	h2 {
	    color: red;
	}
	p {
	    color: red;
	    font-size: 20px;
	}
	
	td {
	    background-color: white;
	}
	}
	h8 {
	    font-size: 80px;
	    color: red;
	}
	a {
	    font-size: 40px;
	    color: red;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
  <div id="registration-form">
	<div class='fieldset'>
    <legend>Hyupai - LOGIN</legend>
		<form action="" method="post" data-validate="parsley">
			<div class='row'>
			<!--	<label for='firstname'>Username</label> -->
				<input type="text" placeholder="Username" name='firstname' id='firstname' data-required="true" data-error-message="UserNnme is required" required>
			</div>
			<div class='row'>
			<!--	<label for="lastname">Password</label> -->
				<input type="text" placeholder="Password"  name='lastname' data-required="true" data-type="email" data-error-message="Password is required" required>
			</div>
			<div class='row'>
			<!--	<label for="email">Expiration Time</label> -->
				<input type="date" name='email' data-required="true" data-error-message="Year - Month - Day" required>
			</div>
			<input type="submit" value="Register" name="register">
		</form>
	</div>
	
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/parsley.js/1.2.2/parsley.min.js'></script>
 
<?php   // this code is use to insert the form details and register and expiration date
include 'DB.php';
include 'Global.php';


if(isset($_POST['register'])){
$Username = $_POST['firstname'];
$Password  = $_POST['lastname'];
$Expiration = $_POST['email'];
$date      = date("Y/m/d");
$true      = 2;
$fetch = "INSERT INTO `tokens`(`Username`, `Password`, `StartDate`, `EndDate`, `UID`, `Expiry`) VALUES ('$Username','$Password','$date','$Expiration', NULL, '$true')";
$fire = mysqli_query($conn,$fetch);
}
?>
 
<div class="container">
  <h2>Usuarios</h2>
  <p>Estos son todos los usuarios registrados en nuestra base de datos:</p>            
  <table class="table table-hover">
    <thead>
      <tr class="info">
        <th>Username</th>
        <th>Password</th>
        <th>UID</th>
		<th>Registration Date</th>
        <th>Expiration Date</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
$fetchqry = "SELECT * FROM `tokens`";
$result=mysqli_query($conn,$fetchqry);
$num=mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
	   <tr>
        <td><?php echo $row['Username'];?></td>
        <td><?php echo $row['Password'];?></td>
		<td><?php echo $row['UID'];?></td>
        <td><?php echo $date1 = $row['StartDate'];?></td>
		<td><?php echo $date2 = $row['EndDate'];?></td>
		<td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?></td>
		<?php
      {
         echo "<td> <a href='mrz.php?no=".$row['Username']."'><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
      }

      ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <h8><a href="logout.php">Sair</a><h8>
</div>
<script>
function myFunction($lol) {
<?php
$delete = "SELECT * FROM `tokens`";
?>
    
}
</script>
</body>
</html>
