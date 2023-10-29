<?php 

    
    require_once('../dbconnection.php');
    session_start();

    if(isset($_POST['btnSave'])){
        $name = $_POST['txtName'];
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        if(!empty($name) && !empty($username) && !empty($password)){
            $sql = "INSERT INTO usertbl(name, username, password) VALUES('$name','$username','$password')";
            $query = $conn->query($sql);
            if($query){
                $_SESSION['sess_add_succ'] = "New data was added.";
                
            } else{
                $_SESSION['sess_add_err'] = "Failed! Data was not Saved";
            }
        } else {
            $_SESSION['sess_add_err'] = "Please complete all Fields!";
        }


    } else {    
        $_SESSION['sess_add_err'] = "Please complete all Fields!";
    }

    
    header("Location: ../add.php");
    
    

?>