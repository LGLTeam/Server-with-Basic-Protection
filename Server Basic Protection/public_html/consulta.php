<html lang="en" >
 
<head>
<meta charset="UTF-8">
<title>Consulta a validade</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'>
<style>
body {
    background: url("1054068.png");
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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
  
<div class="container">
  <h2>Usuarios:</h2>
  <p>Consulte sua validade aqui!</p>            
  <table class="table table-hover">
    <thead>
      <tr class="info">
        <th>Usuario</th>
		<th>Data de Registro</th>
        <th>Data de Expiraçao</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
include 'DB.php';
include 'Global.php';
$fetchqry = "SELECT * FROM `tokens`";
$result=mysqli_query($conn,$fetchqry);
$num=mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
	   <tr>
        <td><?php echo $row['Username'];?></td>
        <td><?php echo $date1 = $row['StartDate'];?></td>
		<td><?php echo $date2 = $row['EndDate'];?></td>
		<td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo "Active"; else { echo "Expired";} ?></td>
		<?php
      {
        
      }

      ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>