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
$blog_content = blogTableClass::BLOG_CONTENT;
$usuario_id = blogTableClass::USUARIO_ID;

$block_blog_id = blogGroupTableClass::ID;
$blog_content = blogGroupTableClass::BLOG_CONTENT;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div class="blog" id="blog">
    <div class="hero cell">
        <?php
//        for ($blog_header = 0; $blog_header <= count($objBlogs); $blog_header++) {
//          if ($objBlogs[$blog_header]->$blog_status != 1) {
//
//            $blog_header;
//
//            break;
//          }
//        }
        ?>
        <div class="cell" id="blog-image">
            <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[0]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[0]->$page_url_blog)) ?>" alt="<?php echo $objBlogs[0]->$meta_description_blog; ?>" title="<?php echo $objBlogs[0]->$title_blog; ?>">
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
                    <h2><?php echo $objBlogs[0]->$title_blog;?></h2>
                </div>
            </div>
        </div>
        <div class="cell" id="blog-blurb">
            <div class="grid-container">
                <div class="column row">
                    <div class="grid-container" style="margin-top: 10px;">
                        <p ><?php echo str_replace(" ' ", "&apos;", $objBlogs[0]->$meta_description_blog); ?> ...<a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[0]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[0]->$page_url_blog)) ?>">Read More</a></p>
                        <br><h6 class="grid-container">Posted on  <?php echo date("d F Y ", strtotime($objBlogs[0]->$created_at)); ?>  by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?></h6>
                    </div>

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
                            <h6>Bohemia Blog by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?></h6>
                            <h6>Posted on <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6>
                            <div class="row">
                                <div class="mlarge-4 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content4.jpg") ?>"></div>
                                <div class="mlarge-8 columns">
                                    <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?> ...<a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[$blog_c]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[$blog_c]->$page_url_blog)) ?>">Read the rest</a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $index++;
                    } elseif ($index == 1) {
                        ?>
                        <div class="small-12 mlarge-6 columns">
                            <h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                            <h6>Bohemia Blog by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?></h6>
                            <h6>Posted on <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6>
                            <div class="row">
                                <div class="mlarge-4 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content4.jpg") ?>"></div>
                                <div class="mlarge-8 columns">
                                    <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?> ...<a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[$blog_c]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[$blog_c]->$page_url_blog)) ?>">Read the rest</a></p>
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
                        <div class="mobile small-12 columns"><h6>Bohemia Blog by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?> Posted on <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6></div>
                        <div class="small-6 mlarge-2 columns"><img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content5.jpg") ?>"></div>
                        <div class="small-6 mlarge-10 columns align-self-middle">
                            <h3 class="desktop"><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                            <h6 class="desktop">Bohemia Blog by <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?> Posted on  <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6>
                            <p><?php echo $objBlogs[$blog_c]->$meta_description_blog ?>...</span><a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[$blog_c]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[$blog_c]->$page_url_blog)) ?>">Read the rest</a></p>
                        </div>
                    </div>
                    <?php
                    $index++;
                } elseif ($index == 4) {
                    ?>
                    <div class="row" id="third-row">
                        <div class="mobile small-12 columns"><h3><?php echo $objBlogs[$blog_c]->$title_blog ?></h3></div>
                        <div class="mobile small-12 columns"><h6>Bohemia Blog by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?> Posted on <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6></div>
                        <div class="small-push-6 mlarge-10 columns align-self-middle">
                            <h3 class="desktop"><?php echo $objBlogs[$blog_c]->$title_blog ?></h3>
                            <h6 class="desktop">Bohemia Blog by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[$blog_c]->$usuario_id); ?> Posted on <?php echo date("d F Y ", strtotime($objBlogs[$blog_c]->$created_at)); ?></h6>
                            <p> <?php echo $objBlogs[$blog_c]->$meta_description_blog ?>...</span><a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objBlogs[$blog_c]->$blog_hash, blogTableClass::getNameField("post", true) => $objBlogs[$blog_c]->$page_url_blog)) ?>">Read the rest</a></p>
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
            <?php
            $recent = 0;
            for ($j = 0; $j <= 4; $j++):

                if ($j == 0) {
                    ?>
                    <div class="small-12 mlarge-5 columns">
                        <ul>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objRecentBlogs[$recent]->$blog_hash, blogTableClass::getNameField("post", true) => $objRecentBlogs[$recent]->$page_url_blog)) ?>"> <?php echo $objRecentBlogs[$recent]->$title_blog; ?> </a>
                        </li>
                        <?php
                        if ($j == 4) {
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                $recent++;
            endfor;

            $rec = 5;
            for ($index1 = 0; $index1 <= 4; $index1++):


                if ($index1 == 0) {
                    ?>
                    <div class="small-12 mlarge-5 columns">
                        <ul>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objRecentBlogs[$rec]->$blog_hash, blogTableClass::getNameField("post", true) => $objRecentBlogs[$rec]->$page_url_blog)) ?>"> <?php echo $objRecentBlogs[$rec]->$title_blog; ?> </a>
                        </li>

                        <?php
                        if ($index1 == 4) {
                            ?>  
                        </ul>
                    </div>
                    <?php
                }
                $rec++;
            endfor;
            ?>
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
                <?php
                $arc = 0;
                $cnty = 0;
                $sy = 0;
                for ($yx = 0; $yx <= 2; $yx++):

                    if ($cnty == 0) {
                        $year = date("Y", strtotime($objArchiveBlogs[$arc]->$created_at));
                    } else {
                        $blog_year = date("Y-m-d ", strtotime($objArchiveBlogs[$arc]->$created_at));
                        $_year = '-' . $yx . ' year';
                        $compiled_year = strtotime($_year, strtotime($blog_year));
                        $year = date('Y', $compiled_year);
                    }
                    if ($sy == 0) {
                        ?>
                        <article >
                            <header>
                                <h2><?php echo $year; ?></h2>
                            </header>
                            <section>
                                <ul>
                                    <?php
                                    $sy++;
                                }
                                $archive = 0;
                                $count = 0;
                                for ($article = 0; $article <= count($objArchiveBlogs); $article++):

                                    if ($count <= 5) {
                                        if ($year == date("Y", strtotime($objArchiveBlogs[$archive]->$created_at))) {
                                            ?>
                                            <li>
                                                <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objArchiveBlogs[$archive]->$blog_hash, blogTableClass::getNameField("post", true) => $objArchiveBlogs[$archive]->$page_url_blog)) ?>"> <?php echo $objArchiveBlogs[$archive]->$title_blog; ?> </a><br>
                                                <time><?php echo date("d F Y ", strtotime($objArchiveBlogs[$archive]->$created_at)); ?></time>
                                            </li>
                                            <?php
                                            $count++;
                                        }
                                    } else {
                                        $count = 0;
                                        $archive = 0;
                                        break;
                                    }
                                    $archive++;
                                endfor;

                                if ($sy == 1) {
                                    ?>
                                </ul>
                            </section>
                        </article>
                        <?php
                        $sy = 0;
                    }
                    $cnty++;
                    $arc++;
                endfor;
                ?>
            </div>
            <div class="small-12 mlarge-6 columns">
                <?php
                $arc = 0;
                $cnty = 0;
                $sy = 0;
                for ($yx = 3; $yx <= 5; $yx++):

                    $blog_year = date("Y-m-d ", strtotime($objArchiveBlogs[$arc]->$created_at));
                    $_year = '-' . $yx . ' year';
                    $compiled_year = strtotime($_year, strtotime($blog_year));
                    $year = date('Y', $compiled_year);

                    if ($sy == 0) {
                        ?>
                        <article >
                            <header>
                                <h2><?php echo $year; ?></h2>
                            </header>
                            <section>
                                <ul>
                                    <?php
                                    $sy++;
                                }
                                $archive = 0;
                                $count = 0;
                                for ($article = 0; $article <= count($objArchiveBlogs); $article++):

                                    if ($count <= 5) {
                                        if ($year == date("Y", strtotime($objArchiveBlogs[$archive]->$created_at))) {
                                            ?>
                                            <li>
                                                <a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objArchiveBlogs[$archive]->$blog_hash, blogTableClass::getNameField("post", true) => $objArchiveBlogs[$archive]->$page_url_blog)) ?>"> <?php echo $objArchiveBlogs[$archive]->$title_blog; ?> </a><br>
                                                <time><?php echo date("d F Y ", strtotime($objArchiveBlogs[$archive]->$created_at)); ?></time>
                                            </li>
                                            <?php
                                            $count++;
                                        }
                                    } else {
                                        $count = 0;
                                        $archive = 0;
                                        break;
                                    }
                                    $archive++;
                                endfor;
                                if ($sy == 1) {
                                    ?>
                                </ul>
                            </section>
                        </article></br>
                        <?php
                        $sy = 0;
                    }
                    $cnty++;
                    $arc++;
                endfor;
                ?>
            </div>
        </div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>