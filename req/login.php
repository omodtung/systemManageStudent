<?php
if (isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['role'])) {

    include "../DB_connection.php";
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    if (empty($uname)) {
        $em = "Username is Required";
        header("Location: ../login.php?error=$em");
        exit;
    } else if (empty($pass)) {
        $em = "Password is Required";
        header("Location: ../login.php?error=$em");
        exit;
    } else if (empty($role)) {
        $em = "an error Require";
        header("Location: ../login.php?error=$em");
        exit;
    } else {
        if ($role == '1') {
            $sql = "select * from admin where username=?";
            $role = "Admin";
        } else if ($role == '2') {
            $sql = "select * from teachers where username=?";
            $role = "Teacher";
        } else {
            $sql = "select *from students where username = ?";
            $role = "Student";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username  = $user['username'];
            $password = $user['password'];
            $fname = $user['fname'];
            $id = $user['id'];
            if ($username === $uname) {
                if (password_verify($pass, $password)) {

                    $_SESSION['id'] = $id;
                    $_SESSION['fname'] = $fname;
                    $_SESSION['role'] = $role;
                    header("Location: ../home.php");

                    exit;
                } else {
                    $em ="Incorret username or password";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            }
            else
            {
                $em = "incorrect username or password";
                header("Location: ../login.php?error=$em");
                exit;

            }
        }else{
            $em="incorrect username or password";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>