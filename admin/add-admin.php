<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); //Removing session message
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full-name" placeholder="enter name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="enter username">
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
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from form and save it in database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked
        // echo "Button clicked";

        // get the data from form
        $full_name = $_POST['full-name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password encryption with md5

        //sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
                full_name = '$full_name',
                username = '$username',
                password = '$password'
                ";    
        
        //Execute query and save data in database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //Check if data was inserted or not(query was executed successfully or not)
        if($res==TRUE)
        {
            // echo 'data inserted';
            //Create a session variable to display message
            $_SESSION['add'] = "Admin added successfully";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // echo 'failed to insert data';
            //Create a session variable to display message
            $_SESSION['add'] = "Failed to add admin";
            //Redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
?>