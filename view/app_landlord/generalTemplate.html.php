<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

/** PROCEDURES INSTANCES * */
$procedures_id = proceduresTableClass::ID;
$procedures_landlord_id_landlord = proceduresBaseTableClass::LANDLORD_ID_LANDLORD;
$procedures_content = proceduresTableClass::CONTENT;
$procedures_updated_at = proceduresTableClass::UPDATED_AT;
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
                                <h2><i class="fa fa-server" aria-hidden="true"></i> General Apps & Info </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="page-title-bohemia visible-xs">
                                    <h4 class="text-center"><i class="fa fa-server" aria-hidden="true"></i> General Apps & Info </h4>
                                </div>
                                </br>
                                
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#general_procedures"><b>Procedures</b></a></li>
                                    <li><a data-toggle="tab" href="#general_documents"><b>Documents (Applications, Leases, Rental Docs, Sales Docs, Manuals, Services, Marketing, Others)</b></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="general_procedures" class="tab-pane fade in active">
                                        </br>
                                        <?php if (empty($objProcedures)) { ?>

                                          <div class="alert alert-info alert-dismissible" role="alert">
                                              <p class="text-center">
                                                  <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Procedures found. </b> <br>
                                              </p>
                                          </div>
                                          <?php
                                        } else {
                                          ?>

                                          <?php foreach ($objProcedures as $procedures): ?>
                                            <div class="panel panel-success">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="btn-group  btn-group-sm pull-right">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "edit", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash(1) )) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-edit"></i> Edit Procedures</a>
                                                                <button  class="mdl-button mdl-js-button mdl-button--danger" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  <b>LAST UPDATE AT:</b> <?php echo $procedures->$procedures_updated_at; ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="container">
                                                <?php echo $procedures->$procedures_content; ?>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <a href="<?php echo routing::getInstance()->getUrlWeb("procedures", "edit", array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash(1))) ?>" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-edit"></i> Edit Procedures</a>
                                                </div>
                                            </div>
                                          <?php endforeach; ?>
                                        <?php } ?>
                                    </div>
                                    <div id="general_documents" class="tab-pane fade">
                                        </br>
                                        <div class="panel panel-success">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="btn-group  btn-group-sm pull-right">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                                            <button data-hash="<?php echo landlordTableClass::getLandlordHash(1); ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_document" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Document</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <?php if (empty($objFiles)) { ?>

                                          <div class="alert alert-info alert-dismissible" role="alert">
                                              <p class="text-center">
                                                  <b> <i class="fa fa-info-circle" aria-hidden="true"></i> Information: There are no Documents found. </b>  <button data-hash="<?php echo landlordTableClass::getLandlordHash(1); ?>"  class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnAdd_document" type="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Document</button> <br>
                                              </p>
                                          </div>
                                          <?php
                                        }
                                        ?>
                                        <table id="documents" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="filter"> ID</th>
                                                    <th>File Name</th>
                                                    <th> Description</th>
                                                    <th class="filter"> File Type</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tfoot>
                                                <tr>
                                                    <th class="filter"> ID</th>
                                                    <th>File Name</th>
                                                    <th> Description</th>
                                                    <th class="filter"> File Type</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div id="add_document_panel"></div>
                                <div id="edit_document_panel"></div>
                                <script>
                                  $(document).ready(function () {
                                      //DOCUMENTS TABLE SETTINGS 
                                      $('#documents').DataTable({
                                          responsive: true,
                                          "pageLength": 25,
                                          "order": [0, 'DESC'],
                                          "ajax": {
                                              url: "../../documents/ajax?manage_files=1",
                                              type: "GET"
                                          },
                                          "deferRender": true,
                                          initComplete: function () {
                                              this.api().columns(".filter").every(function () {
                                                  var column = this;
                                                  var select = $('<select><option value=""> Filter Option </option></select>')
                                                          .appendTo($(column.header()).empty())
                                                          .on('change', function () {
                                                              var val = $.fn.dataTable.util.escapeRegex(
                                                                      $(this).val()
                                                                      );

                                                              column
                                                                      .search(val ? '^' + val + '$' : '', true, false)
                                                                      .draw();
                                                          });

                                                  column.data().unique().sort().each(function (d, j) {
                                                      var String = d.substring(d.indexOf('">') + 2, d.lastIndexOf('</'));
                                                      select.append('<option value="' + String + '"> ' + String + ' </option>');
                                                  });
                                              });
                                          }
                                      });

                                      $documents = $('table#documents').DataTable();

                                      $(".btnAdd_document").on('click', function () {
                                          var landlord_hash = $(this).data("hash");
                                          var urlajax = url + 'documents/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('landlord_hash_document=' + landlord_hash),
                                              success: function (data) {

                                                  $("#add_document_panel").show();
                                                  //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#add_document_panel").html(data);
                                              }
                                          });
                                      });

                                      $documents.on('click', 'button.btnEdit_document', function () {
                                          var document_hash = $(this).data("hash");
                                          var urlajax = url + 'documents/ajax';
                                          $.ajax({
                                              async: true,
                                              type: "POST",
                                              dataType: "html",
                                              contentType: "application/x-www-form-urlencoded",
                                              url: urlajax,
                                              data: ('edit_document_hash=' + document_hash),
                                              success: function (data) {

                                                  $("#edit_document_panel").show();
                                                  //$('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                                                  $("#edit_document_panel").html(data);
                                              }
                                          });
                                      });
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

