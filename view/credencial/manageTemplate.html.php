<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$role_id = credencialTableClass::ID;
$role_name = credencialTableClass::NOMBRE;
$role_description = credencialTableClass::DESCRIPTION;
$credencial_credencial_hash = credencialTableClass::CREDENCIAL_HASH;
$created_at = credencialTableClass::CREATED_AT;

/** PERMISSIONS INSTANCES * */
$permissions_id = permissionsTableClass::ID;
$permissions_name = permissionsTableClass::NAME_PERMISSIONS;
$permissions_module = permissionsTableClass::MODULE;
$permissions_module_id = permissionsTableClass::MODULE_ID_MODULE;

/** ROLES PERMISSIONS INSTANCES * */
$roles_permissions_id = rolesPermissionsTableClass::ID;
$roles_permissions_credencial_id = rolesPermissionsTableClass::CREDENCIAL_ID;
$roles_permissions_permissions_id_permissions = rolesPermissionsTableClass::PERMISSIONS_ID_PERMISSIONS;
$roles_permissions_status = rolesPermissionsTableClass::ROLE_PERMISSION_STATUS;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> Manage User Role Permissions  <?php echo $objCredencial[0]->$role_name; ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> Manage User Role Permissions </br> <?php echo $objCredencial[0]->$role_name; ?></h4>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="btn-group  btn-group-sm pull-left">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "index"); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                        </div>
                                    </div>
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
                                                <table id="listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2" class="table_title"> <i class="fa fa-server" aria-hidden="true"></i> Role Information </td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>ROLE NAME</b></td>
                                                            <td><?php echo $objCredencial[0]->$role_name; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>DESCRIPTION</b></td> 
                                                            <td><?php echo $objCredencial[0]->$role_description; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-bohemia">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"> Role Permissions</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form id="editPermissions" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("credencial", "update", array(credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH, true) => $objCredencial[0]->$credencial_credencial_hash)); ?>">
                                                <div class=" row form-group">

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(4) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 4) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(2) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 2) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class=" row form-group">
                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(3) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 3) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(1) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 1) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class=" row form-group">
                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(5) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 5) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(6) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 6) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class=" row form-group">
                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(7) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 7) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(8) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 8) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                 <div class=" row form-group">
                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(9) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 9) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(10) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 10) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>
                                                 <div class=" row form-group">
                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(11) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 11) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $i = 1;
                                                    $a = 0;
                                                    ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                                                        <div class="switch-guest-item">

                                                            <label><?php echo moduleTableClass::getModuleName(12) ?> Module</label>
                                                            <?php
                                                            foreach ($objPermissions as $permissions):
                                                              ?>
                                                              <?php
                                                              if ($permissions->$permissions_module_id == 12) {
                                                                ?>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="material-switch">
                                                                            <input id="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>"  name="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true) ?>_<?php echo $i; ?>" value="<?php echo $permissions->$permissions_id; ?>" <?php
                                                                            if ($objRolesPermissions[$a]->$roles_permissions_status === 1) {
                                                                              echo "checked";
                                                                            }
                                                                            ?> type="checkbox"/>
                                                                            <label for="<?php echo permissionsTableClass::getNameField(permissionsTableClass::ID, true); ?>_<?php echo $i; ?>" class="label-bohemia"></label>
                                                                            <span> <b><?php echo $permissions->$permissions_name; ?></b> </span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                                $a++;
                                                                $i++;
                                                              }
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="text-center">
                                                        <a href="<?php echo routing::getInstance()->getUrlWeb("credencial", "index") ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</a>
                                                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Role Permissions</button>
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