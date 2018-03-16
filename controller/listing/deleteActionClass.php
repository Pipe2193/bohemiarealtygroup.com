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
        $id = request::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
        $ids = array(
            usuarioTableClass::ID => $id
        );
        $deleteUser = usuarioTableClass::getUserName($id);
         usuarioTableClass::delete($ids, true);
          session::getInstance()->setSuccess("The Username <b>" . $deleteUser . "</b> has been successfully deleted!");
          routing::getInstance()->redirect('usuario', 'index');
      } else {
        routing::getInstance()->redirect('default', 'init');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
