<?php session_start();
include 'include/header.php'; ?>

<div class="accordion" id="accordion2">
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                <h1>Sprint Service</h1>
            </a>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
            <div class="accordion-inner">
                <p>
                    $18/month unlimited talk and text.<br>CDMA – Bring your own Sprint device. Save money without switching your device and network <br><a  target="_blank" href="https://coverage.sprint.com/IMPACT.jsp?">click here to view coverage map</a>
                </p>
            </div>
        </div>
    </div><br>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                <h1>AT&T Service</h1>
            </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
            <div class="accordion-inner">
                <p>
                    $23/month unlimited talk and text.<br>GSM – The largest GSM network in the US. Ideal for those looking to use their AT&T compatible or GSM unlocked phone with the largest GSM coverage in the US<br><a target="_blank" href="https://www.att.com/maps/reseller.html">click here to view coverage map</a>

                </p>
            </div>
        </div>
    </div>
    <br>
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                <h5>Disclaimer</h5>
            </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse in">
            <div class="accordion-inner">
                <p>
                    Actual coverage will vary based on network, location, device used, and other factors. We cannot guarantee coverage in a specific location.
                </p>
            </div>
        </div>
    </div><br>
</div>

<?php include 'include/footer.php'; ?>
