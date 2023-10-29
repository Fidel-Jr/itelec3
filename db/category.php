<?php 

    require_once('../db/dbconnection.php');
    include("navbar.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="container p-3 border bg-dark mt-3">
        <h2 class="text-white text-center">Category Table</h2>
           
    </div>
    <div class="container border p-3">
        
        <?php 
        
            $sql = "SELECT * FROM categorytbl";
            $query = $conn->query($sql);
            $numRows = $query->num_rows;

            if($numRows>0){

            ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            while($row = $query->fetch_assoc()){
                                $id = $row['category_id'];
                                $name = $row['category_name'];
                                $description = $row['category_description'];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $description ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
        <?php } ?>
    
    </div>


</body>
</html>