<?php 
    session_start();
    require_once("../dbconnection.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM usertbl WHERE id = $id";
        $query = $conn->query($sql);
    
        if($query){
            $_SESSION['sess_delete_succ'] = "Data deleted successfully!";
        } else {
            $_SESSION['sess_delete_err'] = "Failed! Data was not deleted!";
            
        }
    } else {
        $_SESSION['sess_delete_err'] = "No ID is specified!";
    }
    header("Location: ../index.php");

?>