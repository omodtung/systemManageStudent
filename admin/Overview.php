<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] = 'Admin') {
        include "../DB_connection.php";
        include "req/data/teacherAd.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/getteacher.php";

        $teachers =   getAllTeachers($conn);

        $countFemale = countNumberTeacherFemale($conn);
        $countMale = countNumberTeacherMale($conn);
        $countTotalTeacher = countNumberTeacher($conn);
        //print_r($teachers);

?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home - Su Pham Thuc Hanh High School</title>
            <link rel="stylesheet" href="../css/style.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="../css/style2.css">

            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

            <link rel="icon" href="..logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- import jquery for live Search -->




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
                        <a href="teacherNewUI.php">
                            <i class="bx bx-user"></i>
                            <span class="link_name">View List Teacher</span>
                        </a>
                        <span class="tooltip">List Teacher</span>
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
                        <a data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="bx bx-folder"></i>
                            <span class="link_name">Filter Teacher</span>
                        </a>
                        <span class="tooltip">
                            Filter


                        </span>


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
                if ($teachers != 0) {


                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-center">Dashboard</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="card bg-success">
                                    <div class="card-header">
                                        <h3><a href="teacherNewUI.php" style="color:black;text-decoration: none;"> total Teacher</a></h3>
                                    </div>
                                    <div class="card-body">
                                        <span class="badge badge-primary text-white"><?php echo $countTotalTeacher ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="card card-warning" style="background-color: red;">
                                    <div class="card-header">
                                        <h3><a href="teacherNewUI.php" style="color:black;text-decoration: none;"> Male Teacher</a></h3>
                                    </div>
                                    <div class="card-body">
                                        <span class="badge badge-primary text-success-dark">
                                            <?php echo $countMale ?>

                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">

                                <div class="card bg-warning">
                                    <div class="card-header">
                                        <h3><a href="teacherNewUI.php" style="color:black;text-decoration: none;"> feMale Teacher</a></h3>
                                    </div>
                                    <div class="card-body">
                                        <span class="badge badge-primary text-dark"> <?php echo $countFemale ?></span>
                                    </div>
                                </div>
                            </div>





                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                    <script>
                        var xValues = ["Nam", "Nu", "Tong"];
                        var yValues = [<?=$countMale?>, <?=$countFemale?>, <?=$countTotalTeacher?>];
                        var barColors = ["red", "yellow", "green"];

                        new Chart("myChart", {
                            type: "bar",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes:[{
                                        ticks: {
                                            min:0
                                        }
                                    }],
                                },
                                legend: {
                                    display: false
                                },
                                title: {
                                    display: true,
                                    text: "Bảng Thống kê Giới Tính"
                                }
                            }
                        });
                    </script>



<canvas id="myChart2" style="width:50%;max-width:600px"></canvas>

<script>
var xzValues = ["Teacher", "TeacherFemale", "TeacherMAle"];
var yzValues = [<?=$countTotalTeacher?>, <?=$countFemale?>, <?=$countMale?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797"
 
];

new Chart("myChart2", {
  type: "pie",
  data: {
    labels: xzValues,
    datasets: [{
      backgroundColor: barColors,
      data: yzValues
    }]
  },

 
  options: {

 
    title: {
      display: true,
      text: "Bảng Thống Kê Môn Học"
    }
  }
});
</script>



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




            </section>
            <!-- Scripts -->
            <script src="../js/script.js"></script>

            <div class="modal fade" id="modalform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit teacher</h1>
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Teacher Info</h1>
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
                                url: "livesearch.php",
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


            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <?php include("indexFilter.php"); ?>
                    </div>
                </div>
            </div>
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