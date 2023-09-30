<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] = 'Admin') {
        include "../DB_connection.php";
        include "data/teacherAd.php";
        include "data/subject.php";
        include "data/grade.php";

        $teachers =   getAllTeachers($conn);

       

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
            include "inc/navbar.php";
            if ($teachers != 0) {


            ?>
                <div class="container mt-5">
                    <a href="teacher-add.php" class="btn btn-outline-primary btn_add_teacher">Add New Teacher</a>
                    <div class="table-responsive">
                        <table class="table table-success table-striped n-table">
                            <thead>
                                <tr>

                                    <th scope="col">Teacher ID</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">PASSWORD</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">SubJect</th>
                                    <th scope="col"> Grade</th>
                                    <th scope="col"> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($teachers as  $teacher) { ?>

                                    <tr>
                                        <!-- <th scope="row">1</th> -->
                                        <td><?= $teacher['id'] ?></td>
                                        <td><?= $teacher['username'] ?></td>
                                        <td><?= $teacher['password'] ?></td>
                                        <td><?= $teacher['fname'] ?></td>
                                        <td><?= $teacher['lname'] ?></td>
                                        <td>
                                            <?php
                                            $s = '';
                                            $subjects  = str_split(trim($teacher['subjects']));
                                            foreach ($subjects as $subject) {
                                                $s_temp = getSubjectById($subject, $conn);

                                                if ($s_temp != 0) {
                                                    $s .= $s_temp['subject_code'] . ',';
                                                }
                                            }

                                            echo $s;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $g = '';
                                            $grades  = str_split(trim($teacher['grade']));
                                            foreach ($grades as $grade) {
                                                $s_temp = getGradeById($grade, $conn);

                                                if ($s_temp != 0) {
                                                    $g .= $s_temp['grade_code'] . ',';
                                                }
                                            }

                                            echo $g;
                                            ?>
                                        </td>

                                        <td>
                                            <a href="" class="btn btn-warning">Edit</a>
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
                    $("#navLinks li:nth-child(2) a").addClass('active')
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