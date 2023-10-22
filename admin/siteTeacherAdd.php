<?php


session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
    include "../DB_connection.php";
    include "data/subject.php";
    include "data/grade.php";
    include "data/teacherAd.php";

    $subjects = getAllSubjects($conn);
    $teacher = getAllTeachers($conn);

    $grades = getAllGrade($conn);
    $fname = '';
    $lname  = '';
    $uname  = '';
    $birthdate = '';
$diaChi = '';

$flname = '';
$maGiaoVien ='';

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

        <form method="post" class="shadow p-3 mt-5 form-w" enctype="multipart/form-data" action="req/addTeacher.php">
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
              <!-- <div class="col">
                <label class="form-lable">

                  First Name
                </label>
                <input type="text" class="form-control" placeholder="example Tung" value="<?= $fname ?>" name="fname">
              </div> -->
              <div class="col">
                <label class="form-lable">

                Dia Chi
                </label>
                <input type="text" class="form-control" placeholder="example Do" name="diaChi" value="<?= $diaChi ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label class="form-lable">

                HO Ten 
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
            <input type="text" class="form-control" name="pass" id="passInput">

            <!-- chon BirthDate and Upload Image -->
            <section class="container">
                <h3 class="pt-4 pb-2">BirthDate</h3>
                <!-- <form id="uploadForm" method="post" enctype="multipart/form-data" action="req/addTeacher.php"> -->
                    <div class="row form-group">
                        <label for="date" class="col-sm-1 col-form-label">Date</label>
                        <div class="col-sm-4">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control" name="birthdate">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- Add the file input next to the birth date input -->
                        <div class="col-sm-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" accept="image/*" onchange="previewImage();">
                            <img id="imagePreview" src="#" alt="Image Preview" style="max-width: 100%; display: none;">
                        </div>
                    </div>
                    </div>
                    <!-- Image preview container -->
                    
                <!-- </form> -->
            </section>

            <script type="text/javascript">
                $(function() {
                    $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
                });

                function previewImage() {
                var file = document.getElementById("avatar").files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    document.getElementById("imagePreview").style.display = "block";
                    document.getElementById("imagePreview").src = reader.result;
                }
                if (file) {
                    reader.readAsDataURL(file);
                }
            }
            </script>
            <!-- chon Gioi Tinh -->
            <div class="col">
              <label class="form-lable">

                Gioi Tinh
              </label>


              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="genderbtn" value="M" id="btnradio1">
                            <label class="btn btn-outline-primary rounded ms-5" for="btnradio1">Nam</label>

                            <input type="radio" class="btn-check" name="genderbtn" value="F" id="btnradio2">
                            <label class="btn btn-outline-primary rounded ms-2" for="btnradio2">Nu</label>

                        </div>


            </div>
         


            <h3> Ma Giao Vien </h3>
           
            <input type="text" class="form-control" placeholder="example:tungdo" name="idGV" value="<?= $maGiaoVien ?>">
           

            <h3> Mon Hoc</h3>

           



 


            <div class="mb-3">
              <label class="form-label">Subject</label>
              <div class="row row-cols-5">
              <select name="subjects" class="form-select" aria-label="Default select example">
                                    <?php foreach ($subjects as $subject) : ?>


                                        <option value="<?= $subject['subject_id'] ?>"> <?= $subject['subject'] ?></option>
                                    <?php endforeach ?>
                                </select>

              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Grade</label>
              <div class="row row-cols-5">
              <select name="grades" class="form-select" aria-label="Default select example">
                                    <?php foreach ($grades as $grad) : ?>


                                        <option value="<?= $grad['grade_id'] ?>"> <?= $grad['grade'] ?></option>
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