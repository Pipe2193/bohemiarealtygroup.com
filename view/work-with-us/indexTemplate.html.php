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
            <div class="mlarge-offset-1 columns row">
                <h2>Join the #1 Firm in Upper Manhattan</h2>
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
            <h1>What gives our agents the potential to gross $300,000+ in their first year?</h1>
        </div>
        <div class="row" id="benefits">
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Unequaled Support</h3>
                <ul>
                    <li>Open seven days a week</li>
                    <li>Competitive commission splits</li>
                    <li>Weekly payouts with direct deposit available</li>
                    <li>Discounted advertising rates</li>
                    <li>Heavily trafficked website</li>
                    <li>Citywide database with access to all of NYC’s rentals and sales listings</li>
                    <li>Virtual library containing all leasing, sales and marketing materials</li>
                    <li>Boutique firm with a focus on collaboration</li>
                </ul>
                <h3 class="nowrap">Unparalleled<br>Exclusive Portfolio</h3>
                <ul>
                    <li>Fifteen years experience in the uptown real estate market</li>
                    <li>Thousands of private listings</li>
                    <li>Thousands of other agents</li>
                    <li>Company average of at least two exclusive listings per agent</li>
                </ul>
            </div>
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Cutting Edge<br>Systems</h3>
                <ul>
                    <li>Custom designed website and listings database</li>
                    <li>State of the art mobile app for transactions on the go</li>
                    <li>Proprietary tracking system to help you set and exceed goals </li>
                    <li>Appointment scheduling for clients directly through our website</li>
                    <li>Lease expiration alerts and embedded response system to keep in touch with clients</li>
                    <li>Step-by-step procedures for every landlord in our portfolio </li>
                    <li>Remote lockbox system and extensive key inventory for easy access to listings </li>
                    <li>Immediate, company wide alerts when a property becomes unavailable</li>
                    <li>A virtual economy (BBucks) that rewards agents for extra effort and can be exchanged for gift certificates or reimbursement for business expenses</li>
                </ul>
            </div>
            <div class="small-12 mlarge-offset-1 mlarge-3 columns">
                <h3 class="nowrap">Unrivaled Training<br class="desktop"> Program</h3>
                <ul>
                    <li>Group and individual sales training and support</li>
                    <li>One-on-one mentorships guided by industry veterans</li>
                    <li>Extensive training manual and online reference materials</li>
                    <li>Weekly group training sessions and hybrid agent (rentals & sales) courses</li>
                    <li>Regular seminars on marketing, social media and personal branding</li>
                    <li>Eleven rental coaches</li>
                </ul>
                <h3>Work Hard,<br class="desktop"> Play Hard</h3>
                <ul>
                    <li>FREE, weekly personal training</li>
                    <li>Community involvement—we sponsor pet adoption drives, participate in community networking events and more</li>
                    <li>Regular company outings, seasonal parties and an annual customer appreciation field day with BBQ and games</li>
                </ul>
            </div>
        </div>
        <div class="mlarge-offset-1 columns row">
            <h1>Still not convinced?<br>Hear it from our team!</h1>
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
            <h1>More exclusives, better systems, and an environment that allows you to achieve your goals makes us the #1 firm in Upper Manhattan. Come see why!</h1>
        </div>
        <div class="row rsvp">
            <div class="small-12 mlarge-2 columns">
                <a href="https://dev.brg-ny.com/hiring/index.php?p=event&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-" class="button signup-success">rsvp</a>
            </div>
            <div class="small-12 mlarge-10 columns align-self-middle">
                Call us today or <b><u><a href="https://dev.brg-ny.com/hiring/index.php?p=app_interview&398cd1999c9ac5fc8a28778e1bfd0c22&Hiring-Event-2/21-#!">Click here</a></u></b> to set up an interview.
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>