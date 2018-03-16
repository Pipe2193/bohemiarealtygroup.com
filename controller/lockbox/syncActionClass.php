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

      $data_buildings = array(
          buildingsTableClass::ID,
          buildingsTableClass::MAINTENANCE,
          buildingsTableClass::REMOVE,
          buildingsTableClass::UPDATED_AT,
          buildingsTableClass::ID_LANDLORD
      );

      $order_by_bs = array(
          buildingsTableClass::ID
      );
      $ll_buildings = buildingsTableClass::getAll($data_buildings, false, $order_by_bs, 'ASC', null, null, null, true);


      $_id = buildingsTableClass::ID;
      $_maintenance = buildingsTableClass::MAINTENANCE;
      $_remove = buildingsTableClass::REMOVE;
      $_updated = buildingsTableClass::UPDATED_AT;
      $_id_landlord = buildingsTableClass::ID_LANDLORD;



      foreach ($ll_buildings as $ll_b):


        $verify_ll = landlordTableClass::getLandlordHash($ll_b->$_id_landlord);
        if ($verify_ll != false) {

          $verify_bld = buildingTableClass::getBuildingHash($ll_b->$_id);
          if ($verify_bld != false) {

            $verify_lb = lockboxTableClass::getLockboxIdByHash($verify_bld);
            if ($verify_lb == false) {

              $building_id = $ll_b->$_id;
              $landlord_id = $ll_b->$_id_landlord;
              $building_maintenance = $ll_b->$_maintenance;
              $building_remove = $ll_b->$_remove;
              $updated_at = $ll_b->$_updated;
              if ($building_maintenance == 1) {
                $status = 2;
              } elseif ($building_remove == 1) {
                $status = 3;
              } else {
                $status = 1;
              }


              $building_hash = buildingTableClass::getBuildingHash($building_id);
              $sync_id = syncTableClass::getIdNewSync($building_hash);

              $sync_id_source = syncTableClass::getSyncSource($sync_id);

              if ($sync_id_source != 2) {

                $data_building = array(
                    buildingTableClass::LOCKBOX_BUILDING,
                    buildingTableClass::ID
                );

                $order_by_building = array(
                    buildingTableClass::ID
                );
                $where_building = array(
                    buildingTableClass::ID => $building_id,
                    buildingTableClass::ID_ACCESS => 1    
                );

                $building = buildingTableClass::getAll($data_building, true, $order_by_building, 'ASC', null, null, $where_building);
                $LOCKBOX_BUILDING = buildingTableClass::LOCKBOX_BUILDING;

                if (!empty($building[0]->$LOCKBOX_BUILDING)) {

                  /** INSERT LOCKBOX INFORMATION* */
                  $data_lockbox = array(
                      lockboxTableClass::ID => null,
                      lockboxTableClass::BUILDING_ID_BUILDING => $building_id,
                      lockboxTableClass::LOCKBOX_STATUS => $status,
                      lockboxTableClass::LOCKBOX_HASH => $building_hash,
                      
                  );

                  lockboxTableClass::insert($data_lockbox);
                }
              }
            }
          }
        }
      endforeach;
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
