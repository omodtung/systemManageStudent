<?php
include("database.php");
include("getCategory.php");
include("filter-data.php");
?>

<form method="post" action="applogic/rebound.php?indexFilter=1">

  <select name="filterByCategory">

    <?php
    $getCategories = getCategory();

    foreach ($getCategories as $category) {

    ?>
      <option value="<?php echo $category['mamonhoc']; ?>" <?php echo  isset($_POST['filterByCategory']) && $_POST['filterByCategory'] == $category['mamonhoc'] ? 'selected' : ''; ?>>
        <?php echo $category['mamonhoc']; ?>
      </option>
    <?php } ?>


  </select>

  <input type="submit" name="filter">

</form>


<?php
include("display-data.php");
?>