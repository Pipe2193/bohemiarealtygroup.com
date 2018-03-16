<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of editActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {

      /**
       * get user data
       */
      $fields = array(
          profileTableClass::FIRST_NAME,
          profileTableClass::MIDDLE_NAME,
          profileTableClass::LAST_NAME,
          profileTableClass::EMAIL_ADDRESS,
          profileTableClass::PHONE_NUMBER,
          profileTableClass::EXT_PHONE_NUMBER,
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      /**
       * GET LANDLORD INFO
       */
      $blog_hash = request::getInstance()->getGet("hash");

      $fields_blogs = array(
          blogTableClass::ID,
          blogTableClass::PAGE_TITLE_BLOG,
          blogTableClass::PAGE_URL_BLOG,
          blogTableClass::META_DESCRIPTION_BLOG,
          blogTableClass::TITLE_BLOG,
          blogTableClass::BLOG_STATUS,
          blogTableClass::BLOG_CONTENT,
          blogTableClass::BLOG_HASH,
          blogTableClass::BLOG_ADMIN_NOTES,
          blogTableClass::USUARIO_ID,
          blogTableClass::CREATED_AT,
          blogTableClass::UPDATED_AT
      );
      $where_blogs = array(
          blogTableClass::BLOG_HASH => $blog_hash
      );
      session::getInstance()->setFlash("edit_blog_post", "edit_blog_post");
      $this->objBlog = blogTableClass::getAll($fields_blogs, true, null, null, null, null, $where_blogs);

      $fields_block = array(
          blogGroupTableClass::ID,
          blogGroupTableClass::BLOG_CONTENT,
          blogGroupTableClass::BLOG_HASH,
          blogGroupTableClass::BLOG_ID_BLOG
      );
      $where_block = array(
          blogGroupTableClass::BLOG_HASH => $blog_hash
      );
      $this->objBlocks = blogGroupTableClass::getAll($fields_block, true, null, null, null, null, $where_block);
      $this->countBlock = count($this->objBlocks);
      $this->defineView('edit', 'cms_blogs', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
