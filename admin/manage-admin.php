<?php include('partials/menu.php'); ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); //Removing session message
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        
        ?>

        <br /><br /><br />

        <!-- Button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add admin</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            //query to get all admins
            $sql = "SELECT * from tbl_admin";
            //execute the query
            $res = mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if ($res == true) {
                //count rows to check if we have data or not
                $count = mysqli_num_rows($res);

                $sn = 1; //create variable and assign the value

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update admin</a>
                                <a href="<?php echo SITEURL . "admin/delete-admin.php?id=" . $id; ?>" class="btn-danger">Delete admin</a>
                            </td>
                        </tr>

            <?php
                    }
                } else {
                }
            }
            ?>


        </table>

    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>