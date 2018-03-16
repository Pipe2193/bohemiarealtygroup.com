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
                            <div class=" hidden-xs x_title">
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage Site (<?php echo strtoupper(sitePagesTableClass::getSitePageName(mvc\request\requestClass::getInstance()->getGet("hash"))); ?>)</h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4><i class="fa fa-server" aria-hidden="true"></i>  Manage Site (<?php echo strtoupper(sitePagesTableClass::getSitePageName(mvc\request\requestClass::getInstance()->getGet("hash"))); ?>)</h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_site_pages", "index"); ?>" class="btn btn-default" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">

                                    <div class="panel-body">
                                        <?php ?>
                                        <form id="SocialBar" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "update", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $userID)); ?>">
                                            <table id="landlord" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="table_title"> Social Media Links </td>
                                                    </tr>
                                                    <p><small>Fields marked with (*) are mandatory.</small></p>
                                                    <tr>
                                                        <td><i class="fa fa-instagram" aria-hidden="true"></i> <b>INSTAGRAM</b></td>
                                                        <td>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" name="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::INSTAGRAM_LINK, true)  ?>" id="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::INSTAGRAM_LINK, true)  ?>" placeholder="Enter Social Media Link" required>
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa fa-twitter" aria-hidden="true"></i> <b>TWITTER</b></td>
                                                        <td>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" name="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::TWITTER_LINK, true)  ?>" id="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::TWITTER_LINK, true)  ?>" placeholder="Enter Social Media Link" required>
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa fa-facebook-official" aria-hidden="true"></i> <b>FACEBOOK</b></td>
                                                        <td>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" name="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::FACEBOOK_LINK, true)  ?>" id="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::FACEBOOK_LINK, true)  ?>" placeholder="Enter Social Media Link" required>
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa fa-pinterest" aria-hidden="true"></i> <b>PRINTEST</b></td>
                                                        <td>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" name="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::PRINTEST_LINK, true)  ?>" id="<?php echo socialMediaBarTableClass::getNameField(socialMediaBarTableClass::PRINTEST_LINK, true)  ?>" placeholder="Enter Social Media Link" required>
                                                                <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td colspan="2" class="table_title"> Sign Up For BRG Blasts </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa fa-link" aria-hidden="true"></i> <b>BRG Blasts Link </b></td>
                                                        <td>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" name="profileLastName" id="profileLastName" placeholder="Enter Link" required>
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
                                        </form>
                                    </div>
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

