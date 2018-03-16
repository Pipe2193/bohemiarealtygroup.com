<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** RENT INSTANCES * */
/** LANDLORD INSTANCES * */
$landlordID = landlordTableClass::ID;
$landlord_name = landlordTableClass::DESCRIPTION_LANDLORD;
$landlord_hash = landlordTableClass::LANDLORD_HASH;

/** LISTING INSTANCES * */
$listing_id = listingTableClass::ID;
$listing_building_id = listingTableClass::BUILDING_ID_BUILDING;
$listing_landlord_id = listingTableClass::LANDLORD_ID_LANDLORD;
$listing_rent = listingTableClass::RENT_LISTING;
$listing_unit_number = listingTableClass::UNIT_NUMBER_LISTING;
$listing_size_id = listingTableClass::LISTING_SIZE_ID_LISTING_SIZE;
$listing_bath_size = listingTableClass::BATH_SIZE_LISTING;
$listing_fee_op = listingTableClass::FEE_OP_LISTING;
$listing_custom_fee_op = listingTableClass::CUSTOM_FEE_OP_LISTING;
$listing_lease_start = listingTableClass::LEASE_TERM_START;
$listing_lease_end = listingTableClass::LEASE_TERM_END;
$listing_floor_number = listingTableClass::FLOOR_NUMBER_LISTING;
$listing_id_access = listingTableClass::ACCESS_ID_ACCESS;
$listing_lockbox_code = listingTableClass::LOCKBOX_LISTING;
$listing_email_notification_status = listingTableClass::EMAIL_NOTIFICATION_STATUS;
$listing_description = listingTableClass::DESCRIPTION_LISTING;
$listing_notes = listingTableClass::NOTES_LISTING;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> New Deals </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> New Deals </h4>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#rental_deals_panel"> <i class="fa fa-building-o" aria-hidden="true"></i> <b>RENTALS DEALS</b></a></li>
                                    <li><a data-toggle="tab" href="#sales_deals_panel"> <b> SALES DEALS</b></a></li>

                                </ul>

                                <div class="tab-content">
                                    <div id="rental_deals_panel" class="tab-pane fade in active">
                                        </br>

                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <form action="<?php echo routing::getInstance()->getUrlWeb("deal", "add") ?>" method="POST" >
                                                    <div class="form-row">

                                                        <div class="row ">

                                                            <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                                                                <label class=""for="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>"> Landlord</label>
                                                                <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>" class="form-control">
                                                                    <option value="">Select Landlord</option>
                                                                    <option value="<?php echo routing::getInstance()->getUrlWeb("listing", "search"); ?>"> All</option>
                                                                    <?php foreach ($objLandlords as $landlords) : ?>
                                                                      <?php if (\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)) == $landlords->$landlord_hash) { ?>
                                                                        <option value="<?php echo \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)); ?>" selected>  SELECTED: <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                                      <?php } else { ?>
                                                                        <option value="<?php echo $landlords->$landlord_hash; ?>"> <?php echo strtoupper($landlords->$landlord_name); ?></option>
                                                                      <?php } ?>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="building_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                        <option value="">Select Landlord First</option>    
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row ">
                                                            <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <div id="apartment_field">
                                                                    <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> Apartment</label>
                                                                    <select id="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>_1" name="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"  class="form-control">
                                                                        <option value="">Select Building First</option>    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback text-center">
                                                                </br>
                                                                <button id="btndeal_1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="button"> Search <i class="fab fa-searchengin"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <center><b>OR</b></center></br>
                                                <form action="<?php echo routing::getInstance()->getUrlWeb("deal", "add") ?>" method="POST" >
                                                    <div class="form-row">
                                                        <div class="row">
                                                            <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>">Listing ID</label>
                                                                <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::ID, true); ?>_2" name="<?php echo listingTableClass::getNameField(listingTableClass::ID, true); ?>" placeholder="Listing ID" >
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback text-center">
                                                                </br>
                                                                <button id="btndeal_2"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="button"> Search <i class="fab fa-searchengin"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form></br>
                                                <hr>
                                                <div id="new_rental_deal_panel"></div>
                                            </div>
                                        </div>



                                    </div>
                                    <div id="sales_deals_panel" class="tab-pane fade">
                                        </br>
                                        <form action="<?php echo routing::getInstance()->getUrlWeb("listing", "search") ?>" method="GET" >
                                            <div class="form-row">

                                                <div class="row ">

                                                    <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <div id="building_field">
                                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Building</label>
                                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                <option value="">Select Landlord First</option>    
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div  class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <div id="apartment_field">
                                                            <label for="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"> Apartment</label>
                                                            <select id="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true) ?>"  class="form-control">
                                                                <option value="">Select Building First</option>    
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit"> New Sale Deal <i class="fab fa-searchengin"></i></button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <center><b>OR</b></center>
                                                <div class="row">
                                                    <div  class="col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <label for="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>"> ID</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>" <?php echo (\mvc\request\requestClass::getInstance()->hasGet(listingTableClass::getNameField(listingTableClass::ID, true))) ? 'value="' . \mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::ID, true)) . '"' : ''; ?> placeholder="Listing ID" >
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="text-center">
                                                        <button  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="submit"> New Sale Deal <i class="fab fa-searchengin"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form></br>
                                        <hr>
                                        <!--                                        <div id="deal_listing_info">
                                        
                                                                                    <table id="deal_listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                                        
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Listing Information </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>ID</b></td> 
                                                                                                <td><button  class="mdl-button mdl-js-button" type="button"><?php echo $listing->$listing_id; ?></button></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>LANDLORD</b></td>
                                                                                                <td><?php echo strtoupper(landlordTableClass::getLandlordNameById($listing->$listing_landlord_id)); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($listing->$listing_landlord_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>BUILDING</b></td> 
                                                                                                <td><?php echo strtoupper(buildingTableClass::getBuildingAddress(buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?> <a href="<?php echo routing::getInstance()->getUrlWeb("building", "manage", array(buildingTableClass::getNameField(buildingTableClass::BUILDING_HASH, true) => buildingTableClass::getBuildingHash($listing->$listing_building_id))); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"> View Details</a></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>APT# / UNIT#</b></td> 
                                                                                                <td><?php echo $listing->$listing_unit_number; ?> </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>RENT</b></td> 
                                                                                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button">$<?php echo $listing->$listing_rent; ?> USD</button></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b># BEDS</b></td>
                                                                                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo listingSizeTableClass::getListingSizeByID($listing->$listing_size_id); ?> <i class="fa fa-home" aria-hidden="true"></i></button></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b># BATHS</b></td>
                                                                                                <td><button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><?php echo $listing->$listing_bath_size; ?> <i class="fa fa-bath" aria-hidden="true"></i></button></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>OP 
                                                                                                        <div id="tt3" class="icon material-icons">error</div>
                                                                                                        <div class="mdl-tooltip" data-mdl-for="tt3">
                                                                                                            <strong>Owner Pays</strong>
                                                                                                        </div>
                                                                                                    </b>
                                                                                                </td>
                                                                                                <td>
                                        <?php if ($listing->$listing_fee_op == "custom") { ?>
                                                                                                                    <b><?php echo $listing->$listing_fee_op ?>: </b> <?php echo $listing->$listing_custom_fee_op; ?>
                                          <?php
                                        } else {
                                          echo $listing->$listing_fee_op;
                                        }
                                        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>LISTING STATUS</b></td>
                                                                                                <td>
                                        <?php if ($listing->$listing_status == "1") { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button mdl-button--primary" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> AVAILABLE</button>
                                        <?php } elseif ($listing->$listing_status == "2") { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> PENDING</button>
                                        <?php } elseif ($listing->$listing_status == "3") { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> UNAVAILABLE</button>
                                        <?php } else { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button mdl-button--dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                        <?php } ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>LEASE TERMS (Months)</b></td>
                                                                                                <td>
                                        <?php if (!empty($listing->$listing_lease_start) && !empty($listing->$listing_lease_end)) { ?>
                                          <?php echo $listing->$listing_lease_start; ?> - <?php echo $listing->$listing_lease_end; ?> (Months)
                                        <?php } else { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"> NO LEASE TERMS ASSIGNED</button>
                                        <?php } ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>ACCESS</b></td>
                                                                                                <td>
                                        <?php if ($listing->$listing_id_access === 1) { ?>
                                          <?php echo accessTableClass::getAccessName($listing->$listing_id_access); ?>-<b>Lockbox Code: </b>  <?php echo $listing->$listing_lockbox_code; ?>
                                          <?php
                                        } else {
                                          echo accessTableClass::getAccessName($listing->$listing_id_access);
                                        }
                                        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>FLOOR</b></td>
                                                                                                <td><?php echo $listing->$listing_floor_number; ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><b>NOTES</b></td>
                                                                                                <td>
                                        <?php if (empty($listing->$listing_notes)) { ?>
                                                                                                                    <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                        <?php } else { ?>
                                          <?php echo $listing->$listing_notes; ?></td>
                                        <?php } ?>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Sale Deal Information </td>
                                                                                            </tr> 
                                                                                        </tbody>
                                                                                    </table>
                                        
                                                                                    <form id="sale_deal" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("listing", "update", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true)))); ?>">
                                                                                        <p><small>Fields marked with (*) are mandatory.</small></p>
                                                                                        <div class="form-group">
                                                                                             <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Closed Price</label>
                                                                                                <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" <?php echo (!empty($listing->$listing_rent)) ? 'value="' . $listing->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                                                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>"> Fee</label>
                                                                                                <input type="number" class="form-control has-feedback-left" id="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::RENT_LISTING, true); ?>" <?php echo (!empty($listing->$listing_rent)) ? 'value="' . $listing->$listing_rent . '"' : ''; ?> placeholder="Enter Rent" required>
                                                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>"> Notes </label>
                                                                                                <textarea  id="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING, true) ?>" required class="form-control" rows="5" ></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                                                <label for="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>">Send Notification Email To to the Company (all the agents on the team) ?</label>
                                                                                                <select id="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" name="<?php echo listingTableClass::getNameField(listingTableClass::EMAIL_NOTIFICATION_STATUS, true) ?>" class="form-control" required>
                                                                                                    <option value="">Select Option</option>  
                                                                                                    <option value="1" <?php echo ($listing->$listing_email_notification_status === 1) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> Yes</option>  
                                                                                                    <option value="0" <?php echo ($listing->$listing_email_notification_status === 0) ? 'selected' : ''; ?>><?php echo ($listing->$listing_email_notification_status === 1) ? 'ACTIVE:' : ''; ?> No</option>  
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="ln_solid"></div>
                                                                                        <div class="form-group">
                                                                                            <div class="text-center">
                                                                                                <a href="<?php echo routing::getInstance()->getUrlWeb("deal", "index", array(listingTableClass::getNameField(listingTableClass::LISTING_HASH, true) => listingTableClass::getListingHashById($objListing[0]->$listing_id))); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                                                                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New Sale Deal</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>-->

                                    </div>
                                </div>
                            </div>
                            <script>
                              $(document).ready(function () {

                                  $("#btndeal_1").on('click', function () {
                                      var listing_hash = $("#<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>_1").val();
                                      var urlajax = url + 'deals/ajax';
                                      $.ajax({
                                          async: true,
                                          type: "POST",
                                          dataType: "html",
                                          contentType: "application/x-www-form-urlencoded",
                                          url: urlajax,
                                          data: ('new_deal=' + listing_hash),
                                          success: function (data) {

                                              $("#new_rental_deal_panel").show();
                                              $('html, body').animate({scrollTop: $('#new_rental_deal_panel').offset().top}, 'slow');
                                              $("#new_rental_deal_panel").html(data);
                                          }
                                      });
                                  });
                                  
                                  $("#btndeal_2").on('click', function () {
                                      var listing_id = $("#<?php echo listingTableClass::getNameField(listingTableClass::ID, true) ?>_2").val();
                                      var urlajax = url + 'deals/ajax';
                                      $.ajax({
                                          async: true,
                                          type: "POST",
                                          dataType: "html",
                                          contentType: "application/x-www-form-urlencoded",
                                          url: urlajax,
                                          data: ('new_deal_listing_id=' + listing_id),
                                          success: function (data) {

                                              $("#new_rental_deal_panel").show();
                                              $('html, body').animate({scrollTop: $('#new_rental_deal_panel').offset().top}, 'slow');
                                              $("#new_rental_deal_panel").html(data);
                                          }
                                      });
                                  });



                                  var landlord_select = $("#<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?>");
                                  landlord_select.change(function () {
                                      var idLandlord = landlord_select.val();
                                      var urlajax = url + 'listing/ajax';
                                      $.ajax({
                                          async: true,
                                          type: "POST",
                                          dataType: "json",
                                          contentType: "application/x-www-form-urlencoded",
                                          url: urlajax,
                                          data: ('landlord_id_selected_filter=' + idLandlord),
                                          success: function (data) {
                                              // the next thing you want to do 
                                              var $building = $('#<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true); ?>');
                                              $building.empty();
                                              $building.append('<option value=""> All </option>');
                                              for (var i = 0; i <= data.length; i++) {

                                                  $building.append('<option value=' + data[i][0] + '>' + data[i][1] + '</option>');
                                              }
                                          }
                                      });
                                  });

                                  var building = $('#<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true); ?>');
                                  $('#<?php echo landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true); ?> option').each(function () {
                                      if ($(this).is(':selected')) {
                                          var id = $(this).val();
                                          var building_hash = "<?php echo mvc\request\requestClass::getInstance()->getGet(listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true)) ?>";
                                          var urlajax = url + 'listing/ajax';
                                          var select;
                                          var active;
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "json",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('landlord_id_selected_filter=' + id),
                                              success: function (data) {
                                                  // the next thing you want to do 
                                                  if (data != null) {
                                                      building.empty();
                                                      building.append('<option value=""> All </option>');
                                                      for (var i = 0; i <= data.length; i++) {

                                                          if (building_hash == data[i][0]) {
                                                              select = 'selected';
                                                              active = 'SELECTED: ';
                                                          } else {
                                                              select = '';
                                                              active = '';
                                                          }
                                                          building.append('<option value=' + data[i][0] + ' ' + select + ' > ' + active + data[i][1] + '</option>');
                                                      }
                                                  }
                                              }
                                          });
                                      }
                                  });

                                  var building_select = $("#<?php echo listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING, true); ?>");
                                  building_select.change(function () {
                                      var idBuilding = building_select.val();
                                      var urlajax = url + 'listing/ajax';
                                      $.ajax({
                                          async: true,
                                          type: "POST",
                                          dataType: "json",
                                          contentType: "application/x-www-form-urlencoded",
                                          url: urlajax,
                                          data: ('building_id_selected_filter=' + idBuilding),
                                          success: function (data) {
                                              // the next thing you want to do 
                                              var $listing = $('#<?php echo listingTableClass::getNameField(listingTableClass::ID, true); ?>_1');
                                              $listing.empty();
                                              $listing.append('<option value=""> Select Unit </option>');
                                              for (var i = 0; i <= data.length; i++) {

                                                  $listing.append('<option value=' + data[i][0] + '>' + data[i][1] + '</option>');
                                              }
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