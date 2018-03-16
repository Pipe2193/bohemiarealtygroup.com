<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>


<?php
if (config::getScope() == 'dev') {
  ?>
  <style>
      /*** PAGE HEADER ***/
      .navbar-header {
          background:  rgba(49, 72, 33, 0);

      }
      .page_header {
          color: rgba(255,255,255,1);
          background:      -o-linear-gradient(45deg, #314821 0%,#719038 100%);
          background:     -ms-linear-gradient(45deg, #314821 0%,#719038 100%);
          background:    -moz-linear-gradient(45deg, #314821 0%, #719038 100%);
          background: -webkit-linear-gradient(45deg, #314821 0%,#719038 100%);
          background:  linear-gradient(45deg, #314821 0%,#719038 100%);
          background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,#314821), color-stop(100%,#719038));
          filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#314821', endColorstr='#719038',GradientType=1 );

          position: relative;
          width: 100%;
          top: 0px;

          z-index: 1030;
      }
      .page_header .navbar {
          margin-bottom: 0;
          min-height: 50px;
          border-radius: 0;
          border: none;
      }
      .page_header .navbar-brand{
          color: #fff;
          font-size: 22px;
          text-shadow:none;
      }
      .page_header .navbar-toggle .icon-bar{
          background-color: #fff;
      }
      .page_header .navbar-nav > li > a{
          font-size: 16px;
          text-shadow:none;
          color: #fff;
      }
      .page_header .navbar-nav > li > a:hover,
      .page_header .navbar-nav > li > a:focus,
      .page_header .nav .open > a, 
      .page_header .nav .open > a:focus, 
      .page_header .nav .open > a:hover{
          background-color: #314821;
          color: #ffffff;
      }
  </style>
  <header class="page_header">
      <nav class="navbar">
          <div class="container-fluid">

              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" target="_blank" href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "index") ?>"> <?php echo config::getSohoFrameworkAccronName(); ?> <small style="font-size: 65%;"><?php echo config::getSohoFrameworkVersion(); ?></small> | <span class="hidden-xs"> <u>Login</u></span>  </a> 
              </div>

          </div>
      </nav>
  </header>
<?php } ?>
  <!-- ********************************************************** NAV BAR **************************************************  -->
  <div class="grid-container clearfix">
      <nav>
          <div class="top-bar socials desktop float-right column row">
              <a href="https://bohemiarealtygroup.us14.list-manage.com/subscribe?u=a928f023b5eebaebc7bbb1de1&id=4a2fa28038" id="signup" class="button signup-success">Sign Up for BRG Blasts</a>
              <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          </div>
          <div class="top-bar float-left row">
              <div class="top-bar-left small-9 mlarge-4 columns">
                  <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/bohemia_logo.svg"); ?>" id="bohemia-logo"></a>
              </div>
              <div class="top-bar-right small-3 mlarge-8 columns">
                  <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="mlarge">
                      <button class="menu-icon" type="button" data-toggle></button>
                  </div>
                  <div id="main-menu">
                      <ul class="mlarge-horizontal vertical dropdown align-right menu" data-responsive-menu="accordion mlarge-dropdown">
                          <li class="has-submenu" id="our-properties">
                              <a href="#">Our Properties</a>
                              <ul class="submenu menu vertical" data-submenu>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "sales") ?>">Sales</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "rentals") ?>">Rentals</a></li>
                              </ul>
                          </li>
                          <li class="has-submenu" id="our-developments">
                              <a href="<?php echo routing::getInstance()->getUrlWeb("our-developments", "index") ?>">Our Developments</a>
                              <ul class="submenu menu vertical" data-submenu>
                                  <li><a href="#">List With BRGDM</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-developments", "theLeo") ?>">The Leo — 427 W 154th</a></li>
                                  <li><a href="https://www.savoyparkapartments.com/index.html">Savoy Park Apartments</a></li>
                                  <li><a href="http://www.theammann.com/">The Ammann - 40 Pinehurst Ave.</a></li>

                              </ul>
                          </li>
                          <li id="our-neighborhoods"><a href="<?php echo routing::getInstance()->getUrlWeb("our-neighborhoods", "index") ?>">Our Neighborhoods</a></li>
                          <li class="has-submenu" id="about-us">
                              <a href="#">About Us</a>
                              <ul class="submenu menu vertical" data-submenu>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("we-are-uptown", "index") ?>">Who We Are</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("our-team", "index") ?>">Our Team</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("blog", "index") ?>">Read Our Blog</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("press", "index") ?>">Bohemia In the Press</a></li>
                              </ul>
                          </li>
                          <li class="has-submenu" id="contact-us">
                              <a href="#">Contact Us</a>
                              <ul class="submenu menu vertical" data-submenu>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("list-with-us", "index") ?>">List With Us</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("work-with-us", "index") ?>">Work With Us</a></li>
                                  <li><a href="<?php echo routing::getInstance()->getUrlWeb("contact-us", "index") ?>">Get In Touch</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
</div>
<div class="socials mobile column row">
    <a target="_blank" href="http://eepurl.com/cAiDKv" id="signup" class="button signup-success"><h4>Sign Up for BRG Blasts</h4></a>
</div>
<div class="socials mobile column row">
    <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
</div> 
<!-- ********************************************************** END NAV BAR **************************************************  -->        
