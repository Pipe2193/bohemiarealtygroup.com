<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LANDLORD GROUP INSTANCES * */
$landlord_group_id = landlordGroupTableClass::ID;
$landlord_group_name = landlordGroupTableClass::LANDLORD_GROUP_NAME;
$landlord_group_percentage = landlordGroupTableClass::BOHEMIA_PERCENT;
/** AGENT GROUP INSTANCES * */
$agent_group_id = agentGroupTableClass::ID;
$agent_group_name = agentGroupTableClass::AGENT_GROUP_NAME;
$agent_group_default = agentGroupTableClass::DEFAULT_GROUP;
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
                                <h2><i class="fa fa-building-o" aria-hidden="true"></i> Splits Manager </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-building-o" aria-hidden="true"></i> Splits Manager </h4>
                                </div>

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#landlord_group"> <i class="fa fa-building-o" aria-hidden="true"></i> <b>LANDLORD GROUP</b></a></li>
                                    <li><a data-toggle="tab" href="#agents_group"><b>AGENTS GROUP</b></a></li>

                                </ul>

                                <div class="tab-content">
                                    <div id="landlord_group" class="tab-pane fade in active">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="pull-left">
                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark"><i class="fa fa-users"></i> <?php echo count($ObjLandlordGroups); ?> Landlords Groups</button>
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("splits", "index"); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"> New Landlord Group</a>
                                                </div>
                                            </div>
                                            <div class="panel-group" id="accordion">
                                                <?php
                                                $i = 1;
                                                $splits = 0;
                                                foreach ($ObjLandlordGroups as $landlord_group):
                                                  ?>
                                                  <div class="panel panel-default">
                                                      <div class="panel-heading">
                                                          <h4 class="panel-title">
                                                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                                                  <b> <?php echo $landlord_group->$landlord_group_name; ?></b> : 
                                                              </a>
                                                          </h4>

                                                      </div>
                                                      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse ">
                                                          </br>
                                                          <div class="panel panel-success">
                                                              <div class="panel-body">
                                                                  <div class="pull-right">
                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("splits", "index"); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><b> Edit</b></a>
                                                                      <a href="<?php echo routing::getInstance()->getUrlWeb("splits", "index"); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><b> Delete</b></a>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <?php
                                                          for ($index = 0; $index < count($ObjAgentGroup); $index++) {
                                                            echo $ObjAgentGroup[$index]->$agent_group_name;
                                                          }
                                                          ?>
                                                      </div>
                                                  </div>
                                                  <?php
                                                  $i++;
                                                  $splits++;
                                                endforeach;
                                                ?>
                                            </div>

                                        </div>
                                        <div id="agents_group" class="tab-pane fade">
                                            </br>

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