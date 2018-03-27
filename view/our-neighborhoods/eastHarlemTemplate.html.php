<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="neighborhood">
    <div class="hero cell">
        <img src="<?php echo routing::getInstance()->getUrlImg('neighborhood/east_harlem.jpg') ?>" alt="East Harlem" title="East Harlem" style="height: 800px;">
        <div class="grid-container">
            <div class="column row">
                <h2>East Harlem</h2>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="row">
            <div class="small-12 mlarge-4 columns">
                <div class="desktop">
                    <h2>Navigation</h2>
                    <hr>
                    <ul>
                        <li><a href="">NEIGHBORHOOD</a></li>
                        <li><a href="#map">MAP</a></li>
                        <li><a href="#what-to-do">WHAT TO DO</a></li>
                        <li><a href="#where-to-eat">WHERE TO EAT AND DRINK</a></li>
                        <li><a href="#transportation">TRANSPORTATION </a></li>
                    </ul>
                    <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'index'); ?>" class="button signup-success">Whats Happening This Week In Upper Manhattan</a>
                </div>
                <div class="mobile">
                    <a id="neighborhood-navigation" class="green-button button">navigation<i aria-hidden="true" class="fa fa-chevron-down align-self-middle"></i></a>
                    <ul id="neighborhood-menu">
                        <li>navigation</li>
                        <li><a href="">NEIGHBORHOOD</a></li>
                        <li><a href="#map">MAP</a></li>
                        <li><a href="#what-to-do">WHAT TO DO</a></li>
                        <li><a href="#where-to-eat">WHERE TO EAT AND DRINK</a></li>
                        <li><a href="#transportation">TRANSPORTATION </a></li>
                        <li><a id="neighborhood-navigation-close" href="#"><span>^</span></a></li>
                    </ul>
                </div>
            </div>
            <div id="address" class="small-12 mlarge-8 columns">
                <h3>Neighborhood</h3>
                <p>The neighborhood is bordered on the south by 96th St., on the north by 143rd St, on the west by 5th Ave. and on the east by the East River.</p>
                <div class="row">
                    <div class="small-4 columns">
                        <img src="<?php echo routing::getInstance()->getUrlImg('homepage/neighborhood-score.jpg') ?>" alt="walk score" title="walk score" style="width: 50%">
                    </div>
                    <div class="small-4 columns">
                        <img src="<?php echo routing::getInstance()->getUrlImg('homepage/neighborhood-score.jpg') ?>" alt="transit score" title="transit score" style="width: 50%">
                    </div>
                    <div class="small-4 columns">
                        <img src="<?php echo routing::getInstance()->getUrlImg('homepage/neighborhood-score.jpg') ?>" alt="bike score" title="bike score" style="width: 50%">
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="column row mobile">
            <a href="" class="button">Whats Happening This Week In Upper Manhattan</a>
        </div>
    </div></br>
    <div name="map" id="map" class="map cell">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24162.012063049446!2d-73.95980108763433!3d40.800466656804865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f60f3189564d%3A0x1f81ef1c8b10115e!2sEast+Harlem%2C+New+York%2C+NY!5e0!3m2!1sen!2sus!4v1521476663916" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="grid-container">
        <div name="what-to-do" id="what-to-do" class="column row">
            <hr>
            <h3>What to do</h3>
            <p>
                East River Plaza (117th and Pleasant Ave) Stores: Target, Costco, Old Navy, Marshalls, Bob’s Discount Furniture, PetSmart, and many others.    
            </p>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>GROCERIES AND SUPERMARKETS</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">If you rather stay home and get your Rachel Ray on, there are various options for your culinary needs. Neighborhood staples are Bravo Supermarket on Broadway at 181st St., Key Foods on Broadway at 187th St., Fine Fair on St. Nicholas at 191st St. or Dan’s Supermarket on 185th St. at St. Nicholas.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>SHOPPING</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">Fort George offers a lot of great places to shop. Most stores can be found along the 181st St. corridor or the St. Nicholas corridor. Apparel tends to be casual clothing similar to H&M, Forever 21 or Jimmy Jazz at really affordable prices. Notable shops include: New York and Co. at 181st St. and Broadway, and Zodiac and Mission Fashion at 181st and St Nicholas. For higher end clothing, Kartier Couture at St. Nicholas Avenue Between 185th and 186th will keep any man dapper and Bless Boutique at Nagle Ave. and Thayer St. offers a</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>FITNESS</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">With a slew of parks, keeping fit in Fort George is a no
                            brainer. You can find running trails in Ft. Tryon Park,
                            Highbridge Park, along the Harlem River Drive, or along
                            Audubon Avenue. But if outdoor fitness isn’t your
                            jam, there are a few gyms close by. Planet Fitness at
                            Dyckman St. and Vermilyea Ave. offers a $10/month
                            membership package. If you’re more of a community feel
                            type of person, the YM&YWHA (Young Men & Women’s
                            Hebrew Association) at 54 Nagle Avenue off of Ellwood
                            has a full service gym and offers fitness classes as well.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>SERVICES</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">Fort George has a lot of different friendly vendors
                            offering great services. If pounding the pavement looking
                            for your apartment has your shoes looking weathered,
                            take them to Art Shoe Repair at St. Nicholas and 190th
                            St. They’ve been in the community for over 25 years, the
                            owners are super friendly and professional. In need of a
                            little home repair? Look no further than NHS Hardware
                            at St. Nicholas and 187th Street, on Broadway and 192nd
                            Street, and Nagle and Arden Street.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>SPECIALTY MARKETS, STREET VENDORS, AND GREENMARKETS</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">For your health food needs, check out New Age Nutrition
                            Health on Broadway between Hillside Ave and 193rd
                            St. They have a moderate assortment of snack foods,
                            easy-prep meals, and staple foods like pasta, frozen
                            food, and bulk grains and nuts. If you have penchant
                            for produce, you’ll enjoy great deals from street fruit
                            vendors along 181st St. from Broadway to Amsterdam
                            and on St. Nicholas Avenue from 181st St. to about
                            187th St. Getting to know your local vendors is vital, as
                            you’ll learn who has the best produce for your taste buds</div>
                    </div>
                </div>
            </div>
        </div>
        <div name="where-to-eat" id="where-to-eat" class="column row">
            <hr>
            <h3>Where to eat and drink</h3>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>COFFEE SHOPS, BAKERIES, & MORE</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">For quick food to-go, Fort George offers a host of options
                            from pizza shops to bakeries to coffee and smoothie
                            bars. You can get a quick cup of joe at almost any
                            bodega (small grocery store), as well as the Dunkin
                            Donuts at St. Nicholas and 191st St. If coffee isn’t your
                            thing, Gloria’s Juice Bar at 181 St. and Audubon, Mary’s
                            Natural Juice at 191st and St. Nicholas Ave., Green
                            Juice Cafe at 184th and Broadway, and Empanadas
                            Monumental at 189th St. and St. Nicholas Ave. all
                            make fresh fruit smoothies to your liking; they also offer</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>RESTAURANTS AND NIGHTLIFE</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">Fort George offers a diverse range of restaurants that
                            will leave you salivating. At 183rd Street and St. Nicholas
                            you’ll find popular La Casa Del Mofongo, a Dominican
                            restaurant specializing in mofongo, a refried plantains
                            dish. Walking down Broadway at 185th street is Altus
                            Café, serving up an eclectic American fusion menu and a
                            great atmosphere. Further up on Broadway at 192nd St.
                            is a hub of great restaurants including Locksmith Wine
                            and Burger Bar, Buddha Beer Bar, Apt. 78, and Arlezol
                            Café. As it’s name might suggest, Locksmith Wine and</div>
                    </div>
                </div>
            </div>
        </div>
        <div name="transportation" id="transportation" class="column row">
            <hr>
            <h3>Transportation</h3>
            <div class="row">
                <div class="columns small-offset-1 small-10 end">
                    <h4>TRAINS, BUSES, AND CABS</h4>
                    <div class="row">
                        <div class="small-6 columns"><img src="<?php echo routing::getInstance()->getUrlImg('homepage/buddha-beer-bar.jpg') ?>" alt="" title=""></div>
                        <div class="small-6 columns">The A Train makes stops at 181st St and 190th St, and
                            the 1 Train makes stops at 181st, 191st, and Dyckman
                            Streets. As far as buses in the neighborhood: The Bx7
                            and M100 buses run up and down Broadway, the M3 bus
                            north and south on Saint Nicholas, and the M101 bus
                            runs north and south on Amsterdam Ave. On W.181st St,
                            several buses come into Manhattan from the Bronx and
                            vice versa including the Bx11, Bx13, Bx36, Bx35, and Bx3.
                            Also, gypsy cabs are everywhere in the neighborhood.
                            <a href="#" class="link">MTA Link</a></div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>
