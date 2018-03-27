<?php
use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="home">
    <!-- begin desktop -->
    <div class="hero desktop cell">
        <div class="orbit" role="region" aria-label="Properties" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
            <div class="orbit-wrapper">
                <ul class="orbit-container">
                    <li class="is-active orbit-slide">
                        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/Landing/5.jpg"); ?>" />
                    </li>
                    <li class="orbit-slide">
                        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/Landing/6.jpg"); ?>" />
                    </li>
                    <li class="orbit-slide">
                        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/Landing/4.jpg"); ?>" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="grid-container">
            <div class="row">
                <div class="small-12 mlarge-6">
                    <a class="button success" href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "sales") ?>">Looking to Buy</a>
                </div>
                <div class="small-12 mlarge-6">
                    <a class="button success" href="<?php echo routing::getInstance()->getUrlWeb("our-properties", "rentals") ?>">Looking to Rent</a>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container desktop">
        <div class="small-10 small-offset-1 end column row">
            <h3>Featured Properties</h3>
        </div>
        <div class="column row">
            <div aria-label="Featured Properties" id="featured-properties" class="orbit desktop" data-auto-play="false" data-orbit="" role="region">
                <div class="orbit-wrapper two-slides grid-container">
                    <div class="row">
                        <div class="orbit-controls small-1 columns">
                            <button class="orbit-previous button"><span class="show-for-sr">Previous Slide</span>&lsaquo;</button>
                        </div>
                        <div class="small-10 columns">
                            <ul class="orbit-container" data-orbit data-options="animation_speed:800;">
                                <li class="is-active orbit-slide">
                                    <div class="grid-container">
                                        <div class="row">
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>3 BED | 2 BATH<br>
                                                            $1,199,000</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>The Leo 427 West 154th Street Unit 1</h5>
                                                        <p>Hamilton Heights</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="property small-6 columns">
                                                <a href="/our-properties/dont-you-deserve-to-reward-yourself.html"></a>
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>1 BED | 1 BATH<br>
                                                            $4,475</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>Don’t you deserve to reward yourself?</h5>
                                                        <p>Harlem</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="orbit-slide">
                                    <div class="grid-container">
                                        <div class="row">
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>3 BED | 2 BATH<br>
                                                            $1,199,000</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>The Leo 427 West 154th Street Unit 1</h5>
                                                        <p>Hamilton Heights</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>1 BED | 1 BATH<br>
                                                            $4,475</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>Don’t you deserve to reward yourself?</h5>
                                                        <p>Harlem</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="orbit-slide">
                                    <div class="grid-container">
                                        <div class="row">
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>3 BED | 2 BATH<br>
                                                            $1,199,000</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>The Leo 427 West 154th Street Unit 1</h5>
                                                        <p>Hamilton Heights</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>1 BED | 1 BATH<br>
                                                            $4,475</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>Don’t you deserve to reward yourself?</h5>
                                                        <p>Harlem</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="orbit-slide">
                                    <div class="grid-container">
                                        <div class="row">
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>3 BED | 2 BATH<br>
                                                            $1,199,000</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>The Leo 427 West 154th Street Unit 1</h5>
                                                        <p>Hamilton Heights</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="property small-6 columns">
                                                <div class="property-img row">
                                                    <div class="small-12 columns"><img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>"></div>
                                                </div>
                                                <div class="property-info row">
                                                    <div class="small-6 columns align-self-middle">
                                                        <h4>1 BED | 1 BATH<br>
                                                            $4,475</h4>
                                                    </div>
                                                    <div class="split small-6 columns align-self-middle">
                                                        <h5>Don’t you deserve to reward yourself?</h5>
                                                        <p>Harlem</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="orbit-controls small-1 columns">
                            <button class="orbit-next button"><span class="show-for-sr">Next Slide</span>&rsaquo;</button>
                        </div>
                    </div><!-- row -->
                    <div class="column row">
                        <nav class="orbit-bullets">
                            <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button> <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button> <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button> <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button><button data-slide="4"><span class="show-for-sr">Fifth slide details.</span></button>
                        </nav>
                    </div><!-- row -->
                </div><!-- orbit-wrapper grid-container -->
            </div><!-- orbit desktop -->
        </div><!-- column row -->


        <!--REMOVED OPEN HOUSES---------


    <!-- end desktop -->
    <!-- begin mobile -->
    </div>
    <div class="hero mobile cell">
        <div class="cell">
            <img alt="Bohemia Realty Group" src="<?php echo routing::getInstance()->getUrlImg("homepage/Landing/2.jpg"); ?>" title="Bohemia Realty Group"><a class="button" href="">Looking to Rent</a>
        </div>
        <div class="cell">
            <a class="button" href="">Looking to Buy</a>
            <img alt="Bohemia Realty Group" src="<?php echo routing::getInstance()->getUrlImg("homepage/Landing/3.jpg"); ?>" title="Bohemia Realty Group">
        </div>
        <div class="socials index cell">
            <a href="https://instagram.com/bohemiarealty" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://twitter.com/BohemiaRealtyGr" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/pages/Bohemia-Realty-Group/105709759554291?ref=hl" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.pinterest.com/bohemiarealty" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
        </div>
    </div>
    <div aria-label="Featured Properties" id="featured-properties" class="orbit mobile" data-auto-play="false" data-orbit="" role="region">
        <div class="orbit-wrapper grid-container">
            <div class="column row">
                <h3>Featured Properties</h3>
                <ul class="orbit-container">
                    <li class="is-active orbit-slide">
                        <div class="grid-container">
                            <div class="property-img row">
                                <div class="small-12 columns">
                                    <img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties1.jpg"); ?>">
                                </div>
                            </div>
                            <div class="property-info row">
                                <div class="split small-6 columns align-self-middle">
                                    <h4>3 BED | 2 BATH<br>
                                        $1,199,000</h4>
                                </div>
                                <div class="small-6 columns align-self-middle">
                                    <h5>The Leo 427 West 154th Street Unit 1</h5>
                                    <p>Hamilton Heights</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="orbit-slide">
                        <div class="grid-container">
                            <div class="property-img row">
                                <div class="small-12 columns">
                                    <img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>">
                                </div>
                            </div>
                            <div class="property-info row">
                                <div class="split small-6 columns align-self-middle">
                                    <h4>3 BED | 2 BATH<br>
                                        $1,199,000</h4>
                                </div>
                                <div class="small-6 columns align-self-middle">
                                    <h5>The Leo 427 West 154th Street Unit 1</h5>
                                    <p>Hamilton Heights</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="orbit-slide">
                        <div class="grid-container">
                            <div class="property-img row">
                                <div class="small-12 columns">
                                    <img alt="Properties" class="orbit-image" src="<?php echo routing::getInstance()->getUrlImg("homepage/properties2.jpg"); ?>">
                                </div>
                            </div>
                            <div class="property-info row">
                                <div class="split small-6 columns align-self-middle">
                                    <h4>3 BED | 2 BATH<br>
                                        $1,199,000</h4>
                                </div>
                                <div class="small-6 columns align-self-middle">
                                    <h5>The Leo 427 West 154th Street Unit 1</h5>
                                    <p>Hamilton Heights</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="cell mobile">
            <div class="orbit-controls mobile">
                <button class="orbit-previous button"><span class="show-for-sr">Previous Slide</span>&lt;</button> <button class="orbit-next button"><span class="show-for-sr">Next Slide</span>&gt;</button>
            </div>
        </div>
    </div>

    <!-- end mobile -->
    <div class="grid-container">
        <div class="columns row">
            <hr class="mobile">
            <h3 class="grid-container">We have the largest portfolio of exclusive properties in Upper Manhattan</h3>
        </div>
        <div class="row">
            <div class="columns small-12 mlarge-offset-1 mlarge-10 end">Bohemia Realty Group is a dynamic team of dedicated real estate professionals that focus on residential sales and rentals in Upper Manhattan. Our agents are neighborhood specialists; over 90% of Bohemia agents call uptown home, and can provide first-hand knowledge about the lifestyle at the top of the island. Our mission is a three pronged approach to improving quality of life: to service clients in an efficient, friendly way; to create a positive work environment for our agents and employees; and to enrich the community above 96th Street.
            </div>
        </div>
    </div><!-- grid-container -->
    <div class="footer cell">
        <div class="grid-container">
            <div class="row">
                <div class="small-12 mlarge-4 columns">
                    <a class="button success" href="<?php echo routing::getInstance()->getUrlWeb("list-with-us", "index") ?>">List With Us</a>
                    <p>Need help marketing a property?<br>
                        Uptown sales and rentals<br>
                        is what we do.</p>
                </div>
                <div class="small-12 mlarge-4 columns">
                    <a class="button success" href="<?php echo routing::getInstance()->getUrlWeb("work-with-us", "index") ?>">Join Our Team</a>
                    <p>What gives our agents the potential<br>
                        to gross $300,000+<br>
                        IN THEIR FIRST YEAR?</p>
                </div>
                <div class="small-12 mlarge-4 columns">
                    <a class="button success" href="<?php echo routing::getInstance()->getUrlWeb("press", "index") ?>">Bohemia In The Press</a>
                    <p>The Real Deal<br>
                        Residential Scorecard</p>
                </div>
            </div>
        </div>
    </div><!-- footer cell -->
</div><!-- home -->

<?php echo view::includePartial("partials/homepage/footerBar"); ?>
