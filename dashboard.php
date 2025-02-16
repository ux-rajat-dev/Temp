<?php
session_start();
include './connection.php';

if (!isset($_SESSION['userData'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['userData']['role'] === 'admin') {
    // Admin dashboard
    $selectQuery = "SELECT * FROM users";
    $result = mysqli_query($connection, $selectQuery);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
    </head>

    <body>

        <h1>Admin Dashboard</h1>

        <?php
        if (isset($_GET['success-message'])) { ?>
            <p style="color:white; background:green;"><?php echo htmlspecialchars($_GET['success-message']); ?></p>
        <?php } ?>

        <?php
        if (isset($_GET['delete-message'])) { ?>
            <p style="color:white; background:red;"><?php echo htmlspecialchars($_GET['delete-message']); ?></p>
        <?php } ?>

        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sNo = 1;
                while ($user = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>

                        <td><?php echo $sNo; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php $value = $user['gender'];

                        if ($value == 'm') {
                            echo "male";
                        } else {
                            echo "female";
                        }

                        ?></td>
                        <td> <?php echo $user['dob']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                            <a href="./delete.php?id=<?php echo $user['id']; ?>">Delete</a>
                            <a href="./edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                        </td>

                    </tr>
                    <?php
                    $sNo++;
                }
                ?>
            </tbody>
        </table>

    </body>

    </html>
    <br>
    <a href="logout.php">Logout</a>
    <?php
} else {
    // User Dashboard
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
    </head>

    <body>


        <h1>Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION['userData']['name']); ?>!</h1>

        <p>This is your dashboard.</p>
        <script>
            alert('You were Logged in Successfully!');
        </script>
        <a href="logout.php">Logout</a>
    </body>

    </html>

    <?php
}
?>