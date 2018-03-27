<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>
  <!-- ********************************************************** NAV BAR **************************************************  -->
  <div class="grid-container clearfix">
      <nav>
          <!-- <div class="top-bar socials desktop float-right column row" style="margin-top: 2%;">
              <a href="https://bohemiarealtygroup.us14.list-manage.com/subscribe?u=a928f023b5eebaebc7bbb1de1&id=4a2fa28038" id="signup" class="button signup-success">Sign Up for BRG Blasts</a>
              <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          </div> -->
          <div class="top-bar float-left row" style="padding-top: 0;">
              <div class="top-bar-left small-9 mlarge-4 columns">
                  <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>">
                    <img src="<?php echo routing::getInstance()->getUrlImg("homepage/bohemia_logo.svg"); ?>" id="bohemia-logo"/></a>
              </div>
              <div class="top-bar-right small-3 mlarge-8 columns" style="height: 4em;">
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
                              <ul class="submenu menu vertical" data-submenustyle="min-width: 300px !important;">
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
<script>

document.addEventListener('DOMContentLoaded', function() {
  var drops = document.querySelectorAll(".top-bar .top-bar-right ul.menu li.has-submenu .submenu")
  for (i = 0; i < drops.length; i++){
    var minWidth = drops[i].parentElement.clientWidth + 'px'
    drops[i].classList.add("notransition")
    if (drops[i].parentElement.id === "our-developments"){
      drops[i].style.minWidth = 300 + 'px'
    } else {
      drops[i].style.minWidth = minWidth
    }
    drops[i].style.opacity = 1

  }
});

</script>
<!-- ********************************************************** END NAV BAR **************************************************  -->
