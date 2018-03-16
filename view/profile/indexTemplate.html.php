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
$profile_bio_summary = profileTableClass::PROFILE_BIO_SUMMARY;
$profile_bio = profileTableClass::PROFILE_BIO;
$profile_hash = profileTableClass::PROFILE_HASH;
$profile_status = profileTableClass::ACTIVED;
$profile_secondary_phone_number = profileTableClass::OFFICE_PHONE_NUMBER;
$profile_secondary_phone_ext = profileTableClass::OFFICE_EXT_NUMBER;
$profile_facebook_link = profileTableClass::FACEBOOK_LINK;
$profile_twitter_link = profileTableClass::TWITTER_LINK;
$profile_instagram_link = profileTableClass::INSTAGRAM_LINK;
$profile_position = profileTableClass::POSITION;
$userID = profileTableClass::USUARIO_ID;

$usuario_email_address = usuarioTableClass::EMAIL_ADDRESS;
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
                            <div class="x_title">
                                <h2><i class="fa fa-user-circle" aria-hidden="true"></i> Profile </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                    <div class="row text-center">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="avatar-view" src="<?php echo routing::getInstance()->getUrlImg('profile/user.png') ?>" alt="Avatar" title="Change the avatar">
                                        </div>
                                    </div><br>
                                    <div class="row text-center">
                                        <a type="button" href="<?php echo routing::getInstance()->getUrlWeb("profile", "edit", array(profileTableClass::getNameField(profileTableClass::PROFILE_HASH, true) => $objProfileInfo[0]->$profile_hash)); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary">
                                            <i class="fa fa-edit m-right-xs"></i> Edit Profile
                                        </a>
                                    </div>
                                    <br/>
                                </div>

                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="btn-group  btn-group-sm pull-right">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">


                                                        <span><i class="fa fa-flag-o" aria-hidden="true"></i> <b>ACCOUNT STATUS:</b> </span>
                                                        <?php if ($objProfileInfo[0]->$profile_status == "1") { ?>
                                                          <button class="mdl-button mdl-js-button mdl-button--primary"> ACTIVE</button>
                                                        <?php } elseif ($objProfileInfo[0]->$profile_status == "0") { ?>
                                                          <button class="mdl-button mdl-js-button mdl-button"> INACTIVE</button>
                                                        <?php } else { ?>
                                                          <button  class="btn btn-dark" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>STATUS:</b> NO STATUS</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <table id="landlord" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="table_title"> PROFILE INFORMATION </td>
                                            </tr>
                                            <tr>
                                                <td><b>NAME</b></td>
                                                <td><?php echo $objProfileInfo[0]->$profileFistName; ?> <?php echo $objProfileInfo[0]->$profileMiddleName; ?> <?php echo $objProfileInfo[0]->$profileLastName; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b> OFFICE PHONE</b></td>
                                                <td><?php echo $objProfileInfo[0]->$profile_secondary_phone_number; ?> <?php if (!empty($objProfileInfo[0]->$profile_secondary_phone_ext)) { ?><span>Ext:</span> <?php echo $objProfileInfo[0]->$profile_secondary_phone_ext; ?> <?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>CELL PHONE</b></td>
                                                <td><?php echo $objProfileInfo[0]->$profilePhoneNumber; ?> <?php if (!empty($objProfileInfo[0]->$profilePhoneExt)) { ?><span>Ext:</span> <?php echo $objProfileInfo[0]->$profilePhoneExt; ?> <?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td><b> EMAIL ADDRESS</b></td>
                                                <td><a href="mailto:<?php echo $objProfile_user[0]->$usuario_email_address; ?>"><?php echo $objProfile_user[0]->$usuario_email_address; ?></a></td>
                                            </tr>

                                            <tr>
                                                <td><b>POSITION</b></td>
                                                <td><?php echo $objProfileInfo[0]->$profile_position; ?> </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" class="table_title"> TEAM(S) </td>
                                            </tr>
                                            <tr>
                                                <td><b></b></td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="table_title"> SOCIAL MEDIA </td>
                                            </tr>
                                            <tr>
                                                <td><b> BOHEMIA</b></td>
                                                <td>
                                                    <a href="<?php ?>" target="_blank"><?php ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-facebook-official" aria-hidden="true"></i><b> FACEBOOK</b></td>
                                                <td>
                                                    <a href="<?php echo $objProfileInfo[0]->$profile_facebook_link; ?>" target="_blank"><?php echo $objProfileInfo[0]->$profile_facebook_link; ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <i class="fa fa-twitter-square" aria-hidden="true"></i><b> TWITTER</b></td>
                                                <td>
                                                    <a href="<?php echo $objProfileInfo[0]->$profile_twitter_link; ?>" target="_blank"><?php echo $objProfileInfo[0]->$profile_twitter_link; ?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <i class="fa fa-instagram" aria-hidden="true"></i><b> INSTAGRAM</b></td>
                                                <td>
                                                    <a href="<?php echo $objProfileInfo[0]->$profile_instagram_link; ?>" target="_blank"><?php echo $objProfileInfo[0]->$profile_instagram_link; ?></a>
                                                </td>
                                            </tr>
<!--                                            <tr>
                                                <td colspan="2" class="table_title"> REVIEWS </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>

                                                </td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                    <div class="page-title-bohemia">
                                        <h4><b> BIO SUMMARY</b></h4>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <?php echo $objProfileInfo[0]->$profile_bio_summary; ?>
                                        </div>
                                    </div></br>
                                    <div class="page-title-bohemia">
                                        <h4><b> BIOGRAPHY</b></h4>
                                    </div>
                                    <div class="panel panel-success">
                                        <div class="panel-body">
                                            <?php echo $objProfileInfo[0]->$profile_bio; ?>
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

