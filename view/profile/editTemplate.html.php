<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$profileFistName = profileTableClass::FIRST_NAME;
$profileLastName = profileTableClass::LAST_NAME;
$profileMiddleName = profileTableClass::MIDDLE_NAME;
$profileEmailAddress = profileTableClass::EMAIL_ADDRESS;
$profilePhoneNumber = profileTableClass::PHONE_NUMBER;
$profilePhoneExt = profileTableClass::EXT_PHONE_NUMBER;
$profile_status = profileTableClass::ACTIVED;
$profile_office_number = profileTableClass::OFFICE_PHONE_NUMBER;
$profile_office_ext = profileTableClass::OFFICE_EXT_NUMBER;
$profile_bio_summary = profileTableClass::PROFILE_BIO_SUMMARY;
$profile_bio = profileTableClass::PROFILE_BIO;
$profile_facebook_link = profileTableClass::FACEBOOK_LINK;
$profile_twitter_link = profileTableClass::TWITTER_LINK;
$profile_link = profileTableClass::PROFILE_LINK;
$profile_instagram_link = profileTableClass::INSTAGRAM_LINK;
$profile_profile_hash = profileTableClass::PROFILE_HASH;
$profile_fax_number = profileTableClass::FAX_NUMBER;
$profile_position = profileTableClass::POSITION;

$user_email_address = usuarioTableClass::EMAIL_ADDRESS;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfileInfo)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfileInfo)) ?>
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
                                <h2> Profile Settings </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4>Profile Settings</h4>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <!--                                                <div class=" pull-right">
                                                                                                    <button data-id="<?php echo $userID; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnChange_pass" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Change Email Address</button>
                                                                                                    <button data-id="<?php echo $userID; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnChange_pass" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Change Password</button>
                                                                                                </div>-->

                                            </div>
                                        </div>
                                        <div id="changeUsername_panel"></div>
                                        <div id="changeUsername_panel"></div>
                                        <form class="form-horizontal form-label-left " role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("profile", "update", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $objProfileInfo[0]->$profile_profile_hash)); ?>">

                                            <p><small>Fields marked with (*) are mandatory.</small></p>

                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true) ?>"><b> First Name</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FIRST_NAME, true); ?>" <?php echo (!empty($objProfileInfo[0]->$profileFistName)) ? 'value="' . $objProfileInfo[0]->$profileFistName . '"' : ''; ?> placeholder="Enter First Name" required>
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true) ?>"><b> Middle Name</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true); ?>"  <?php echo (!empty($objProfileInfo[0]->$profileMiddleName)) ? 'value="' . $objProfileInfo[0]->$profileMiddleName . '"' : ''; ?> placeholder="Enter Middle Name" >
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true) ?>"><b> Last Name(s)</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::LAST_NAME, true); ?>" <?php echo (!empty($objProfileInfo[0]->$profileLastName)) ? 'value="' . $objProfileInfo[0]->$profileLastName . '"' : ''; ?> placeholder="Enter Last Name">
                                                    <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true) ?>"><b> Email Address</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true); ?>" <?php echo (!empty($objProfile_user[0]->$user_email_address)) ? 'value="' . $objProfile_user[0]->$user_email_address . '"' : ''; ?> placeholder="Email Address" required>
                                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                </div>

                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true) ?>"><b> Primary Phone Number</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true); ?>" <?php echo (!empty($objProfileInfo[0]->$profilePhoneNumber)) ? 'value="' . $objProfileInfo[0]->$profilePhoneNumber . '"' : ''; ?> placeholder="Phone Number" required>
                                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true) ?>"><b> Primary Ext (if applicable)</b></label>
                                                    <input type="text" class="form-control has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true); ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true); ?>" <?php echo (!empty($objProfileInfo[0]->$profilePhoneExt)) ? 'value="' . $objProfileInfo[0]->$profilePhoneExt . '"' : ''; ?> placeholder="Ext(if applicable)">
                                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>"><b> Bio Summary</b></label>
                                                    <textarea type="text" class="form-control has-feedback-left" rows="5" name="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true) ?>" placeholder=" Bio Short story..."  > <?php echo (!empty($objProfileInfo[0]->$profile_bio_summary)) ? $objProfileInfo[0]->$profile_bio_summary : ''; ?></textarea>
                                                    <span class="form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <label for="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>"><b> Biography</b></label>
                                                    <textarea  class="form-control" rows="20" name="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true) ?>" placeholder="Tell us your story..." ><?php echo (!empty($objProfileInfo[0]->$profile_bio)) ? $objProfileInfo[0]->$profile_bio : ''; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="panel panel-bohemia">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><b>Contact Information</b></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p><small> Fields marked with (*) are mandatory.</small></p>
                                                    <div class="form-group">

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>"><b> Company Phone Number</b></label>
                                                            <input type="text" class="form-control has-feedback-left phone" name="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_office_number)) ? 'value="' . $objProfileInfo[0]->$profile_office_number . '"' : ''; ?> placeholder="Office Phone Number" >
                                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>"><b> Company Ring Central Ext (if applicable)</b></label>
                                                            <input type="text" class="form-control  has-feedback-left " name="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_office_ext)) ? 'value="' . $objProfileInfo[0]->$profile_office_ext . '"' : ''; ?> placeholder="Ext(if applicable)" >
                                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                        
                                                         <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>"><b> Company Fax Number</b></label>
                                                            <input type="text" class="form-control has-feedback-left phone" name="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true) ?>" placeholder="Fax Number" <?php echo (!empty($objProfileInfo[0]->$profile_fax_number)) ? 'value="' . $objProfileInfo[0]->$profile_fax_number . '"' : ''; ?> >
                                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i><b> Facebook Link</b></label>
                                                            <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_facebook_link)) ? 'value="' . $objProfileInfo[0]->$profile_facebook_link . '"' : ''; ?>  placeholder="Enter Facebook Link" >
                                                            <span class="fa fa-facebook-official form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i><b> Twitter Link</b></label>
                                                            <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_twitter_link)) ? 'value="' . $objProfileInfo[0]->$profile_twitter_link . '"' : ''; ?>  placeholder="Enter Twitter Link" >
                                                            <span class="fa fa-twitter-square form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>"><i class="fa fa-instagram" aria-hidden="true"></i><b> Instagram Link</b></label>
                                                            <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_instagram_link)) ? 'value="' . $objProfileInfo[0]->$profile_instagram_link . '"' : ''; ?> placeholder="Enter Instagram Link" >
                                                            <span class="fa fa-twitter-square form-control-feedback left" aria-hidden="true"></span>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label for="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>"><b> Designation / Position</b></label>
                                                            <input type="text" class="form-control  has-feedback-left" name="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>" id="<?php echo profileTableClass::getNameField(profileTableClass::POSITION, true) ?>" <?php echo (!empty($objProfileInfo[0]->$profile_position)) ? 'value="' . $objProfileInfo[0]->$profile_position . '"' : ''; ?> placeholder="Enter Designation/position" >
                                                            <span class=" form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>

                                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="ln_solid"></div>

                                    </div>
                                </div>
                                <script>
                                  $(document).ready(function () {

                                  });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfileInfo)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>
