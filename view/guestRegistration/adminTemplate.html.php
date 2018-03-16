<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$userID = usuarioTableClass::ID;
$username = usuarioTableClass::USER;
$userPass = usuarioTableClass::PASSWORD;
$userEmail = usuarioTableClass::EMAIL_ADDRESS;
$userActive = usuarioTableClass::ACTIVED;
$user_last_login = usuarioTableClass::LAST_LOGIN_AT;
$created_at = usuarioTableClass::CREATED_AT;
$updated_at = usuarioTableClass::UPDATED_AT;
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
                                <h2><i class="fa fa-users" aria-hidden="true"></i>Guest Registration Management <small></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-right">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="deleteUser_panel"></div>
                                <table id="usuarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Created At</th>
                                            <th>Agent Name</th>
                                            <th>Guest Name</th>
                                            <th>Guest Email</th>
                                            <th>Guest Phone</th>
                                            <th>Properties</th>
                                            <th>Guest Zipcode</th>
                                            <th>Guest Bday</th>
                                            <th>How Heard</th>
                                            <th>Notes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($objUsers as $user): ?>
                                          <tr>
                                              <td><?php if (empty($user->$userID)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$userID; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($user->$username)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$username; ?>
                                                  <?php } ?>
                                              </td>
                                              <td>
                                                  <?php if ($user->$userActive == "1") { ?>
                                                    <button type="button" class="btn btn-success btn-xs">ACTIVE</button>
                                                  <?php } elseif ($user->$userActive == "0") { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">INACTIVE</button>
                                                  <?php } else { ?>
                                                    <button type="button" class="btn btn-dark btn-xs">NO STATUS</button>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($user->$userEmail)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <a href="mailto:<?php echo $user->$userEmail; ?>" ><?php echo $user->$userEmail; ?></a>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($user->$user_last_login)) { ?>
                                                    <button type="button" class="btn btn-info btn-xs">TO SETUP</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$user_last_login ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($user->$created_at)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($user->$updated_at)) { ?>
                                                    <button type="button" class="btn btn-info btn-xs">NO UPDATES</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$updated_at; ?>
                                                  <?php } ?>
                                              </td>
                                               <td><?php if (empty($user->$updated_at)) { ?>
                                                    <button type="button" class="btn btn-info btn-xs">NO UPDATES</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$updated_at; ?>
                                                  <?php } ?>
                                              </td>
                                               <td><?php if (empty($user->$updated_at)) { ?>
                                                    <button type="button" class="btn btn-info btn-xs">NO UPDATES</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$updated_at; ?>
                                                  <?php } ?>
                                              </td>
                                               <td><?php if (empty($user->$updated_at)) { ?>
                                                    <button type="button" class="btn btn-info btn-xs">NO UPDATES</button>
                                                  <?php } else { ?>
                                                    <?php echo $user->$updated_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td>
                                                  <div class="btn-group  btn-group-sm">
                                                      <button data-id="<?php echo $user->$userID; ?>" class="btn btn-danger btnDelete_user" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                  </div>
                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Created At</th>
                                            <th>Agent Name</th>
                                            <th>Guest Name</th>
                                            <th>Guest Email</th>
                                            <th>Guest Phone</th>
                                            <th>Properties</th>
                                            <th>Guest Zipcode</th>
                                            <th>Guest Bday</th>
                                            <th>How Heard</th>
                                            <th>Notes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>


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

