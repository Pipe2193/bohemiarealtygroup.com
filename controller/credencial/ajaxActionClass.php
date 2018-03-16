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

      /**
       * Add Role parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["addRole"])) {
          $addRole = request::getInstance()->getPost("addRole");

          /** PERMISSIONS INSTANCES * */
          $permissions_id = permissionsTableClass::ID;
          $permissions_name = permissionsTableClass::NAME_PERMISSIONS;
          $permissions_module = permissionsTableClass::MODULE;
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title"><small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addRole" class="form-horizontal form-label-left input_mask" role="form" method="POST"  action="<?php echo routing::getInstance()->getUrlWeb("credencial", "create"); ?>">
                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"  placeholder="Enter Role Name" required>
                              <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION, true) ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION, true) ?>" placeholder="Enter Role Description" required>
                              <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                      <div class="panel panel-bohemia">
                          <div class="panel-heading">
                              <h3 class="panel-title"> Role Permissions</h3>
                          </div>
                          <div class="panel-body">

                              <div class=" row form-group">
                                  <?php
                                  $i = 1;

                                  foreach ($this->getPermissions() as $permissions):
                                    ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                        <div class="switch-guest-item">
                                            <label><?php echo $permissions->$permissions_module ?> Module</label>
                                            <div class="material-switch">
                                                <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" type="checkbox"/>
                                                <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                  endforeach;
                                  ?>
                              </div>
                          </div>
                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addRole"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Role</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addRole').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {
          <?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The role name is required'
                                },
                                stringLength: {
                                    max: <?php echo credencialTableClass::NOMBRE_LENGTH ?>,
                                    message: 'The role name must be less than <?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The role name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo credencialBaseTableClass::getNameField(credencialTableClass::DESCRIPTION, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                },
                                stringLength: {
                                    max: <?php echo credencialTableClass::DESCRIPTION_LENGTH ?>,
                                    message: 'The description be less than <?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The description can only consist of alphabetical, and spaces.'
                                }
                            }
                        }
                    }
                });

                //button close add role user function
                var btnClose_addRole = $(".btnClose_addRole");
                $(btnClose_addRole).on('click', function () {
                    $("#addRole_panel").hide(300);
                    $("#addRole_panel_manage").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });
            });
          </script>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public static function getPermissions() {

    /** PERMISSIONS INFO* */
    $permissions_fields = array(
        permissionsTableClass::ID,
        permissionsTableClass::NAME_PERMISSIONS,
        permissionsTableClass::MODULE,
        permissionsTableClass::ORDER_PERMISSIONS
    );
    $OrderBy_permissions = array(
        permissionsTableClass::ORDER_PERMISSIONS
    );
    $objPermissions = permissionsTableClass::getAll($permissions_fields, true, $OrderBy_permissions, 'ASC');
    return $objPermissions;
  }

}
