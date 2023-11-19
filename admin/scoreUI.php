<?php

session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] = 'Admin') {
        include "../DB_connection.php";
        include "data/score.php";
        include "inc/navBar.php";
        $scores = 0;
        
?>

        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Home - Su Pham Thuc Hanh High School</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="..css/style.css">
            <link rel="stylesheet" href="..css/style2.css">
            <link rel="icon" href="..logo.png">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.mizn.css">

            <title>Document</title>
            <style>

        
            </style>
        </head>

    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <!-- <label for="mahs">Mã học sinh:</label> -->
    <input type="text" name="btnTimkiem" required placeholder="example: HS001">
    <input type="submit" value="submit">
    </form>


    
    <?php
    
    if(isset($_POST['btnTimkiem'])){
        $mahocsinh = $_POST['btnTimkiem'];
        $scores = getAllScore($conn, $mahocsinh);
    }?>


             <div class="modal fade" id="modalform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content" style="width: 800px; height: 320px; ">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit score</h1>
                                   
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="Save()"></button>
                                </div>
                                <div class="modal-body" id="modalbody">
                                          
                                </div>
                               
                            </div>
                        </div>
                    </div>

     <?php
       
             if ($scores != 0) {
                ?>
                <div  style="margin-left: 50px;">
                <div style="display: flex;"   >
         <div class="card" style="width: 22rem;" >
          <img src="../img/student-<?=$scores[0]['gioitinh']?>.jpg" class="card-img-top" alt="...">
          <div class="card-body" style="flex: 0 0 auto;">
            <h5 class="card-title text-center">@<?=$scores[0]['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Mã Học Sinh: <?=$scores[0]['mahs']?></li>
            <li class="list-group-item">Username: <?=$scores[0]['username']?></li>
            <li class="list-group-item">Họ và tên: <?=$scores[0]['hotenhs']?></li>
            <li class="list-group-item">Ngày sinh: <?=$scores[0]['ngaysinh']?></li>
            <li class="list-group-item">Giới tính: <?=$scores[0]['gioitinh']?></li>
            <li class="list-group-item">Địa Chỉ: <?=$scores[0]['diachi']?></li>
            <li class="list-group-item">Mã Lớp: <?=$scores[0]['malop']?></li>
          </ul>
        </div>
              
         
            
                <div class="container mt-1" >
                <h2 style="text-align: center;">BẢNG ĐIỂM CHI TIẾT</h2>
                    <div class="table-responsive">
                        <table class="table table-success table-striped n-table">
                            <thead>
                                <tr>
                                <th scope="col">Môn Học</th>
                                    <th scope="col">Điểm 15 phút</th>
                                    <th scope="col">Điểm 45 phút</th>
                                    <th scope="col">Điểm Thi</th>
                                    <th scope="col">function</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($scores as  $score) { ?>
                                            
                                        
                                    <tr>
                                        <td><?= $score['subject'] ?></td>
                                        <td><?= $score['diem15'] ?></td>
                                        <td><?= $score['diem45'] ?></td>
                                        <td><?= $score['thi'] ?></td>
                        
                                        <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalform" onclick="btnclick('score-edit.php?idscore=<?= $score['id_score'] ?>')" data-bs-id=<?= $score['id_score'] ?>>
                                                Edit
                                            </button>
                                    
                                        </td>
                                    </tr>


                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
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



            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
                
            <?php } 
            
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

           
      <script src="../js/script.js"></script>
      <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(7) a").addClass('active')
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