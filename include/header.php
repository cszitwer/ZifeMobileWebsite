<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    
    
    <?php 
     $pos = strrpos($_SERVER['PHP_SELF'], '/'); 
     $lastWord = substr($_SERVER['PHP_SELF'],$pos);
     $lastWord = str_replace("/","Zife Mobile | ",$lastWord);
     $lastWord = str_replace(".php","",$lastWord);
    ?>
    <title><?php echo $lastWord; ?></title>
    <link rel="icon" href="ZifeMobilePictures\icons8-phone-48.png" />
</head>
<style>li a:hover {
  background-color: gold;
}
.carousel {
  
  width:840px;
  height: 400px;
  margin: 50px;
  position: relative;
}
.card{
    float: right;
    margin: 5px;
    border-color: lightgray;
    border-width: 5px;
    position: right;
    padding: 0;
}
h1{
    color: gold;
    /* Outline */ 
    text-shadow:
    -1px -1px 0 #8a2be2,
    1px -1px 0 #8a2be2,
    -1px 1px 0 #8a2be2,
    1px 1px 0 #8a2be2,  
    -2px 0 0 #8a2be2,
    2px 0 0 #8a2be2,
    0 2px 0 #8a2be2,
    0 -2px 0 #8a2be2;
}
h2, h5{
    color: blueviolet;
    text-shadow:
    -1px -1px 0 #FFD700,
    1px -1px 0 #FFD700,
    -1px 1px 0 #FFD700,
    1px 1px 0 #FFD700,  
    -2px 0 0 #FFD700,
    2px 0 0 #FFD700,
    0 2px 0 #FFD700,
    0 -2px 0 #FFD700;   
}

p{
    color: blueviolet;
}
.jumbotron{
    text-align: center;
}
#flipPhoneCard, #sliderPhoneCard{
     float: left;
     margin: 24px;
      
}
.cartPic{
    padding: 5px;
}
img .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
#logo{
    background-image: url(ZifeMobilePictures\ZifeMobileLogo.PNG);
}
#cd-cart {
  position: fixed;
  top: 0;
  right: -100%;
  height: 100%;

  /* header height */
  padding-top: 50px;

  overflow-y: auto;
  -webkit-overflow-scrolling: touch;

  transition: right 0.3s;
}

#cd-cart.speed-in {
  right: 0;
}
.accordion-heading,.accordion-inner{
    text-align: center;
    background-color: lightyellow;
}
.messageButton{
    text-align: center;
}

.nav-item{
    display: inline-block;
}

hr{
    color: blueviolet;
}</style>

<header style="background-color:lightgray; margin:0; width: auto;">
    <h2><span>ZifeMobile 
        <h5 style="float: right; margin: 10px">Hello
            <?php   
                if(isset($_COOKIE['user'])){ 
                    echo $_COOKIE['user'];
                }
                else{
                    echo 'Guest';
                } ?>
        </h5></span>
    </h2>
    <hr style="height:1px;border-top:1px solid blueviolet" />
</header>
    
<body>
    <div id="main">
    <?php include 'menu.php';?>
    <hr style="height:1px;border-top:1px solid white;" />