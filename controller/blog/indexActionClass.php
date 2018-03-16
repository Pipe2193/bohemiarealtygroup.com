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
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {
      
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
      $this->objBlogs = blogTableClass::getAll($blogs_fields, true, $blogs_OrderBy, 'ASC', 5);
      
     $this->defineView('index', 'blog', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
