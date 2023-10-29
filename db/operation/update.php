<?php 

    session_start();
    require_once("../dbconnection.php");
    if(isset($_POST['btnUpdate'])){
        $id = $_POST['id'];
        $name = $_POST['txtName'];
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        if(!empty($name) && !empty($username) && !empty($password)){
            $sql = "UPDATE usertbl SET name = '$name', username = '$username', password = '$password' WHERE id = '$id'";
            $query = $conn->query($sql);
            if($query){
                $_SESSION['sess_upd_succ'] = "Data was successfully updated!";
            } else {
                $_SESSION['sess_upd_err'] = "Failed to update the data.";
            }
        } else {
            $_SESSION['sess_upd_err'] = "Please input all fields";
        }
        
    } else {
        $_SESSION['sess_upd_err'] = "Failed to update the data.";
    }
    
    header("Location: ../edit.php?id=$id");

?>