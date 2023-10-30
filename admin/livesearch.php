<?php

// Close any existing database connections
$pdo = null;

// Try to connect to the database
try {
    $pdo = new PDO("mysql:host=localhost;dbname=test3", "root", "");
} catch (PDOException $e) {
    echo "Error connecting to the database: " . $e->getMessage();
    exit;
}
if(isset($_GET["student"])) {
    echo '<a href="./req/exportteacher.php?studentsearched=' . $_POST['input'] . '" class="btn btn-outline-primary ">Export Search Result</a>';
    try {
        $input = $_POST['input'];
        $query = "SELECT * FROM students JOIN avgscore ON students.id=avgscore.student_id WHERE hotenhs LIKE '{$input}%'";
        $rows = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    
        // If there are any results, display them in a table
        if (count($rows) > 0) {
            echo '<table class="table table-striped" id="searchresult">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Student ID</th>';
            echo '<th scope="col">User Name</th>';
            echo '<th scope="col">Ho Ten</th>';
            echo '<th scope="col">Hanh Kiem</th>';
            echo '<th scope="col">Hoc Luc</th>';
            echo '<th scope="col">Ngay Sinh</th>';
            echo '<th scope="col">Gioi Tinh</th>';
            echo '<th scope="col">Dia Chi</th>';
            echo '<th scope="col">Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
    
            foreach ($rows as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['hotenhs'] . '</td>';
                echo '<td>' . $row['hanhkiem'] . '</td>';
                echo '<td>' . $row['HocLuc'] . '</td>';
                echo '<td>' . $row['ngaysinh'] . '</td>';
                echo '<td>' . $row['gioitinh'] . '</td>';
                echo '<td>' . $row['diachi'] . '</td>';
                
                echo '<td>';
                echo '<a href="student-edit.php?idstudent=' . $row['id'] . '" class="btn btn-warning">Edit</a>';
                echo '<a href="" class="btn btn-danger">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
    
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<h3>No students found.</h3>';
        }
    } catch (PDOException $e) {
        echo "Error executing the query: " . $e->getMessage();
    }
}
else {echo '<a href="./req/exportteacher.php?searched=' . $_POST['input'] . '" class="btn btn-outline-primary ">Export Search Result</a>';

// Try to execute the query
try {
    $input = $_POST['input'];
    $query = "SELECT * FROM teachers WHERE hoten LIKE '{$input}%'";
    $rows = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

    // If there are any results, display them in a table
    if (count($rows) > 0) {
        echo '<table class="table table-striped" id="searchresult">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Teacher ID</th>';
        echo '<th scope="col">User Name</th>';
        echo '<th scope="col">Ho Ten</th>';
        echo '<th scope="col">Ma Mon Hoc</th>';
        echo '<th scope="col">Ngay Sinh</th>';
        echo '<th scope="col">Gioi Tinh</th>';
        echo '<th scope="col">Dia Chi</th>';
        echo '<th scope="col">Ma Giao Vien</th>';
        echo '<th scope="col">Ma Khoi</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['hoten'] . '</td>';
            echo '<td>' . $row['mamonhoc'] . '</td>';
            echo '<td>' . $row['ngaysinh'] . '</td>';
            echo '<td>' . $row['gioitinh'] . '</td>';
            echo '<td>' . $row['diachi'] . '</td>';
            echo '<td>' . $row['magv'] . '</td>';
            echo '<td>' . $row['makhoi'] . '</td>';
            echo '<td>';
            echo '<a href="teacher-edit.php?idteach=' . $row['id'] . '" class="btn btn-warning">Edit</a>';
            echo '<a href="" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<h3>No teachers found.</h3>';
    }
} catch (PDOException $e) {
    echo "Error executing the query: " . $e->getMessage();
}
}
// Close the database connection
$pdo = null;

?>
