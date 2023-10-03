<?php


session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
    include "../DB_connection.php";
    include "data/subject.php";
    include "data/grade.php";
    $subjects = getAllSubjects($conn);
    $grades = getAllGrade($conn);
    $fname = '';
    $lname  = '';
    $uname  = '';
    $pass = '';
    $flname = '';
    $lopChuNhiem = '';

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
      include "inc/navbar.php";
      ?>

      <div class="container mt-5">
        <a href="teacherUI.php" class="btn btn-outline-primary btn_add_teacher">Back</a>

        <form method="post" class="shadow p-3 mt-5 form-w" action="req/teacher-add.php">
          <h3> Site ADD teacher</h3>
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
                <input type="text" class="form-control" placeholder=" example :TungDo" name="flname" value="<?= $flname ?>">
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
            <input type="text" class="form-control" placeholder="PassWord" value="<?= $pass ?>" name="pass">

            <!-- chon BirthDate -->
            <section class="container">
              <h3 class="pt-4 pb-2">BirthDate</h3>
              <form>
                <div class="row form-group">
                  <label for="date" class="col-sm-1 col-form-label">Date</label>
                  <div class="col-sm-4">
                    <div class="input-group date" id="datepicker">
                      <input type="text" class="form-control">
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


            <h3> Lop Chu Nhiem </h3>
            <input type="text" class="form-control" placeholder="example:tungdo" name="lopCN" value="<?= $lopChuNhiem ?>">

            <h3> Mon Hoc</h3>
           

            <div class="mb-3">
              <label class="form-label">Subject</label>
              <select name="grades">
                <?php foreach ($subjects as $subject) : ?>
                  <option value="<?= $subject['subject_id'] ?>"><?= $subject['subject'] ?></option>
                <?php endforeach ?>
              </select>
            </div>






            <div class="mb-3">
              <label class="form-label">Grade</label>
              <select name="grades">
                <?php foreach ($grades as $grade) : ?>
                  <option value="<?= $grade['grade_id'] ?>"><?= $grade['grade_code'] ?>-<?= $grade['grade'] ?></option>
                <?php endforeach ?>
              </select>
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