<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$blog_hash = blogTableClass::BLOG_HASH;
$page_title_blog = blogTableClass::PAGE_TITLE_BLOG;
$page_url_blog = blogTableClass::PAGE_URL_BLOG;
$meta_description_blog = blogTableClass::META_DESCRIPTION_BLOG;
$title_blog = blogTableClass::TITLE_BLOG;
$blog_status = blogTableClass::BLOG_STATUS;
$created_at = blogTableClass::CREATED_AT;
$blog_admin_notes = blogTableClass::BLOG_ADMIN_NOTES;
$usuario_id = blogTableClass::USUARIO_ID;

$block_blog_id = blogGroupTableClass::ID;
$blog_content = blogGroupTableClass::BLOG_CONTENT;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div class="blog" id="blog">
    <div class="hero cell">
        <?php
        for ($blog_header = 0; $blog_header <= count($objBlogs); $blog_header++) {
          if ($objBlogs[$blog_header]->$blog_status != 1) {

            $blog_header + 1;

            break;
          }
        }
        ?>
        <div class="cell" id="blog-image">
            <a href="your-guide-to-the-best-day-trip-from-nyc-no-headers.html" alt="blog post" title="blog post">
                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-post1.jpg") ?>" />
            </a>
        </div>
        <div class="cell" id="blog-header">
            <h1>Blog</h1>
            <p class="desktop">Inwood Park Landscape by Dave Lopez</p>
        </div>
        <div class="cell" id="blog-title">
            <div class="grid-container">
                <div class="column row">
                    <h2><?php echo $objBlogs[$blog_header]->$title_blog ?></h2>
                </div>
            </div>
        </div>
        <div class="cell" id="blog-blurb">
            <div class="grid-container">
                <div class="column row">
                    <h6 class="grid-container">Posted on <?php echo $objBlogs[$blog_header]->$created_at; ?> by Agent Jessica Wagner</h6>
                    <p class="grid-container"><?php echo $objBlogs[$blog_header]->$meta_description_blog ?> ...<a class="link" href="your-guide-to-the-best-day-trip-from-nyc-no-headers.html">Read More</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <?php
        $index = 0;
        $blog_c = 1;
        foreach ($objBlogs as $blogs):
          if ($objBlogs[$blog_c]->$blog_status == 1) {
            ?>
            <?php if ($index == 0) { ?>
              <div class="row" id="first-row">

                  <div class="small-12 mlarge-6 columns">
                      <h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                      <h6>Bohemia Blog by Agent Michaela Morton</h6>
                      <h6>Posted on <?php echo $objBlogs[$blog_c]->$created_at; ?></h6>
                      <div class="row">
                          <div class="mlarge-4 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content4.jpg") ?>"></div>
                          <div class="mlarge-8 columns">
                              <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?> ...<a class="link" href="">Read the rest</a></p>
                          </div>
                      </div>
                  </div>
                  <?php
                  $index++;
                } elseif ($index == 1) {
                  ?>
                  <div class="small-12 mlarge-6 columns">
                      <h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                      <h6>Bohemia Blog by Agent Michaela Morton</h6>
                      <h6>Posted on <?php echo $objBlogs[$blog_c]->$created_at; ?></h6>
                      <div class="row">
                          <div class="mlarge-4 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content4.jpg") ?>"></div>
                          <div class="mlarge-8 columns">
                              <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?> ...<a class="link" href="">Read the rest</a></p>
                          </div>
                      </div>
                  </div>
                  <?php
                  $index++;
                } elseif ($index == 2) {
                  ?>
              </div>
              <?php
              $index++;
            } elseif ($index == 3) {
              ?>
              <div class="row" id="second-row">
                  <div class="mobile small-12 columns"><h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3></div>
                  <div class="mobile small-12 columns"><h6>Bohemia Blog by Agent Kaley Pruitt Posted on <?php echo $objBlogs[$blog_c]->$created_at; ?></h6></div>
                  <div class="small-6 mlarge-2 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content5.jpg") ?>"></div>
                  <div class="small-6 mlarge-10 columns align-self-middle">
                      <h3 class="desktop"><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                      <h6 class="desktop">Bohemia Blog by Agent Kaley Pruitt Posted on  <?php echo $objBlogs[$blog_c]->$created_at; ?></h6>
                      <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?>...</span><a class="link" href="">Read the rest</a></p>
                  </div>
              </div>
              <?php
              $index++;
            } elseif ($index == 4) {
              ?>
              <div class="row" id="third-row">
                  <div class="mobile small-12 columns"><h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3></div>
                  <div class="mobile small-12 columns"><h6>Bohemia Blog by Agent Sandy Rosa Posted on <?php echo $objBlogs[$blog_c]->$created_at; ?></h6></div>
                  <div class="small-push-6 mlarge-10 columns align-self-middle">
                      <h3 class="desktop"><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                      <h6 class="desktop">Bohemia Blog by Agent Sandy Rosa Posted on <?php echo $objBlogs[$blog_c]->$created_at; ?></h6>
                      <p> <?php echo $objBlogs[$blog_c]->$meta_description_blog ?>...</span><a class="link" href="">Read the rest</a></p>
                  </div>
                  <div class="small-pull-6 mlarge-2 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content5.jpg") ?>"></div>
              </div>
              <?php
              $index = 0;
            }
          }
          $blog_c ++;
          ?>
        <?php endforeach; ?>



        <div class="row" id="recent-posts">
            <div class="small-12 mlarge-2 columns">
                <h3>Recent Posts</h3>
            </div>
            <div class="small-12 mlarge-5 columns">
                <ul>
                    <li>
                        <a>NEW CONSTRUCTION VS. PREOWNED APARTMENTS</a>
                    </li>
                    <li>
                        <a>MANHATTAN STREETS: BY NAME, NUMBER & GEOMETRY (A HANDY GUIDE)</a>
                    </li>
                    <li>
                        <a>MYTH BUSTER - YOUR CREDIT SCORE</a>
                    </li>
                </ul>
            </div>
            <div class="small-12 mlarge-5 columns">
                <ul>
                    <li>
                        <a>MYTH BUSTER: THE NO FEE APARTMENT</a>
                    </li>
                    <li>
                        <a>WALK DOWN MEMORY LANE IN THE BRONX</a>
                    </li>
                    <li>
                        <a>GENTRIFICATION....GOOD OR BAD OR BOTH?</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" id="search-archive">
            <div class="small-12 mlarge-6 columns align-self-middle">
                <h2>BOHEMIA BLOG ARCHIVE</h2>
            </div>
            <div class="small-12 mlarge-6 columns align-self-middle">
                <form class="search">
                    <input placeholder="Search Blog Archive" type="search"><button type="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row" id="archive">
            <div class="small-12 mlarge-6 columns">
                <article class="first">
                    <header>
                        <h2>2017</h2>
                    </header>
                    <section>
                        <ul>
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2017</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2017</time>
                            </li>
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2017</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2017</time>
                            </li>
                        </ul>
                        <ul id="more-2017" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2017</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2017</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2017" class="more-blog button mobile">see more of 2017<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
                <article>
                    <header>
                        <h2>2016</h2>
                    </header>
                    <section>
                        <ul id="more-2016" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2016</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2016</time>
                            </li>
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2016</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2016</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2016" class="more-blog button mobile">see more of 2016<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
                <article>
                    <header>
                        <h2>2015</h2>
                    </header>
                    <section>
                        <ul id="more-2015" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2015</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2015</time>
                            </li>
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2015</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2015</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2015" class="more-blog button mobile">see more of 2015<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
            </div>
            <div class="small-12 mlarge-6 columns">
                <article>
                    <header>
                        <h2>2014</h2>
                    </header>
                    <section>
                        <ul id="more-2014" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2014</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2014</time>
                            </li>
                            <li>
                                <a>What are you wearing to brunch in Harlem?</a><br>
                                <time>December 22, 2014</time>
                            </li>
                            <li>
                                <a>A Stroll with my Dog through Inwood Hill Park</a><br>
                                <time>November 29, 2014</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2014" class="more-blog button mobile">see more of 2014<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
                <article>
                    <header>
                        <h2>2013</h2>
                    </header>
                    <section>
                        <ul id="more-2013" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2013</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2013</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2013" class="more-blog button mobile">see more of 2013<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
                <article>
                    <header>
                        <h2>2012</h2>
                    </header>
                    <section>
                        <ul id="more-2012" class="more" data-toggler data-animate="fade-in fade-out">
                            <li>
                                <a>I’m a Big Fan of the “Staycation”</a><br>
                                <time>April 26 2012</time>
                            </li>
                            <li>
                                <a>Uptown Tender</a><br>
                                <time>March 10, 2012</time>
                            </li>
                            <li>
                                <a>What are you wearing to brunch in Harlem?</a><br>
                                <time>December 22, 2012</time>
                            </li>
                            <li>
                                <a>A Stroll with my Dog through Inwood Hill Park</a><br>
                                <time>November 29, 2012</time>
                            </li>
                        </ul>
                        <button data-toggle="more-2012" class="more-blog button mobile">see more of 2012<i class="fa fa-chevron-down" aria-hidden="true"></i></button>
                    </section>
                </article>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>