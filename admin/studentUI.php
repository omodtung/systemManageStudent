<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] = 'Admin') {
        include "../DB_connection.php";
        include "data/teacherAd.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/student.php";
        $teachers =   getAllTeachers($conn);
$students = getAllStudents($conn);
        //print_r($teachers);

?>
 <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home - Su Pham Thuc Hanh High School</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="..css/style.css">
            <link rel="icon" href="..logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head>

        <body>
            <?php
            include "inc/navBar.php";
            if ($students != 0) {


            ?>
                <div class="container mt-5">
                    <a href="siteAddStudent.php" class="btn btn-outline-primary btn_add_teacher">Add New Student</a>
                    <a href="./req/encryptpasswords.php" class="btn btn-outline-primary btn_encrypt">Encrypt All Passwords</a>
                    <div class="table-responsive">
                        <table class="table table-success table-striped n-table">
                            <thead>
                                <tr>

                                    <th scope="col">student ID</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">maHS</th>
                                    <th scope="col">ma Khoi</th>
                                    <th scope="col">ma Lop</th>
                                    <th scope="col"> hoTen</th>
                                    <th scope="col"> ngay sinh </th>
                                    <th scope="col"> gioi Tinh </th>

                                    <th scope="col"> Dia Chi</th>
                                    <th scope="col"> Hanh Kiem </th>


                                    <th scope="col"> Action </th>
                                    

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($students as  $student) { ?>

                                    <tr>
                                        <!-- <th scope="row">1</th> -->
                                        <td><?= $student['id'] ?></td>
                                        <td><?=  $student['username'] ?></td>
                                        <td><?=  $student['password'] ?></td>
                                        <td><?=  $student['mahs'] ?></td>
                                        <td><?=  $student['makhoi'] ?></td>
                                        <td><?=  $student['HanhKiem'] ?></td>
                                        <td><?=  $student['HocLuc'] ?></td>
                                        <td><?=  $student['NgaySinh'] ?></td>
                                        <td><?=  $student['Gender'] ?></td>
                                        <td>
                                            <a href="teacher-edit.php?idteach=<?= $teacher['id'] ?>" class="btn btn-warning">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>


                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } else { ?>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>

            <?php } ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(3) a").addClass('active')
                });
            </script>
        </body>

        </html>

<?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
} ?>