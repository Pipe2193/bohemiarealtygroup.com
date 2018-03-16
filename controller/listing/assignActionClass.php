<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of assignActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class assignActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true))) {

          $listing_Hash = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true));
          $listing_id = listingTableClass::VerifyListingHash($listing_Hash);
          $usuario_id = session::getInstance()->getUserId();
          $listing_assignment_hash = md5(md5(date('U')));
          $assigned_status = 1;

          if ($listing_id != false) {

            if (listingAssignmentTableClass::isListingAssigned($listing_id, $usuario_id) == false) {

              $data = array(
                  listingAssignmentTableClass::ID => null,
                  listingAssignmentTableClass::LISTING_ID_LISTING => $listing_id,
                  listingAssignmentTableClass::USUARIO_ID => $usuario_id,
                  listingAssignmentTableClass::STATUS => $assigned_status,
                  listingAssignmentTableClass::LISTING_ASSIGNMENT_HASH => $listing_assignment_hash
              );
              listingAssignmentTableClass::insert($data);
              session::getInstance()->setSuccess("The Listing ID <b>#$listing_id</b> has been successfully assigned to your Account!.");
              routing::getInstance()->redirect("listing", "account");
            } else {
              session::getInstance()->setInformation("The Listing ID <b>#$listing_id</b>  has been already assigned to your Account!.");
              routing::getInstance()->redirect('listing', 'search');
            }
          } else {
            session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.<br> Your <b>Listing Hash ($listing_Hash)</b> is not valid. ");
            routing::getInstance()->redirect('listing', 'search');
          }
        } else {
          session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.<br> Your <b>Listing (hash)</b> is missing, please try again!. ");
          routing::getInstance()->redirect("listing", "search");
        }
      } else {
        session::getInstance()->setError(" The Application encountered an error and it couldn't complete your request.This type of request is not allowed. ");
        routing::getInstance()->redirect("shfSecurity", "noPermission");
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
