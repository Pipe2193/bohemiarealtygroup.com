<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="neighborhood">
    <div class="hero cell">
        <img src="<?php echo routing::getInstance()->getUrlImg('neighborhood/spanish_harlem.jpg') ?>" alt="Spanish Harlem" title="Spanish Harlem" style="height: 800px;">
        <div class="grid-container">
            <div class="column row">
                <h2>Spanish Harlem</h2>
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
                <p> Spanish Harlem starts at 96th street from 5th Ave. to the East River and continues north to 116h street. Puerto Rican immigration after the First World War established an enclave at the western portion of Italian Harlem (around 110th Street and Lexington Avenue), which became known as Spanish Harlem. The area slowly grew to encompass all of Italian Harlem as Italians moved out and Hispanics moved in another wave of immigration after the Second World War. The region is now home to a new influx of immigrants from around the world. Yemeni merchants, for example, work in local convenience stores alongside immigrants from the Dominican Republic. Italians live next to the influx of Central and South American immigrant populations. Other businessmen and local neighbors can be Korean, Chinese or Haitian in origin. It is also home to one of the few major television studios north of midtown, Metropolis (106th St. and Park Ave.), where shows like BET's 106 & Park and Chappelle's Show have been produced. Major medical care providers include Metropolitan Hospital Center, North General Hospital and Mount Sinai Hospital, which serves residents of East Harlem and the Upper East Side.</p></br>
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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24162.023886270625!2d-73.95975819069976!3d40.800434176615006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f60f3189564d%3A0x1f81ef1c8b10115e!2sEast+Harlem%2C+New+York%2C+NY!5e0!3m2!1sen!2sus!4v1521440759885" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="grid-container">
        <div name="what-to-do" id="what-to-do" class="column row">
            <hr>
            <h3>What to do</h3></br>
            
            <h4>Parks and Recreation</h4>
            <p>
                It&rsquo;s easy to find green places to hang out, as two large parks surround both
                the east and west of Spanish Harlem. &nbsp;It is a short walk
                to <a href="http://www.centralparknyc.org/visit/things-to-see/north-end/conservatory-garden.html"
                      target="_blank"><strong>The Conservatory Gardens</strong></a>                    in Central Park, as well as the Lasker Rink at 110<sup>th</sup>                    St &#8211; which in summertime is a pool and in the winter,
                a skating rink. <strong><a href="http://www.nycgovparks.org/parks/marcusgarveypark" target="_blank">Marcus Garvey Park</a>,</strong>                    at 122<sup>nd</sup> St and Madison Ave, houses a full recreation
                center, amphitheater for live shows, exceptional rock formations
                and the only remaining fire tower built in the early 1900s.
            </p>
            <p>
                <a href="http://www.nycgovparks.org/parks/thomasjeffersonpark/" target="_blank"><strong>Thomas Jefferson Park</strong></a>,
                located<strong> </strong>at 111<sup>th</sup> St and 1<sup>st</sup>                    Avenue, is a friendly neighborhood park packed to the brim
                with things to do.&nbsp; On busy days, runners circle the track
                while groups of friends shoot hoops, hit balls, and take advantage
                of the baseball and handball courts. The small recreation center
                on its grounds offers a fitness room, exercise equipment, and
                classes for those looking for a good workout. Thomas Jefferson
                Park is also a wonderful resource for local children and features
                a substantial playground, complete with swings and slides galore,
                as well as plenty of spaces for jumping, climbing, and carrying
                on.&nbsp; Inside the recreation center, the afterschool program
                provides more structured fun. And in the summer, the park takes
                on a whole new character when the outdoor pool is opened and
                families come out to use the barbeque grills and picnic tables.
            </p>
            <p>
                In Spanish Harlem, you don&rsquo;t have to catch the subway to have some fun. &nbsp;
                <a href="http://camaradaselbarrio.com"><strong>Camarades</strong></a> (2241 1st Avenue at 115<sup>th</sup>                      St.) is home to traditional Puerto Rican and Nuevo Latino
                cuisine, live music, DJ&rsquo;s and great art exhibits. For
                some late night jazz make sure to visit the <a href="http://creolenyc.com/index.php"
                                                               target="_blank"><strong>Creole Restaurant and Music Supper Club</strong> </a>at
                2167 Third Avenue and 118<sup>th</sup> St.,<em> </em>where
                live jazz from some of the city&rsquo;s best musicians runs
                till 2am. The <strong><a href="http://www.amorcubanonyc.com/Home.html" target="_blank">Amor Cubano Restaurant</a> </strong>at
                2018 3<sup>rd</sup> Ave at 111<sup>th</sup> St. has a great
                house band and the place is always grooving!
            </p></br>
            
            <h4>Culture</h4>
            <p>
                To experience the real culture of El Barrio, spend the afternoon at
                <a href="http://www.elmuseo.org/" target="_blank"><strong>El Museo Del Barrio</strong> </a>(1230 Fifth Ave. and
                104<sup>th</sup> St.) Right down the block is the <a href="http://www.mcny.org/" target="_blank"><strong>Museum of the City of New York </strong></a>(1220
                Fifth Avenue,)<em> </em>as well as numerous museums along
                Museum Mile, running along Fifth Ave. from &nbsp;82<sup>nd</sup>                      St to 105<sup>th</sup> St.&nbsp; Be sure to check out the
                stunning exhibits at <strong><a href="http://www.africanart.org/" target="_blank">The Museum for African Art</a></strong>                      on 110<sup>th</sup> St and 5<sup>th</sup> Ave. <strong>&nbsp;</strong>
                <a href="http://www.boysandgirlsharbor.org/" target="_blank"><strong>Boys and Girls Harbor</strong> </a>at 1 East 104th
                Street has classes in dance, music and culture, and is
                home to New York&rsquo;s legendary salsa musicians; performances
                and rehearsals are open to the public.&nbsp; <a href="http://www.tallerboricua.org/"
                                                                target="_blank"><strong>Taller Boricua / Puerto Rican Workshop</strong></a>                        at The Julia De Burgos Latino Cultural Center (1680 Lexington
                Ave. and 105<sup>th</sup> St.) offers many cultural events,
                exhibits, and features a fantastic music and dancing series.
                <a href="http://www.prdream.com/index.php" target="_blank"><strong>PRdream.com</strong></a>,
                the 12-year old, award-winning web site on the history
                and culture of Puerto Ricans, altered the cultural landscape
                of East Harlem with the founding of its new media gallery
                and digital film studio called <a href="http://www.medianoche.us/" target="_blank"><strong>MediaNoche</strong></a> in 2003.
                MediaNoche continues to present technology-based art on
                Park Avenue and 102nd Street, providing exhibition space
                and residencies for artists and filmmakers working in new
                media.
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
