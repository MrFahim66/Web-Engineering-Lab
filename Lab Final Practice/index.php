<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

    <?php
    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        echo 'is not connected';
    }

    if (!mysqli_select_db($con, 'practice1')) {
        echo 'database is not selected';
    }

    // Check if the Insert button is clicked
    if (isset($_POST['insert'])) {
        // Retrieve the input values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $stmt = mysqli_prepare($con, "INSERT INTO table2(id, name, email, contact) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $id, $name, $email, $contact);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Data Inserted Successfully !';
        } else {
            echo 'Data Not Inserted!';
        }
    }

    if (isset($_POST['update'])) {
        // Retrieve the input values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];

        $stmt = mysqli_prepare($con, "UPDATE table2 SET name=?, email=?, contact=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $contact, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Data Updated Successfully !';
        } else {
            echo 'Data Not Updated!';
        }
    }

    if (isset($_POST['delete'])) {
        // Retrieve the input values
        $id = $_POST['id'];

        $stmt = mysqli_prepare($con, "DELETE FROM table2 WHERE id=?");
        mysqli_stmt_bind_param($stmt, "s", $id);

        if (mysqli_stmt_execute($stmt)) {
            echo 'Data Deleted Successfully !';
        } else {
            echo 'Data Not Deleted!';
        }
    }
    ?>
</body>

</html>