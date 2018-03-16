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
class syncActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $data_landlords = array(
          landlordsTableClass::ID,
          landlordsTableClass::NAME,
          landlordsTableClass::ADDRESS,
          landlordsTableClass::EMAIL,
          landlordsTableClass::EMAIL1,
          landlordsTableClass::PHONE,
          landlordsTableClass::FAX_NUMBER,
          landlordsTableClass::SEND_EMAIL,
          landlordsTableClass::USER_ID,
          landlordsTableClass::USER_ID1,
          landlordsTableClass::LISTING_TYPE_ID,
          landlordsTableClass::NOTES,
          landlordsTableClass::STATUS,
          landlordsTableClass::NESTIO_ID,
          landlordsTableClass::CREATED_AT,
          landlordsTableClass::UPDATED_AT
      );

      $orderBy_landlord = array(
          landlordsTableClass::ID,
      );

      $objlandlords = landlordsTableClass::getAll($data_landlords, false, $orderBy_landlord, 'ASC', null, null, null, true);


      $ll_id = landlordsTableClass::ID;
      $ll_name = landlordsTableClass::NAME;
      $ll_address = landlordsTableClass::ADDRESS;
      $ll_email = landlordsTableClass::EMAIL;
      $ll_email1 = landlordsTableClass::EMAIL1;
      $ll_phone = landlordsTableClass::PHONE;
      $ll_fax = landlordsTableClass::FAX_NUMBER;
      $ll_send = landlordsTableClass::SEND_EMAIL;
      $ll_user_id = landlordsTableClass::USER_ID;
      $ll_user_id1 = landlordsTableClass::USER_ID1;
      $ll_listing_type_id = landlordsTableClass::LISTING_TYPE_ID;
      $ll_notes = landlordsTableClass::NOTES;
      $ll_status = landlordsTableClass::STATUS;
      $ll_created = landlordsTableClass::CREATED_AT;
      $ll_updated = landlordsTableClass::UPDATED_AT;
      $ll_nestio_id = landlordsTableClass::NESTIO_ID;


      foreach ($objlandlords as $ll):



        $id = $ll->$ll_id;
        $name = $ll->$ll_name;
        $address = $ll->$ll_address;
        $email = $ll->$ll_email;
        $email1 = $ll->$ll_email1;
        $phone = $ll->$ll_phone;
        $fax = $ll->$ll_fax;
        $send = $ll->$ll_send;
        $userid = $ll->$ll_user_id;

        if (empty($ll->$ll_user_id1)) {
          $userid1 = 0;
        } else {
          $userid1 = $ll->$ll_user_id1;
        }


        if ($ll->$ll_listing_type_id === "Exclusive") {
          $type = 1;
        } elseif ($ll->$ll_listing_type_id === "Open") {
          $type = 2;
        } elseif ($ll->$ll_listing_type_id === "Co-exclusive") {
          $type = 3;
        } elseif ($ll->$ll_listing_type_id === "Open with listing agent") {
          $type = 4;
        } else {
          $type = 5;
        }

        $notes = $ll->$ll_notes;

        if ($ll->$ll_status == "Active") {
          $status = 1;
        } elseif ($ll->$ll_status = "Inactive") {
          $status = 0;
        }

        $created = $ll->$ll_created;
        $updated = $ll->$ll_updated;
        $state_id = 33;
        $pets_policy_id = 6;
        $nestio_id = $ll->$ll_nestio_id;

        if ($ll->$ll_nestio_id == 0) {
          $source_id = 1;
          $feed_id = 2;
          $sync_key = null;
        } elseif (empty($ll->$ll_nestio_id)) {
          $source_id = 1;
          $feed_id = 2;
          $sync_key = null;
        } else {
          $source_id = 2;
          $feed_id = 1;
          $sync_key = $ll->$ll_nestio_id;
        }
        $landlord_hash = md5(md5(date('U') . $id));


        $validate = landlordTableClass::getLandlordHash($id);
        if ($validate == false) {


          $data_listing_manager = array(
              listingManagerTableClass::ID => null,
              listingManagerTableClass::TYPE_LISTING_MANAGER => 1,
              listingManagerTableClass::USUARIO_ID => $userid,
              listingManagerTableClass::USUARIO_ID_CO => $userid1,
              listingManagerTableClass::LISTING_MANAGER_HASH => $landlord_hash
          );

          listingManagerTableClass::insert($data_listing_manager);
          $listing_manager_id_manager = listingManagerTableClass::getIdNewListingManager($landlord_hash);
          //source 1 = local
          // feed 2 = bohemia
          $data_sync = array(
              syncTableClass::ID => null,
              syncTableClass::SYNC_ID_KEY => $sync_key,
              syncTableClass::SYNC_HASH => $landlord_hash,
              syncTableClass::SOURCE_ID_SOURCE => $source_id,
              syncTableClass::FEED_ID_FEED => $feed_id,
          );

          syncTableClass::insert($data_sync);
          $sync_id = syncTableClass::getIdNewSync($landlord_hash);

          $data = array(
              landlordTableClass::ID => $id,
              landlordTableClass::DESCRIPTION_LANDLORD => $name,
              landlordTableClass::ADDRESS => $address,
              landlordTableClass::CITY => null,
              landlordTableClass::STATE_ID => $state_id,
              landlordTableClass::ZIPCODE => null,
              landlordTableClass::EMAIL_ADDRESS => $email,
              landlordTableClass::PRIVATE_EMAIL_ADDRESS => $email1,
              landlordTableClass::PHONE_NUMBER => $phone,
              landlordTableClass::FAX_NUMBER => $fax,
              landlordTableClass::EMAIL_NOTIFICATION_STATUS => $send,
              landlordTableClass::LANDLORD_HASH => $landlord_hash,
              landlordTableClass::LISTING_MANAGER_ID => $listing_manager_id_manager,
              landlordTableClass::LISTING_TYPE_ID => $type,
              landlordTableClass::NOTES_LANDLORD => $notes,
              landlordTableClass::PETS_CASE_ID => $pets_policy_id,
              landlordTableClass::STATUS => $status,
//              landlordTableClass::CREATED_AT => $created,
              landlordTableClass::UPDATED_AT => $updated,
              landlordTableClass::LANDLORD_HASH => $landlord_hash,
              landlordTableClass::SYNC_ID_SYNC => $sync_id
          );

          landlordTableClass::insert($data);
        } else {

          $landlord_hash = landlordTableClass::getLandlordHash($id);

          $listing_manager_id_manager = listingManagerTableClass::getIdNewListingManager($landlord_hash);

          $data_listing_manager = array(
              listingManagerTableClass::USUARIO_ID => $userid,
              listingManagerTableClass::USUARIO_ID_CO => $userid1,
          );

          $ids_listing_manager = array(
              listingManagerTableClass::LISTING_MANAGER_HASH => $listing_manager_id_manager
          );

          listingManagerTableClass::update($ids_listing_manager, $data_listing_manager);

          $sync_id = syncTableClass::getIdNewSync($landlord_hash);

          $data_sync = array(
              syncTableClass::SYNC_ID_KEY => $sync_key,
          );

          $ids_sync = array(
              syncTableClass::ID => $sync_id
          );
          syncTableClass::update($ids_sync, $data_sync);


          $data = array(
              landlordTableClass::DESCRIPTION_LANDLORD => $name,
//              landlordTableClass::EMAIL_ADDRESS => $email,
//              landlordTableClass::PRIVATE_EMAIL_ADDRESS => $email1,
//              landlordTableClass::PHONE_NUMBER => $phone,
//              landlordTableClass::FAX_NUMBER => $fax,
              landlordTableClass::EMAIL_NOTIFICATION_STATUS => $send,
              landlordTableClass::LISTING_TYPE_ID => $type,
              landlordTableClass::NOTES_LANDLORD => $notes,
              landlordTableClass::PETS_CASE_ID => $pets_policy_id,
              landlordTableClass::STATUS => $status,
              landlordTableClass::UPDATED_AT => $updated,
              landlordTableClass::SYNC_ID_SYNC => $sync_id
          );

          $ids_landlord = array(
              landlordTableClass::ID => $id
          );

          landlordTableClass::update($ids_landlord, $data);
        }
      endforeach;
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
