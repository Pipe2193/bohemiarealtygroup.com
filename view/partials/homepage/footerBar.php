<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<!-- ********************************************************** FOOTER BAR **************************************************  -->
<footer>
    <div class="grid-container">
        <div class="column row">
            <nav>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>">Home</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "sales") ?>">Homes For Sale</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "rentals") ?>">Homes For Rent</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-developments", "index") ?>">Our Developments</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("we-are-uptown", "index") ?>">Who We Are</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("blog", "index") ?>">Bohemia Blog</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-neighborhoods", "index") ?>">Our Neighborhoods</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("press", "index") ?>">Bohemia In the Press</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("contact-us", "index") ?>">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="small-12 mlarge-3 columns">
                <a href="/" class="footer-logo"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/bohemia_logo_white.svg"); ?>"></a>
                <p class="footer-social-media">

                    <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>

                </p>
            </div>
            <div class="small-12 mlarge-7 columns">
                <address><b>Bohemia Harlem</b> - 2101 Frederick Douglass Blvd., New York, NY 10026 | Phone: <a href="tel:212.663.6215">212.663.6215</a></address>
                <address><b>Bohemia Washington Heights</b> - 3880 Broadway, New York, NY 10032 | Phone: <a href="tel:646.661.1579">646.661.1579</a></address>
                <p>Email: <a href="mailto:info@bohemiarealtygroup.com">info@bohemiarealtygroup.com</a> Fax: 866.598.1059.</p>
                <p><b>Copyright &#64; <?php echo date('Y'); ?> Bohemia Realty Group LLC. All Rights Reserved.</b></p>

            </div>
            <div id="payment" class="small-12 mlarge-2 columns desktop">
                <p><img src="<?php echo routing::getInstance()->getUrlImg("homepage/rebnylogowhite.png"); ?>"></p>
                <p><a href="<?php echo routing::getInstance()->getUrlWeb("make-a-payment", "index") ?>">Make a Payment</a></p>
            </div>
        </div>
    </div>
    <div id="payment" class="cell mobile">
        <p><img src="<?php echo routing::getInstance()->getUrlImg("homepage/rebnylogowhite.png"); ?>"></p>
        <a class="payment " href="<?php echo routing::getInstance()->getUrlWeb("make-a-payment", "index") ?>"><h5>Make a Payment</h5></a>
    </div>
    <p style="width: 80%; display: block; margin: auto;">Bohemia Realty Group is a proud member of the Real Estate Board of New York (REBNY) and an Equal Housing Opportunity provider.</p>
      <p style="width: 80%; display: block; margin: auto;">*All information presented on this site regarding real property, for sale, rental and/or financing is from sources deemed reliable. No warranty or representation is made as to the accuracy thereof and same is submitted subject to errors, omissions, change of price, rentals or other conditions, prior sale, lease or financing or withdrawal without notice.</br><b> Note: All dimensions &amp;&nbsp;square footage are approximate. For exact dimensions &amp;&nbsp;square footage please hire your own architect or engineer.</b></p>
</footer>
<!-- ********************************************************** END FOOTER BAR **************************************************  -->
