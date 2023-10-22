<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] = 'Admin') {
        include "../DB_connection.php";
        include "data/teacherAd.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/getteacher.php";
        include "data/student.php";
        //$teachers =   getAllTeachers($conn);
        
        $students = getAllStudents($conn);

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="icon" href="..logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include "inc/navBar.php";
    ?>
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-success table-striped n-table table-hover mx-auto align-middle">
                <thead class="table-dark">
                    <tr>

                        <th scope="col">Student ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($students as  $student) { ?>

                    <tr>
                        
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['fname'] ?></td>
                        <td><?= $student['lname'] ?></td>

                        <td>
                            <a href="" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>


                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
