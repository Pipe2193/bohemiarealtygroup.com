<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of createActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $page_title_blog = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::PAGE_TITLE_BLOG, true));
        $page_url_blog = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::PAGE_URL_BLOG, true));
        $meta_description_blog = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::META_DESCRIPTION_BLOG, true));
        $title_blog = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::TITLE_BLOG, true));
        $blog_status = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::BLOG_STATUS, true));
        $blog_admin_notes = request::getInstance()->getPost(blogTableClass::getNameField(blogTableClass::BLOG_ADMIN_NOTES, true));
        $blog = request::getInstance()->getPost("blog");
        $blog_hash = md5(md5(date('U')));
        $usuario_id = session::getInstance()->getUserId();
        for ($i = 0; $i <= count($blog); $i++) {

          $blog = request::getInstance()->getPost("blog");
          $blog_content = $blog[$i][blogTableClass::getNameField(blogTableClass::BLOG_CONTENT, true)];
          
          if ($i === 0) {
            $data = array(
                blogTableClass::ID => null,
                blogTableClass::PAGE_TITLE_BLOG => $page_title_blog,
                blogTableClass::PAGE_URL_BLOG => $page_url_blog,
                blogTableClass::META_DESCRIPTION_BLOG => $meta_description_blog,
                blogTableClass::TITLE_BLOG => $title_blog,
                blogTableClass::BLOG_STATUS => $blog_status,
                blogTableClass::BLOG_ADMIN_NOTES => $blog_admin_notes,
                blogTableClass::BLOG_CONTENT => $blog_content,
                blogTableClass::BLOG_HASH => $blog_hash,
                blogTableClass::USUARIO_ID => $usuario_id
            );

            blogTableClass::insert($data);
          } else {

            /**
             * get blog ID
             */
            $fields = array(
                blogTableClass::ID,
                blogTableClass::BLOG_HASH
            );
            $where = array(
                blogTableClass::BLOG_HASH => $blog_hash
            );
            $blog_id = blogTableClass::getAll($fields, true, null, null, null, null, $where);
            $blog_id_field = blogTableClass::ID;
            
            $data = array(
                blogGroupTableClass::ID => null,
//                blogGroupTableClass::PAGE_TITLE_BLOG => $blog_block_title,
                blogGroupTableClass::BLOG_CONTENT => $blog_content,
                blogGroupTableClass::BLOG_HASH => $blog_hash,
                blogGroupTableClass::BLOG_ID_BLOG => $blog_id[0]->$blog_id_field
            );

            blogGroupTableClass::insert($data);
          }
        }
        
        session::getInstance()->setSuccess("The Post <b>" . $title_blog . "</b> has been Saved.");
        routing::getInstance()->redirect('cms_blogs', 'index');
      } else {
        routing::getInstance()->redirect('cms_blogs', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
