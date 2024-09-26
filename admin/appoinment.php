<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['adminid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_POST['search'])) {
        $searchQuery = $_POST['search'];
        $searchSql = "SELECT * FROM appointment_data WHERE name LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR phone LIKE '%$searchQuery%' OR date LIKE '%$searchQuery%' OR time LIKE '%$searchQuery%' OR service_type LIKE '%$searchQuery%' OR message LIKE '%$searchQuery%'";
        $ret = mysqli_query($con, $searchSql);
    } else {
        $ret = mysqli_query($con, "SELECT * FROM appointment_data");
    }

    if (isset($_GET['ap_num'])) {
        $appointmentId = $_GET['ap_num'];
        $deleteSql = "DELETE FROM appointment_data WHERE ap_num='$appointmentId'";
        $deleteResult = mysqli_query($con, $deleteSql);
        if ($deleteResult) {
            echo "<script>alert('Appointment data deleted');</script>";
            header("location:appoinment.php");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            display: flex;
            height: 100vh;
        }

        h1 {
            margin-left: 0.75rem;
        }

        .sb-sidenav {
            width: 250px;
            height: 100%;
            background-color: #212529;
            color: rgba(255, 255, 255, 0.5);
            overflow-y: auto;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            position: relative;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            transition: color 0.15s ease-in-out;
        }

        .nav-link:hover {
            color: #fff;
        }

        .card {
            position: relative;
            display: flex;
            margin-left: 5px;
            flex-direction: column;
            min-width: 0;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .text-success {
            color: rgba(25, 135, 84, 1);
        }

        .text-white {
            color: rgba(255, 255, 255, 1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-input {
            margin-left: 5px;
            height: 30px;
            padding: 5px;
            font-size: 16px;
        }

        .search-button {
            height: 43px;
            padding: 5px 10px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 2px;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sb-sidenav">
        <div class="sb-sidenav">
            <nav>
                <div class="nav">
                    <a class="nav-link" href="dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="manage-users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Manage Users
                    </a>

                    <a class="nav-link" href="logout.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Signout
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <main>
        <div>
            <h1>Appointments</h1>
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <div class="search-form">
                            <input type="text" class="search-input" name="search" placeholder="Search">
                            <button type="submit" class="search-button">Search</button>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Service Type</th>
                                <th>Message</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['time']; ?></td>
                                    <td><?php echo $row['service_type']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td>
                                        <a href="appoinment.php?ap_num=<?php echo $row['ap_num']; ?>" onClick="return confirm('Do you really want to delete');">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<?php } ?>
