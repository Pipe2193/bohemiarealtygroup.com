<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div class="hero cell">
    <img src="<?php echo routing::getInstance()->getUrlImg("homepage/our-developments.jpg") ?>" alt="Our Developments" title="Our Developments">
    <div class="grid-container">
        <div class="column row">
            <h2 style="margin-left: 5%;">Development</h2>
        </div>
    </div>
</div>

<div class="grid-container" id="our-developments">
    <div class="column row">
        <h2>Sales Developments</h2>
    </div>
    <div class="development row">
        <div class="small-12 mlarge-7 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/the-leo.jpg") ?>" alt="The Leo" title="The Leo">
        </div>
        <div class="small-12 mlarge-5 columns align-self-middle">
            <h3 class="our-dev-h3">the leo&nbsp;&mdash;<br>427 West 154th</h3>
            <div class="our-dev-descriptions-div">
            <p>Set on a beautiful tree-lined block, this prewar Neo-Renaissance structure was built in 1901. John P. Leo, the original developer</p>
          </div>
            <a href="" class="button">see the leo</a>
        </div>
    </div>
    <div class="development row">
        <div class="small-12 mlarge-7 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/park-hill.jpg") ?>" alt="Park Hill" title="Park Hill">
        </div>
        <div class="small-12 mlarge-5 columns align-self-middle">
            <h3 class="our-dev-h3">Park Hill&nbsp;&mdash;<br>471-476 Central Park West</h3>
            <div class="our-dev-descriptions-div">
            <p>Prewar elegance meets modern luxury at Park Hill, with over 45 finely renovated apartments at Central Park’s doorstep</p>
          </div>
            <a href="<?php echo routing::getInstance()->getUrlWeb("our-developments", "theLeo") ?>" class="button">see Park Hill</a>
        </div>
    </div><div class="column row">
        <h2>Rental Developments</h2>
    </div>
    <div class="development row">
        <div class="small-12 mlarge-7 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/savoy-park.jpg") ?>" alt="Savoy Park Apartments" title="Savoy Park Apartments">
        </div>
        <div class="small-12 mlarge-5 columns align-self-middle">
            <h3 class="our-dev-h3" >Savoy Park Apartments&nbsp;&mdash;<br>45 West 139th</h3>
            <div class="our-dev-descriptions-div">
            <p>Savoy Park is a unique rental community in the heart of Central Harlem. Located on the spot where Harlem’s HISTORIC Savoy</p>
              </div>
            <a href="https://www.savoyparkapartments.com/index.html" class="button">See Savoy Park</a>
        </div>
    </div>
    <div class="development row">
        <div class="small-12 mlarge-7 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/northwood-uws.jpg") ?>" alt="Northwood UWS" title="Northwood UWS">
        </div>
        <div class="small-12 mlarge-5 columns align-self-middle">
            <h3 class="our-dev-h3">Northwood UWS&nbsp;&mdash;<br>471 Central Park West</h3>
            <div class="our-dev-descriptions-div">
            <p>Welcome to Northwood, a collection of five pre-war no-fee boutique rental properties in the picturesque Upper West Side</p>
            </div>
            <a href="<?php echo routing::getInstance()->getUrlWeb("our-developments", "northwoodUws") ?>" class="button">see Northwood UWS</a>
        </div>
    </div>
    <div class="row">
        <div class="small-12 mlarge-7 columns">
            <p>Bohemia Realty Group Development Marketing (BRGDM) is dedicated to furthering the growth of Upper Manhattan north of 96th Street. Whether a condo conversion or soon to be developed sales or rental property, BRGDM delivers a team of committed professionals across multiple fields to bring your project to life. BRGDM knows Upper Manhattan, and creates distinct brands that will enhance your exposure in the market place. We are confident a working relationship will be mutually beneficial, and look forward to speaking with you on how we can grow Upper Manhattan together.</p>
            <p>Contact us today at <a href="mailto:newdevelopments@bohemiarealtygroup.com">newdevelopments@bohemiarealtygroup.com</a> for a customized property analysis of the key components that will drive aximum long-term value to your next development.</p>
        </div>
        <div class="small-12 mlarge-5 columns align-self-middle">
            <a href="<?php echo routing::getInstance()->getUrlWeb("contact-us", "index") ?>" class="button">get in touch</a>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>
