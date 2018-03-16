<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of updateActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {

        $landlord_name = strtoupper(request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true)));
        $address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::ADDRESS, true));
        $city_landlord = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::CITY, true));
        $state_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::STATE_ID, true));
        $zipcode_landlord = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true));
        $email_address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true));
        $private_email_address = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true));
        $phone_number = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true));
        $fax_number = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true));
        $manager_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true));
        $manager_id_co = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID . '_co', true));
        $pets_policy_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true));
        $listing_type_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true));
        $notes = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true));
        $email_notification_status = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true));
        $status = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::STATUS, true));
        $landlord_hash = request::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));

        if (landlordTableClass::VerifyLandlordHash($landlord_hash) != false) {

          $listing_manager_id = listingManagerTableClass::getIdNewListingManager($landlord_hash);

          $data_listing_manager = array(
              listingManagerTableClass::TYPE_LISTING_MANAGER => 1,
              listingManagerTableClass::USUARIO_ID => $manager_id,
              listingManagerTableClass::USUARIO_ID_CO => $manager_id_co
          );

          $ids_listing_manager = array(
              listingManagerTableClass::ID => $listing_manager_id
          );

          listingManagerTableClass::update($ids_listing_manager, $data_listing_manager);

          $landlord_id = landlordTableClass::getIdNewLandlord($landlord_hash);

          $data_landlord = array(
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
              landlordTableClass::LISTING_MANAGER_ID => $listing_manager_id,
              landlordTableClass::LISTING_TYPE_ID => $listing_type_id,
              landlordTableClass::NOTES_LANDLORD => $notes,
              landlordTableClass::PETS_CASE_ID => $pets_policy_id,
              landlordTableClass::STATUS => $status,
          );

          $ids_landlord = array(
              landlordTableClass::ID => $landlord_id
          );

          landlordTableClass::update($ids_landlord, $data_landlord);

          //usuarioTableClass::emailActivationNotification($userID);
          session::getInstance()->setSuccess("The Landlord <b>" . $landlord_name . "</b> has been Successfully Updated.");
          routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlord_hash));
        } else {
          session::getInstance()->setError("The Application encountered an error and it couldn't complete your request.<br> The <b>Landlord Token ($landlord_hash)</b> is not valid.  ");
          routing::getInstance()->redirect('landlord', 'index');
        }
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Landlord Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('landlord', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
