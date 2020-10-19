<?php session_start(); include 'include/header.php';?>
	
<!--    <script>
        $(document).ready(function () {
       	    $("#datepicker").datepicker({
                beforeShowDay: $.datepicker.noWeekends
        	});
        });
    </script>-->
    
    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=1330%20East%204th%20Street%20Brooklyn%20NY%2C%2011230&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.couponflat.com">couponflat.com</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px; margin: 15px; float: left;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=1370%2051st%20Street%20Brooklyn%20NY%2011219&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px; margin: 15px; float: right;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px; }</style></div>
    <!--<p>We have pickup locations in Boro Park and in Flatbush<br></p>-->
   
    <p>Choose a date to pickup your phones: <input type="date" id="datepicker" placeholder="01/01/2020"></p>
    <p>Choose a pickup location:
        <select id="location" name="location">
            <option value="BoroPark">Boro Park</option>
            <option value="Flatbush">Flatbush</option>
        </select>
    </p>
<?php include 'include/footer.php';?>