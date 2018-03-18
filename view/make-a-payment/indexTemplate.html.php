<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="make-a-payment">
      <div class="hero cell">
        <img alt="Bohemia Realty Group" src="<?php echo routing::getInstance()->getUrlImg("homepage/list-with-us.jpg") ?>" title="Bohemia Realty Group">
        <div class="grid-container">
          <div class="column row">
            <h2>Make a Payment</h2>
          </div>
        </div>
      </div>
      <div class="grid-container">
        <div class="row">
          <div class="small-offset-2 small-8 end columns">
            <form data-abide novalidate>
              <input required name="name" type="text" placeholder="YOUR NAME"><br>
              <input required name="reason" type="text" placeholder="REASON FOR PAYMENT"><br>
              <input required name="agent" type="text" placeholder="AGENT YOU ARE WORKING WITH"><br>
              <label><input required pattern="number" name="amount" type="text" placeholder="AMOUNT">
              <div class="agree row">
                <div class="small-offset-1 small-3 mlarge-offset-2 mlarge-3 columns align-self-middle"><input type="checkbox"><span class="checkbox"></span></div>
                <div class="small-6 end columns align-self-middle">I agree to pay a 3% service surcharge in lieu of getting bank checks/certified checks</div>
              </div>
              <p>*NOTE:<br>If your billing address is outside of the USA there will be an additional 1% charge.</p>
              <p>Refund Policy:<br>If your application for the apartment is rejected by the landlord or you do not get the apartment for any reason, Bohemia Realty Group LLC will credit all monies back to your account within 24 hours less the application and processing fees.</p>
              <input class="button" type="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>