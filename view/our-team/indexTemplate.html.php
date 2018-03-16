<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$profile_id = profileTableClass::ID;
$profileFistName = profileTableClass::FIRST_NAME;
$profileLastName = profileTableClass::LAST_NAME;
$profileMiddleName = profileTableClass::MIDDLE_NAME;
$profileEmailAddress = profileTableClass::EMAIL_ADDRESS;
$profilePhoneNumber = profileTableClass::PHONE_NUMBER;
$profilePhoneExt = profileTableClass::EXT_PHONE_NUMBER;
$profile_bio_summary = profileTableClass::PROFILE_BIO_SUMMARY;
$profile_facebook_link = profileTableClass::FACEBOOK_LINK;
$profile_twitter_link = profileTableClass::TWITTER_LINK;
$profile_instagram_link = profileTableClass::INSTAGRAM_LINK;
$profilePicture = profileTableClass::BIG_PICTURE;

$position = profileTableClass::POSITION;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="our-team">

    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Our Team<span class="desktop"> - Bohemia’s Team of Agents and Staff</span></h2>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="row">
            <div class="small-12 mlarge-6 columns align-self-middle"><p>Whether you have a question about a specific property or just want information about the neighborhoods we represent we’re happy to help.</p></div>
            <div class="small-12 mlarge-6 columns align-self-middle">
                <form class="search">
                    <input type="search" placeholder="Search Agents and Staff by First Name..."> <button type="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
                </form>
            </div>
            <hr class="desktop">
        </div>
        <?php
        $index = 0;
        foreach ($objProfiles as $profile):

          if ($profile->$profile_id != 1) {
           $profile_img = "cust_files/profile/agents/" . $profile->$profilePicture;
            ?>
            <?php if ($index == 0) { ?>
              <div class="row" data-equalizer="">
                <?php } ?>    
                <div class="small-12 mlarge-4 columns team">
                    <a href="#" class="agent-info"></a>
                    <img alt="Team" src="<?php echo routing::getInstance()->getUrlImg($profile_img); ?>">
                    <div class="card">
                        <div class="column row card-divider">
                            <h6><?php echo $profile->$profileFistName . ' ' . $profile->$profileLastName . $profile->$profilePicture; ?></h6>
                            <p><?php echo $profile->$position ?></p>
                        </div>
                        <div class="row card-section" data-equalizer-watch="">
                            <hr>
                            <p><?php echo $profile->$profile_bio_summary; ?></p>
                            <hr>
                            <div class="phone small-6 columns align-self-middle"><a href="tel:<?php echo $profile->$profilePhoneNumber; ?>"><?php echo $profile->$profilePhoneNumber; ?></a></div>
                            <div class="small-6 columns align-self-middle agent-socials">
                                <a href="mailto:<?php echo $profile->$profileEmailAddress; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                <a href="<?php echo $profile->$profile_twitter_link; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php echo $profile->$profile_facebook_link; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $index++;
                if ($index == 3) {
                  ?>
              </div>
              <?php
              $index = 0;
            }
          }
          ?>
        <?php endforeach; ?>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>