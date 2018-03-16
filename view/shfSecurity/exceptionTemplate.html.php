<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>
<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/header"); ?>
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number">404</h1>
                    <h2>Sorry but we couldn't find this page</h2>
                    <p>This page you are looking for does not exist <a href="#">Report this?</a>
                    </p>

                </div>
            </div>
            <?php if(config::getScope() === 'dev' || config::getScope() === 'prod' ){ ?>
            <?php echo $exc->getMessage() ?>
            <br>
            <pre>
                <?php print_r($exc->getTrace()) ?>
            </pre>
            <?php }?>
            <div class="col-md-12 col-sm-12 col-xs-12">


                <!-- Begin Service Block V2 -->
                <div class="row service-block-v2">
                    <div class="col-md-4">
                        <div class="service-block-in service-or">
                            <div class="service-bg"></div>
                            <i class="icon-bulb"></i>
                            <h4>Not what you were looking for?</h4>
                            <p>If the page is not what you are looking for, try searching the page on the search page and find out new things.</p>                        
                            <a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button" href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>"> Visit Our Website</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="service-block-in service-or">
                            <div class="service-bg"></div>
                            <i class="icon-directions"></i>
                            <h4>Possible cause of the problem</h4>
                            <p>The page you requested could not be found. However, the requested resource may be available again in the future.</p>
                            <a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button" href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "index") ?>"> Go back to Dashboard</a>
                        </div>
                    </div>  

                    <div class="col-md-4">
                        <div class="service-block-in service-or">
                            <div class="service-bg"></div>
                            <i class="icon-users"></i>
                            <h4>Contact us</h4>
                            <p>If you have a problem with the website, please contact us, our support team will help you to solve the problem.</p>
                            <a type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button" href="<?php echo routing::getInstance()->getUrlWeb("contact-us", "index") ?>"> Contact Us</a>
                        </div>
                    </div>
                </div>    
                <!-- End Service Block V2 -->

            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/footer") ?>
    </div>
</div>
