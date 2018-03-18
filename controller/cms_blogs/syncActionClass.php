<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of syncActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class syncActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $blog_posts = array(
                blogPostTableClass::ID,
                blogPostTableClass::META,
                blogPostTableClass::POST_CONTENT,
                blogPostTableClass::POST_TITLE,
                blogPostTableClass::THMUBNAIL,
                blogPostTableClass::CREATED_AT
            );

            $order_by_posts = array(
                blogPostTableClass::ID
            );

            $objblog_posts = blogPostTableClass::getAll($blog_posts, true, $order_by_posts, 'ASC');

            $_id = blogPostTableClass::ID;
            $_meta = blogPostTableClass::META;
            $_content = blogPostTableClass::POST_CONTENT;
            $_title = blogPostTableClass::POST_TITLE;
            $_thumbnail = blogPostTableClass::THMUBNAIL;
            $_created = blogPostTableClass::CREATED_AT;

            foreach ($objblog_posts as $ll_blogs):

                $page_title_blog = $ll_blogs->$_title;
                $page_url_blog = preg_replace('/\s+/', '-', $ll_blogs->$_title);
                ;
                $meta_description_blog = $ll_blogs->$_meta;
                $title_blog = $ll_blogs->$_title;
                $blog_status = 1;
                $blog_admin_notes = null;
                $blog_content = $ll_blogs->$_content;
                $id = $ll_blogs->$_id;
                $thumbnail_path = $ll_blogs->$_thumbnail;
                ;
//                $blog = request::getInstance()->getPost("blog");
                $blog_hash = md5(md5(date('U')));
                $usuario_id = session::getInstance()->getUserId();
                $created_at = $ll_blogs->$_created;
//                for ($i = 0; $i <= count($blog); $i++) {
//
//                    $blog = request::getInstance()->getPost("blog");
//                    $blog_content = $blog[$i][blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true)];
//                    if ($i === 0) {
                $data = array(
                    blogTableClass::ID => $id,
                    blogTableClass::PAGE_TITLE_BLOG => $page_title_blog,
                    blogTableClass::PAGE_URL_BLOG => $page_url_blog,
                    blogTableClass::META_DESCRIPTION_BLOG => $meta_description_blog,
                    blogTableClass::TITLE_BLOG => $title_blog,
                    blogTableClass::BLOG_STATUS => $blog_status,
                    blogTableClass::BLOG_ADMIN_NOTES => $blog_admin_notes,
                    blogTableClass::BLOG_CONTENT => $blog_content,
                    blogTableClass::BLOG_HASH => $blog_hash,
                    blogTableClass::USUARIO_ID => $usuario_id,
                    blogTableClass::BLOG_THUMBNAIL_PATH => $thumbnail_path,
                    blogTableClass::CREATED_AT => $created_at
                );

                blogTableClass::insert($data);
//                    } else {
//
//                        /**
//                         * get blog ID
//                         */
//                        $fields = array(
//                            blogTableClass::ID,
//                            blogTableClass::BLOG_HASH
//                        );
//                        $where = array(
//                            blogTableClass::BLOG_HASH => $blog_hash
//                        );
//                        $blog_id = blogTableClass::getAll($fields, true, null, null, null, null, $where);
//                        $blog_id_field = blogTableClass::ID;
//
//                        $data = array(
//                            blogGroupTableClass::ID => null,
////                blogGroupTableClass::PAGE_TITLE_BLOG => $blog_block_title,
//                            blogGroupTableClass::BLOG_CONTENT => $blog_content,
//                            blogGroupTableClass::BLOG_HASH => $blog_hash,
//                            blogGroupTableClass::BLOG_ID_BLOG => $blog_id[0]->$blog_id_field
//                        );
//
//                        blogGroupTableClass::insert($data);
//                    }
//                }

            endforeach;
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
