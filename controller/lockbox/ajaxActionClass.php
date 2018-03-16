<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['lockbox'])) {

          /**
           * lockbox Building info
           */
          $fields_building = array(
              buildingTableClass::ID,
              buildingTableClass::ADDRESS,
              buildingTableClass::LOCKBOX_BUILDING,
              buildingTableClass::ID_ACCESS,
              buildingTableClass::STATUS,
              buildingTableClass::ID_LANDLORD,
              buildingTableClass::BUILDING_HASH,
              buildingTableClass::NOTES_BUILDING,
              buildingTableClass::CREATED_AT,
              buildingTableClass::UPDATED_AT
          );
          $OrderBy_lockbox = array(
              buildingTableClass::ID
          );
          $where_lockbox = array(
              buildingTableClass::ID_ACCESS => 1
          );

          $objLockboxBuildings = buildingTableClass::getAll($fields_building, true, $OrderBy_lockbox, 'ASC', null, null, $where_lockbox);

          /** LOCKBOX BUILDING INSTANCES* */
          $building_address = buildingTableClass::ADDRESS;
          $building_lockbox_code = buildingTableClass::LOCKBOX_BUILDING;
          $building_id_landlord = buildingTableClass::ID_LANDLORD;
          $building_updated_at = buildingTableClass::UPDATED_AT;
          $notes_building = buildingTableClass::NOTES_BUILDING;
          $building_hash = buildingTableClass::BUILDING_HASH;
          $sync_id_sync = buildingTableClass::SYNC_ID_SYNC;

          $lockbox_id = lockboxTableClass::ID;
          $lockbox_building_id_building = lockboxTableClass::BUILDING_ID_BUILDING;
          $lockbox_status = lockboxTableClass::LOCKBOX_STATUS;
          $lockbox_hash = lockboxTableClass::LOCKBOX_HASH;
          $lockbox_created_at = lockboxTableClass::CREATED_AT;
          $lockbox_updated_at = lockboxTableClass::UPDATED_AT;




          foreach ($objLockboxBuildings as $lockbox) {
            $sync_id_source = syncTableClass::getSyncSource($lockbox->$sync_id_sync);

            if ($sync_id_source != 2) {
              if ($lockbox->$building_lockbox_code != null) {

                $building_id = buildingTableClass::getIdNewBuilding($lockbox->$building_hash);

                $lockbox_fields = array(
                    lockboxTableClass::ID,
                    lockboxTableClass::BUILDING_ID_BUILDING,
                    lockboxTableClass::LOCKBOX_STATUS,
                    lockboxTableClass::LOCKBOX_HASH,
                    lockboxTableClass::CREATED_AT,
                    lockboxTableClass::UPDATED_AT
                );

                $where_lockbox_fields = array(
                    lockboxTableClass::BUILDING_ID_BUILDING => $building_id
                );

                $objLockbox = lockboxTableClass::getAll($lockbox_fields, true, null, 'ASC', null, null, $where_lockbox_fields);

                $building_landlord_field = '<a  href="' . routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($lockbox->$building_id_landlord))) . '" class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . landlordTableClass::getLandlordNameById($lockbox->$building_id_landlord) . ' </a>';
                $building_address_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . buildingTableClass::getBuildingAddress($lockbox->$building_hash) . ' </button>';
                $building_lockbox_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $lockbox->$building_lockbox_code . ' </button>';

                if (empty($objLockbox[0]->$lockbox_updated_at)) {
                  $building_lockbox_updated_at_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $objLockbox[0]->$lockbox_created_at . ' </button>';
                } else {
                  $building_lockbox_updated_at_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $objLockbox[0]->$lockbox_updated_at . ' </button>';
                }

                if (empty($lockbox->$notes_building)) {
                  $building_notes_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> NO NOTES </button>';
                } else {
                  $building_notes_field = htmlentities($lockbox->$notes_building, ENT_QUOTES);
                }

                if ($objLockbox[0]->$lockbox_status == 1) {
                  $lockbox_status_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ACTIVE </button>';
                } elseif ($objLockbox[0]->$lockbox_status == 2) {
                  $lockbox_status_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> MAINTENANCE </button>';
                } elseif ($objLockbox[0]->$lockbox_status == 3) {
                  $lockbox_status_field = '<button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> REMOVED </button>';
                }


                $actions = '';
                $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_edit" type="button" data-placement="top" title="Edit"> E </button>';
                if ($objLockbox[0]->$lockbox_status == 1) {
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_maintenance" type="button" data-toggle="tooltip" data-placement="top" title="Maintenance"> M </button>';
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_remove" type="button" data-placement="top" title="Remove"> R </button>';
                } elseif ($objLockbox[0]->$lockbox_status == 2) {
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_activate" type="button"> Activate </button>';
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_remove" type="button" data-placement="top" title="Remove"> R </button>';
                } elseif ($objLockbox[0]->$lockbox_status == 3) {
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_activate" type="button"> Activate </button>';
                  $actions .= '<button data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn_maintenance" type="button" data-placement="top" title="Maintenance"> M </button>';
                }
                $actions .= '<button disabled data-id="' . $objLockbox[0]->$lockbox_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button" data-toggle="tooltip" data-placement="top" title="Delete Lockbox From ' . $lockbox->$building_address . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

                $subdata = array();
                $subdata[] = $building_landlord_field;
                $subdata[] = $building_address_field;
                $subdata[] = $building_lockbox_field;
                $subdata[] = $building_lockbox_updated_at_field;
                $subdata[] = $building_notes_field;
                $subdata[] = $lockbox_status_field;
                $subdata[] = $actions;
                $data[] = $subdata;
              }
            }
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          $json_data = array(
              "draw" => intval(request::getInstance()->getGet('draw')),
              "recordsTotal" => intval(count($data)),
              "recordsFiltered" => intval(count($data)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["maintenance_lockbox"])) {
          $lockbox_hash = request::getInstance()->getPost("maintenance_lockbox");


          $building_address = buildingTableClass::getBuildingAddress($lockbox_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#maintenance_alert').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="maintenance_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Update Lockbox Maintenance  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Building: <?php echo $building_address; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to update lockbox maintenance to  </br> <h3><b><?php echo $building_address; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('lockbox', 'maintenance', array(lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH, true) => $lockbox_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Update </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }


      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["remove_lockbox"])) {
          $lockbox_hash = request::getInstance()->getPost("remove_lockbox");
          $building_address = buildingTableClass::getBuildingAddress($lockbox_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#remove_alert').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="remove_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Remove Lockbox  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Building: <?php echo $building_address; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Remove the Lockbox  from  </br> <h3><b><?php echo $building_address; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('lockbox', 'remove', array(lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH, true) => $lockbox_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Remove </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["activate_lockbox"])) {
          $lockbox_hash = request::getInstance()->getPost("activate_lockbox");
          $building_address = buildingTableClass::getBuildingAddress($lockbox_hash);
          ?>
          <script>
            $(document).ready(function () {
                $('#activate_alert').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="activate_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Activate Lockbox  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Building: <?php echo $building_address; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="row text-center" style="color: #cc0000"><i class="fa fa-exclamation-circle fa-4x" aria-hidden="true"></i></div>
                          <div class="text-center" > Do you want to Activate the Lockbox from </br> <h3><b><?php echo $building_address; ?></b> ?</h3></br>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <a href="<?php echo routing::getInstance()->getUrlWeb('lockbox', 'activate', array(lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH, true) => $lockbox_hash)) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Activate </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["edit_lockbox"])) {
          $lockbox_hash = request::getInstance()->getPost("edit_lockbox");
          $building_address = buildingTableClass::getBuildingAddress($lockbox_hash);
          $building_id = buildingTableClass::getIdNewBuilding($lockbox_hash);

          /**
           * lockbox Building info
           */
          $fields_building = array(
              buildingTableClass::ID,
              buildingTableClass::LOCKBOX_BUILDING,
              buildingTableClass::BUILDING_HASH,
              buildingTableClass::NOTES_BUILDING,
          );

          $where_lockbox = array(
              buildingTableClass::ID => $building_id
          );

          $objBuilding = buildingTableClass::getAll($fields_building, true, null, 'ASC', null, null, $where_lockbox);

          $building_lockbox_code = buildingTableClass::LOCKBOX_BUILDING;
          $notes_building = buildingTableClass::NOTES_BUILDING;

          $lockbox_fields = array(
              lockboxTableClass::ID,
              lockboxTableClass::BUILDING_ID_BUILDING,
              lockboxTableClass::LOCKBOX_STATUS,
              lockboxTableClass::LOCKBOX_HASH,
              lockboxTableClass::UPDATED_AT
          );

          $where_lockbox_fields = array(
              lockboxTableClass::BUILDING_ID_BUILDING => $building_id
          );

          $objLockbox = lockboxTableClass::getAll($lockbox_fields, true, null, 'ASC', null, null, $where_lockbox_fields);
          $lockbox_updated_at = lockboxTableClass::UPDATED_AT;
          ?>
          <script>
            $(document).ready(function () {
                $('#edit_lockbox').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="edit_lockbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <form id="editLockbox" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("lockbox", "update", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => $lockbox_hash)); ?>">
                                   
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"> Edit Lockbox  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Building: <?php echo $building_address; ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <div class="panel panel-bohemia">
                              <div class="panel-heading">
                                  <h3 class="panel-title"> Lockbox Information</h3>
                              </div>
                              <div class="panel-body">
                                     <p><small>Fields marked with (*) are mandatory.</small></p>
                                      <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true); ?>"> Lockbox Code</label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::LOCKBOX_BUILDING, true) ?>" <?php echo (!empty($objBuilding[0]->$building_lockbox_code)) ? 'value="' . $objBuilding[0]->$building_lockbox_code . '"' : ''; ?> placeholder="Enter lockbox code" required>
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class=" col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo lockboxTableClass::getNameField(lockboxTableClass::UPDATED_AT, true); ?>"> Date Checked</label>
                                              <input type="date" class=" form-control has-feedback-left" id="<?php echo lockboxTableClass::getNameField(lockboxTableClass::UPDATED_AT, true) ?>" name="<?php echo lockboxTableClass::getNameField(lockboxTableClass::UPDATED_AT, true) ?>" <?php echo (!empty($objLockbox[0]->$lockbox_updated_at)) ? 'value="' . $objLockbox[0]->$lockbox_updated_at . '"' : ''; ?> required>
                                              <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true); ?>"> Notes</label>
                                              <textarea class="form-control has-feedback-left" id="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>" name="<?php echo buildingTableClass::getNameField(buildingTableClass::NOTES_BUILDING, true) ?>" rows="5" placeholder="Take a note ..." ><?php echo (!empty($objBuilding[0]->$notes_building)) ? $objBuilding[0]->$notes_building : ''; ?></textarea>
                                              <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                      </div>
                                  
                              </div>
                          </div>
                      </div>
                      <div class=" modal-footer">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Update Lockbox </button>
                          </div>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
