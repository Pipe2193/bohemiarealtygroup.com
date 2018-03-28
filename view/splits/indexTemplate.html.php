<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** LANDLORD GROUP INSTANCES * */
$landlord_group_id = landlordGroupTableClass::ID;
$landlord_group_name = landlordGroupTableClass::LANDLORD_GROUP_NAME;
$landlord_group_percentage = landlordGroupTableClass::BOHEMIA_PERCENT;
$landlord_group_hash = landlordGroupTableClass::LANDLORD_GROUP_HASH;

/** AGENT GROUP INSTANCES * */
$agent_group_id = agentGroupTableClass::ID;
$agent_group_name = agentGroupTableClass::AGENT_GROUP_NAME;
$agent_group_default = agentGroupTableClass::DEFAULT_GROUP;
/** LANDLORD AGENT SPLITS * */
$landlord_agent_splits_id = landlordAgentSplitsTableClass::ID;
$landlord_agent_splits_landlord_group_id = landlordAgentSplitsTableClass::LANDLORD_GROUP_ID;
$landlord_agent_splits_agent_group_id = landlordAgentSplitsTableClass::AGENT_GROUP_ID;
$landlord_agent_splits_agent_percentage = landlordAgentSplitsTableClass::AGENT_GROUP_PERCENT;
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
                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_landlord_group"><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Landlord Group</button>
                                                </div>
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
                                                                <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><b> <?php echo $landlord_group->$landlord_group_name; ?></b> </button> 
                                                            </a>
                                                        </h4>

                                                    </div>
                                                </div>
                                                <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo($i == 1) ? 'in' : ''; ?> ">
                                                    </br>
                                                    <div class="panel panel-success">
                                                        <div class="panel-body">
                                                            <div class="pull-right">
                                                                <button data-hash ="<?php echo $landlord_group->$landlord_group_hash; ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnEdit_landlord_group"><b> Edit</b></button>
                                                                <button data-hash="<?php echo $landlord_group->$landlord_group_hash; ?>"  type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger"><b> Delete</b></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $landlord_splits = landlordAgentSplitsTableClass::getLandlordAgentSplits($landlord_group->$landlord_group_id);
                                                    if (!empty($landlord_splits)) {
                                                        ?>
                                                        <!-- Icon List -->
                                                        <style>
                                                            .demo-list-icon {
                                                                width: 300px;
                                                            }
                                                        </style>
                                                        <ul class="demo-list-icon mdl-list">   
                                                            <?php
                                                            for ($index = 0; $index < count($landlord_splits); $index++):
                                                                ?>
                                                                <li class="mdl-list__item">
                                                                    <span class="mdl-list__item-primary-content">
                                                                        <i class="material-icons mdl-list__item-icon">person</i>
                                                                        <?php echo agentGroupTableClass::getAgentGroupName($landlord_splits[$index]->$landlord_agent_splits_agent_group_id); ?>: 
                                                                    </span>
                                                                    <span class="mdl-list__item-secondary-action" href="#">
                                                                        <b><?php echo $landlord_splits[$index]->$landlord_agent_splits_agent_percentage; ?> %</b>
                                                                    </span>
                                                                </li>
                                                                <?php
                                                            endfor;
                                                            ?>
                                                        </ul>
                                                        <?php
                                                    }else {
                                                        ?>
                                                        </br>
                                                        <div class="alert alert-info alert-dismissible" role="alert">
                                                            <p class="text-center">
                                                                <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Splits found. </b><br>
                                                            </p>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <?php
                                                $i++;
                                                $splits++;
                                            endforeach;
                                            ?>
                                        </div>
                                        <div id="landlord_splits_panel"></div>


                                    </div>
                                    <div id="agents_group" class="tab-pane fade">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="pull-left">
                                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--dark"><i class="fa fa-users"></i> <?php echo count($ObjAgentGroup); ?> Agents Groups</button>
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("splits", "index"); ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Agent Group</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (empty($ObjAgentGroup)) { ?>

                                            <div class="alert alert-info alert-dismissible" role="alert">
                                                <p class="text-center">
                                                    <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Agents Groups found. </b> <button data-hash="<?php ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_agent_group" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>New Agent Group</b></button><br>
                                                </p>
                                            </div>
                                        <?php } ?>


                                        <table id="agent_splits_table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Agent Group Name</th>
                                                    <th>Default for New Agents</th>
                                                    <th>Total Agents</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($ObjAgentGroup as $agentGroup):
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $agentGroup->$agent_group_name; ?>

                                                        </td>
                                                        <td>
                                                            <span class="mdl-list__item-secondary-action">
                                                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="list-checkbox-1">
                                                                    <input type="checkbox" id="list-checkbox-default" class="mdl-checkbox__input"  <?php echo ($agentGroup->$agent_group_default == 1) ? 'checked' : 'disabled'; ?> />
                                                                </label>
                                                            </span>

                                                        </td>
                                                        <td>
                                                            <?php echo $total_agents; ?>

                                                        </td>
                                                        <td>
                                                            <a href="<?php ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <b>Edit</b></a>
                                                            <button data-id="<?php echo $agentGroup->$agent_group_id; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button " type="button" data-toggle="tooltip" data-placement="top" title="delete Agent Group" disabled><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Agent Group Name</th>
                                                    <th>Default for New Agents</th>
                                                    <th>Total Agents</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="ln_solid"></div>
                                        <?php
                                        ?>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function () {

                                        var btnAdd_landlord_group = $(".btnAdd_landlord_group");
                                        btnAdd_landlord_group.on('click', function () {
                                            var urlajax = url + 'splits/ajax';
                                            $.ajax({
                                                async: true,
                                                type: "POST",
                                                dataType: "html",
                                                contentType: "application/x-www-form-urlencoded",
                                                url: urlajax,
                                                data: ('add_landlord_split'),
                                                success: function (data) {

                                                    $("#landlord_splits_panel").show();
                                                    //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                    $("#landlord_splits_panel").html(data);
                                                }
                                            });
                                        });

                                        var btnEdit_landlord_group = $(".btnEdit_landlord_group");
                                        btnEdit_landlord_group.on('click', function () {
                                            var landlord_group_hash = $(this).data("hash");
                                            var urlajax = url + 'splits/ajax';
                                            $.ajax({
                                                async: true,
                                                type: "POST",
                                                dataType: "html",
                                                contentType: "application/x-www-form-urlencoded",
                                                url: urlajax,
                                                data: ('edit_landlord_split=' + landlord_group_hash),
                                                success: function (data) {

                                                    $("#landlord_splits_panel").show();
                                                    //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                    $("#landlord_splits_panel").html(data);
                                                }
                                            });
                                        });
                                        //                                        AGENT SPLITS TABLE SETTINGS
                                        $('#agent_splits_table').DataTable({
                                            responsive: {
                                                details: {
                                                    renderer: function (api, rowIdx) {
                                                        var data = api.cells(rowIdx, ':hidden').eq(0).map(function (cell) {
                                                            var header = $(api.column(cell.column).header());
                                                            return  '<p>' + header.text() + ' : ' + api.cell(cell).data() + '</p>'; // changing details mark up.
                                                        }).toArray().join('');
                                                        return data ? $('<table/>').append(data) : false;
                                                    }
                                                }
                                            }
                                        });
                                        $agent_splits_table = $('table#agent_splits_table').DataTable();
                                    });

                                </script>
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