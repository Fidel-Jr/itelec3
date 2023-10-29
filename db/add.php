<?php 

    session_start();
    include("navbar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">
        <h1>Add User</h1>
        <form action="./operation/insert.php" method="post">
            <div class="mb-3">
                <label for="">Enter name:</label>
                <input type="text" name="txtName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Enter Username:</label>
                <input type="text" name="txtUsername"class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Enter Password:</label>
                <input type="password" name="txtPassword"class="form-control">
            </div>
            <input type="submit" value="SAVE" class="btn btn-primary" name="btnSave">
            <a href="index.php" class="btn btn-danger">CANCEL</a>
            <hr>
            <?php 
            
                if(isset($_SESSION['sess_add_err'])){
                    $error = $_SESSION['sess_add_err'];
                    echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>' . $error .'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['sess_add_err']);
                }
                if(isset($_SESSION['sess_add_succ'])){
                    $success = $_SESSION['sess_add_succ'];
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>' . $success .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sess_add_succ']);
                }
            
        ?>
        </form>
        
    </div>


</body>
</html>