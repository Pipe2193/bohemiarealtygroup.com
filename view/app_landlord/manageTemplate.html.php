<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/* * LANDLORD* */
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
$pets_policy = landlordTableClass::PETS_CASE_ID;
$listing_policy = landlordTableClass::LISTING_TYPE_ID;
$notification = landlordTableClass::EMAIL_NOTIFICATION_STATUS;

/** PROCEDURES INSTANCES * */
$procedures_id = proceduresTableClass::ID;
$procedures_landlord_id_landlord = proceduresBaseTableClass::LANDLORD_ID_LANDLORD;
$procedures_content = proceduresTableClass::CONTENT;
$procedures_updated_at = proceduresTableClass::UPDATED_AT;
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
                            <div class=" hidden-xs x_title">
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage App & Info - Landlord (<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>)</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage App & Info - Landlord </br>(<?php echo strtoupper(landlordTableClass::getLandlordName(mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("app_landlord", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alertbrg alert-dismissible" role="alert">
                                    <p>
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Information: Click on each panel to display more information.<br>
                                    </p>
                                </div>
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    <b> Basic Info</b></a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                                foreach ($objLandlord as $landlord):
                                                  ?>
                                                  <div class="panel panel-success">
                                                      <div class="panel-body">
                                                          <div class="row">
                                                              <div class="btn-group  btn-group-sm pull-right">
                                                                  <div class="col-md-12 col-sm-12 col-xs-12">

                                                                      <?php if ($landlord->$status == "1") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> ACTIVE</button>
                                                                      <?php } elseif ($landlord->$status == "0") { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> INACTIVE</button>
                                                                      <?php } else { ?>
                                                                        <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                                      <?php } ?>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div><br>
                                                  <table id="landlord" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                      <tbody>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Landlord Information </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NAME</b></td>
                                                              <td><?php echo strtoupper($landlord->$landlord_name); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PHONE</b></td>
                                                              <td><a href="tel:<?php echo $landlord->$phone_number; ?>"><?php echo $landlord->$phone_number; ?></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>FAX</b></td>
                                                              <td><?php echo $landlord->$fax_number; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>TEAM EMAIL ADDRESS</b></td>
                                                              <td><a href="mailto:<?php echo $landlord->$email_address; ?>"><?php echo $landlord->$email_address; ?></a></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PRIVATE EMAIL ADDRESS</b></td>
                                                              <td><?php
                                                                  $private_emails = explode(',', $landlord->$private_email_address);
                                                                  for ($index = 0; $index <= count($private_emails); $index++) {
                                                                    echo '<a href="mailto:' . $private_emails[$index] . '">' . $private_emails[$index] . "</a></br>";
                                                                  }
                                                                  ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ADDRESS</b></td>
                                                              <td><?php echo $landlord->$address; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CITY</b></td>
                                                              <td><?php echo $landlord->$city; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>STATE</b></td>
                                                              <td><?php echo statesTableClass::getStateName($landlord->$state_id); ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>ZIPCODE</b></td>
                                                              <td><?php echo $landlord->$zipcode; ?></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>NOTES</b></td>
                                                              <td>
                                                                  <?php if (empty($landlord->$notes)) { ?>
                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                                                  <?php } else { ?>
                                                                    <?php echo $landlord->$notes; ?></td>
                                                              <?php } ?>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-user-o"></i> Landlord Manager(s) </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING MANAGER</b></td>
                                                              <td>
                                                                  <?php if (empty($landlord->$listing_manager_id)) { ?>

                                                                    <button type="button" class="btn btn-dark btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i> Not Assigned</button>
                                                                  <?php } else { ?>
                                                                    <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                                                                        <img class="mdl-chip__contact" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>"></img>
                                                                        <span class="mdl-chip__text"><?php echo profileTableClass::getProfileByUserId(listingManagerTableClass::getListingManagerUserId($landlord->$listing_manager_id)); ?></span>
                                                                    </span>

                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>CO-LISTING MANAGER</b></td>
                                                              <td>
                                                                  <?php
                                                                  $co_listing_manager = listingManagerTableClass::getCoListingManagerUserId($landlord->$listing_manager_id);
                                                                  if (empty($co_listing_manager)) {
                                                                    ?>

                                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--dark"><i class="fa fa-info-circle" aria-hidden="true"></i> Not Assigned </button>
                                                                  <?php } else { ?>
                                                                    <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                                                                        <img class="mdl-chip__contact" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>"></img>
                                                                        <span class="mdl-chip__text"><?php echo profileTableClass::getProfileByUserId($co_listing_manager); ?></span>
                                                                    </span>

                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Landlord Policies </td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>PETS POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo petsPolicyTableClass::getPetsPolicyName($landlord->$pets_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td><b>LISTING POLICY</b></td>
                                                              <td><button type="button" class="mdl-button mdl-js-button mdl-button--primary"><i class="fa fa-check-square" aria-hidden="true"></i> <?php echo listingTypeTableClass::getListingTypeName($landlord->$listing_policy); ?></button></td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="2" class="table_title"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifications </td>
                                                          </tr>

                                                          <tr>
                                                              <td><b>EMAIL NOTIFICATIONS</b></td>
                                                              <td>
                                                                  <?php if ($landlord->$notification == '1') { ?>
                                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--primary">   <i class="fa fa-bell-o" aria-hidden="true"></i> Allowed</button>
                                                                  <?php } elseif ($landlord->$notification == '0') {
                                                                    ?>
                                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--danger">  <i class="fa fa-bell-slash-o" aria-hidden="true"></i> Not Allowed</button>
                                                                  <?php } ?>
                                                              </td>
                                                          </tr>
                                                          <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Procedures</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php if (empty($objProcedures)) { ?>

                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Procedures found. </b> <a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "index", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Procedures</b></a><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                } else {
                                                  ?>

                                                  <?php foreach ($objProcedures as $procedures): ?>
                                                    <div class="panel panel-success">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="btn-group  btn-group-sm pull-right">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>LAST UPDATE AT:</b> <?php echo $procedures->$procedures_updated_at; ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="container">
                                                        <?php echo $procedures->$procedures_content; ?>
                                                    </div>
                                                    <div class="ln_solid"></div>
                                                    <div class="form-group">
                                                        <div class="text-center">
                                                            <a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "edit", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">Edit Procedures</a>
                                                        </div>
                                                    </div>
                                                  <?php endforeach; ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                    <b> Documents (Applications, Leases, Others) </b>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="panel panel-success">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="btn-group  btn-group-sm pull-right">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                                    <button data-hash="<?php echo mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)); ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_document" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Document</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <?php if (empty($objFiles)) { ?>

                                                  <div class="alert alert-info alert-dismissible" role="alert">
                                                      <p class="text-center">
                                                          <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Documents found. </b> <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark btnAdd_document" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Add Document</b></button><br>
                                                      </p>
                                                  </div>
                                                  <?php
                                                }
                                                ?>
                                                <table id="documents" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="filter"> ID</th>
                                                            <th>File Name</th>
                                                            <th> Description</th>
                                                            <th class="filter"> File Type</th>
                                                            <th>Created At</th>
                                                            <th>Updated At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th class="filter"> ID</th>
                                                            <th>File Name</th>
                                                            <th> Description</th>
                                                            <th class="filter"> File Type</th>
                                                            <th>Created At</th>
                                                            <th>Updated At</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div id="add_document_panel"></div>
                        <div id="edit_document_panel"></div>
                        <script>



                          //
                          // DataTables initialisation
                          //
                          $(document).ready(function () {
                              //
                              // Pipelining function for DataTables. To be used to the `ajax` option of DataTables
                              //
                              $.fn.dataTable.pipeline = function (opts) {
                                  // Configuration options
                                  var conf = $.extend({
                                      pages: 5, // number of pages to cache
                                      url: 'ajax?manage_listings=<?php echo $objLandlord[0]->$landlordID; ?><?php
                                                if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {
                                                  echo '&' . listingTableClass::getNameField(listingTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
                                                }
                                                ?>', // script url
                                      data: null, // function or object with parameters to send to the server
                                      // matching how `ajax.data` works in DataTables
                                      method: 'GET' // Ajax HTTP method
                                  }, opts);

                                  // Private variables for storing the cache
                                  var cacheLower = -1;
                                  var cacheUpper = null;
                                  var cacheLastRequest = null;
                                  var cacheLastJson = null;

                                  return function (request, drawCallback, settings) {
                                      var ajax = false;
                                      var requestStart = request.start;
                                      var drawStart = request.start;
                                      var requestLength = request.length;
                                      var requestEnd = requestStart + requestLength;

                                      if (settings.clearCache) {
                                          // API requested that the cache be cleared
                                          ajax = true;
                                          settings.clearCache = false;
                                      } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
                                          // outside cached data - need to make a request
                                          ajax = true;
                                      } else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
                                              JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
                                              JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
                                              ) {
                                          // properties changed (ordering, columns, searching)
                                          ajax = true;
                                      }

                                      // Store the request for checking next time around
                                      cacheLastRequest = $.extend(true, {}, request);

                                      if (ajax) {
                                          // Need data from the server
                                          if (requestStart < cacheLower) {
                                              requestStart = requestStart - (requestLength * (conf.pages - 1));

                                              if (requestStart < 0) {
                                                  requestStart = 0;
                                              }
                                          }

                                          cacheLower = requestStart;
                                          cacheUpper = requestStart + (requestLength * conf.pages);

                                          request.start = requestStart;
                                          request.length = requestLength * conf.pages;

                                          // Provide the same `data` options as DataTables.
                                          if ($.isFunction(conf.data)) {
                                              // As a function it is executed with the data object as an arg
                                              // for manipulation. If an object is returned, it is used as the
                                              // data object to submit
                                              var d = conf.data(request);
                                              if (d) {
                                                  $.extend(request, d);
                                              }
                                          } else if ($.isPlainObject(conf.data)) {
                                              // As an object, the data given extends the default
                                              $.extend(request, conf.data);
                                          }

                                          settings.jqXHR = $.ajax({
                                              "type": conf.method,
                                              "url": conf.url,
                                              "data": request,
                                              "dataType": "json",
                                              "cache": false,
                                              "success": function (json) {
                                                  cacheLastJson = $.extend(true, {}, json);

                                                  if (cacheLower != drawStart) {
                                                      json.data.splice(0, drawStart - cacheLower);
                                                  }
                                                  if (requestLength >= -1) {
                                                      json.data.splice(requestLength, json.data.length);
                                                  }

                                                  drawCallback(json);
                                              }
                                          });
                                      } else {
                                          json = $.extend(true, {}, cacheLastJson);
                                          json.draw = request.draw; // Update the echo for each response
                                          json.data.splice(0, requestStart - cacheLower);
                                          json.data.splice(requestLength, json.data.length);

                                          drawCallback(json);
                                      }
                                  }
                              };

                              // Register an API method that will empty the pipelined data, forcing an Ajax
                              // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
                              $.fn.dataTable.Api.register('clearPipeline()', function () {
                                  return this.iterator('table', function (settings) {
                                      settings.clearCache = true;
                                  });
                              });
                              //    BUILDING TABLE SETTINGS
                              $('#buildingTable').DataTable({
                                  responsive: true,
                                  "pageLength": 25,
                                  "ajax": {
                                      url: "ajax?manage_buildings=<?php echo $objLandlord[0]->$landlordID; ?>",
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

                              $table = $('table#buildingTable').DataTable();

                              //                              $('input', this.footer()).on('keyup change', function () {
                              //                                  if (that.search() !== this.value) {
                              //                                      that
                              //                                              .search(this.value)
                              //                                              .draw();
                              //                                  }
                              //                              });

                              $table.on('click', 'button.btnUpdate_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('userID=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#deleteUser_panel').fadeOut(300);
                                          $("#user_update_panel").show();
                                          $('html, body').animate({scrollTop: $('#user_update_panel').offset().top}, 'slow');
                                          $("#user_update_panel").html(data);
                                      }
                                  });
                              });

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

                              var btnAdd_building = $(".btnAdd_building");
                              $(btnAdd_building).on('click', function () {
                                  var landlord_hash = $(this).data("hash");
                                  var urlajax = url + 'building/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('addBuilding=' + landlord_hash),
                                      success: function (data) {
                                          $('#deleteBuilding_panel').fadeOut(300);
                                          $("#addBuilding_panel").show();
                                          $('html, body').animate({scrollTop: $('#addBuilding_panel').offset().top}, 'slow');
                                          $("#addBuilding_panel").html(data);
                                      }
                                  });
                              });

                              //LISTINGS TABLE SETTINGS 
                              $('#apartments').DataTable({
                                  responsive: true,
                                  "pageLength": 100,
                                  "order": [0, 'DESC'],
                                  "ajax": $.fn.dataTable.pipeline({
                                      url: "ajax?manage_listings=<?php echo $objLandlord[0]->$landlordID; ?><?php
                                                if (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::STATUS, true))) {
                                                  echo '&' . listingTableClass::getNameField(listingTableClass::STATUS, true) . '=' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::STATUS, true));
                                                }
                                                ?>",
                                      type: "GET",
                                      pages: 5 // number of pages to cache
                                  }),
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

                              $table = $('table#apartments').DataTable();

                              $table.on('click', 'button.btnUpdate_user', function () {
                                  var idUser = $(this).data("id");
                                  var urlajax = url + 'users/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('userID=' + idUser),
                                      success: function (data) {

                                          $('#addUser_panel').fadeOut(300);
                                          $('#deleteUser_panel').fadeOut(300);
                                          $("#user_update_panel").show();
                                          $('html, body').animate({scrollTop: $('#user_update_panel').offset().top}, 'slow');
                                          $("#user_update_panel").html(data);
                                      }
                                  });
                              });

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

                              var btnAdd_listing = $(".btnAdd_listing");
                              $(btnAdd_listing).on('click', function () {
                                  var landlord_hash = $(this).data("hash");
                                  var urlajax = url + 'listing/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('addListing=' + landlord_hash),
                                      success: function (data) {
                                          $('#deleteApartment_panel').fadeOut(300);
                                          $("#addApartment_panel").show();
                                          $('html, body').animate({scrollTop: $('#addApartment_panel').offset().top}, 'slow');
                                          $("#addApartment_panel").html(data);
                                      }
                                  });
                              });

                              //DOCUMENTS TABLE SETTINGS 
                              $('#documents').DataTable({
                                  responsive: true,
                                  "pageLength": 25,
                                  "order": [0, 'DESC'],
                                  "ajax": $.fn.dataTable.pipeline({
                                      url: "../../../documents/ajax?manage_files=<?php echo $objLandlord[0]->$landlordID; ?>",
                                      type: "GET"
                                  }),
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

                              $documents = $('table#documents').DataTable();

                              $(".btnAdd_document").on('click', function () {
                                  var landlord_hash = $(this).data("hash");
                                  var urlajax = url + 'documents/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('landlord_hash_document=' + landlord_hash),
                                      success: function (data) {

                                          $("#add_document_panel").show();
                                          //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#add_document_panel").html(data);
                                      }
                                  });
                              });

                              $documents.on('click', 'button.btnEdit_document', function () {
                                  var document_hash = $(this).data("hash");
                                  var urlajax = url + 'documents/ajax';
                                  $.ajax({
                                      async: true,
                                      type: "POST",
                                      dataType: "html",
                                      contentType: "application/x-www-form-urlencoded",
                                      url: urlajax,
                                      data: ('edit_document_hash=' + document_hash),
                                      success: function (data) {

                                          $("#edit_document_panel").show();
                                          //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                          $("#edit_document_panel").html(data);
                                      }
                                  });
                              });

                          });
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

