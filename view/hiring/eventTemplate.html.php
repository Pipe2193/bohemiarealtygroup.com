<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\request\requestClass as request;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Hiring Events </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Hiring Events</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-right">
                                            <button class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_event" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> CREATE EVENT</b></button>
                                        </div>
                                    </div>
                                </div></br>
                                <div id="addEvent_panel"></div>
                                <?php if (empty($objEvents)) { ?>


                                  <div class = "alert alert-info alert-dismissible" role = "alert">
                                      <p class = "text-center">
                                          <b> <i class = "fa fa-info-circle" aria-hidden = "true"></i> Information: There are no Hiring Events found. </b><button class = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_event" type = "button"><i class = "fa fa-plus-square-o" aria-hidden = "true"></i> <b> CREATE EVENT</b></button><br>
                                      </p>
                                  </div>
                                  <?php
                                }
                                ?>

                                <table id="hiring_events" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Date and Time</th>
                                            <th>Location</th>
<!--                                            <th>Tags</th>-->
                                            <th>Fee</th>
                                            <th>Hosted by</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($objEvents as $event):

                                          $objListing = listingTableClass::getListingById($listing->$listing_id_listing);
                                          ?>
                                          <tr> 
                                              <td><button  class="mdl-button mdl-js-button" type="button"><?php echo $objListing[0]->$listing_id; ?></button></td>
                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo neighborhoodTableClass::getNeighborhoodName(buildingTableClass::getBuildingNeighborhoodID($objListing[0]->$listing_building_id)); ?></button></td>
                                              <td><button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($objListing[0]->$listing_building_id)); ?></button></td>
                                              <td><button  class="mdl-button mdl-js-button mdl-button" type="button"><?php echo $objListing[0]->$listing_unit_number; ?></button></td> 
                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $objListing[0]->$listing_rent; ?> USD </button></td>
                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($objListing[0]->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                                              <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $objListing[0]->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>

                                              <td><a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($objListing[0]->$listing_landlord_id))) ?>"><?php echo landlordTableClass::getLandlordNameById($objListing[0]->$listing_landlord_id); ?> </a></td>
                                              <td>
                                                  <span class="mdl-chip mdl-chip--contact mdl-chip--deletable">
                                                      <img class="mdl-chip__contact" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>"></img>
                                                      <span class="mdl-chip__text"><?php echo profileTableClass::getProfileByUserId(listingManagerTableClass::getListingManagerUserId(landlordTableClass::getLandlordListingManager($objListing[0]->$listing_landlord_id))); ?></span>
                                                  </span>
                                              </td>
                                              <td>

                                                  <?php if ($objListing[0]->$listing_status == "1") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--primary" type="button">AVAILABLE</button>
                                                  <?php } elseif ($objListing[0]->$listing_status == "2") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button" type="button"> PENDING</button>
                                                  <?php } elseif ($objListing[0]->$listing_status == "3") { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> UNAVAILABLE</button>
                                                  <?php } else { ?>
                                                    <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"> NO STATUS</button>
                                                  <?php } ?>
                                              </td>

                                              <td>
                                                  <button data-hash="<?php echo $listing->$listing_assignment_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnUnassign_listing" type="button"> Unassign</button>
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("listing", "manage", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $objListing[0]->$listing_listing_hash)) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-server" aria-hidden="true"></i> Manage / View</a>
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("ad", "add", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => $objListing[0]->$listing_listing_hash)) ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary " type="button"> Create Ad</a>

                                              </td>
                                          </tr>
                                          <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Date and Time</th>
                                            <th>Location</th>
<!--                                            <th>Tags</th>-->
                                            <th>Fee</th>
                                            <th>Hosted by</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>


                                <script>
                                  $(document).ready(function () {

                                      $('#hiring_events').DataTable({
                                          responsive: true,
                                          "pageLength": 50,
                                      });

                                      $table = $('table#hiring_events').DataTable();

                                      var btnAdd_event = $(".btnAdd_event");
                                      $(btnAdd_event).on('click', function () {
                                          var urlajax = url + 'hiring/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('addEvent'),
                                              success: function (data) {
                                                  $("#addEvent_panel").show();
                                                  $('html, body').animate({scrollTop: $('#addEvent_panel').offset().top}, 'slow');
                                                  $("#addEvent_panel").html(data);
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
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>