<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="work-with-us">
    <div class="hero cell">
        <video class="video" width="100%" height="90%" preload="auto" autoplay>
            <source src="<?php echo routing::getInstance()->getUrlImg("homepage/SHANNA-SHARP-list-with-us.mp4") ?>" type="video/mp4" >
        </video>

        <div class="grid-container">
            <div class="mlarge-offset-1 columns row" style="margin-left: 0 !important;">
                <h2 style="text-align: center;">Join the #1 Firm in Upper Manhattan</h2>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="row rsvp">
            <div class="small-12 mlarge-offset-1 mlarge-2">
                <a href="https://dev.brg-ny.com/hiring/index.php?p=event&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-" class="button signup-success">rsvp</a>
            </div>
            <div class="small-12 mlarge-8 end">
                We’re holding our next informational session Wednesday, January 10th 2018, from 7-8:30pm at our Harlem office. Don’t want to wait for the next session? No problem, <a href="https://dev.brg-ny.com/hiring/index.php?p=app_interview&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-"><u>click here</u></a> to set up an interview today!
            </div>
        </div>
        <div class="cell">
            <h1 class="work-h1" style="text-align: center;">What gives our agents the potential to gross $300,000+ in their first year?</h1>
        </div>
        <div class="row" id="benefits">
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Unequaled Support</h3>
                <ul>
                    <li>Competitive commission splits</li>
                    <li>Weekly payouts with direct deposit available</li>
                    <li>Heavily trafficked website</li>
                    <li>Citywide database with access to all of NYC’s sales and rentals listings</li>
                    <li>In house marketing and web team</li>
                    <li>Boutique firm with a focus on collaboration</li>
                </ul>
                <h3 class="nowrap">Unparalleled<br>Exclusive Portfolio</h3>
                <ul>

                    <li>Thousands of exclusive listings</li>

                    <li>Minimum of two guaranteed exclusive rental listings per agent</li>
                </ul>
            </div>
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Cutting Edge<br>Systems</h3>
                <ul>
                    <li>State of the art technology developed for effectiveness in the field and managing your own business</li>
                    <li>Custom built client response and follow-up tools</li>
                    <li>Decades of collective real estate expertise in sales and rentals packaged in structured system of procedures and tracking platforms to ensure transactional success</li>
                    <li>Comprehensive and extensive access system guaranteeing successful viewings of every apartment in our database</li>
                    <li>Real-time alerts indicating changes in available properties</li>
                    <li>A virtual economy that rewards agents for extra effort and can be exchanged for gift certificates or reimbursement for business expenses</li>
                </ul>
            </div>
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Unrivaled Training<br class="desktop"> Program</h3>
                <ul>
                    <li>Group and individual sales training and support</li>
                    <li>Weekly group education seminars geared towards supporting a successful career as a real estate agent in both sales and rentals</li>
                    <li>Master classes on best practices for marketing and branding your own business</li>
                </ul>
                <h3>Work Hard,<br class="desktop"> Play Hard</h3>
                <ul>
                    <li>Complimentary personal training sessions for agents and staff</li>
                    <li>Community involvement—we offer free monthly seminars that are open to the public, participate in community networking events, sponsor pet adoption drives, and more</li>
                    <li>Regular company outings, seasonal parties and an annual customer appreciation field day with BBQ and games</li>
                </ul>
            </div>
        </div>
        <div class="mlarge-offset-1 columns row">
            <h1 class="work-h1">Still not convinced?<br>Hear it from our team!</h1>
        </div>
        <div class="row team" id="first-team-row">
            <div class="small-12 mlarge-5 columns align-self-middle">
                <quote>“Having worked at another agency, I can say that Bohemia goes above and beyond in its’ attention to clients, camaraderie among agents, and a phenomenal database! Working at Bohemia will change the way you do business…for the better!”</quote>
            </div>
            <div class="small-6 mlarge-2 columns">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/stephanie-cammarata.jpg") ?>">
            </div>
            <div class="small-6 mlarge-4 end columns align-self-middle">
                <h4>Stephanie Cammarata</h4>
                <p>Licensed Real Estate Salesperson</p>
            </div>
        </div>
        <div class="row team">
            <div class="small-12 mlarge-6 columns align-self-middle">
                <quote>“I took the plunge into real estate after discovering that the resturaunt
                    industry wasn’t for me, and I needed something flexible that had great
                    income potential. After just a week at Bohemia I rented my first two
                    apartments under the guidance of my amazing trainer! I look forward
                    to growing with the company as it affords me the opportunity to live a
                    life of passion and fulfillment!”</quote>
            </div>
            <div class="small-6 mlarge-2 columns">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/arron-llyod.jpg") ?>">
            </div>
            <div class="small-6 mlarge-4 end columns align-self-middle">
                <h4>Arron Llyod</h4>
                <p>Licensed Real Estate Salesperson</p>
            </div>
        </div>
        <div class="row team">
            <div class="small-12 mlarge-5 columns align-self-middle">
                <quote>“Bohemia does a great job at creating a supportive
                    atmosphere of camaraderie. With the BBucks system,
                    you can help out your fellow agents in exchange for
                    BBucks, which you can then cash in for cool stuff! We
                    are a team that works together, while we still work
                    independently.”</quote>
            </div>
            <div class="small-6 mlarge-2 columns">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/heather-huff.jpg") ?>">
            </div>
            <div class="small-6 mlarge-4 end columns align-self-middle">
                <h4>Heather Huff</h4>
                <p>Licensed Real Estate Salesperson</p>
            </div>
        </div>
        <div class="row team">
            <div class="small-12 mlarge-6 columns align-self-middle">
                <quote>“At Bohemia, we understand that the challenges of the real estate
                    industry are more easily overcome when you work at a firm with
                    colleagues that you respect and trust. I love that I have a sounding
                    board of upstanding, ethical, and knowledgeable professionals that I
                    can consult for support when I need it – which not only provides me
                    with a positive work environment but also means that I can service my
                    clients in the most effective way possible. Bohemia is a firm where I
                    find myself surrounded by entrepreneurial go-getters who are always
                    raising the bar for themselves, in real estate and beyond –
                    I am inspired and motivated every day!”</quote>
            </div>
            <div class="small-6 mlarge-2 columns">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/agueda-ramirez.jpg") ?>">
            </div>
            <div class="small-6 mlarge-4 end columns align-self-middle">
                <h4>Águeda Ramírez</h4>
                <p>Licensed Real Estate Salesperson</p>
            </div>
        </div>
        <div class="column row" id="last-row">
            <h1 class="work-h1">More exclusives, better systems, and an environment of support to achieve your goals makes us the #1 firm in Upper Manhattan. Come see why!</h1>
        </div>
        <div class="row rsvp">
            <div class="small-12 mlarge-2 columns">
                <a href="https://dev.brg-ny.com/hiring/index.php?p=event&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-" class="button signup-success">rsvp</a>
            </div>
            <div class="small-12 mlarge-10 columns align-self-middle">
              Join us at our next informational session or set up an interview today<b><u><a class="button signup-success" id="interview-button" href="https://dev.brg-ny.com/hiring/index.php?p=app_interview&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-#!">interview</a></u></b>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>
