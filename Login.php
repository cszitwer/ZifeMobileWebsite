<?php session_start(); include 'include/header.php'; ?>
<style>
    *{
    margin: 0;
    padding: 0;
}
.form-box{
    width: 380px;
    height: 550px;
    position: relative;
    margin: 6% auto;
    background: #fff;
    padding: 5px;
    overflow: hidden;
}
.button-box{
    width: 220px;
    margin: 35px auto;
    position: relative;
    box-shadow: 0 0 20px 9px #ff61241f;
    border-radius: 30px;
}
.toggle-btn{
    padding: 10px 30px;
    cursor: pointer;
    background: transparent;
    border: 0;
    outline: none;
    position: relative;
}
#btn{
    top: 0;
    left: 0;
    position: absolute;
    width: 120px;
    height: 100%;
    background: linear-gradient(to right, blueviolet, gold);
    border-radius: 30px;
    transition: .5s;
}
.input-group{
    top: 180px;
    position: absolute;
    width: 280px;
    transition: .5s;
}
.input-field{
    width: 100%;
    padding: 10px 0;
    margin: 5px 0;
    border-left: 0;
    border-top: 0;
    border-right: 0;
    border-bottom: 1px solid #999;
    outline: none;
    background: transparent;
}
.submit-btn{
    width: 85%;
    padding: 10px 30px;
    cursor: pointer;
    display: block;
    margin: auto;
    background: linear-gradient(to right, blueviolet, gold);
    border: 0;
    outline: none;
    border-radius: 30px;
}
.check-box{
    margin: 30px 10px 30px 0;
}
.check-box span{
    color: #777;
    font-size: 12px;
    bottom: 68px;
    position: absolute;
}
#login{
    left: 50px;
}
#register{
    left: 450px;
}
#error{
   color: red;
}
</style>

     	<div class="hero">
	    <div class="form-box">
                <a name="bottomOfPage"></a>
                <div class="button-box" style="width: 226px;">
		   <div id="btn"></div>
                   <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                   <button type="button" class="toggle-btn" onclick="register()">Register</button>
		</div>
                <form id="login" class="input-group" action="loggedIn.php"method="post">
		   <input type="email" class="input-field" name="emailAddress" placeholder="Email Address" required>
		   <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                   <a href="Login.php#bottomOfPage" style="margin: 10px;">Forgot Password</a>
                   <?php 
                        if(!isset($_SESSION['loggedin'])){
                            $_SESSION['loggedin'] = false;
                        }
                        if($_SESSION['loggedin']) {
                            echo '<button type="submit" disabled style="margin: 10px;" class="submit-btn">Already Logged in</button>';
                        } 
                        else {
                            echo '<button type="submit" style="visibility: visible; margin: 10px;" class="submit-btn">Log in</button>';
                        }
                   ?>
		</form>
		<form id="register" class="input-group" action="registered.php" method="post">
		   <input type="text" class="input-field" name="customerName" placeholder="Name" required>
		   <input type="email" class="input-field" name="emailAddress" placeholder="Email" required>
		   <input type="tel" class="input-field" id="phone" name="phoneNum" placeholder="Phone #" required>
		   <span id="error">*</span>
		   <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                   <input type="checkbox" class="input-field" name="subscribed"  style="float: left; width: auto;">
                   <label for="subscribed">  Subscribe to emails</label>
                   <button type="submit" id="register" class="submit-btn" style="margin: 10px;">Register</button>
		</form>
                <form action="logout.php" style="text-align: center;">
                    <button style="border-color:lightgray; background: none;">Logout</button>
                </form>
	    </div>
	</div>

	<script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        
        function logout(){
          
        }

        function register(){
          x.style.left="-400px";
          y.style.left="50px";
          z.style.left="110px";
        }
        function login(){
          x.style.left="50px";
          y.style.left="450px";
          z.style.left="0";
        }
	</script>

<?php include 'include/footer.php' ?>