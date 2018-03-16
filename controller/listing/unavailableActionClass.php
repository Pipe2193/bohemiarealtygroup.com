<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of unavailableActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class unavailableActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('GET')) {

        if (request::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true))) {

          $listing_hash = request::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true));
          $listing_id = listingTableClass::VerifyListingHash($listing_hash);

          if ($listing_id != false) {

            if (listingTableClass::getListingStatusByHash($listing_hash) == 3) {

              $data = array(
                  listingTableClass::STATUS => 3
              );
              $ids_listing = array(
                  listingTableClass::ID => $listing_id
              );

              listingTableClass::update($ids_listing, $data);
              session::getInstance()->setSuccess("The Listing ID <b>#$listing_id</b> has been successfully Changed as Unavailable!.");
              routing::getInstance()->redirect("listing", "search");
            } else {
              session::getInstance()->setInformation("The Listing ID <b>#$listing_id</b> is Unavailable!.");
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
