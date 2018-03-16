<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
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
                                <h2> Company Settings </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Company Settings</h4>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_team" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Company Branch</b></button>
                                        </div>

                                    </div>
                                </div>
                                <div id="addTeam_panel"></div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table id="company" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                            <tbody>
                                                <tr>
                                                    <td colspan="2" class="table_title"> Company Information </td>
                                                </tr>
                                            <p><small>Fields marked with (*) are mandatory.</small></p>
                                            <tr>
                                                <td> <b>COMPANY NAME</b></td>
                                                <td>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" name="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_NAME, true) ?>" id="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_NAME, true) ?>" placeholder="Enter Company Name" required>
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>COMPANY ACCRON</b></td>
                                                <td>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" name="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_ACCRON_NAME, true) ?>" id="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_ACCRON_NAME, true) ?>" placeholder="Enter Accron Name" required>
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>E-MAIL</b></td>
                                                <td>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" name="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_EMAIL_ADDRESS, true) ?>" id="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address" required>
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <b>PHONE</b></td>
                                                <td>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" name="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_PHONE_NUMBER, true) ?>" id="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_PHONE_NUMBER, true) ?>" placeholder="Enter Phone Number" required>
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>FAX</b></td>
                                                <td>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" name="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_FAX_NUMBER, true) ?>" id="<?php echo companyTableClass::getNameField(companyTableClass::COMPANY_FAX_NUMBER, true) ?>" placeholder="Enter Fax Number" required>
                                                        <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php ?>
                                            </tbody>
                                        </table>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <a href="<?php echo routing::getInstance()->getUrlWeb("cms_site_pages", "index") ?>" type="button" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                
                                <div class="page-title-bohemia">
                                    <h4> <b>Company Branches</b></h4>
                                </div>

                                <table id="branches" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Team Name</th>
                                            <th>Type</th>
                                            <th>Created At</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Team Name</th>
                                            <th>Type</th>
                                            <th>Created At</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>

                                <div id="updateTeam_panel"></div>

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