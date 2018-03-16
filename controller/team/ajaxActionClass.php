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
       * add Landlord parcial
       */
      if (request::getInstance()->isMethod('POST')) {
        if (request::getInstance()->hasPost("add_team")) {
          $addTeam = request::getInstance()->getPost("add_team");
          ?>

          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title">Add Team<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addTeam" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("team", "create"); ?>">

                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_NAME, true) ?>" name="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_NAME, true) ?>" placeholder="Enter team name" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_DESCRIPTION, true) ?>" name="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_DESCRIPTION, true) ?>" placeholder="Enter team description" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12"> Team Type</label>
                              <div class="col-md-8 col-sm-8 col-xs-12 selectContainer">
                                  <select id="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_TYPE_ID_TEAM_TYPE, true) ?>" name="<?php echo teamTableClass::getNameField(teamTableClass::TEAM_TYPE_ID_TEAM_TYPE, true) ?>" class="form-control" required>
                                      <option value="">Select Team Type</option>  
                                      <?php foreach ($this->getTeamType() as $team_type): ?>
                                        <option value="<?php echo $team_type->id_team_type ?>"><?php echo $team_type->description_team_type; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12">Team Leader</label>
                              <div class="col-md-8 col-sm-8 col-xs-12 selectContainer">
                                  <select id="<?php echo teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true) ?>" name="<?php echo teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true) ?>" class="form-control" required>
                                      <option value="">Select Leader</option>  
                                      <?php foreach ($this->getUsersProfiles() as $profiles): ?>
                                        <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <div id="managerSelector" class="col-md-8 col-sm-8 col-xs-8 selectContainer">
                                  <select id="<?php echo teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true) ?>_co" name="<?php echo teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true) ?>_co" class="form-control">
                                      <option value="">Select Co-Leader</option>  
                                      <?php foreach ($this->getUsersProfiles() as $profiles): ?>
                                        <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                              <div id="btnremove" class="col-md-4 col-sm-4 col-xs-4 form-group has-feedback">
                                  <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger removelistingManager"><i class="fa fa-minus" aria-hidden="true"></i> Remove</button>
                              </div>
                          </div>

                          <div id="btnadd" class="col-md-6 col-sm-6 col-xs-12 text-center form-group has-feedback">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary addlistingManager"><i class="fa fa-plus" aria-hidden="true"></i> Add Co-Leader</button>
                          </div>

                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_team"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Team</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addTeam').formValidation({
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
          <?php echo teamTableClass::getNameField(teamTableClass::TEAM_NAME, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The team name  is required'
                                },
                                stringLength: {
                                    max: <?php echo teamTableClass::TEAM_NAME_LENGTH ?>,
                                    message: 'The team name must be less than <?php echo teamTableClass::TEAM_NAME_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo teamTableClass::getNameField(teamTableClass::TEAM_DESCRIPTION, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                },
                                stringLength: {
                                    max: <?php echo teamTableClass::TEAM_DESCRIPTION_LENGTH ?>,
                                    message: 'The  description must be less than <?php echo teamTableClass::TEAM_DESCRIPTION_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo teamTableClass::getNameField(teamTableClass::TEAM_TYPE_ID_TEAM_TYPE, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        },
          <?php echo teamLeaderTableClass::getNameField(teamLeaderTableClass::USUARIO_ID, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The option is required'
                                }
                            }
                        }
                    }

                });

                $("#managerSelector").hide();
                $("#btnremove").hide();


                var addlistingManager = $(".addlistingManager");
                $(addlistingManager).on('click', function () {
                    $("#btnadd").hide();
                    $("#managerSelector").show();
                    $("#btnremove").show();
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });



                var removelistingManager = $(".removelistingManager");
                $(removelistingManager).on('click', function () {
                    $("#managerSelector").hide();
                    $("#btnremove").hide();
                    $("#btnadd").show();
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

                //button close adduser user function
                var btnClose_team = $(".btnClose_team");
                $(btnClose_team).on('click', function () {
                    $("#addTeam_panel").hide(300);
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

  public static function getUsersProfiles() {

    $fields_profile = array(
        profileTableClass::FIRST_NAME,
        profileTableClass::MIDDLE_NAME,
        profileTableClass::LAST_NAME,
        profileTableClass::USUARIO_ID
    );
    $OrderBy_profile = array(
        profileTableClass::USUARIO_ID
    );
    $objProfiles = profileTableClass::getAll($fields_profile, true, $OrderBy_profile, 'ASC');


    return $objProfiles;
  }

  public function getTeamType() {

    $fields_team_type = array(
        teamTypeTableClass::ID,
        teamTypeTableClass::DESCRIPTION_TEAM_TYPE
    );

    $OrderBy_team_type = array(
        teamTypeTableClass::ID
    );
    $objTeamType = teamTypeTableClass::getAll($fields_team_type, true, $OrderBy_team_type, 'ASC');
    return $objTeamType;
  }

}
