<?php
if(!empty($filterDataByCategory)) {
?>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
    

<th scope="col">Teacher ID</th>
<th scope="col">USER NAME</th>
<th scope="col">PASSWORD</th>
<th scope="col">Ho Ten</th>
<th scope="col">Ma Mon Hoc</th>
<th scope="col"> ngay sinh</th>

<th scope="col"> Gioi Tinh </th>
<th scope="col"> Dia chi </th>
<th scope="col"> Ma giao vien </th>



    </tr>
<?php
foreach($filterDataByCategory as $teacher){
   
?>
<tr>
    <!--  -->
    <td><?= $teacher['id'] ?></td>
                    <td><?= $teacher['username'] ?></td>
                    <td><?= $teacher['password'] ?></td>
                    <td><?= $teacher['hoten'] ?></td>
                    

                    <td><?= $teacher['mamonhoc'] ?></td>
                    <td><?= $teacher['ngaysinh'] ?></td>
                    <td><?= $teacher['gioitinh'] ?></td>
                    <td><?= $teacher['diachi'] ?></td>
                    <td><?= $teacher['magv'] ?></td>

</tr>
<?php
 }
?>

</table>
<?php
}

?>