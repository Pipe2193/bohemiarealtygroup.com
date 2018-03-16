<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of deleteActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod("GET")) {
        $hash = request::getInstance()->getGet(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true));
        if (isset($hash)) {
          $blog_hash = request::getInstance()->getGet(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true));
          $blog_id = blogTableClass::getIdBlogByHash($blog_hash);
          $ids = array(
              blogTableClass::ID => $blog_id
          );
        
          blogTableClass::delete($ids, false);
          session::getInstance()->setSuccess("This Blog has been successfully deleted!");
          routing::getInstance()->redirect('cms_blogs', 'index');
        } else {
          session::getInstance()->setError("In order to excecute propertly this module, It's required the Primary key data to delete the record.");
          routing::getInstance()->redirect('cms_blogs', 'index');
        }
      } else {
         session::getInstance()->setError(" This <b>Request Method</b> is not allowed.");
        routing::getInstance()->redirect('cms_blogs', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
