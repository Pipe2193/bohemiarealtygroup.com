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
        $landlord_name = strtoupper(request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true)));
        $address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::ADDRESS, true));
        $city_landlord = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::CITY, true));
        $state_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::STATE_ID, true));
        $zipcode_landlord = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true));
        $email_address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true));
        $private_email_address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true));
        $phone_number = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true));
        $fax_number = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true));
        $listing_manager_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true));
        $listing_manager_id_co = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID . '_co', true));
        $pets_policy_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true));
        $listing_type_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true));
        $notes = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true));
        $email_notification_status = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true));
        $status = 1;
        $landlord_hash = md5(md5(date('U')));

        if (landlordTableClass::getVerifyExistingLandlord($landlord_name) == false) {
          $data_listing_manager = array(
              listingManagerTableClass::ID => null,
              listingManagerTableClass::TYPE_LISTING_MANAGER => 1,
              listingManagerTableClass::USUARIO_ID => $listing_manager_id,
              listingManagerTableClass::USUARIO_ID_CO => $listing_manager_id_co,
              listingManagerTableClass::LISTING_MANAGER_HASH => $landlord_hash
          );

          listingManagerTableClass::insert($data_listing_manager);
          $listing_manager_id_manager = listingManagerTableClass::getIdNewListingManager($landlord_hash);

          //source 1 = local
          // feed 2 = bohemia
          $data_sync = array(
              syncTableClass::ID => null,
              syncTableClass::SYNC_ID_KEY => null,
              syncTableClass::SYNC_HASH => $landlord_hash,
              syncTableClass::SOURCE_ID_SOURCE => 1,
              syncTableClass::FEED_ID_FEED => 2,
          );

          syncTableClass::insert($data_sync);
          $sync_id = syncTableClass::getIdNewSync($landlord_hash);

          $data = array(
              landlordTableClass::ID => null,
              landlordTableClass::DESCRIPTION_LANDLORD => $landlord_name,
              landlordTableClass::ADDRESS => $address,
              landlordTableClass::CITY => $city_landlord,
              landlordTableClass::STATE_ID => $state_id,
              landlordTableClass::ZIPCODE => $zipcode_landlord,
              landlordTableClass::EMAIL_ADDRESS => $email_address,
              landlordTableClass::PRIVATE_EMAIL_ADDRESS => $private_email_address,
              landlordTableClass::PHONE_NUMBER => $phone_number,
              landlordTableClass::FAX_NUMBER => $fax_number,
              landlordTableClass::EMAIL_NOTIFICATION_STATUS => $email_notification_status,
              landlordTableClass::LANDLORD_HASH => $landlord_hash,
              landlordTableClass::LISTING_MANAGER_ID => $listing_manager_id_manager,
              landlordTableClass::LISTING_TYPE_ID => $listing_type_id,
              landlordTableClass::NOTES_LANDLORD => $notes,
              landlordTableClass::PETS_CASE_ID => $pets_policy_id,
              landlordTableClass::STATUS => $status,
              landlordTableClass::SYNC_ID_SYNC => $sync_id
          );

          landlordTableClass::insert($data);
          session::getInstance()->setSuccess("The Landlord <b>" . $landlord_name . "</b> has been Successfully Registered.");
          routing::getInstance()->redirect('landlord', 'index');
        } else {
          session::getInstance()->setError("The Landlord name <b>" . $landlord_name . " is already registered.");
          routing::getInstance()->redirect('landlord', 'index');
        }
      } else {
        routing::getInstance()->redirect('landlord', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
