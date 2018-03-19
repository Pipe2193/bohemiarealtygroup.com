<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class postActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {

        try {
            if (request::getInstance()->hasGet(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true))) {
                $blog_hash = request::getInstance()->getGet(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true));
                $blog_id = blogTableClass::getIdBlogByHash($blog_hash);
                /**
                 * blogs info
                 */
                $blogs_fields = array(
                    blogTableClass::ID,
                    blogTableClass::PAGE_TITLE_BLOG,
                    blogTableClass::PAGE_URL_BLOG,
                    blogTableClass::META_DESCRIPTION_BLOG,
                    blogTableClass::TITLE_BLOG,
                    blogTableClass::BLOG_STATUS,
                    blogTableClass::BLOG_CONTENT,
                    blogTableClass::BLOG_HASH,
                    blogTableClass::USUARIO_ID,
                    blogTableClass::CREATED_AT,
                    blogTableClass::UPDATED_AT
                );
                $blogs_OrderBy = array(
                    blogTableClass::CREATED_AT
                );

                $blogs_where = array(
                    blogTableClass::BLOG_STATUS => 1,
                    blogTableClass::ID => $blog_id
                );
                $this->objBlogs = blogTableClass::getAll($blogs_fields, true, $blogs_OrderBy, null, null, null, $blogs_where);

                $fields_block = array(
                    blogGroupTableClass::ID,
                    blogGroupTableClass::TITLE_BLOG_GROUP,
                    blogGroupTableClass::BLOG_CONTENT,
                    blogGroupTableClass::BLOG_HASH,
                    blogGroupTableClass::BLOG_ID_BLOG
                );
                $where_block = array(
                    blogGroupTableClass::BLOG_HASH => $blog_hash
                );
                $this->objBlocks = blogGroupTableClass::getAll($fields_block, true, null, null, null, null, $where_block);

                /**
                 * Recent blogs info
                 */
                $recent_blogs_fields = array(
                    blogTableClass::ID,
                    blogTableClass::PAGE_TITLE_BLOG,
                    blogTableClass::PAGE_URL_BLOG,
                    blogTableClass::META_DESCRIPTION_BLOG,
                    blogTableClass::TITLE_BLOG,
                    blogTableClass::BLOG_STATUS,
                    blogTableClass::BLOG_CONTENT,
                    blogTableClass::BLOG_HASH,
                    blogTableClass::USUARIO_ID,
                    blogTableClass::CREATED_AT,
                    blogTableClass::UPDATED_AT
                );
                $recent_blogs_OrderBy = array(
                    blogTableClass::CREATED_AT
                );
                $recent_blogs_where = null;

                $recent_blogs_where[blogTableClass::BLOG_STATUS] = 1;

                $this->objRecentBlogs = blogTableClass::getAll($recent_blogs_fields, true, $recent_blogs_OrderBy, 'DESC', null, null, $recent_blogs_where);
            } else {
                routing::getInstance()->forward('shfSecurity', 'exception');
            }
            $this->defineView('post', 'blog', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
