<?php
require '../../includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="style2.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<title>Health-Tracker</title>
</head>

<body>
<form action="details.php" method="post">
	<div class="navcontainer">
        <header class="header">
            <a href="#" class="logo"> FitCare </a>
            <nav class="navbar">
                <a href="../index.html">home</a>
                <a href="../index.html">about</a>
                <a href="../services/services.html">services</a>
                <a href="#">Account</a>
                <a href="../Login Signup/logsign.html" class="navbtn btn-primary">Login</a>
            </nav>
            <div class="fas fa-bars" id="menu"></div>
        </header>
    </div>

	<div class="app-content">
		<div class="app">
			<h1>FitCare</h1>
			<h3>Health Tracker</h3>
			<div class="inputs">
				<div>
					<label for="water">
						Water Intake (in ml)
					</label>
					<input id="water" type="number" name="water">
				</div>
				<div>
					<label for="exercise">
						Exercise Duration (in min)
					</label>
					<input id="exercise" type="number" name="exercise">
				</div>
				<div>
					<label for="bloodsugerlevel">
						Blood Sugar Level (in mg/dL)
					</label>
					<input id="bloodsugerlevel" type="number" name="bloodsugerlevel">
				</div>
			</div>
			<button id="submit" name="submit">Submit</button>
		
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Water Intake <br> (in ml)</th>
						<th>Exercise Duration <br> (in min)</th>
						<th>Blood Sugar Level <br> (in mg/dL)</th>
						<th><i class="fas fa-edit"></i></th>
						<th><i class="fas fa-trash"></i></th>
					</tr>
					<?php
$i=0;
$rows=mysqli_query($conn,"SELECT * FROM tb_track ORDER BY id ASC ");

        foreach ($rows as $row ):
        ?>

        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["water"]?></td>
            <td><?php echo $row["exercise"]?></td>
            <td><?php echo $row["bloodsugerlevel"]?></td>
            <td><button id="Update">Update</button>
		    <td><button id="Delete">Delete</button>
        </tr>
<?php
if (isset($_POST['Update'])) {
    $water = $_POST['water'];
    $exercise = $_POST['exercise'];
    $bloodsugerlevel = $_POST['bloodsugerlevel'];
    $msg = mysqli_query($con, "update users set water='$water',exercise='$exercise',bloodsugerlevel='$bloodsugerlevel' where id='$userid");
}?>
        <?php endforeach; ?>



				</thead>
				<tbody id="output">
				</tbody>
			</table>
		</div>
	</div>
	
</form>
</body>

</html>