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
       * Add Neighborhood parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["addNeighborhood"])) {
          $addNeighborhood = request::getInstance()->getPost("addNeighborhood");
          ?>
          <div class="panel panel-bohemia">
              <div class="panel-heading">
                  <h3 class="panel-title"> Add Neighborhood</h3>
              </div>
              <div class="panel-body">

                  <form id="addNeighborhood" class="form-horizontal form-label-left input_mask" role="form" method="POST"  action="<?php echo routing::getInstance()->getUrlWeb("neighborhood", "create"); ?>">
                      <p><small>Fields marked with (*) are mandatory.</small></p>
                      <div class="form-group">

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD, true) ?>"> Neighborhood Name</label>
                              <input type="text" class="form-control has-feedback-left" id="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD, true) ?>" name="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD, true) ?>"  placeholder="Enter Neighborhood Name" required>
                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <label for="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::BOROUGH_ID_BOROUGH, true) ?>"> Borough</label>

                              <select id="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::BOROUGH_ID_BOROUGH, true); ?>" name="<?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::BOROUGH_ID_BOROUGH, true); ?>" class="form-control" required>
                                  <option value="">Select Borough</option>  
                                  <?php
                                  foreach ($this->getBorough() as $borough):
                                    $borough_id = boroughTableClass::ID;
                                    $borough_description = boroughTableClass::DESCRIPTION_BOROUGH;
                                    ?>
                                    <option value="<?php echo $borough->$borough_id; ?>"><?php echo $borough->$borough_description; ?></option>
                                  <?php endforeach; ?>
                              </select>

                          </div>
                      </div>

                      <div class="ln_solid"></div>

                      <div class="form-group">
                          <div class="text-center">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addNeighborhood"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Neighborhood</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addNeighborhood').formValidation({
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
          <?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The neighborhood name is required'
                                },
                                stringLength: {
                                    max: <?php echo neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD_LENTH ?>,
                                    message: 'The neighborhood name must be less than <?php echo neighborhoodTableClass::DESCRIPTION_NEIGHBORHOOD; ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The neighborhood name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo neighborhoodTableClass::getNameField(neighborhoodTableClass::BOROUGH_ID_BOROUGH, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The borough is required'
                                },
                            }
                        }
                    }
                });

                //button close add Neighborhood user function
                var btnClose_addNeighborhood = $(".btnClose_addNeighborhood");
                $(btnClose_addNeighborhood).on('click', function () {
                    $("#addNeighborhood_panel").hide(300);
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

  public function getBorough() {
    $fields_borough = array(
        boroughTableClass::ID,
        boroughTableClass::DESCRIPTION_BOROUGH,
    );
    $OrderBy_borough = array(
        boroughTableClass::ID
    );
    $objBoroughs = boroughTableClass::getAll($fields_borough, true, $OrderBy_borough, 'ASC');
    return $objBoroughs;
  }

}
