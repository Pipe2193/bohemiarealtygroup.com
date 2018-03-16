<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div id="press">
    <div class="row">
        <div class="small-12 mlarge-6 columns">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/press.jpg") ?>" alt="Bohemia Realty Group" title="Bohemia Realty Group">
        </div>
        <div class="small-12 mlarge-6 columns">
            <article>
                <header>
                    <h2><span>The New York Times</span></h2>
                    <h6>By John Freeman Gill</h6>
                    <time>Dec 31, 2013</time>
                </header>
                <section>
                    <p>New York has had its share of neighborhoodturnarounds in the last 20 years, but few have been as rapid and transformative as that of Frederick Douglass Boulevard. This New York Times article quotes Bohemia Co-Founder, Sarah Saltzberg.</p>
                </section>
            </article>
        </div>
    </div>
    <div class="hero cell">
        <div class="grid-container">
            <div class="column row">
                <h2>Bohemia In The Press</h2>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="row">
            <div class="small-12 mlarge-6 columns">
                <article>
                    <header>
                        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/press1.jpg") ?>" alt="Bohemia Realty Group" title="Bohemia Realty Group">
                        <h2>The Huffington Post</h2>
                        <h6>By Nancy Ruhling <time>Apr 12, 2016</time></h6>
                    </header>
                    <section>
                        <p>Bohemia Agent David Ellis speaks on the balancing act that is his life as a performer and real estate salesperson in this Huffington Post piece.</p>
                    </section>
                </article>
            </div>
            <div class="small-12 mlarge-6 columns">
                <article>
                    <header>
                        <img src="<?php echo routing::getInstance()->getUrlImg("homepage/press2.jpg") ?>" alt="Bohemia Realty Group" title="Bohemia Realty Group">
                        <h2>The New York Times</h2>
                        <h6>By Kia Gregory <time>Dec 2, 2012</time></h6>
                    </header>
                    <section>
                        <p>Bohemia Co-Founder, Sarah Saltzberg, is featured in this article on the resurgence of Harlem over the past 10 years.</p>
                    </section>
                </article>
            </div>
        </div>
        <div class="column row" id="latest-articles">
            <hr>
            <h1>Latest Articles</h1>
            <div class="articles row gutter-medium">
                <div class="small-12 mlarge-6 columns">
                    <div class="row">
                        <div class="small-6 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/experience-harlem.jpeg") ?>">
                        </div>
                        <div class="split small-6 columns">
                            <article>
                                <header>
                                    <h3>Experience Harlem</h3>
                                    <time>017-01-18</time>
                                </header>
                                <section>
                                    <p>Financial Planning When You're Freelancing Community Workshop <a href="" class="link">Link to Article</a></p>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="small-12 mlarge-6 columns">
                    <div class="row">
                        <div class="small-6 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/experience-harlem.jpeg") ?>">
                        </div>
                        <div class="split small-6 columns">
                            <article>
                                <header>
                                    <h3>Experience Harlem</h3>
                                    <time>017-01-18</time>
                                </header>
                                <section>
                                    <p>Financial Planning When You're Freelancing Community Workshop <a href="" class="link">Link to Article</a></p>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="articles row gutter-medium">
                <div class="small-12 mlarge-6 columns">
                    <div class="row">
                        <div class="small-6 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/experience-harlem.jpeg") ?>">
                        </div>
                        <div class="split small-6 columns">
                            <article>
                                <header>
                                    <h3>Experience Harlem</h3>
                                    <time>017-01-18</time>
                                </header>
                                <section>
                                    <p>Financial Planning When You're Freelancing Community Workshop <a href="" class="link">Link to Article</a></p>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="small-12 mlarge-6 columns">
                    <div class="row">
                        <div class="small-6 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/experience-harlem.jpeg") ?>">
                        </div>
                        <div class="split small-6 columns">
                            <article>
                                <header>
                                    <h3>Experience Harlem</h3>
                                    <time>017-01-18</time>
                                </header>
                                <section>
                                    <p>Financial Planning When You're Freelancing Community Workshop <a href="" class="link">Link to Article</a></p>
                                </section>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column row">
                <a class="button signup-success">See More Publishings</a>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>