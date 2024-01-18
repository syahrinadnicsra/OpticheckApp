<?php
session_start();
include('conn.php');

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role']; // Retrieve the selected role from the dropdown

// Modify the SQL query to check both username, password, and role
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'");
$data = mysqli_fetch_assoc($query);

// var_dump($data['role']);die;
if (mysqli_num_rows($query) == 1) { // If the user exists
    $_SESSION['nama'] = $_POST['nama'];

    // Redirect based on user role
    switch ($role) {
        case 'admin':
            header('Location:../pages/Admin/indexAdmin.php');
            break;
        case 'guru':
            // Add redirection for 'guru' role
            header('Location:../pages/Guru/indexGuru.php');
            break;
        case 'siswa':
            // Add redirection for 'siswa' role
            header('Location:../pages/Siswa/indexSiswa.php');
            break;
        default:
            // Redirect to a default page if the role is not recognized
            header('Location:../');
            break;
    }
} else {
    header('Location:../'); // If login fails, redirect back to login page
}
?>
