<?php


session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        include "../DB_connection.php";
        include "data/subject.php";
        include "data/grade.php";
        include "data/student.php";
include "data/class.php";

        $subjects = getAllSubjects($conn);
        $grades = getAllGrade($conn);
$students = getAllStudents($conn);
$classes = getAllClass($conn);




        $fname = '';
        $lname  = '';
        $uname  = '';
        // $pass = '';
        // $flname = '';
        // $lopChuNhiem = '';

        $gioiTinh = '';
        if (isset($_GET['fname'])) $fname =  $_GET['fname'];

        if (isset($_GET['lname'])) $lname  = $_GET['lname'];

        if (isset($_GET['uname'])) $uname = $_GET['uname'];


?>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- using for date pick -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

            <!-- ------------------------date import code upper -->
        </head>

        <body>
            <?php
            include "inc/navBar.php";
            ?>

            <div class="container mt-5">
                <a href="teacherUI.php" class="btn btn-outline-primary btn_add_teacher">Back</a>
                <h1>Dit me may luon</h1>
                <form method="post" class="shadow p-3 mt-5 form-w" action="req/addTeacher.php">
                    <h3> Site ADD Student</h3>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert danger" role="alert">
                            <?= $_GET['error'] ?>

                        </div>



                    <?php } ?>


                    <?php if (isset($_GET['success'])) { ?>
                        <div class="alert alert-success" role="alert">

                            <?= $_GET['success'] ?>
                        </div>

                    <?php } ?>
                    <div class="mb-3">

                        <div class="form-row">
                            <div class="col">
                                <label class="form-lable">

                                    First Name
                                </label>
                                <input type="text" class="form-control" placeholder="example Tung" value="<?= $fname ?>" name="fname">
                            </div>
                            <div class="col">
                                <label class="form-lable">

                                    Last Name
                                </label>
                                <input type="text" class="form-control" placeholder="example Do" name="lname" value="<?= $lname ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="form-lable">

                                    Full Name
                                </label>
                                <!-- <input type="text" class="form-control" placeholder=" example :TungDo" name="flname" value="<?= $flname ?>"> -->
                            </div>
                            <div class="col">
                                <label class="form-lable">

                                    User Name
                                </label>
                                <input type="text" class="form-control" placeholder="example:tungdo" name="uname" value="<?= $uname ?>">

                            </div>
                        </div>

                        <label class="form-lable">

                            PassWord
                        </label>
                        <input type="text" class="form-control" name="pass" id="passInput">

                        <!-- chon BirthDate -->
                        <section class="container">
                            <h3 class="pt-4 pb-2">BirthDate</h3>
                            <form>
                                <div class="row form-group">
                                    <label for="date" class="col-sm-1 col-form-label">Date</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" name="birthdate"/>
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                </script>
                        </section>

                        <div>


                        </div>
                        <script type="text/javascript">
                            $(function() {
                                $('#datepicker').datepicker();
                            });
                        </script>
                        <!-- chon Gioi Tinh -->
                        <div class="col">
                            <label class="form-lable">

                                Gioi Tinh
                            </label>

                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Nu</label>
                        </div>






                        <!-- 
            <div class="mb-3">
              <label class="form-label">Subject</label>
              <select name="subjects[]">
                <?php foreach ($subjects as $subject) : ?>
                  <option value="<?= $subject['subject_id'] ?>"><?= $subject['subject'] ?></option>
                <?php endforeach ?>
              </select>
            </div>






            <div class="mb-3">
              <label class="form-label">Grade</label>
              <select name="grades[]">
                <?php foreach ($grades as $grade) : ?>
                  <option value="<?= $grade['grade_id'] ?>"><?= $grade['grade_code'] ?>-<?= $grade['grade'] ?></option>
                <?php endforeach ?>
              </select>l
            </div>
            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
      </div>



 -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Hanh Kiem</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected name="hanhkiem">Hanh Kiem</option>
                                        <option value="1">Kha</option>
                                        <option value="2">Tot</option>
                                        <option value="3">Trung Binh</option>
                                    </select>



                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Hoc Luc</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected name="hanhkiem">Hoc Luc</option>

                                        <option value="1">Gioi</option>
                                        <option value="2">TienTien</option>
                                        <option value="3">TrungBinh</option>
                                    </select>



                                </div>

                            </div>

                            <div class="row">
                            <div class="col-md-3">
                                <label class="form-label"> Khoi Hoc</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <?php foreach ($grades as $grade) : ?>
                                         

                                            <option name="grades[]" value ="<?= $grade['grade_id']?>">  <?= $grade['grade_code'] ?>-<?= $grade['grade'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <label class="form-label"> Lop</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <?php foreach ($classes as $class ):?>
                                         

                                            <option name="classes[]" value ="<?= $class['ID_Class']?>">  <?= $class['ClassName'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>


                            
                        </div>



                        <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </body>

        </html>

    <?php } else { ?>

    <?php  } ?>

<?php } else { ?>

<?php } ?>