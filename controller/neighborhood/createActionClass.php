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

        $neighborhood_name = request::getInstance()->getPost(neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD, true));
        $borough_id = request::getInstance()->getPost(neighborhoodTableClass::getNameField(neighborhoodTableClass::BOROUGH_ID_BOROUGH, true));

        if (neighborhoodTableClass::getVerifyExistingNeighborhood($neighborhood_name) == false) {
          $data = array(
              neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD => $neighborhood_name,
              neighborhoodTableClass::BOROUGH_ID_BOROUGH => $borough_id
          );

          neighborhoodTableClass::insert($data);
          session::getInstance()->setSuccess("The Neighborhood <b>" . $neighborhood_name . "</b> has been Successfully Registered.");
          routing::getInstance()->redirect('neighborhood', 'index');
        } else {
          session::getInstance()->setError("The Neighborhood <b>" . $neighborhood_name . " is already registered.");
          routing::getInstance()->redirect('neighborhood', 'index');
        }
      } else {
        session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.This type of request is not allowed.");
        routing::getInstance()->redirect('neighborhood', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
