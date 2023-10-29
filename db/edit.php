<?php 

    session_start();
    require_once("dbconnection.php");
    include("navbar.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // $name = $_GET['name'];
        // $username = $_GET['username'];
        // $password = $_GET['password'];
        $sql = "SELECT * FROM usertbl WHERE id = '$id'";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
            $name = $row['name'];
            $username = $row['username'];
            $password = $row['password'];
        }
    }

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
        <?php 
            
        ?>
        
        <form action="./operation/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="">Enter name:</label>
                <input type="text" name="txtName" class="form-control" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="">Enter Username:</label>
                <input type="text" name="txtUsername"class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="mb-3">
                <label for="">Enter Password:</label>
                <input type="password" name="txtPassword"class="form-control" value="<?php echo $password; ?>">
            </div>
            <input type="submit" value="SAVE" class="btn btn-primary" name="btnUpdate">
            <a href="index.php" class="btn btn-danger">CANCEL</a>
            <hr>
            <?php 
            
                if(isset($_SESSION['sess_upd_err'])){
                    $error = $_SESSION['sess_upd_err'];
                    echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>' . $error .'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        unset($_SESSION['sess_upd_err']);
                }
                if(isset($_SESSION['sess_upd_succ'])){
                    $success = $_SESSION['sess_upd_succ'];
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>' . $success .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sess_upd_succ']);
                }
            
        ?>
        </form>
       
    </div>


</body>
</html>