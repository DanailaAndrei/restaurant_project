<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>

        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                header('location:' . SITEURL . 'admin/manage-admin.php');
            }
        }

        if (isset($_SESSION['update'])) {
            unset($_SESSION['update']);
        }

        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old password:</td>
                    <td>
                        <input type="password" name="old-password" placeholder="old password">
                    </td>
                </tr>

                <tr>
                    <td>New password: </td>
                    <td>
                        <input type="password" name="new-password" placeholder="new password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm new password: </td>
                    <td>
                        <input type="password" name="confirm-password" placeholder="confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
$password = $row['password'];

if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $old_password = md5($_POST["old-password"]);
    $new_password = md5($_POST["new-password"]);
    $confirm_password = md5($_POST["confirm-password"]);

    if ($password != $old_password)
        echo "Wrong password";
    else 
        if ($new_password != $confirm_password)
        echo "Passwords don't match";
    else {
        $sql = "UPDATE tbl_admin SET 
                password = '$new_password'
                WHERE id = $id";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if ($res == true) {
            $_SESSION['update'] = "<div class='success'>Password updated successfully</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to update password</div>";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
}
?>

<?php include('partials/footer.php'); ?>