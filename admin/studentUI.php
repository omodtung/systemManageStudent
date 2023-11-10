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
            
            <link rel="stylesheet" href="../css/style.css">

            <link rel="stylesheet" href="../css/style2.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="icon" href="..logo.png">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
            <script>
                function showResult(str) {
                    if (str.length == 0) {
                        document.getElementById("livesearch").innerHTML = "";
                        document.getElementById("livesearch").style.border = "0px";
                        return;
                    }
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("livesearch").innerHTML = this.responseText;
                            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                        }
                    }
                    xmlhttp.open("GET", "livesearch.php?q=" + str, true);
                    xmlhttp.send();
                }
            </script>
        </head>

        <body>
            <div class="sidebar">
                <div class="logo_details">
                    <i class="bx bxl-audible icon"></i>
                    <div class="logo_name">Admin </div>
                    <i class="bx bx-menu" id="btn"></i>
                </div>
                <ul class="nav-list">
                    <li>
                        <i class="bx bx-search"></i>
                        <input type="text"id="live_search" placeholder="Search...">
                  
                        <span class="tooltip">Search</span>
                    </li>
                    <li>
                        <a href="siteAddStudent.php">
                            <i class="bx bx-grid-alt"></i>
                            <span class="link_name"> ADD Teacher </span>
                        </a>
                        <span class="tooltip">ADD</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-user"></i>
                            <span class="link_name">Edit Teacher</span>
                        </a>
                        <span class="tooltip">Edit</span>
                    </li>
                    <li>
                        <a href="./req/encryptpasswords.php?table=students">
                            <i class="bx bx-chat"></i>
                            <span class="link_name">Encrypt All Passwords</span>
                        </a>
                        <span class="tooltip">Encrypt</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-pie-chart-alt-2"></i>
                            <span class="link_name"> Find Teaccher</span>
                        </a>
                        <span class="tooltip">Find</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-folder"></i>
                            <span class="link_name">Filter Teacher</span>
                        </a>
                        <span class="tooltip">Filter</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-cart-alt"></i>
                            <span class="link_name">Delete Teacher</span>
                        </a>
                        <span class="tooltip">Delete</span>
                    </li>
                    <li>
                        <a target="_blank" rel="noopener noreferrer" href="./req/export.php?student=1">
                            <i class="bx bx-export"></i>
                            <span class="link_name">Export All Students</span>
                        </a>
                        <span class="tooltip">Delete</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-cart-alt"></i>
                            <span class="link_name">View info</span>
                        </a>
                        <span class="tooltip">View</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bx bx-cog"></i>
                            <span class="link_name">Setting</span>
                        </a>
                        <span class="tooltip">Settings</span>
                    </li>
                    <li class="profile">
                        <div class="profile_details">
                            <img src="../img/profile.jpeg" alt="profile image">
                            <div class="profile_content">
                                <div class="name"><?= $_SESSION['admin_name'][0] ?> <?= $_SESSION['admin_name'][1] ?></div>
                                <div class="designation">Admin</div>
                            </div>
                        </div>
                        <i class="bx bx-log-out" id="log_out"></i>
                    </li>
                </ul>
            </div>
            <section class="home-section">
                <?php
                include "inc/navBar.php";
                if ($students != 0) {


                ?>
                    <div class="container mt-5">
                        <!-- <a href="siteAddStudent.php" class="btn btn-outline-primary btn_add_teacher">Add New Student</a>
                        <a href="./req/encryptpasswords.php?table=students" class="btn btn-outline-primary btn_encrypt">Encrypt All Passwords</a> -->
                        <div class="table table-striped">
                            <table class="thead-dark">
                                <thead>
                                    <tr>

                                        <th scope="col">student ID</th>
                                        <th scope="col">USER NAME</th>
                                        <!-- <th scope="col">Password</th> -->
                                        <th scope="col">Full Name</th>
                                        <!-- <th scope="col">Last Name</th> -->
                                        <th scope="col">HANH KIEM</th>
                                        <th scope="col"> hOC lUC</th>
                                        <th scope="col"> NGAY SINH </th>
                                        <th scope="col"> gIOI tINH </th>
                                        <th scope="col"> Dia Chi </th>
                                        <th scope="col"> Action </th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($students as  $student) { ?>

                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td><?= $student['id'] ?></td>
                                            <td><?= $student['username'] ?></td>
                                            <!-- <td><?= $student['password'] ?></td> -->
                                            <td><?= $student['hotenhs'] ?></td>
                                            <!-- <td><?= $student['lname'] ?></td> -->
                                            <td><?= $student['hanhkiem'] ?></td>
                                            <td><?= $student['HocLuc'] ?></td>
                                            <td><?= $student['ngaysinh'] ?></td>
                                            <td><?= $student['gioitinh'] ?></td>
                                            <td><?= $student['diachi'] ?></td>
                                            <td>
                                                <!-- <a href="teacher-edit.php?idteach=<?= $teacher['id'] ?>" class="btn btn-warning">Edit</a> -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalform" onclick="btnclick('./inc/editStudent.php?idstudent=<?= $student['id'] ?>')" data-bs-id=<?= $student['id'] ?>>
                                                    Edit
                                                </button>

                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalinfo" onclick="btnclickinfo('./inc/StudentInfo.php?idstudent=<?= $student['id'] ?>')" data-bs-id=<?= $student['id'] ?> class="btn btn-info">Info</button>
                                                <a href="req/deletestudent.php?id=<?= $student['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <div id="searchresult"></div>

                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- Edit Student -->
                        <script>
                            function btnclick(_url) {
                                $.ajax({
                                    url: _url,
                                    type: 'post',
                                    success: function(data) {
                                        $('#modalbody').html(data);
                                    },
                                    error: function() {
                                        $('#modalbody').text('An error occurred');
                                    }
                                });


                            }

                            function btnclickinfo(_url) {
                                $.ajax({
                                    url: _url,
                                    type: 'post',
                                    success: function(data) {
                                        $('#modalbodyinfo').html(data);
                                    },
                                    error: function() {
                                        $('#modalbodyinfo').text('An error occurred');
                                    }
                                });


                            }


                            function Save() {
                                setTimeout(function() {

                                    $('#modalbody').html('');

                                }, 500);
                            }



                            function toastShow() {
                                setTimeout(function() {
                                    $('#liveToast').toast('show');
                                }, 500);
                            }
                        </script>

                        
                        <?php

                        if (isset($_SESSION['sucsess'])) {

                            $toaststudent = getStudentUsingId($conn, $_SESSION['sucsess']);
                            echo "<script type='text/javascript'>",

                            "setTimeout(function (){",
                            "$('#toasttext').html('Sucsessfully edited student " . $toaststudent['username'] . " " . $toaststudent['hotenhs'] . "');",
                            "$('#liveToast').toast('show');",
                            "}, 500);",
                            "</script>";
                            unset($_SESSION['sucsess']);
                        }

                        if (isset($_GET['error'])) {
                        ?>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    btnclick('./inc/editTeacher.php?idteach=<?= $_GET['idteach'] ?>&error=<?= $_GET['error'] ?>');
                                    $('#modalform').modal('show');
                                });
                            </script>
                        <?php
                        }



                        ?>

                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                                            <div class="toast-header">
                                                <i class="fa-solid fa-database fa-spin"></i>
                                                <strong class="me-auto ms-1">System</strong>
                                                <small>now</small>
                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body" id="toasttext">
                                                Sucsessfully edited student
                                            </div>
                                        </div>
                                    </div>
                        <!-- End Edit Student -->
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
            </section>
            <script src="../js/script.js"></script>

            <div class="modal fade" id="modalform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit student</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="Save()"></button>
                                    </div>
                                    <div class="modal-body" id="modalbody">

                                    </div>
                                    <div class="modal-footer">


                                    </div>
                                </div>
                            </div>
            </div>
            
            <div class="modal fade" id="modalinfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Student Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="Save()"></button>
                        </div>
                        <div class="modal-body" id="modalbodyinfo">

                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>

            <!-- import ajax live searching -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#live_search").keyup(function() {
                        var input = $(this).val();
                        if (input != "") {
                            $.ajax({
                                url: "livesearch.php?student=1",
                                method: "POST",
                                data: {
                                    input: input
                                },
                                success: function(data) {
                                    $("#searchresult").html(data);
                                    $("#searchresult").css("display", "block");
                                }

                            });

                        } else {
                            $("#searchresult").css("display", "none");
                        }

                    })
                })
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