<?php
session_start();
if (isset($_GET['id']) && isset($_GET['action'])) {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

        $connection = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
        $query = 'Select * from orders where customerID = ' . $_SESSION['userID'];
        $result = mysqli_query($connection, $query);
        $phoneInCart = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['phoneID'] == $_GET['id']) {
                $q = 'Update orders set quantity = ' . ($row['quantity'] + $_POST['quantity']) . ' where customerID = ' . $_SESSION['userID'] . ' and phoneID = ' . $_GET['id'];
                $results = mysqli_query($connection, $q);
                $phoneInCart = true;
            }
        }
        if (!$phoneInCart) {
            $connection = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
            $query = 'Insert into orders(customerID, phoneID, quantity) values(' . $_SESSION['userID'] . ',' . $_GET['id'] . ',' . $_POST['quantity'] . ')';
            $result = mysqli_query($connection, $query);
        }
    } else {
        if (isset($_SESSION['cart'])) {
            $inArray = false;
            $count = 0;
            foreach ($_SESSION['cart'] as $key => &$val) {
                $count += $val['product_quantity'];
                if ($val['product_id'] == $_GET['id']) {
                    $inArray = true;
                    $val['product_quantity'] += $_POST['quantity'];
                }
            }
            if (!$inArray) {
                $item_array = array(
                    'product_id' => $_GET['id'],
                    'product_quantity' => $_POST['quantity']
                );
                $_SESSION['cart'][$count] = $item_array;
            }
        } else {
            $item_array = array(
                'product_id' => $_GET['id'],
                'product_quantity' => $_POST['quantity']
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }
}



require_once('include/header.php');
?>
<?php
$connection = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
$sql = "SELECT * FROM phones";
$res = mysqli_query($connection, $sql);
?>
<?php
$flip = 0;
$slider = 0;
while ($r = mysqli_fetch_assoc($res)) {
    ?>
    <?php
    if ($r['phoneType'] == "Flip" && $flip == 0) {
        echo '<a name="flipPhones"></a>';
        echo '<h2 style="text-align: center;">Flip Phones</h2>';
        $flip++;
    }
    if ($r['phoneType'] == "Slider" && $slider == 0) {
        echo '<a name="sliderPhones"></a>';
        echo '<h2 style="text-align: center;">Slider Phones</h2>';
        $slider++;
    }
    ?>
    <div class="col-sm-6 col-md-3" style="display: inline-block; text-align: center; margin-left: 50px; margin-right: 50px; padding: 50px;">
        <form method="post" action="Phones.php?action=add&id=<?php echo $r['id']; ?>" >
            <div class="card" style="width: 18rem;  border-color: lightgray;  border-radius: 10px;"  >
                <img id="phone" style="min-height: 300px; background-color: lightgray; background-image: radial-gradient(ligtgray 70%,white 30%);"src="<?php echo $r['image']; ?>" class="card-img-top" alt="<?php echo $r['phoneName'] ?>">
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title"><?php echo $r['phoneName'] ?></h5>
                    <p class="card-text"><?php echo $r['phoneType'] . ' Phone ' . '$' . $r['cost'] ?></p>
                    <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" style="color: blueviolet; background-color: lightgray; border-color: blueviolet;"/></div>
                </div>
            </div> 
        </form>
    </div>

<?php } ?>

<?php include 'include/footer.php'; ?>

