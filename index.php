<?php session_start();
include 'include/header.php'; ?>

<div class="jumbotron">
    <h1 class="display-4"><b>Zife Mobile</b></h1>
    <p class="lead"><b>#Making Kosher Phones Great Again!</b></p>
    <hr class="my-4">
    <p><b>Welcome to Zife Mobile. Our great selection of products will cover all of your needs, whatever and wherever they may be. <br>Enjoy our exceptional shopping experience and contact customer service with questions.</b></p>
</div>

<div class="card" style="width: 18rem;"  >
    <img style="background-color: lightgray;" src="ZifeMobilePictures\ZifeMobileLogo.PNG" class="card-img-top" alt="...">
    <div style="text-align: center;" class="card-body">
        <h5 class="card-title">Zife Mobile Contact</h5>
        <p class="card-text">For quick help press the support button below</p>
        <a href="Support.php" class="btn btn-primary">Support</a>		
    </div>
</div> 

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-pause="hover">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <h2>Sprint Service</h2><p>$18/month unlimited talk and text!</p><br>
            <h2>AT&T Service</h2><p>$23/month upon request</p><br>   
            <div class="alert alert-warning" role="alert">
                <p>Only requirement is minimum 4 months of service.</p> 
            </div>
        </div>
        <div class="carousel-item">
            <h2>Pricing for the phones:</h2>
            <p>$50 for flip phones<br>$60 for slider phones.<br>These phones are not compatible with a different carrier.<br>We charge approximately $25 more if the phone is not activated with service from us.<br>These phones have no Wifi capabilities.</p>
        </div>
        <div class="carousel-item">
            <h2>Advantages:</h2>
            <p>Great customer service.<br>Coast-to-coast wireless coverage provided on Nationwide Sprint® Network*, reaching over 282 million people.<br>Domestic roaming is included at no extra charge.</p>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php include 'include/footer.php'; 
        
