<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {

        try {
            /**
             * Add landlord Group parcial form
             */
            if (request::getInstance()->isMethod("POST")) {
                if (request::getInstance()->hasPost("add_landlord_split")) {
                    ?>
                    <script>
                        $(document).ready(function () {
                            $('#landlord_splits_modal').modal('show');
                        });
                    </script>
                    <!-- Modal -->
                    <div class="modal fade" id="landlord_splits_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bohemia-">
                                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    <h4 class="modal-title">   <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square-o" aria-hidden="true"></i><b> Add Landlord Group</b></button> </h4>
                                </div>
                                <form id="addLandlordSplits" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("splits", "createLandlordGroup"); ?>">
                                    <div class="modal-body">
                                        <p><small>Fields marked with (*) are mandatory.</small></p>
                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                <label for="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>"> Landlord Group Name</label>
                                                <input type="text" class="form-control has-feedback-left" id="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" name="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" placeholder="Enter Landlord Group Name" >
                                                <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                            </div>

                                        </div>
                                        <div class="ln_solid"></div>
                                    </div>
                                    <div class=" modal-footer">
                                        <div class="pull-right">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Create</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function () {
                                        $('#addLandlordSplits').formValidation({
                                            framework: 'bootstrap',
                                            err: {
                                                container: 'tooltip'
                                            },
                                            icon: {
                                                valid: 'glyphicon glyphicon-ok',
                                                invalid: 'glyphicon glyphicon-remove',
                                                validating: 'glyphicon glyphicon-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'glyphicon glyphicon-asterisk'
                                                }
                                            },
                                            fields: {
                    <?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true) ?>: {
                                                    validators: {
                                                        notEmpty: {
                                                            message: 'The Landlord Group Name is required'
                                                        }

                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            /**
             * Update Landlord Group parcial form
             */
            if (request::getInstance()->isMethod("POST")) {
                if (request::getInstance()->hasPost("edit_landlord_split")) {

                    $landlord_group_hash = request::getInstance()->getPost("edit_landlord_split");
                    $id_landlord_group = landlordGroupTableClass::getLandlordGroupIdByHash($landlord_group_hash);

                    $landlord_group_fields = array(
                        landlordGroupTableClass::ID,
                        landlordGroupTableClass::LANDLORD_GROUP_NAME,
                        landlordGroupTableClass::LANDLORD_GROUP_HASH,
                        landlordGroupTableClass::BOHEMIA_PERCENT,
                        landlordGroupTableClass::UPDATED_AT,
                    );

                    $landlord_group_order_by = array(
                        landlordGroupTableClass::ID
                    );

                    $landlord_group_where = array(
                        landlordGroupTableClass::ID => $id_landlord_group
                    );
                    $ObjLandlordGroup = landlordGroupTableClass::getAll($landlord_group_fields, true, $landlord_group_order_by, 'ASC', null, null, $landlord_group_where);

                    $landord_agent_splits = array(
                        landlordAgentSplitsTableClass::AGENT_GROUP_ID,
                        landlordAgentSplitsTableClass::AGENT_GROUP_PERCENT,
                        landlordAgentSplitsTableClass::LANDLORD_GROUP_ID,
                        landlordAgentSplitsTableClass::ID,
                        landlordAgentSplitsTableClass::CREATED_AT,
                        landlordAgentSplitsBaseTableClass::UPDATED_AT
                    );

                    $landlord_agent_splits_order_by = array(
                        landlordAgentSplitsTableClass::ID
                    );

                    $landlord_agent_splits_where = array(
                        landlordAgentSplitsTableClass::LANDLORD_GROUP_ID => $id_landlord_group
                    );
                    $objLandlordAgentSplits = landlordAgentSplitsTableClass::getAll($landord_agent_splits, true, $landlord_agent_splits_order_by, 'ASC', null, null, $landlord_agent_splits_where);

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
                    <script>
                        $(document).ready(function () {
                            $('#edit_landlord_splits_modal').modal('show');
                        });
                    </script>
                    <!-- Modal -->
                    <div class="modal fade" id="edit_landlord_splits_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bohemia-">
                                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    <h4 class="modal-title">   <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Edit Landlord Group: <?php echo landlordGroupTableClass::getLandlordGroupNameById($id_landlord_group); ?></b></button> </h4>
                                </div>
                                <form id="editLandlordSplits" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("splits", "createLandlordGroup"); ?>">
                                    <div class="modal-body">
                                        </br>
                                        <div class="page-title-bohemia">
                                            <h4> <b> Landlord Group Information</b></h4>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <p><small>Fields marked with (*) are mandatory.</small></p>
                                                <div class="form-group">

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <label for="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>"> Landlord Group Name</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" name="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" <?php echo (!empty($ObjLandlordGroup[0]->$landlord_group_name)) ? 'value=" ' . $ObjLandlordGroup[0]->$landlord_group_name . '"' : ''; ?> placeholder="Enter Landlord Group Name" >
                                                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="page-title-bohemia">
                                            <h4> <b> Agent Group % </b></h4>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <p><small>Fields marked with (*) are mandatory.</small></p>
                                                <div class="form-group">

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <label for="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>"> Landlord Group Name</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" name="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" <?php echo (!empty($ObjLandlordGroup[0]->$landlord_group_name)) ? 'value=" ' . $ObjLandlordGroup[0]->$landlord_group_name . '"' : ''; ?> placeholder=" Enter %" >
                                                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <label for="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>"> Landlord Group Name</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" name="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" <?php echo (!empty($ObjLandlordGroup[0]->$landlord_group_name)) ? 'value=" ' . $ObjLandlordGroup[0]->$landlord_group_name . '"' : ''; ?> placeholder="Enter %" >
                                                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <label for="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>"> Landlord Group Name</label>
                                                        <input type="text" class="form-control has-feedback-left" id="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" name="<?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true); ?>" <?php echo (!empty($ObjLandlordGroup[0]->$landlord_group_name)) ? 'value=" ' . $ObjLandlordGroup[0]->$landlord_group_name . '"' : ''; ?> placeholder="Enter % " >
                                                        <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                    </div>
                                    <div class=" modal-footer">
                                        <div class="pull-right">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> Create</button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function () {
                                        $('#editLandlordSplits').formValidation({
                                            framework: 'bootstrap',
                                            err: {
                                                container: 'tooltip'
                                            },
                                            icon: {
                                                valid: 'glyphicon glyphicon-ok',
                                                invalid: 'glyphicon glyphicon-remove',
                                                validating: 'glyphicon glyphicon-refresh'
                                            },
                                            addOns: {
                                                mandatoryIcon: {
                                                    icon: 'glyphicon glyphicon-asterisk'
                                                }
                                            },
                                            fields: {
                    <?php echo landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME, true) ?>: {
                                                    validators: {
                                                        notEmpty: {
                                                            message: 'The Landlord Group Name is required'
                                                        }

                                                    }
                                                }
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
