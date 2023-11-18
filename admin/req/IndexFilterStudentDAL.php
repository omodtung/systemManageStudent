<?php
include("database.php");
include("req/getCategoriesStudent.php");
include("req/filterDataStudent.php");
?>

<form method="post" action="applogic/reboundStudent.php?indexFilterStudent=1">

  <select name="filterByCategory1">

    <?php
    $getCategories = getCategory();

    foreach ($getCategories as $category) {

    ?>
      <option value="<?php echo $category['malop']; ?>" <?php echo  isset($_POST['filterByCategory1']) && $_POST['filterByCategory1'] == $category['malop'] ? 'selected' : ''; ?>>
        <?php echo $category['malop']; ?>
      </option>
    <?php } ?>


  </select>

  <input type="submit" name="filter1">

</form>


<?php
include("req/displayDataStudentDAL.php");
?>