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
<div class="sidebar">
                <div class="logo_details">
                    <i class="bx bxl-audible icon"></i>
                    <div class="logo_name">Admin </div>
                    <i class="bx bx-menu" id="btn"></i>
                </div>
                <ul class="nav-list">
                    <li>
                        <i class="bx bx-search"></i>
                        <input type="text" id="live_search" placeholder="Search...">
                        <span class="tooltip">Search</span>
                    </li>
                    <li>
                        <a href="siteTeacherAdd.php">
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
                        <a href="./req/encryptpasswords.php?table=teachers">
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
                        <a target="_blank" rel="noopener noreferrer" href="./req/exportteacher.php">
                            <i class="bx bx-export"></i>
                            <span class="link_name">Export All Teachers</span>
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
                ?>
                <div class="container mt-5">
                    <div class="table-responsive">
                        <table class="table table-success table-striped n-table table-hover mx-auto align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Id Sche</th>
                                    <th scope="col">Teacher ID</th>
                                    <th scope="col">Ho Ten</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col"> End Time </th>
                                    <th scope="col"> Class </th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php foreach ($schedules as  $schedule) { ?>

                                <tr>
                                    
                                    <td><?= $schedule['ID_Schedule'] ?></td>
                                    <td><?= $schedule['fname'] ?></td>
                                    <td><?= $schedule['lname'] ?></td>

                                    <td>
                                        <a href="" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
</body>

</html>
