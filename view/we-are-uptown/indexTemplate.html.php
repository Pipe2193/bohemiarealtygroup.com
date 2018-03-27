<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="who-we-are">
    <div class="hero cell">
        <video class="video" width="100%" height="90%" preload="auto" autoplay>
            <source src="<?php echo routing::getInstance()->getUrlImg("homepage/SARAH-SALTZBERG-we-are-uptown.mp4") ?>" type="video/mp4" >
        </video>

        <div class="grid-container">
            <div class="column row">
                <h2>We Are Uptown</h2>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="who-we-are-info">
                <p>Bohemia Realty Group is a dynamic team of dedicated real estate professionals that focus on residential sales and rentals in Upper Manhattan. Our agents are neighborhood specialists; over 90% of Bohemia agents call uptown home, and can provide first-hand knowledge about the lifestyle at the top of the island.</p>
                <p>Our mission is a three pronged approach to improving quality of life: to service clients in an efficient, friendly way; to create a positive work environment for our agents and employees; and to enrich the community above 96th Street.<br>
                    From pre-war walk up rentals to new development condos, we firmly believe that it’s possible for all New Yorkers to have light, space, and a renovated bathroom… and not have to give up dinner in order to afford it.</p>
            </div>
            <div id="who-we-are-anchors">
                <hr>
                <a id="meet-our-team-anchor" class="button signup-success" href="<?php echo routing::getInstance()->getUrlWeb("our-team", "index") ?>">Meet Our Team</a>
                <a id="whats-happening-anchor" class="button signup-success" href="<?php echo routing::getInstance()->getUrlWeb("blog", "index") ?>">What’s Happening This Week<br /> In Upper Manhattan</a>
            </div>
        </div>
    </div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>
