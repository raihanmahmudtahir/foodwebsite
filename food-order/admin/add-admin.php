<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php

            if(isset($_SESSION['add']))//checking whether session is set or not
            {
                echo $_SESSION['add'];//display session message if set
                unset($_SESSION['add']);//remove session message
            }

        ?>

        <br><br>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username"placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>    

            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

    //Prcoess the value from form and save it in database//
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //Button clicked
        //echo "Button clicked";
        //1. Get Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        //2. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET

            full_name='$full_name',
            username='$username',
            password='$password'

        
        ";

        //3. Execute query and save data in database
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //data inserted
            //echo "Data Inserted";
            //Create a session variable to display message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            //echo "Failed to insert data";
             //Create a session variable to display message
             $_SESSION['add'] = "Failed to Add Admin";
             //Redirect Page to Add Admin
             header("location:".SITEURL.'admin/add-admin.php');
        }

        

    }
   
?>