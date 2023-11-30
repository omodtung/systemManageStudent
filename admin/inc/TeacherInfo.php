<?php


session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 'Admin') {
    include_once "../../DB_connection.php";
    include_once "../DAL/data/subject.php";
    include_once "../DAL/data/grade.php";
    include_once "../DAL/data/getteacher.php";
    include_once "../BL/data/subject.php";
    include_once "../BL/data/grade.php";
    include_once "../BL/data/teacher.php";
    $subjects = getAllSubjectsBL($conn);
    $grades = getAllGradeBL($conn);
    $teacher = getTeacherBL($conn,$_GET['idteach']);
    $id = $_GET['idteach'];
    //$img = getImgById2($conn,$id);
    $hoten = '';
    //$lname  = '';
    $uname  = '';
    $pass = '';
    //$flname = '';
    $lopChuNhiem = '';
    $teacher_subjects = '';
    if (isset($_GET['hoten'])) $hoten =  $_GET['hoten'];

    //if (isset($_GET['lname'])) $lname  = $_GET['lname'];

    if (isset($_GET['username'])) $uname = $_GET['username'];

    //if (isset($_GET['subjects'])) $teacher_subjects = $_GET['uname'];

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
      //include_once "inc/navBar.php";
      ?>

      <div class="container mt-5 pb-3">
        <form method="post" class="shadow p-3 mt-2 form-w" action="BL/teacher-edit.php?id=<?= $id ?>">
          
          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
              <?= $_GET['error'] ?>

            </div>



          <?php } ?>

          <?php
      //include_once "inc/navBar.php";
      ?>

      <div class="container mt-5 pb-3">
      <?php 
          
          $defaultImagePath = "../img/student-{$teacher['gioitinh']}.jpg";

          if ($teacher['id'] && isset($img['id_teacher'])) {
              $imagePath ='systemManageStudentNew/' .$img['image_path'];
        } else {

            $imagePath = $defaultImagePath;
        }
     ?>

<!-- <img src="<?= $imagePath ?>" class="card-img-top" alt="Student Image" style="height: 220px; width:220px; cursor: pointer;" onclick="triggerFileInput()"> -->
          <div class="mb-3">

            <!-- <div class="form-row">
              <div class="col">
                <label class="form-lable">

                  First Name
                </label>
                <input type="text" class="form-control" placeholder="example Tung" value="<?= $teacher['fname'] ?>" name="fname">
              </div>
              <div class="col">
                <label class="form-lable">

                  Last Name
                </label>
                <input type="text" class="form-control" placeholder="example Do" name="lname" value="<?= $teacher['lname'] ?>">
              </div>
            </div> -->
            <div class="form-row pt-4">
              <div class="col">
                <label class="form-lable">

                  Full Name
                </label>
                <input type="text" disabled class="form-control" placeholder=" example :TungDo" name="hoten" value="<?= $teacher['hoten'] ?>">
              </div>
              <div class="col">
                <label class="form-lable">

                  User Name
                </label>
                <input type="text" disabled class="form-control" placeholder="example:tungdo" name="uname" value="<?= $teacher['username'] ?>">

              </div>
              <div class="col">
                <label class="form-lable">

                  Address
                </label>
                <input type="text" disabled class="form-control" placeholder="example 22nd Roads" value="<?= $teacher['diachi'] ?>" name="diachi">
              </div>
            </div>

            <label class="form-lable pt-4">

              PassWord
            </label>
            <input type="text" id="passtext" class="form-control" placeholder="PassWord" value="<?= $teacher['password'] ?>" name="pass" disabled>
            <div class="pt-2 ms-2">
                
                
            </div>
            <!-- chon BirthDate -->
            <section class="container">
              <h3 class="pt-4 pb-2">BirthDate</h3>
              <form>
                <div class="row form-group">
                  <label for="date" class="col-sm-1 col-form-label">Date</label>
                  <div class="col-sm-4">
                    <div class="input-group date" id="datepicker">
                      <input type="text" class="form-control" disabled name="birthdate" value="<?php echo date("d/m/Y", strtotime($teacher['ngaysinh'])); ?>">
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
            <!-- <script type="text/javascript">
              $(function() {
                $('#datepicker').datepicker({dateFormat : 'yy-mm-dd'});
              });
            </script> -->
            <!-- chon Gioi Tinh -->
            <div class="col">
              <label class="form-lable">

                Gioi Tinh
              </label>

              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="genderbtn" value="Nam" id="btnradio1" disabled autocomplete="off" <?php echo ($teacher['gioitinh'] == "Nam") ? 'checked' : ''; ?>>
                <label class="btn btn-outline-primary rounded ms-5" for="btnradio1">Nam</label>

                <input type="radio" class="btn-check" name="genderbtn" value="Nữ" id="btnradio2" disabled autocomplete="off" <?php echo ($teacher['gioitinh'] == "Nữ") ? 'checked' : ''; ?>>
                <label class="btn btn-outline-primary rounded ms-2" for="btnradio2">Nu</label>

            </div>

            </div>
            

            <h3> Mon Hoc</h3>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                    <label class="form-label">Subject</label>
                    
                    </div>
                    <div class="col-md-3">
                        <select name="subjects[]" multiple disabled>
                            <?php foreach ($subjects as $subject) : ?>
                            <option value="<?= $subject['subject_code'] ?>" <?php echo (in_array($subject['subject_code'],explode(",", $teacher['mamonhoc']))) ? 'selected' : ''; ?>><?= $subject['subject'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-sm-2">
                    <label class="form-label">Grade</label>
                    
                    </div>
                    <div class="col-sm-1">
                        <select name="grades[]" multiple disabled>
                        <?php foreach ($grades as $grade) : ?>
                        <option value="<?= $grade['grade_id'] ?>" <?php echo (in_array($grade['grade_id'],explode(",", $teacher['makhoi']))) ? 'selected' : ''; ?>><?= $grade['grade_code'] ?>-<?= $grade['grade'] ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                </div>
            </div>
            






            <div class="position-relative pt-5">
                
                <button type="button" class="btn btn-primary position-absolute bottom-0 end-0" data-bs-dismiss="modal" id="Sucsessbtn" onclick="Save()">Close</button>
            </div>
            
        </form>
        
      </div>





    </body>

    </html>

  <?php } else { ?>

  <?php  } ?>

<?php } else { ?>

<?php } ?>