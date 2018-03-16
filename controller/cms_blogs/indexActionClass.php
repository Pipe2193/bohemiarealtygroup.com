<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of indexActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

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
          profileTableClass::PROFILE_HASH
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);

      /**
       * 
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
          blogTableClass::ID
      );
      $this->objBlogs = blogTableClass::getAll($blogs_fields, true, $blogs_OrderBy, 'ASC');
      $this->defineView('index', 'cms_blogs', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
