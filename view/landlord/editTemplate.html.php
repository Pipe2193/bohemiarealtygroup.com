<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$landlordID = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
$phone_number = landlordTableClass::PHONE_NUMBER;
$fax_number = landlordTableClass::FAX_NUMBER;
$address = landlordTableClass::ADDRESS;
$city = landlordTableClass::CITY;
$state_id = landlordTableClass::STATE_ID;
$zipcode = landlordTableClass::ZIPCODE;
$email_address = landlordTableClass::EMAIL_ADDRESS;
$private_email_address = landlordTableClass::PRIVATE_EMAIL_ADDRESS;
$listing_manager_id = landlordTableClass::LISTING_MANAGER_ID;
$landlord_hash = landlordTableClass::LANDLORD_HASH;
$status = landlordTableClass::STATUS;
$notes = landlordTableClass::NOTES_LANDLORD;
$pets_policy_id = landlordTableClass::PETS_CASE_ID;
$listing_policy_id = landlordTableClass::LISTING_TYPE_ID;
$email_notification = landlordTableClass::EMAIL_NOTIFICATION_STATUS;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">
                            <div class="hidden-xs x_title">
                                <h2><i class="fa fa-building-o" aria-hidden="true"></i> Edit Landlord (<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>) </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4><i class="fa fa-server" aria-hidden="true"></i> Edit Landlord (<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>) </h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                foreach ($objLandlord as $landlord):
                                  ?>
                                  <form id="editLandlord" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("landlord", "update", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>">

                                      <p><small>Fields marked with (*) are mandatory.</small></p>
                                      <div class="form-group">
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" > Landlord Name </label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>" <?php echo (!empty($landlord->$landlord_name)) ? 'value="' . strtoupper($landlord->$landlord_name) . '"' : ''; ?> placeholder="Enter landlord name" >
                                              <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" > Address </label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>" <?php echo (!empty($landlord->$address)) ? 'value="' . $landlord->$address . '"' : ''; ?> placeholder="Enter Address (street # or P.O BOX)" >
                                              <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" > City </label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::CITY, true) ?>" <?php echo (!empty($landlord->$city)) ? 'value="' . $landlord->$city . '"' : ''; ?> placeholder="Enter City" >
                                              <span class=" form-control-feedback left" aria-hidden="true"></span>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>"> State</label>
                                              <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::STATE_ID, true) ?>" class="form-control" required>
                                                  <option value="">Select State</option>  
                                                  <?php foreach ($objStates as $state): ?>
                                                    <?php if ($landlord->$state_id === $state->state_id) { ?>
                                                      <option value="<?php echo $landlord->$state_id ?>" selected><?php echo $state->accron . ' - ' . $state->state_name; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $state->state_id ?>"><?php echo $state->accron . ' - ' . $state->state_name; ?></option>
                                                    <?php } ?>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" > Zip Code </label>
                                              <input type="text" maxlength="5" class="zipcode form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ZIPCODE, true) ?>" <?php echo (!empty($landlord->$zipcode)) ? 'value="' . $landlord->$zipcode . '"' : ''; ?> placeholder="Enter zip code" >
                                              <span class="form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" > Email Address </label>
                                              <input type="email" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true) ?>" <?php echo (!empty($landlord->$email_address)) ? 'value="' . $landlord->$email_address . '"' : ''; ?> placeholder="Enter email address (open to the team)" >
                                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" > Private Email Address (add emails separate by (,)) </label>
                                              <input type="text" class="form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PRIVATE_EMAIL_ADDRESS, true) ?>" <?php echo (!empty($landlord->$private_email_address)) ? 'value="' . $landlord->$private_email_address . '"' : ''; ?> placeholder="Enter (private) email address">
                                              <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" > Phone Number </label>
                                              <input type="text" class="phone form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>" <?php echo (!empty($landlord->$phone_number)) ? 'value="' . $landlord->$phone_number . '"' : ''; ?> placeholder="Enter phone number" >
                                              <span class="fa fa-phone-square form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" > Fax Number (if applicable)</label>
                                              <input type="text" class="phone form-control has-feedback-left" id="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::FAX_NUMBER, true) ?>" <?php echo (!empty($landlord->$fax_number)) ? 'value="' . $landlord->$fax_number . '"' : ''; ?> placeholder="Enter fax number (if applicable)">
                                              <span class="fa fa-fax form-control-feedback left" aria-hidden="true"></span>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" >Listing Manager</label>

                                              <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>" class="form-control" required>
                                                  <option value="">Select Manager </option>  
                                                  <?php
                                                  $manager_id = listingManagerTableClass::getListingManagerUserId($landlord->$listing_manager_id);
                                                  foreach ($objProfiles as $profiles):
                                                    ?>
                                                    <?php if ($manager_id === $profiles->usuario_id) { ?>
                                                      <option value="<?php echo $manager_id; ?>" selected><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                                    <?php } else { ?>
                                                      <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                                    <?php } ?>

                                                  <?php endforeach; ?>
                                              </select>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" >Co-listing Manager</label>
                                              <div  class="selectContainer">
                                                  <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>_co" class="form-control">
                                                      <option value="">Select Co-Manager</option>
                                                      <option value="0">No Co-Manager</option>  
                                                      <?php
                                                      $co_listing_manager_id = listingManagerTableClass::getCoListingManagerUserId($landlord->$listing_manager_id);
                                                      foreach ($objProfiles as $profiles):
                                                        ?>
                                                        <?php if ($co_listing_manager_id === $profiles->usuario_id) { ?>
                                                          <option value="<?php echo $co_listing_manager_id; ?>" selected><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                                        <?php } else { ?>
                                                          <option value="<?php echo $profiles->usuario_id ?>"><?php echo $profiles->first_name . ' ' . $profiles->last_name; ?></option>
                                                        <?php } ?>
                                                      <?php endforeach; ?>
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>"> Status</label>

                                              <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>" class="form-control" >
                                                  <option value="">Select Option</option>
                                                  <option value="1" <?php echo ($landlord->$status === 1) ? 'selected' : ''; ?>>Active</option>
                                                  <option value="0" <?php echo ($landlord->$status === 0) ? 'selected' : ''; ?>>Inactive</option>  
                                              </select>

                                          </div>

                                      </div>

                                      <div class="panel panel-bohemia">
                                          <div class="panel-heading">
                                              <h3 class="panel-title">Landlord Policy</h3>
                                          </div>
                                          <div class="panel-body">

                                              <div class="form-group">
                                                  <p><small>Fields marked with (*) are mandatory.</small></p>
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>"> Pets Policy</label>

                                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>" class="form-control" required>
                                                          <option value="">Select Option</option>  
                                                          <?php
                                                          foreach ($objPetsPolicy as $petspolicy):
                                                            ?>
                                                            <?php if ($landlord->$pets_policy_id === $petspolicy->id_pets_case) { ?>
                                                              <option value="<?php echo $landlord->$pets_policy_id; ?>" selected><?php echo $petspolicy->description_pets_case; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $petspolicy->id_pets_case ?>"><?php echo $petspolicy->description_pets_case; ?></option>
                                                            <?php } ?>

                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>

                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>"> Listing Policy</label>

                                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" class="form-control" required>
                                                          <option value="">Select Option</option>  
                                                          <?php foreach ($objListingType as $listingType): ?>
                                                            <?php if ($landlord->$listing_policy_id === $listingType->id_listing_type) { ?>
                                                              <option value="<?php echo $landlord->$listing_policy_id; ?>" selected><?php echo $listingType->description_listing_type; ?></option>
                                                            <?php } else { ?>
                                                              <option value="<?php echo $listingType->id_listing_type ?>"><?php echo $listingType->description_listing_type; ?></option>
                                                            <?php } ?>
                                                          <?php endforeach; ?>
                                                      </select>

                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                      <p><small>Fields marked with (*) are mandatory.</small></p>
                                      <div class="form-group">

                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>"> Email Notification</label>

                                              <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true); ?>" class="form-control" >
                                                  <option value="">Select Option</option>
                                                  <option value="1" <?php echo ($landlord->$email_notification === 1) ? 'selected' : ''; ?>>Allow</option>
                                                  <option value="0" <?php echo ($landlord->$email_notification === 0) ? 'selected' : ''; ?>>Disallow</option>  
                                              </select>

                                          </div>

                                          <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                              <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>">Notes</label>
                                              <textarea class="form-control" id="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::NOTES_LANDLORD, true) ?>" rows="5" placeholder="Take a note ..." ><?php echo (!empty($landlord->$notes)) ? $landlord->$notes : ''; ?></textarea>

                                          </div>
                                      </div>

                                      <div class="ln_solid"></div>
                                      <div class="form-group">
                                          <div class="text-center">
                                              <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnClose_addlandlord"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Landlord</button>
                                          </div>
                                      </div>
                                  </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {
                              $('#editLandlord').formValidation({
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
<?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD, true) ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The landlord name  is required'
//                                              },
                                              stringLength: {
                                                  max: <?php echo landlordBaseTableClass::DESCRIPTION_LANDLORD_LENTH ?>,
                                                  message: 'The landlord name must be less than <?php echo landlordTableClass::getNameField(landlordTableClass::DESCRIPTION_LANDLORD_LENTH, true) ?> characters long'
                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS, true) ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The address is required'
//                                              },
                                              stringLength: {
                                                  max: <?php echo landlordBaseTableClass::ADDRESS_LENTH ?>,
                                                  message: 'The  name must be less than <?php echo landlordTableClass::getNameField(landlordTableClass::ADDRESS_LENTH, true) ?> characters long'
                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_ADDRESS, true); ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The email address is required'
//                                              },
                                              emailAddress: {
                                                  message: 'The value is not a valid email address'
                                              },
                                              regexp: {
                                                  regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                                  message: 'The value is not a valid email address'
                                              },
                                              stringLength: {
                                                  max: <?php echo landlordTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                                  message: 'The email address must be less than <?php echo landlordTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                              }
                                          }
                                      },

<?php echo landlordTableClass::getNameField(landlordTableClass::PETS_CASE_ID, true); ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'The option is required'
                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'The option is required'
                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) ?>: {
                                          validators: {
                                              notEmpty: {
                                                  message: 'The option is required'
                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The option is required'
//                                              }
                                          }
                                      },
<?php echo landlordTableClass::getNameField(landlordTableClass::PHONE_NUMBER, true) ?>: {
                                          validators: {
//                                              notEmpty: {
//                                                  message: 'The phone number is required'
//                                              }
                                          }
                                      }
                                  }
                              }).find('.phone').mask('(999)-999-9999').find('.zipcode').mask('99999');

                          });
                        </script>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
<?php echo view::includePartial("partials/footer") ?>

</div>
</div>