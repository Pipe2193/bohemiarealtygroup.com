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

      if (request::getInstance()->isMethod("GET")) {
        if (isset($_GET['manage_files'])) {
          $id_landlord = $_GET['manage_files'];

          /**
           * file info
           */
          $files_fields = array(
              fileTableClass::ID,
              fileTableClass::FILE_NAME,
              fileTableClass::FILE_PATH_FILE,
              fileTableClass::FILE_TYPE,
              fileTableClass::META_DESCRIPTION_FILE,
              fileTableClass::LANDLORD_ID_LANDLORD,
              fileTableClass::FILE_HASH,
              fileTableClass::CREATED_AT,
              fileTableClass::UPDATED_AT
          );
          $where_files = array(
              fileTableClass::LANDLORD_ID_LANDLORD => $id_landlord
          );
          $objFiles = fileTableClass::getAll($files_fields, true, null, null, null, null, $where_files);

          /** FILE INSTANCES* */
          $file_id = fileTableClass::ID;
          $file_name = fileTableClass::FILE_NAME;
          $file_path_name = fileTableClass::FILE_PATH_FILE;
          $file_type = fileTableClass::FILE_TYPE;
          $file_meta_description_file = fileTableClass::META_DESCRIPTION_FILE;
          $landlord_id_landlord = fileTableClass::LANDLORD_ID_LANDLORD;
          $file_hash = fileTableClass::FILE_HASH;
          $file_created_at = fileTableClass::CREATED_AT;
          $file_updated_at = fileTableClass::UPDATED_AT;

          foreach ($objFiles as $document) {

            $file_id_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $document->$file_id . ' </button>';
            $file_name_field = '<a target="_blank" href="' . config::getUrlBase() . 'cust_files/files/' . fileTableClass::getFilePath($document->$file_id, $document->$file_type, $document->$landlord_id_landlord) . '" class="mdl-button mdl-js-button mdl-button--primary" type="button"><u><i class="fa fa-download" aria-hidden="true"></i> ' . $document->$file_name . '</u> </a>';
            if (empty($document->$file_meta_description_file)) {
              $meta_description_file_field = '<button  class="mdl-button mdl-js-button mdl-button--info" type="button"> No Description </button>';
            } else {
              $meta_description_file_field = htmlentities($document->$file_meta_description_file, ENT_QUOTES);
            }
            $file_type_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $document->$file_type . ' </button>';
            $file_created_at_field = '<button  class="mdl-button mdl-js-button" type="button"> ' . $document->$file_created_at . ' </button>';
            $file_updated_at_field = '<button  class="mdl-button mdl-js-button mdl-button--primary" type="button"> ' . $document->$file_created_at . ' </button>';
            $actions = '';
            $actions .= '<a target="_blank" href="' . config::getUrlBase() . 'cust_files/files/' . fileTableClass::getFilePath($document->$file_id, $document->$file_type, $document->$landlord_id_landlord) . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="button" download ><i class="fa fa-download" aria-hidden="true"></i> Download</a>';
            $actions .= '<button data-hash="' . $document->$file_id . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnEdit_document" type="button"><i class="fa fa-upload" aria-hidden="true"></i> Upload New Version</button>';
            $actions .= '<button disabled data-id="' . $document->$file_hash . '" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btnDelete_document" type="button" data-toggle="tooltip" data-placement="top" title="Delete File ' . $document->$file_name . '"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';

            $subdata = array();
            $subdata[] = $file_id_field;
            $subdata[] = $file_name_field;
            $subdata[] = $meta_description_file_field;
            $subdata[] = $file_type_field;
            $subdata[] = $file_created_at_field;
            $subdata[] = $file_updated_at_field;
            $subdata[] = $actions;
            $data[] = $subdata;
          }

          if (empty($data)) {
            $data = 0;
          } else {
            $data = $data;
          }

          $json_data = array(
              "draw" => intval(request::getInstance()->getGet('draw')),
              "recordsTotal" => intval(count($objFiles)),
              "recordsFiltered" => intval(count($objFiles)),
              "data" => $data
          );

          echo json_encode($json_data);
        }
      }

      /**
       * upload document parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['landlord_hash_document'])) {
          $landlord_hash = request::getInstance()->getPost("landlord_hash_document");
          ?>
          <script>
            $(document).ready(function () {
                $('#upload_document').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="upload_document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title">  <i class="fa fa-file-image-o" aria-hidden="true"></i> Add Document - <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> <?php echo landlordTableClass::getLandlordName($landlord_hash); ?></b></button> </h4>
                      </div>
                      <div class="modal-body">

                          <form id="upload_file" class="form-horizontal form-label-left input_mask" role="form" enctype="multipart/form-data"  method="POST" action="<?php echo routing::getInstance()->getUrlWeb("file", "create"); ?>">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true); ?>"> Landlord</label>
                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>" class="form-control" required>
                                          <?php
                                          foreach ($this->getLandlordByHash($landlord_hash) as $landlord):
                                            ?>
                                            <option value="<?php echo $landlord->id_landlord ?>" selected><?php echo $landlord->description_landlord; ?></option>
                                            <?php
                                          endforeach;
                                          ?>
                                      </select>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>"> Type</label>
                                      <select name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>
                                          <option value="Application">Application</option>
                                          <option value="Lease">Lease</option>
                                          <option value="Rental Docs">Rental Docs</option>
                                          <option value="Sales Docs">Sales Docs</option>
                                          <option value="Manuals">Manuals</option>
                                          <option value="Services">Services</option>
                                          <option value="Other">Other</option>
                                          <option value="Marketing">Marketing</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true); ?>"> Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>" placeholder="document name" required>
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true); ?>"> Select File</label>
                                      <input type="file" class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true) ?>" accept=".pdf,.doc,.docx" required>
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>"> Description</label>
                                      <textarea class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>" rows="5" placeholder="document description ..." ></textarea>
                                      <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>

                              <div class="form-group">

                                  <div class="text-center">
                                      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Document</button>
                                  </div>
                              </div>

                          </form>
                          <script type="text/javascript">
                            $(document).ready(function () {
                                $('#upload_file').formValidation({
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

          <?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The Landlord is required'
                                                }
                                            }
                                        },
          <?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The File Type is required'
                                                }

                                            }
                                        },
          <?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The File Name is required'
                                                }
                                            }
                                        },
          <?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'Select a File is required'
                                                }
                                            }
                                        }
                                    }
                                });

                            });
                          </script>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }

      /**
       * edit upload document parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['edit_document_hash'])) {
          $document_id = request::getInstance()->getPost("edit_document_hash");

          $files_fields = array(
              fileTableClass::ID,
              fileTableClass::FILE_NAME,
              fileTableClass::FILE_PATH_FILE,
              fileTableClass::FILE_TYPE,
              fileTableClass::LANDLORD_ID_LANDLORD,
              fileTableClass::META_DESCRIPTION_FILE,
          );
          $where = array(
              fileTableClass::ID => $document_id
          );

          $objFile = fileTableClass::getAll($files_fields, true, null, null, null, null, $where);
          
          $file_id = fileTableClass::ID;
          $file_file_name = fileTableClass::FILE_NAME;
          $file_file_path_file = fileTableClass::FILE_PATH_FILE;
          $file_file_type = fileTableClass::FILE_TYPE;
          $file_file_landlord_id = fileTableClass::LANDLORD_ID_LANDLORD;
          $file_meta_description = fileTableClass::META_DESCRIPTION_FILE;

          $landlord_hash = landlordTableClass::getLandlordHash($objFile[0]->$file_file_landlord_id);
          ?>
          <script>
            $(document).ready(function () {
                $('#edit_upload_document').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="edit_upload_document" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title">  <i class="fa fa-file-image-o" aria-hidden="true"></i> Edit Document - <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> <?php echo landlordTableClass::getLandlordNameById($objFile[0]->$file_file_landlord_id); ?></b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <form id="upload_file" class="form-horizontal form-label-left input_mask" role="form" enctype="multipart/form-data"  method="POST" action="<?php echo routing::getInstance()->getUrlWeb("file", "update"); ?>">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true); ?>"> Landlord</label>
                                      <select id="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>" name="<?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>" class="form-control" required>
                                          <?php
                                          foreach ($this->getLandlordByHash($landlord_hash) as $landlord):
                                            ?>
                                            <option value="<?php echo $landlord->id_landlord ?>" selected><?php echo $landlord->description_landlord; ?></option>
                                            <?php
                                          endforeach;
                                          ?>
                                      </select>
                                  </div>
                                  <input type="hidden"  id="<?php echo fileTableClass::getNameField(fileTableClass::ID, true); ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::ID, true); ?>"  <?php echo (!empty($objFile[0]->$file_id)) ? 'value="' . $objFile[0]->$file_id . '"' : ''; ?>>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>"> Type</label>
                                      <select name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true); ?>" class="form-control" required>
                                          <option value="">Select Option</option>
                                          <option value="Application" <?php echo ($objFile[0]->$file_file_type === "Application") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Application") ? 'ACTIVE:' : ''; ?> Application</option>
                                          <option value="Lease" <?php echo ($objFile[0]->$file_file_type === "Lease") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Lease") ? 'ACTIVE:' : ''; ?> Lease</option>
                                          <option value="Rental Docs" <?php echo ($objFile[0]->$file_file_type === "Rental Docs") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Rental Docs") ? 'ACTIVE:' : ''; ?> Rental Docs</option>
                                          <option value="Sales Docs" <?php echo ($objFile[0]->$file_file_type === "Sales Docs") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Sales Docs") ? 'ACTIVE:' : ''; ?> Sales Docs</option>
                                          <option value="Manuals" <?php echo ($objFile[0]->$file_file_type === "Manuals") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Manuals") ? 'ACTIVE:' : ''; ?> Manuals</option>
                                          <option value="Services" <?php echo ($objFile[0]->$file_file_type === "Services") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Services") ? 'ACTIVE:' : ''; ?> Services</option>
                                          <option value="Other" <?php echo ($objFile[0]->$file_file_type === "Other") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Other") ? 'ACTIVE:' : ''; ?> Other</option>
                                          <option value="Marketing" <?php echo ($objFile[0]->$file_file_type === "Marketing") ? 'selected' : ''; ?>><?php echo ($objFile[0]->$file_file_type === "Marketing") ? 'ACTIVE:' : ''; ?> Marketing</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                      <div class="panel panel-success">
                                          <div class="panel-body">
                                              <div class="btn-group  btn-group-sm pull-right">
                                                  <span><b><i class="fa fa-file-text-o"></i> <?php echo $objFile[0]->$file_file_path_file; ?></b></span>   <a target="_blank" href="<?php echo config::getUrlBase() . 'cust_files/files/' . fileTableClass::getFilePath($objFile[0]->$file_id, $objFile[0]->$file_file_type, $objFile[0]->$file_file_landlord_id); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" type="button" download ><i class="fa fa-download" aria-hidden="true"></i> View / Download</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true); ?>"> Name</label>
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>" <?php echo (!empty($objFile[0]->$file_file_name)) ? 'value="' . $objFile[0]->$file_file_name . '"' : ''; ?> placeholder="document name" required>
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true); ?>"> Select File</label>
                                      <input type="file" class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true) ?>" accept=".pdf,.doc,.docx" >
                                      <span class=" form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                      <label for="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>"> Description</label>
                                      <textarea class="form-control has-feedback-left" id="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>" name="<?php echo fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true) ?>" rows="5" placeholder="document description ..." ><?php echo (!empty($objFile[0]->$file_meta_description)) ? $objFile[0]->$file_meta_description : ''; ?></textarea>
                                      <span class="fa fa-sticky-note form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                              </div>

                              <div class="form-group">

                                  <div class="text-center">
                                      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Update Document</button>
                                  </div>
                              </div>

                          </form>
                          <script type="text/javascript">
                            $(document).ready(function () {
                                $('#upload_file').formValidation({
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

          <?php echo landlordTableClass::getNameField(landlordTableClass::ID, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The Landlord is required'
                                                }
                                            }
                                        },
          <?php echo fileTableClass::getNameField(fileTableClass::FILE_TYPE, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The File Type is required'
                                                }

                                            }
                                        },
          <?php echo fileTableClass::getNameField(fileTableClass::FILE_NAME, true) ?>: {
                                            validators: {
                                                notEmpty: {
                                                    message: 'The File Name is required'
                                                }
                                            }
                                        }
                                    }
                                });

                            });
                          </script>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
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

  public function getLandlordByHash($hash) {

    $fields_landlord = array(
        landlordTableClass::ID,
        landlordTableClass::DESCRIPTION_LANDLORD,
        landlordTableClass::LANDLORD_HASH
    );
    $landlord_where = array(
        landlordTableClass::LANDLORD_HASH => $hash
    );
    $objLandlord = landlordTableClass::getAll($fields_landlord, true, null, null, null, null, $landlord_where);
    return $objLandlord;
  }

}
