<?php include('partials/menu.php');
 $id = $_GET['id'];
 $sql = "SELECT full_name,username FROM tbl_admin WHERE id = $id";
 $res = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($res);
 $full_name = $row['full_name'];
 $username = $row['username'];
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update admin</h1>

        <br><br>

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']); //Removing session message
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full-name" placeholder=<?php echo $full_name; ?>>
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder=<?php echo $username; ?>>
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $full_name = $_POST['full-name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "UPDATE tbl_admin SET 
                full_name = '$full_name',
                username = '$username',
                password = '$password'
                WHERE id = $id";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == true) {
        // echo "admin updated";
        $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
        echo $_SESSION['update'];
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        // echo "failed to delete admin";
        $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
        echo $_SESSION['update'];
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}

?>