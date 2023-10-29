<?php 

    session_start();
    require_once('../db/dbconnection.php');
    include("navbar.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./operation/confirmation.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Users</title>
</head>
<body>


    <div class="container border p-3 mt-3 bg-dark">
        <h2 class="text-white text-center">User Table</h2>
    </div>
    <div class="container border">   
        
        <?php if(isset($_SESSION['sess_delete_succ'])){echo '
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Success! </strong>' . $_SESSION['sess_delete_succ'] .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; unset($_SESSION['sess_delete_succ']);} 
            
            if(isset($_SESSION['sess_delete_err'])){
                echo '
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Failed! </strong>' . $_SESSION['sess_delete_err'] .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['sess_delete_err']);
            }
            
        ?>
        <?php if(isset($_SESSION['sess_upd_succ'])){echo '
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Success! </strong>' . $_SESSION['sess_upd_succ'] .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; unset($_SESSION['sess_upd_succ']);} 
            
            if(isset($_SESSION['sess_upd_err'])){
                echo '
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Failed! </strong>' . $_SESSION['sess_upd_err'] .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                unset($_SESSION['sess_upd_err']);
            }
            
        ?>
        <?php 
        
            $sql = "SELECT * FROM usertbl";
            $query = $conn->query($sql);
            $numRows = $query->num_rows;

            if($numRows>0){

            ?>

                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            while($row = $query->fetch_assoc()){
                                $id = $row['id'];
                                $name = $row['name'];
                                $username = $row['username'];
                                $password = $row['password'];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $username ?></td>
                                <td><?php echo $password ?></td>
                                <td>
                                    <a href="./operation/delete.php?id=<?php echo $id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                                    <a href="edit.php?id=<?php echo $id;?>" class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen"></i> Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
        <?php } ?>
    
    </div>


</body>
</html>