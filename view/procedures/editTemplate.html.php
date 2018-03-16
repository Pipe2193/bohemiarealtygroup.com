<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Edit Procedures <?php echo landlordTableClass::getLandlordName(\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Edit Procedures </br> <?php echo landlordTableClass::getLandlordName(\mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true))) ?></h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">

                                        </div>
                                        <form id="editProcedures" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("procedures", "update", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))); ?>">
                                            <div class="panel panel-bohemia">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"> Procedures</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <textarea  id="<?php echo proceduresTableClass::getNameField(proceduresTableClass::CONTENT, true) ?>" name="<?php echo proceduresTableClass::getNameField(proceduresTableClass::CONTENT, true) ?>" required ><?php echo $objProcedures[0]->$procedures_content; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("landlord", "manage", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => \mvc\request\requestClass::getInstance()->getGet(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true)))) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger "><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Procedures</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                          $(document).ready(function () {

                                              CKEDITOR.replace('<?php echo proceduresTableClass::getNameField(proceduresTableClass::CONTENT, true) ?>', {
                                                  customConfig: path_absolute + 'assets/vendors/ckeditor/config.js'
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
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>