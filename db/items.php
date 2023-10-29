<?php 

    require_once('../db/dbconnection.php');
    include("navbar.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <script src="../bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="container p-3 border bg-dark mt-3">
        <h2 class="text-white text-center">Item Table</h2>         
    </div>
    <div class="container border p-3">
        
        <?php 
        
            $sql = "SELECT * FROM itemtbl";
            $query = $conn->query($sql);
            $numRows = $query->num_rows;

            if($numRows>0){

            ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            while($row = $query->fetch_assoc()){
                                $id = $row['item_id'];
                                $name = $row['item_name'];
                                $price = $row['price'];
                                $qty = $row['quantity'];
                                $category = $row['category']
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $price ?></td>
                                <td><?php echo $qty ?></td>
                                <td><?php echo $category ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
        <?php } ?>
    
    </div>

</body>
</html>