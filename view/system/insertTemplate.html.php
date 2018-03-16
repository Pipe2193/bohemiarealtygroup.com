<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar") ?>
        <?php echo view::includePartial("partials/topBar") ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-plus-square" aria-hidden="true"></i> Add <small>Listings</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <form class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Landlord</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select One</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Building</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select landlord first</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apt #/Unit</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" placeholder="Apt #">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rent $</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="number" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Beds</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Baths</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">OP</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>                         

                                            <div class="form-group">
                                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-8 col-sm-8 col-xs-12">Lease Term</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="number" class="form-control" placeholder="">
                                                    </div>

                                                </div>

                                                <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">-</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="number" class="form-control" placeholder="">
                                                    </div>

                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Access</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Floor Type</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Layout</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Outdoor Space</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select class="form-control">
                                                            <option>Select one</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Floor</label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="number" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> W/D
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> DW
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> EIK
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> WIC
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> HIGH CEIL
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> EXP BRICK
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> FIREPLACE
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> DECO
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="flat"> DINNING ROOM
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <b>Send Notification Email to Agents?</b>   <input type="checkbox" class="flat"> 
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
                                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                                        <textarea class="form-control" rows="4" placeholder=''></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Notes</label>
                                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                                        <textarea class="form-control" rows="4" placeholder=''></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                                                    <button type="reset" class="btn btn-primary">Reset</button>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Listing</button>
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
        <!-- /page content -->
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>
