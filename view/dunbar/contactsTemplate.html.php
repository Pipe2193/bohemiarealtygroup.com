<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** CONTACTS INSTANCES * */
$contact_id = contactFormTableClass::ID;
$contact_app_id = contactFormTableClass::APP_ID_APP;
$contact_first_name = contactFormTableClass::FIRST_NAME;
$contact_last_name = contactFormTableClass::LAST_NAME;
$contact_email_address = contactFormTableClass::EMAIL_ADDRESS;
$contact_phone_number = contactFormTableClass::PHONE_NUMBER;
$contact_apt_size = contactFormTableClass::APT_SIZE;
$contact_max_rental_price = contactFormTableClass::MAX_RENT_PRICE;
$contact_open_house = contactFormTableClass::OPEN_HOUSE;
$contact_private_openhouse_date = contactFormTableClass::PRIVATE_OPENHOUSE_DATE;
$contact_openhouse_time = contactFormTableClass::PRIVATE_OPENHOUSE_TIME;
$contact_created_at = contactFormTableClass::CREATED_AT;
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
                                <h2> Dunbar Contacts </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4> Dunbar Contacts</h4>
                                </div>

                                <table id="contacts" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Apt Size</th>
                                            <th>Max Rental Price</th>
                                            <th>Open House</th>
                                            <th>Created At</th>
<!--                                            <th>Actions</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($objDunbarContacts as $contacts):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $contacts->$contact_first_name . ' ' . $contacts->$contact_last_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $contacts->$contact_email_address; ?>
                                                </td>
                                                <td>
                                                    <?php echo $contacts->$contact_apt_size; ?>
                                                </td>
                                                <td>
                                                    <?php echo $contacts->$contact_phone_number; ?>
                                                </td>
                                                <td>
                                                    <?php echo $contacts->$contact_max_rental_price; ?> USD
                                                </td>
                                                <td>
                                                    <?php if (empty($contacts->$contact_private_openhouse_date) && empty($contacts->$contact_openhouse_time)) { ?>
                                                        <?php echo $contacts->$contact_open_house; ?>
                                                    <?php } else { ?>
                                                        <span class="label label-bohemia">Private</span> 
                                                        <?php
                                                        echo date('D', strtotime($contacts->$contact_private_openhouse_date)) . ' ' . date('d F Y', strtotime($contacts->$contact_private_openhouse_date)) . ' - ' . $contacts->$contact_openhouse_time;
                                                        ?>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <?php echo $contacts->$contact_created_at; ?>
                                                </td>
                                            </tr>

                                            <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Apt Size</th>
                                            <th>Max Rental Price</th>
                                            <th>Open House</th>
                                            <th>Created At</th>
<!--                                            <th>Actions</th>-->
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="ln_solid"></div>
                                <script>
                                    $(document).ready(function () {
//                                        DUNBAR CONTACTS TABLE SETTINGS
                                        $('#contacts').DataTable({
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
                                            },
                                            "order": [[0, 'desc']]
                                        });
                                        $contacts_table = $('table#contacts').DataTable();
                                    });

                                </script>
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