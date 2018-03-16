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
                                <h2><i class="fa fa-search" aria-hidden="true"></i> Search <small>Listings</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="rental-tab" role="tab" data-toggle="tab" aria-expanded="true">Rentals</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="sales-tab" data-toggle="tab" aria-expanded="false">Sales</a>
                                        </li>
                                        <li role="presentation" class=""><a href="https://broker.olr.com/Login.aspx" target="_blank"  id="olr-tab2"  aria-expanded="false">OLR</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="rental-tab">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    Basic panel example
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="sales-tab">
                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                        </div>
                                    </div>
                                </div>


                                <p class="text-muted font-13 m-b-30">
                                    Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                </p>

                                <table id="listings" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>
                                            <th><input type="checkbox" id="check-all" class="flat"></th>
                                            </th>
                                            <th>ID</th>
                                            <th>Address</th>
                                            <th>Unit</th>
                                            <th>Neighborhood</th>
                                            <th>Rent</th>
                                            <th>BR/BA</th>
                                            <th>Access</th>
                                            <th>Super</th>
                                            <th>Notes</th>
                                            <th>LL</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Availability</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <th><input type="checkbox" id="check-all" class="flat"></th>
                                            </td>
                                            <td>121122</td>
                                            <td>540w 165th street</td>
                                            <td>3A</td>
                                            <td>Washington heights</td>
                                            <td>2,500</td>
                                            <td>0/1</td>
                                            <td>none</td>
                                            <td>n/a</td>
                                            <td>testing notes testing notes</td>
                                            <td>Rose Associates</td>
                                            <td>2017-07-27 16:50:25</td>
                                            <td>2017-07-28 16:50:25</td>
                                            <td><button type="button" class="btn btn-success btn-xs">BRG</button></td>
                                            <td>
                                                <div class="btn-group  btn-group-sm">
                                                    <button class="btn btn-info" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                    <button class="btn btn-default" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    <button class="btn btn-primary" type="button"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>
                                            <th><input type="checkbox" id="check-all" class="flat"></th>
                                            </th>
                                            <th>ID</th>
                                            <th>Address</th>
                                            <th>Unit</th>
                                            <th>Neighborhood</th>
                                            <th>Rent</th>
                                            <th>BR/BA</th>
                                            <th>Access</th>
                                            <th>Super</th>
                                            <th>Notes</th>
                                            <th>LL</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Availability</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>


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

