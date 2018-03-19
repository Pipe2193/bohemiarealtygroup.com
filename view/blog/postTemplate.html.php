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
$blog_group_content = blogGroupTableClass::BLOG_CONTENT;
$blog_group_title = blogGroupTableClass::TITLE_BLOG_GROUP;
?>  
<?php echo view::includePartial("partials/homepage/navBar"); ?>
<div class="blog" id="blog-post">
    <div class="hero cell">
        <div class="cell" id="blog-image">
            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-post2.jpg") ?>" />
        </div>
        <div class="cell" id="blog-header">
            <h1>Blog</h1>
            <p class="desktop">Photo By: Mathew Henry</p>
        </div>
        <div class="cell" id="blog-title">
            <div class="grid-container">
                <div class="column row">
                    <h2><?php echo $objBlogs[0]->$title_blog; ?></h2>
                </div>
            </div>
        </div>
        <div class="cell" id="blog-blurb">
            <div class="grid-container">
                <div class="column row">
                    <h6 class="grid-container" style="margin-top: 10px;">Posted on <?php echo date("d F Y ", strtotime($objBlogs[0]->$created_at)); ?> | <span class="mobile"><br></span> by Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?></h6>
                    <h6 class="grid-container"> Photo by:  Mathew Henry  | Misc Information </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container headers" id="blog-content">
        <div class="row">
            <div class="small-12 mlarge-8 columns">	
                <p><?php echo $objBlogs[0]->$blog_content; ?></p>

                <?php
                if (!empty($objBlocks)) {
                    foreach ($objBlocks as $blog):
                        
                        ?>
                        <div class="row">
                            <div class="small-12 mlarge-6 columns">
                                <h5><?php echo $blog->$blog_group_title ?></h5>
                                <?php echo $blog->$blog_group_content ?>
                            </div>
                            <div class="blog-image small-12 mlarge-6 columns">	
                                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content1.jpg") ?>" alt="" title="">
                                <h6>Absolutely worth the 4-hour drive</h6>
                                <h6>Photo by: NASA</h6>
                            </div>
                        </div>
                        <?php
                    endforeach;
                }
                ?></br>

                <div class="row" id="about">
                    <div class="desktop">
                        <div class="mlarge-3 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-agent.jpg") ?>" alt="Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?>" title="Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?>">
                        </div>
                        <div class="mlarge-9 columns align-self-middle">
                            <h4>About <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?></h4>
                            <p><?php echo profileTableClass::getProfileBioByUserId($objBlogs[0]->$usuario_id); ?></p>
                        </div>
                    </div>
                    <div class="mobile">
                        <div class="row">
                            <div class="small-6 columns">
                                <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-agent.jpg") ?>" alt="Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?>" title="Agent <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?>">
                            </div>
                            <div class="small-6 columns align-self-middle">
                                <h3>About <?php echo profileTableClass::getProfileByUserId($objBlogs[0]->$usuario_id); ?></h3>
                            </div>
                        </div>
                        <div class="column row">
                            <p><?php echo profileTableClass::getProfileBioByUserId($objBlogs[0]->$usuario_id); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-12 mlarge-4 columns" id="recent-posts">
                <h3>Recent Posts</h3>
                <div class="column row"><hr></div>
                <?php
                $recent = 1;
                for ($j = 0; $j <= 5; $j++):
                    ?>
                    <div class="row">
                        <div class="small-6 columns">
                            <img src="<?php echo routing::getInstance()->getUrlImg("homepage/blog-content4.jpg") ?>" alt="blog post" title="blog post">
                        </div>
                        <div class="small-6 columns align-self-middle">
                            <h5><a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objRecentBlogs[$recent]->$blog_hash, blogTableClass::getNameField("post", true) => $objRecentBlogs[$recent]->$page_url_blog)) ?>"> <?php echo $objRecentBlogs[$recent]->$title_blog; ?></a></h5>

                        </div>
                    </div>
                    <?php
                    $recent++;
                endfor;
                ?>
                <div class="column row">
                    <ul>
                        <?php
                        $rec = 7;
                        for ($r = 0; $r <= 4; $r++):
                            ?>
                            <li><h5><a class="link" href="<?php echo routing::getInstance()->getUrlWeb('blog', 'post', array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $objRecentBlogs[$rec]->$blog_hash, blogTableClass::getNameField("post", true) => $objRecentBlogs[$rec]->$page_url_blog)) ?>"> <?php echo $objRecentBlogs[$rec]->$title_blog; ?></a></h5></li>
                            <?php
                            $rec++;
                        endfor;
                        ?>
                    </ul>
                </div>

                <div class="column row"><hr></div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                document.title = '<?php echo $objBlogs[0]->$page_title_blog; ?> | Bohemia Realty Group';
            });
        </script>
        <div class="column row"><a href="<?php echo routing::getInstance()->getUrlWeb('blog', 'index'); ?>" class="button signup-success">Back to Archive</a></div>
    </div>
</div>
<?php echo view::includePartial("partials/homepage/footerBar"); ?>