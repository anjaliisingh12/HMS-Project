<?php
// ================= SESSION & CONFIG =================
session_start();

$_SESSION["user"] = "";
$_SESSION["usertype"] = "";

date_default_timezone_set('Asia/Kolkata');
$_SESSION["date"] = date('Y-m-d');

// DB connection
include("connection.php");

// Error message
$error = '<label class="form-label">&nbsp;</label>';

// ================= LOGIN LOGIC =================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contact  = $_POST['usercontact'] ?? '';
    $password = $_POST['userpassword'] ?? '';

    if (empty($contact) || empty($password)) {
        $error = '<label class="form-label" style="color:red;">Please fill all fields</label>';
    } else {

        // Check user type
        $stmt = $database->prepare("SELECT usertype FROM webuser WHERE contact=?");
        $stmt->bind_param("s", $contact);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $utype = $result->fetch_assoc()['usertype'];

            // ================= PATIENT =================
            if ($utype === 'p') {
                $stmt = $database->prepare(
                    "SELECT pcontact FROM patient WHERE pcontact=? AND ppassword=?"
                );
                $stmt->bind_param("ss", $contact, $password);
                $stmt->execute();

                if ($stmt->get_result()->num_rows === 1) {
                    $_SESSION['user'] = $contact;
                    $_SESSION['usertype'] = 'p';
                    header("Location: patient/index.php");
                    exit();
                } else {
                    $error = '<label style="color:red;">Invalid contact or password</label>';
                }

            // ================= ADMIN =================
            } elseif ($utype === 'a') {
                $stmt = $database->prepare(
                    "SELECT acontact, role FROM admin WHERE acontact=? AND apassword=?"
                );
                $stmt->bind_param("ss", $contact, $password);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows === 1) {
                    $row = $res->fetch_assoc();
                    $_SESSION['user'] = $row['acontact'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['usertype'] = 'a';
                    header("Location: admin/index.php");
                    exit();
                } else {
                    $error = '<label style="color:red;">Invalid contact or password</label>';
                }

            // ================= DOCTOR =================
            } elseif ($utype === 'd') {
                $stmt = $database->prepare(
                    "SELECT doccontact FROM doctor WHERE doccontact=? AND docpassword=?"
                );
                $stmt->bind_param("ss", $contact, $password);
                $stmt->execute();

                if ($stmt->get_result()->num_rows === 1) {
                    $_SESSION['user'] = $contact;
                    $_SESSION['usertype'] = 'd';
                    header("Location: doctor/index.php");
                    exit();
                } else {
                    $error = '<label style="color:red;">Invalid contact or password</label>';
                }
            }

        } else {
            $error = '<label style="color:red;">Account not found</label>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<center>
<div class="container">
<form method="POST">
<table style="width:100%;">

<tr>
    <td><p class="header-text">Welcome Back!</p></td>
</tr>

<tr>
    <td><p class="sub-text">Login with your details</p></td>
</tr>

<tr>
    <td>
        <label>Contact Number</label>
        <input type="text" name="usercontact" class="input-text" required>
    </td>
</tr>

<tr>
    <td>
        <label>Password</label>
        <input type="password" name="userpassword" class="input-text" required>
    </td>
</tr>

<tr>
    <td><?php echo $error; ?></td>
</tr>

<tr>
    <td>
        <input type="submit" value="Login" class="login-btn btn-primary">
    </td>
</tr>

<tr>
    <td>
        <br>
        Don't have an account?
        <a href="signup.php">Sign Up</a>
    </td>
</tr>

</table>
</form>
</div>
</center>
</body>
</html>