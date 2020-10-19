<?php session_start();
$connection = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$sql = "SELECT * FROM phones";
$results = mysqli_query($connection, $sql);

if(isset($_GET['action']) && $_GET['action'] == 'remove'){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
        $query = 'Select * from orders where customerID = '.$_SESSION['userID'];
        $result = mysqli_query($connection, $query);
        $phoneInCart = false;
        while($row = mysqli_fetch_assoc($result)){
            if($row['phoneID'] == $_POST['remove']){
                if($row['quantity'] > 1){
                    $query = 'Update orders set quantity = '.($row['quantity'] - 1).' where customerID = '.$_SESSION['userID'].' and phoneID = '.$_POST['remove'];
                    $res = mysqli_query($connection, $query);
                }
                else{
                    $phoneInCart = true;
                }
            }

            
        }
        if($phoneInCart){
            $query = 'Delete from orders where customerID = '.$_SESSION['userID'].' and phoneID = '.$_POST['remove'];
            $res = mysqli_query($connection, $query);
            
        }
    }
    else{
        foreach ($_SESSION['cart'] as $key => &$val){
            if($val['product_id'] == $_POST['remove']){
                if($val['product_quantity'] > 1){
                    $val['product_quantity'] -= 1;
                }
                else{
                    unset($_SESSION['cart'][$key]);
                }  
            }
        }
    }
}

include 'include/header.php';




?>


<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h5>My Cart</h5>
                <hr>
                <?php 
                //$product_id = array_column($_SESSION['cart'],'product_id','product_quantity');
                //$product_quantity = array_column($_SESSION['cart'], 'product_quantity');
                
                $items = false;
                $total = 0;
                while($row = mysqli_fetch_assoc($results)){
                    if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key => &$val){
                            if($row['id'] == $val['product_id']){
                                $items = true;
                                $total += $row['cost']*$val['product_quantity'];
                                echo '<div style="border: 2px solid blueviolet; padding: 10px; margin: 20px;" class="rounded" class="container">';
                                    echo '<div class="row">';
                                      echo '<div class="col">';
                                        echo '<image style="width: 100%; height: 100%;" src="'.$row['image'].'">';
                                      echo '</div>';
                                      echo '<div class="col-5">';
                                        echo $row['phoneName'].' ';
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo $val['product_quantity'].' ';
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo '$'.$val['product_quantity']*$row['cost'];
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo '<form method="post" action="My Cart.php?action=remove">';
                                            echo '<button name="remove" value="'.$row['id'].'" class="rounded" style="color: red; background-color: lightgray; border-color: red;">Remove</button>';
                                        echo '</form>';
                                      echo '</div>';
                                    echo '</div>';
                                  echo '</div>';
                            }
                        }
                    }
                }
                else{
                    $conn = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
                    //$query = 'Select orders.customerID, phones.image, phones.phoneName, orders.quantity, phones.cost, orders.phoneID  from orders inner join phones on orders.customerID = phones.customerID where customerID = '.$_SESSION['userID'];
                    $query = 'Select * from orders where customerID = '.$_SESSION['userID'];
                    $result = mysqli_query($conn, $query);  
                    //$row2 = mysqli_fetch_assoc($result);
                    while($row2 = mysqli_fetch_assoc($result)){
                        if($row['id'] == $row2['phoneID']){
                            $items = true;
                            $total += $row['cost']*$row2['quantity'];
                                    echo '<div style="border: 2px solid blueviolet; padding: 10px; margin: 20px;" class="rounded" class="container">';
                                    echo '<div class="row">';
                                      echo '<div class="col">';
                                        echo '<image style="width: 100%; height: 100%;" src="'.$row['image'].'">';
                                      echo '</div>';
                                      echo '<div class="col-5">';
                                        echo $row['phoneName'].' ';
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo $row2['quantity'].' ';
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo '$'.$row2['quantity']*$row['cost'];
                                      echo '</div>';
                                      echo '<div class="col">';
                                        echo '<form method="post" action="My Cart.php?action=remove">';
                                            echo '<button name="remove" value="'.$row['id'].'" class="rounded" style="color: red; background-color: lightgray; border-color: red;">Remove</button>';
                                        echo '</form>';
                                      echo '</div>';
                                    echo '</div>';
                                  echo '</div>';
                }}
                }
                
                }
                if(!$items){ 
                    echo '<p style="color: blueviolet;">There are no items in your cart.<br/> Please navigate to the Buy Phones page to add phones to your cart!</h5>';
                }else{
                    echo '<div class="col">';
                    echo "<h5 style=\"float: left;\">Total:</h5><b><p style=\"float: right;\">$$total</p></b>";
                    echo '</div>';
                }
                
                
                ?>
               
            </div>
        </div>
        <div class="col-mid-5"></div>
    </div>
</div>
