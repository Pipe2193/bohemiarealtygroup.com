<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$landlordID = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
$phone_number = landlordTableClass::PHONE_NUMBER;
$address = landlordTableClass::ADDRESS;
$email_address = landlordTableClass::EMAIL_ADDRESS;
$listing_manager_id = landlordTableClass::LISTING_MANAGER_ID;
$landlord_hash = landlordTableClass::LANDLORD_HASH;
$status = landlordTableClass::STATUS;
/* * PROFILE INSTANCES* */
$profile_manager_id = usuarioTableClass::ID;
/* * LISTING TYPE INSTANCES* */
$listing_type_id = listingTypeTableClass::ID;
$listing_type_description = listingTypeTableClass::DESCRIPTION_LISTING_TYPE;
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
                                <h2><i class="fa fa-building-o" aria-hidden="true"></i> App & Info - Landlords </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-building-o" aria-hidden="true"></i> App & Info - Landlords  </h4>
                                </div>

                                <div id="addLandlord_panel"></div>
                                <div id="deleteLandlord_panel"></div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="row ">
                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                    <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>"> Status</label>
                                                    <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::STATUS, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        <option value="">Select Option</option>
                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::STATUS, true) => "Active")); ?>" <?php echo (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Active") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Active") ? 'SELECTED: ' : ''; ?> Active</option>
                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::STATUS, true) => "Inactive")); ?>" <?php echo (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Inactive") ? 'selected' : ''; ?>> <?php echo (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true)) == "Inactive") ? 'SELECTED: ' : ''; ?> Inactive</option>  
                                                    </select>

                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                    <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>"> Landlord</label>
                                                    <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        <option value="">Select Landlord</option>
                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>"> All</option>
                                                        <?php foreach ($objLandlords as $landlords) : ?>
                                                          <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) == $landlords->$landlord_hash) { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>" selected>  SELECTED: <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                          <?php } else { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)); ?>"> <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                          <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                    <label class=""for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true); ?>"> Listing Manager</label>
                                                    <select id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true); ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        <option value="">Select Listing Manager</option>
                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index"); ?>"> All</option>
                                                        <?php foreach ($objUsers as $profile_manager) : ?>
                                                          <?php if ($profile_manager->$profile_manager_id != 1) { ?>
                                                            <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true)) == $profile_manager->$profile_manager_id) {
                                                              ?>
                                                              <option value = "<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true)))); ?>" selected> SELECTED: <?php echo profileTableClass::getProfileByUserId($profile_manager->$profile_manager_id); ?></option>
                                                            <?php } else { ?>
                                                              <option value = "<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) => $profile_manager->$profile_manager_id)); ?>"> <?php echo profileTableClass::getProfileByUserId($profile_manager->$profile_manager_id); ?></option>
                                                            <?php } ?>
                                                          <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                    <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>"> Listing Type</label>
                                                    <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        <option value="">Select Option</option>

                                                        <?php foreach ($objListingType as $listing_type): ?>
                                                          <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true)) == $listing_type->$listing_type_id) { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::ID, true)))); ?>" selected > SELECTED: <?php echo $listing_type->$listing_type_description ?></option> 
                                                          <?php } else { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true) => $listing_type->$listing_type_id)); ?>" > <?php echo $listing_type->$listing_type_description ?></option> 

                                                          <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                                </div>

                                            </div>

                                        </div></br>
                                    </div>
                                </div>
                                <?php if (empty($objLandlords)) { ?>

                                  <div class="alert alert-info alert-dismissible" role="alert">
                                      <p class="text-center">
                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no landlords found. </b> <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark btnAdd_landlord" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Landlord</b></button><br>
                                      </p>
                                  </div>
                                  <?php
                                } else {
                                  ?>
                                  <div class="alert alertbrg alert-dismissible" role="alert">
                                      <p>
                                          <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Landlords with label color <span class="label label-info">N</span>   are syncing from Nestio.<br>
                                      </p>
                                      <p>
                                          <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Landlords with Label color <span class="label" style="background-color: #ffd6d5;"> OLA </span>   are Open with Listing Agent.<br>
                                      </p>
                                  </div></br>
                                <?php } ?>

                                <table id="landlords" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th >Landlord</th>
<!--                                            <th>Phone</th>-->
                                            <th>Address</th>
                                            <th>Email Address</th>
                                            <th>Listing Manager</th>
                                            <th >Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th >Landlord</th>
<!--                                            <th>Phone</th>-->
                                            <th>Address</th>
                                            <th>Email Address</th>
                                            <th>Listing Manager</th>
                                            <th >Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>

                                <div id="deactivateLandlord_panel"></div>
                                <div id="activateLandlord_panel"></div>

                            </div>
                        </div>
                        <script>
                          $(document).ready(function () {

                              $('#landlords').DataTable({
                                  responsive: true,
                                  "order": [1, 'asc'],
                                  "pageLength": 25,
                                  "ajax": {
                                      url: "ajax?landlords<?php
                                if (\mvc\request\requestClass::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true))) {
                                  echo '&' . landlordTableClass::getNameField(landlordTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::STATUS, true));
                                } elseif (\mvc\request\requestClass::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) {
                                  echo '&' . landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true));
                                } elseif (\mvc\request\requestClass::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true))) {
                                  echo '&' . landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true));
                                } elseif (\mvc\request\requestClass::getInstance()->hasGet(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true))) {
                                  echo '&' . landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LISTING_TYPE_ID, true));
                                }
                                ?>",
                                      type: "GET"

                                  },
                                  "deferRender": true,
                                  initComplete: function () {
                                      this.api().columns(".filter").every(function () {
                                          var column = this;
                                          var select = $('<select><option value=""> Filter Option </option></select>')
                                                  .appendTo($(column.header()).empty())
                                                  .on('change', function () {
                                                      var val = $.fn.dataTable.util.escapeRegex(
                                                              $(this).val()
                                                              );

                                                      column
                                                              .search(val ? '^' + val + '$' : '', true, false)
                                                              .draw();
                                                  });

                                          column.data().unique().sort().each(function (d, j) {
                                              var String = d.substring(d.indexOf('">') + 2, d.lastIndexOf('</'));
                                              select.append('<option value="' + String + '"> ' + String + ' </option>');
                                          });
                                      });
                                  }
                              });

                              $table = $('table#landlords').DataTable();

                              $table.on('click', 'button.btnDelete_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('deleteUser=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#user_update_panel').fadeOut(300);
                                          $("#deleteUser_panel").show();
                                          $('html, body').animate({scrollTop: $('#deleteUser_panel').offset().top}, 'slow');
                                          $("#deleteUser_panel").html(data);
                                      }
                                  });
                              });
                              var btnAdd_landlord = $(".btnAdd_landlord");
                              $(btnAdd_landlord).on('click', function () {
                                  var urlajax = url + 'landlord/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('addLandlord'),
                                      success: function (data) {
                                          $('#deleteLandlord_panel').fadeOut(300);
                                          $('#updateLandlord_panel').fadeOut(300);
                                          $("#addLandlord_panel").show();
                                          $('html, body').animate({scrollTop: $('#addLandlord_panel').offset().top}, 'slow');
                                          $("#addLandlord_panel").html(data);
                                      }
                                  });
                              });
                          }
                          );
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>