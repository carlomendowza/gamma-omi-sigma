<!DOCTYPE HTML>
<html>
    <head>
        <title>Update Stock </title>
        <link rel ="stylesheet" type= "text/css" href="UpdStockStyle.css">
        <?php include 'config.php'; ?>
    </head>

    <body>
        <div id = "container">
            <div class = "Bar">
                <ul id = "BarList">
                    <li id = "Name"> User Name Here </li>
                    <li> <a href = "./Main_Menu.php"> Main Menu </a> </li>
                    <li> <a href = "./Login.php"> Log Out </a> </li>
                </ul>
            </div>
            <div id = "Header">
                <div id = "UpdateProduct">
                    <h1>Update Stock</h1>
                </div>
            </div>
            
            <div class = "content">
                <div id = "left">
                        <div id="leftforms">
                        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
                    
                        Product Line:<br>
                        <input type="text" name="productLine" placeholder ="Line"><br>
                    
                        Type:<br>
                        <input type="text" name="productType" placeholder="Type"><br>

                        <!-- </form> -->
                        </div>
                        
                        <!-- Might replace to drop down buttons-->
                        <div id="buttons">
                        <!-- <forms> -->
                        Colors<br>
                        <input type="radio" name="color" value="red"> Red<br>
                        <input type="radio" name="color" value="orange"> Orange <br>
                        <input type="radio" name="color" value="yellow"> Yellow<br>
                        <input type="radio" name="color" value="green"> Green<br>
                        <input type="radio" name="color" value="purple"> Purple<br>
                        <input type="radio" name="color" value="pink"> Pink<br>
                        <input type="radio" name="color" value="black"> Black<br>
                        <!-- </forms> -->
                        </div>
                    
                </div>
                
                <div id="right">
                    
                        <div id="rightforms">
                        <!-- <form> -->
                        <input type="number" name="stock" value = "0" min ="0" max="99"> <br>
                        <!-- </form>  -->
                        </div>
                
                        <div id="submit">

                        </div>

                </div>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $productLine =  test_input($_POST["productLine"]);
                    $productType =  test_input($_POST["productType"]);
                    $color =  test_input($_POST["color"]);
                    $stock =  test_input($_POST["stock"]);

                $sql ="UPDATE stock SET quantity = $stock, last_update = NOW() WHERE product_type = '".$productType."' AND color = '".$color."';";

                 if ($conn->query($sql) === TRUE) {
                        echo "Stock for ". $productType . " has been updated successfully.<br>";
                    }
                 else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
            ?>

            <div id = "footer">
                <!-- <form action = "./Main_Menu.php"> -->
                <input type= "submit" value="Update">
                </form> 
            </div>
        </div>
    </body>
</html>
