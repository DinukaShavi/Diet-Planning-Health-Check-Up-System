<?php
session_start();
include_once('../includes/config.php');

if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['search'])) {
        $searchQuery = $_POST['search'];
        $searchSql = "SELECT * FROM orders WHERE name LIKE '%$searchQuery%' OR number LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR method LIKE '%$searchQuery%' OR flat LIKE '%$searchQuery%' OR street LIKE '%$searchQuery%' OR city LIKE '%$searchQuery%' OR state LIKE '%$searchQuery%' OR country LIKE '%$searchQuery%' OR pin_code LIKE '%$searchQuery%' OR total_price LIKE '%$searchQuery%'";
        $ret = mysqli_query($con, $searchSql);
    } else {
        $ret = mysqli_query($con, "SELECT * FROM orders");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Orders</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

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

</head>

<body>
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

    <main>
        <div>
            <h1>Manage Orders</h1>
            <form method="post" class="search-form">
                <input type="text" name="search" class="search-input" placeholder="Search by name, email, etc." />
                <button type="submit" class="search-button">Search</button>
            </form>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Method</th>
                                <th>Address</th>
                                <th>Total Price</th>
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
                                    <td><?php echo $row['number']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['method']; ?></td>
                                    <td><?php echo $row['flat'] . ', ' . $row['street'] . ', ' . $row['city'] . ', ' . $row['state'] . ', ' . $row['country'] . ' - ' . $row['pin_code']; ?></td>
                                    <td><?php echo '$' . $row['total_price'] . '/-'; ?></td>
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
