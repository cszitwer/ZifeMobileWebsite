<HTML>
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: blueviolet;" >            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Phones.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buy Phones</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="Phones.php#flipPhones">Flip Phones<br></a>
                            <a class="nav-link" href="Phones.php#sliderPhones">Slider Phones<br></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Kosher Smartphones <span class="badge badge-secondary">Coming Soon!</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Waze.php">
                            Flip Phone with Waze <span class="badge badge-warning">New</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Shop Plans.php">
                        Shop Plans
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Support.php">Support</a>
                    </li>
                </ul>
<!--                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>  -->
                <a class ="cart" href="My Cart.php"><img src="ZifeMobilePictures/cart-148964_640%20resized.png" alt=""></a>
                <?php if(isset($_SESSION['cart'])){
                    $count = 0;
                    foreach ($_SESSION['cart'] as $key => &$val){
                        
                            $inArray = true;
                            $count += $val['product_quantity'];
                        
                    }                    
                    echo "<span id=\"cart_count\">$count</span>";
                }else{
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                        $conn = mysqli_connect('sql302.epizy.com','epiz_26257149','c5Q2movKCPCO','epiz_26257149_phonestore');
                        $query = 'Select * from orders where customerID = '.$_SESSION['userID'];
                        $result = mysqli_query($conn, $query);  
                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $count += $row['quantity'];
                        }
                        echo "<span id=\"cart_count\">$count</span>";
                    }else{
                        echo "<span id=\"cart_count\">0</span>";
                    }
                    
                }
                ?>
                <a class="cartPic" href="Login.php#bottomOfPage"> <img src="ZifeMobilePictures/account_circle-24px.svg" alt=""></a>
            </div>
        </nav>
<HR />
