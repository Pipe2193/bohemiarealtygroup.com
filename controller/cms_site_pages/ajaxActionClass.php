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

      if (request::getInstance()->isMethod("POST")) {

        if (request::getInstance()->hasFile("upfile")) {
//echo count($_FILES["file0"]["name"]);exit;
          if (!empty($_FILES["upfile"])) {

            if (isset($_FILES["upfile"]["type"])) {
// direccion del archivo a subir
//$customer_token = getCustomerToken(getIdCustomerSession()); //customer token
//$dealer = getCustomerDealer(getIdCustomerSession());
              $encriptToken = md5(date('U'));
              $upload_id = upload_file($encriptToken, 1);
              $data = array(
                  blogTableClass::ID => null,
                  blogTableClass::PAGE_TITLE_BLOG => $page_title_blog,
                  blogTableClass::PAGE_URL_BLOG => $page_url_blog,
                  blogTableClass::META_DESCRIPTION_BLOG => $meta_description_blog,
                  blogTableClass::TITLE_BLOG => $title_blog,
                  blogTableClass::BLOG_STATUS => $blog_status,
                  blogTableClass::BLOG_ADMIN_NOTES => $blog_admin_notes,
                  blogTableClass::BLOG_CONTENT => $blog_content,
                  blogTableClass::BLOG_HASH => $blog_hash,
                  blogTableClass::USUARIO_ID => $usuario_id
              );

              blogTableClass::insert($data);

              setSessionOnafAdmin("id_module", $upload_id);
              $customer = getInfoUploader($upload_id);
              $sessionPhotoid = session::getInstance()->setFlash("uploader_photoid", "");

              if (!isset($customer->filepath_uploader) && empty($customer->filepath_uploader) && !isset($sessionPhotoid)) {

//$dealer_hash = md5(md5($dealer));
                $target_dir = "../../cust_files/files_uploader/" . $encriptToken . "/";
//comprobamos si existe un directorio para subir el archivo
//si no es así, lo creamos

                if (!file_exists($target_dir)) {
                  mkdir($target_dir, 0777, true);
                  chmod($target_dir, 0777);
                }
                $upfile = basename($_FILES["upfile"]["name"]);
                $file = basename($_FILES["upfile"]["name"]);
                $dir_show_image = "cust_files/files_uploader/" . $encriptToken . "/" . $file;
                $carpeta = $target_dir;
                $target_file_ext = $carpeta . $upfile;

                $imageFileType = strtolower(pathinfo($target_file_ext, PATHINFO_EXTENSION));
                $target_file = $carpeta . $file;

                $uploadOk = 1;
// Check if image file is a actual image or fake image
//            $check = getimagesize($_FILES["upfile"]["tmp_name"]);
//            if ($check !== false) {
//                $messages[] = "This file is an Image - " . $check["mime"] . ".";
//                $uploadOk = 1;
//            } else {
//                $errors[] = "Error, this file it' not an image";
//                $uploadOk = 0;
//            }
// Check if file already exists
                if (file_exists($target_file)) {
                  $errors[] = $GLOBALS['upload_message_2'];
                  $uploadOk = 0;
                }
// Check file size
                if ($_FILES["upfile"]["size"] > 10485760) {
                  $errors[] = $GLOBALS['upload_message_3'];
                  $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
                  $errors[] = $GLOBALS['upload_message_4'];
                  $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  $errors[] = $GLOBALS['upload_message_5'];
// if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
                    updatePhotoId($dir_show_image, $upload_id);
                    setSessionOnafAdmin('photoid', $dir_show_image);
                    setSessionOnafAdmin('notification', '');

                    $messages[] = $GLOBALS['upload_message_6'];
                    ?>
                    <tr style="width:100%; display:inline-table;">
                        <td> <b>File 1:</b> </td>  
                        <td id="filename"><?php echo basename($_FILES["upfile"]["name"]) ?></td>
                    <script>
                      $(document).ready(function () {
                          $('.section_upload').hide();
                          $('#section_uploadbtn').hide();

                          var deleteImage = $("#deleteImage");
                          var filename = $("#filename");

                          deleteImage.click(function (e) {
                              var filenameval = filename.val();
                              $.ajax({
                                  async: false,
                                  type: "POST",
                                  dataType: "html",
                                  contentType: "application/x-www-form-urlencoded",
                                  url: urlajaxupload,
                                  data: ('deleteImage=' + filenameval),
                                  success: function (data) {
                                      window.location.reload();
                                  }
                              });
                          });
                      });
                    </script>
                    <td>
                        <button type="button" class="btn btn-danger delete_btn" id="deleteImage"><?php echo $GLOBALS['upload_message_7']; ?></button>
                    </td>
                    </tr>
                    <?php
                  } else {
                    $errors[] = $GLOBALS['upload_message_8'];
                  }
                }
              } else {
                $errors[] = $GLOBALS['upload_message_9'];
              }

              if (isset($errors)) {
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php
                    foreach ($errors as $error) {
                      echo"<p>$error</p>";
                    }
                    ?>
                </div>
                <?php
              }

              if (isset($messages)) {
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong><?php echo $GLOBALS['upload_message_11']; ?>!</strong> 
                    <?php
                    foreach ($messages as $message) {
                      echo"<p>$message</p>";
                    }
                    ?>
                </div>
                <?php
              }
            }
          }
        }
      }

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['deleteImage'])) {
          if (checkAccess() != TRUE) {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <p><?php echo $GLOBALS['upload_message_12']; ?></p>
            </div>
            <?php
          } else {
            $filenameDir = getPhotoId($_SESSION['onaf_uploader_id_module']);
            unlink("../../" . $filenameDir);
            unset($_SESSION['onaf_uploader_photoid']);
            deletePhotoId($_SESSION['onaf_uploader_id_module']);
          }
        }
      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["deleteBlog"])) {
          $deleteBlog = request::getInstance()->getPost("deleteBlog");
          ?>
          <div class="panel panel-danger">
              <div class="panel-body">
                  <div class=" pull-right">
                      <a class="btn btn-default btnClose_delete" type="button"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel </a>
                      <a href="<?php echo routing::getInstance()->getUrlWeb("cms_blogs", "delete", array(blogTableClass::getNameField(blogTableClass::BLOG_HASH, true) => $deleteBlog)); ?>" class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i> Confirm, Delete Blog </a>
                  </div>
              </div>
          </div>
          <div class="ln_solid"></div>
          <script>
            $(document).ready(function () {

                //button close delete user function
                var btnClose_delete = $(".btnClose_delete");
                $(btnClose_delete).on('click', function () {
                    $("#deleteBlog_panel").hide(300);
                    $('html, body').animate({scrollTop: $('body').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

//      if (request::getInstance()->isMethod("POST")) {
//        if (isset($_POST["block_id"])) {
//          $block_id = request::getInstance()->getPost("block_id");
//          $block_content = request::getInstance()->getPost("block_content");
//
//          $data_block = array(
//              blogGroupTableClass::BLOG_CONTENT => $block_content
//          );
//          $id_block = array(
//              blogGroupTableClass::ID => $block_id
//          );
//          blogGroupTableClass::update($id_block, $data_block);
//        }
//      }

      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["upload_block_id"])) {
          ?><script>
                      $(document).ready(function () {
                          $('#upload_file_modal').modal('show');
                      });
          </script>

          <div id="upload_file_modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" data-backdrop='static'>
              <div class="modal-dialog modal-lg">

                  <div class="modal-content">
                      <div class="modal-header bohemia_modal_header">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h3 class="modal-title"><i class="fa fa-upload" aria-hidden="true"></i><b> Upload Blog Image </b></h3>
                      </div>
                      <div class="modal-body">

                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">

                                  <?php if (!empty($uploadinfo1->filepath_uploader)) { ?>
                                    <div> <b>File 1:</b> </div> 
                                    <div id="filename"><?php echo getFileNamePhotoId($_SESSION['onaf_uploader_id_module']) ?></div>
                                    <script>
                                      $(document).ready(function () {
                                          $('.section_upload').hide();
                                          $('#section_uploadbtn').hide();

                                          var deleteImage = $("#deleteImage");
                                          var filename = $("#filename");

                                          deleteImage.click(function (e) {
                                              var filenameval = filename.val();
                                              $.ajax({
                                                  async: false,
                                                  type: "POST",
                                                  dataType: "html",
                                                  contentType: "application/x-www-form-urlencoded",
                                                  url: urlajaxupload,
                                                  data: ('deleteImage=' + filenameval),
                                                  success: function (data) {
                                                      window.location.reload();
                                                  }
                                              });
                                          });
                                      });
                                    </script>
                                    <div>    
                                        <button type="button" class="btn btn-danger delete_btn" id="deleteImage"><?php echo $GLOBALS ['upload_message_7']; ?></button>
                                    </div>
                                </div>
                            </div>
                          <?php } else { ?>


                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form id="upload">
                                        <div class="form-group">
                                            <p><small>Fields marked with (*) are mandatory.</small></p>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" name="profileLastName" id="profileLastName" placeholder="Alternative Text" required>
                                                <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" name="profileLastName" id="profileLastName" placeholder="Image Title Attribute" required>
                                                <span class="fa fa-file-image-o form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                                <textarea type="text" class="form-control has-feedback-left" id="" name="" placeholder=" Caption " required></textarea>
                                                <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                            <div id="image_preview_thumbnail">
                                                <div><b> Block Image</b></div>
                                                <img class="img-responsive blog_image"src="<?php echo routing::getInstance()->getUrlImg("CMS/cms_blogs/blog_thumbnail.jpg") ?>" alt="Thumbnail Blog Image">
                                                <button type="button" data-id="<?php echo $blocks[$arr]->$block_blog_id; ?>" class="btn btn-danger btn-block" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete  </button>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">
                                            <div class="section_upload"> <b>Upload File</b> 
                                                <input name="upfile" class="form-control inputpmi input_upload" accept="image/jpg, image/jpeg, image/png" type="file" id="upfile"/>
                                            </div>  
                                            <div class="ln_solid"></div>

                                            <div id="section_uploadbtn">
                                                <input type="button" id="uploadfile" class="btn btn-success btn-block btn_upload" value="UPLOAD" />
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                          <?php } ?>
                          <div class="ln_solid"></div>

                          <div class="messages"></div>
                      </div>

                      <div class="modal-footer">
                          <div class="form-group">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Close</button>
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

  public function getCredencials() {
    $credencials = array(
        credencialTableClass::ID,
        credencialTableClass::NOMBRE,
        credencialTableClass::CREATED_AT,
        credencialTableClass::UPDATED_AT,
        credencialTableClass::DELETED_AT,
    );
    $credencialOrderBy = array(
        credencialTableClass::ID
    );
    $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
    return $objCredencials;
  }

  public function getPetsPolicy() {
    $fields_pets_policy = array(
        petsPolicyTableClass::ID,
        petsPolicyTableClass::DESCRIPTION_PETS_CASE,
        petsPolicyTableClass::CREATED_AT,
        petsPolicyTableClass::UPDATED_AT,
        petsPolicyTableClass::DELETED_AT,
    );
    $OrderBy_pets_policy = array(
        petsPolicyTableClass::ID
    );
    $objPetsPolicy = petsPolicyTableClass::getAll($fields_pets_policy, true, $OrderBy_pets_policy, 'ASC');
    return $objPetsPolicy;
  }

  public static function getUsersProfiles() {

    $fields_profile = array(
        profileTableClass::FIRST_NAME,
        profileTableClass::MIDDLE_NAME,
        profileTableClass::LAST_NAME,
        profileTableClass::USUARIO_ID
    );
    $OrderBy_profile = array(
        profileTableClass::USUARIO_ID
    );
    $objProfiles = profileTableClass::getAll($fields_profile, true, $OrderBy_profile, 'ASC');


    return $objProfiles;
  }

  public function getListingType() {

    $fields_listing_type = array(
        listingTypeTableClass::ID,
        listingTypeTableClass::DESCRIPTION_LISTING_TYPE,
    );
    $OrderBy_listing_type = array(
        listingTypeTableClass::ID
    );
    $objListingType = listingTypeTableClass::getAll($fields_listing_type, true, $OrderBy_listing_type, 'ASC');
    return $objListingType;
  }

  public function getStates() {

    $fields_states = array(
        statesTableClass::ID,
        statesTableClass::STATE_NAME,
        statesTableClass::ACCRON
    );
    $OrderBy_states = array(
        statesTableClass::ID
    );
    $objStates = statesTableClass::getAll($fields_states, true, $OrderBy_states, 'ASC');
    return $objStates;
  }

}
