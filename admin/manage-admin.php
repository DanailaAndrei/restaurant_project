<?php include('partials/menu.php'); ?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /><br />

        <!-- Button to add admin -->
        <a href="add-admin.php" class = "btn-primary">Add admin</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>1. </td>
                <td>Andrei</td>
                <td>andrei</td>
                <td>
                    <a href="#" class = "btn-secondary">Update admin</a>
                    <a href="#" class = "btn-danger">Delete admin</a>
                </td>
            </tr>

            <tr>
                <td>2. </td>
                <td>Andrei</td>
                <td>andrei</td>
                <td>
                    <a href="#" class = "btn-secondary">Update admin</a>
                    <a href="#" class = "btn-danger">Delete admin</a>
                </td>
            </tr>

            <tr>
                <td>3. </td>
                <td>Andrei</td>
                <td>andrei</td>
                <td>
                    <a href="#" class = "btn-secondary">Update admin</a>
                    <a href="#" class = "btn-danger">Delete admin</a>
                </td>
            </tr>
        </table>

    </div>
</div>
<!-- Main Content Section End -->

<?php include('partials/footer.php'); ?>