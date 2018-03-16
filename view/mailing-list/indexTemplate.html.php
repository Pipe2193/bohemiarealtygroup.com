<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="mailing-list">
    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Join Our MailinList</h2>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="row">
            <div class="small-10 small-offset-1 mlarge-6 mlarge-offset-3 end columns">
                <p>Thanks for joining BRG’s Mailing List through MailChimp! Be prepared for some AWESOME content coming your way–This Week Uptown, Featured Listings Newsletter, Workshop Invites, Events and more!</p>
                <form action="https://bohemiarealtygroup.us14.list-manage.com/subscribe/post" method="POST">
                    <input type="hidden" name="u" value="a928f023b5eebaebc7bbb1de1">
                    <input type="hidden" name="id" value="4a2fa28038">
                    <div class="field-shift" aria-label="Please leave the following three fields empty">
                        <label for="b_name">Name: </label>
                        <input type="text" name="b_name" tabindex="-1" value="" placeholder="Freddie" id="b_name" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                        <label for="b_email">Email: </label>
                        <input type="email" name="b_email" tabindex="-1" value="" placeholder="youremail@gmail.com" id="b_email">
                        <label for="b_comment">Comment: </label>
                        <textarea name="b_comment" tabindex="-1" placeholder="Please comment" id="b_comment"></textarea>
                    </div>
                    <label for="MERGE0">Email Address</label>
                    <input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="">
                    <label for="MERGE1">First Name</label>
                    <input type="text" name="MERGE1" id="MERGE1" size="25" value="">
                    <label for="MERGE2">Last Name</label>
                    <input type="text" name="MERGE2" id="MERGE2" size="25" value="">
                    <label for="MERGE12">Age</label>
                    <input type="text" name="MERGE12" id="MERGE12" size="25" value="">
                    <label for="MERGE13">Zip Code</label>
                    <input type="text" name="MERGE13" id="MERGE13" size="25" value="">
                    <label for="MERGE16">Hiring Event 8/9 import from EveBri</label>
                    <input type="text" name="MERGE16" id="MERGE16" size="25" value="">
                    <label for="MERGE17">Attended 8/9 Hiring Event?</label>
                    <input type="text" name="MERGE17" id="MERGE17" size="25" value="">
                    <input type="submit" class="button" name="submit" value="Subscribe to list">
                    <input type="hidden" name="ht" value="38a7f628fd1ff6b399c2872c2f850f41c136d919:MTUwNjUyNjAxMC42OTI3">
                    <input type="hidden" name="mc_signupsource" value="hosted">
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>