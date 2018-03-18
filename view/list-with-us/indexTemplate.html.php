<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="list-with-us">
    <div class="hero cell">
        <img alt="Bohemia Realty Group" src="<?php echo routing::getInstance()->getUrlImg("homepage/Contact_us/List-with-Us.jpg") ?>" title="Bohemia Realty Group">
        <div class="grid-container">
            <div class="column row">
                <h2>List With Us</h2>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="row">
            <div class="small-12 mlarge-6 columns align-self-middle">
                Bohemia Realty Group has thousands of exclusive properties between 96th Street – 220th Street; uptown sales and rentals is what we do. Our relationships with Upper Manhattan landlords, developers and individual owners has spanned over thirteen years and made us the go-to firm for uptown product knowledge. Whether you have a studio for rent, a two bedroom condo for sale, or are looking for a partner to lease or sell an entire building, we will partner with you to help you achieve your vision.
            </div>
            <div class="split small-12 mlarge-6 columns">
                <hr>
                <form id="list_with_us_form"   method="POST" action="">

                    <input name="page" type="hidden" value="list-with-us"> 
                    <label><input id="client_name" name="client_name" placeholder="Name" required type="text" ></label><br>
                    <label><input id="property_type" name="property_type" placeholder="Property Type" required type="text" ></label><br>
                    <label><input id="client_email" name="client_email" placeholder="E-mail" required type="email"></label><br>
                    <label>
                        <textarea id="comments" name="comments" placeholder="Tell us about your property" required rows="5"></textarea></label><br>
                    <label></label>
                    <input class="button signup-success" type="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>