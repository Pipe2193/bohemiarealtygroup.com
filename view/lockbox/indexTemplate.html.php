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
                                <h2><i class="fa fa-building-o" aria-hidden="true"></i> Lockbox Manager </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-building-o" aria-hidden="true"></i> Lockbox Manager </h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="form-row">
                                            <div class="row ">

                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                    <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>"> Landlord</label>
                                                    <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                        <option value="">Select Landlord</option>
                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("lockbox", "index"); ?>"> All</option>
                                                        <?php foreach ($objLandlords as $landlords) : ?>
                                                          <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) == $landlords->$landlord_hash) { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("lockbox", "index", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>" selected>  SELECTED: <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                          <?php } else { ?>
                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("lockbox", "index", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => $landlords->$landlord_hash)); ?>"> <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                          <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <!--                                                <div class="col-md-4 col-sm-4 col-xs-12  form-group">
                                                                                                    <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true); ?>"> Listing Manager</label>
                                                                                                    <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true); ?>" onchange="location = this.options[this.selectedIndex].value;" class="form-control">
                                                                                                        <option value="">Select Listing Manager</option>
                                                                                                        <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index"); ?>"> All</option>
                                                <?php foreach ($objProfilesManager as $profile_manager) : ?>
                                                  <?php if ($profile_manager->$profile_manager_id != 1) { ?>
                                                                                                                                                                                                                            <option value="<?php echo routing::getInstance()->getUrlWeb("landlord", "index", array(landlordTableClass::getNameField(landlordTableClass::LISTING_MANAGER_ID, true) => $profile_manager->$profile_manager_id)); ?>"> <?php echo profileTableClass::getProfileByUserId($profile_manager->$profile_manager_id); ?></option>
                                                  <?php } ?>
                                                <?php endforeach; ?>
                                                                                                    </select>
                                                                                                </div>-->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("lockbox", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark" type="button"> Reset</a>
                                                </div>

                                            </div>
                                        </div></br>
                                    </div>
                                </div>
                                <?php if (empty($objLockboxBuildings)) { ?>

                                  <div class="alert alert-info alert-dismissible" role="alert">
                                      <p class="text-center">
                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Lockbox found. </b><br>
                                      </p>
                                  </div>
                                  <?php
                                }
                                ?>

                                <table id="lockbox" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th class="filter">Landlord</th>
                                            <th class="filter">Address</th>
                                            <th>Lockbox Code</th>
                                            <th>Date Checked</th>
                                            <th>Notes</th>
                                            <th class="filter">Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th >Landlord</th>
                                            <th>Address</th>
                                            <th>Lockbox Code</th>
                                            <th>Date Checked</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>
                                <div id="maintenance_panel"></div>
                                <div id="remove_panel"></div>
                                <div id="activate_panel"></div>
                                 <div id="edit_panel"></div>
                                <script>
                                  $(document).ready(function () {

                                      $('#lockbox').DataTable({
                                          responsive: true,
                                          "order": [1, 'asc'],
                                          "pageLength": 25,
                                          "ajax": {
                                              url: "ajax?lockbox",
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

                                      $table = $('table#lockbox').DataTable();

                                      $table.on('click', 'button.btn_maintenance', function () {
                                          var idbuilding = $(this).data("id");
                                          var urlajax = url + 'lockbox/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('maintenance_lockbox=' + idbuilding),
                                              success: function (data) {
                                                  $("#maintenance_panel").show();
                                                  $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#maintenance_panel").html(data);
                                              }
                                          });
                                      });
                                      
                                      $table.on('click', 'button.btn_remove', function () {
                                          var idbuilding = $(this).data("id");
                                          var urlajax = url + 'lockbox/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('remove_lockbox=' + idbuilding),
                                              success: function (data) {
                                                  $("#remove_panel").show();
                                                  $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#remove_panel").html(data);
                                              }
                                          });
                                      });
                                      
                                      $table.on('click', 'button.btn_activate', function () {
                                          var idbuilding = $(this).data("id");
                                          var urlajax = url + 'lockbox/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('activate_lockbox=' + idbuilding),
                                              success: function (data) {
                                                  $("#activate_panel").show();
                                                  $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#activate_panel").html(data);
                                              }
                                          });
                                      });
                                      
                                      $table.on('click', 'button.btn_edit', function () {
                                          var idbuilding = $(this).data("id");
                                          var urlajax = url + 'lockbox/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('edit_lockbox=' + idbuilding),
                                              success: function (data) {
                                                  $("#edit_panel").show();
                                                  $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#edit_panel").html(data);
                                              }
                                          });
                                      });

                                  });
                                </script>
                                
                            </div>

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