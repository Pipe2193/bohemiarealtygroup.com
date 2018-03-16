<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="get-in-touch">
    <div class="hero cell">
        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/Contact_us/Get-in-Touch.jpg") ?>" alt="Bohemia Realty Group" title="Bohemia Realty Group">
        <div class="grid-container">
            <div class="column row">
                <h2>Get In Touch</h2>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="row">
            <div id="address" class="small-12 mlarge-6 columns">
                <div class="row">
                    <div class="small-12 mlarge-6 order-1 mlarge-order-2 columns">
                        <address>
                            <h4>Washington Heights</h4>
                            <p>3880 Broadway</p>
                            <p>between</p>
                            <p>162nd/163rd</p>
                            <p>New York, NY 10032</p>
                            <p>Phone: <a href="tel:646-661-1579"><u>646.661.1579</u></a></p>
                            <p>Fax: <a href="fax:866-598-1059"><u>866.598.1059</u></a></p>
                        </address>
                    </div>
                    <div class="small-12 mlarge-6 order-2 mlarge-order-1 columns">
                        <address>
                            <h4>Harlem</h4>
                            <p>2101 Frederick</p>
                            <p>Douglass Blvd.</p>
                            <p>between 113th/114th</p>
                            <p>New York, NY 10026</p>
                            <p>Phone: <a href="tel:212-663-6215"><u>212.663.6215</u></a></p>
                            <p>Fax: <a href="fax:866-598-1059"><u>866.598.1059</u></a></p>
                        </address>
                    </div>
                </div>
                <div id="connect" class="row">
                    <div class="small-12 columns">
                        <div class="row text-center">
                            <span>Connect With Us</span>
                        </div>
                        <div class="row text-center">
                            <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="split small-12 mlarge-6 columns">
                <hr>
                <a href="<?php echo routing::getInstance()->getUrlWeb("list-with-us", "index") ?>" class="button signup-success">list with us</a>
                <p>Feel free to call us about your listing and speak with one of our agents or email us at <a href="mailto:listings@bohemiarealtygroup.com" class="link">listings@bohemiarealtygroup.com</a></p>
                <a href="<?php echo routing::getInstance()->getUrlWeb("work-with-us", "index") ?>" class="button signup-success">work with us</a>
                <p>Interested in joining Bohemia Realty Group? <a class="link" href="<?php echo routing::getInstance()->getUrlWeb("work-with-us", "index") ?>"><u>Read more here</u></a>.</p>
            </div>
        </div>
        <div class="map column row desktop">
            <iframe height="450" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ_xxRqRf2wokRHHsMVmU2XN8&key=AIzaSyDeWwYXXJcfx3NuTvyYwWfDR5UpveMr8Xs" allowfullscreen></iframe>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>