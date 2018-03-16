<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of createActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $landlord_id = request::getInstance()->getPost(landlordTableClass::getNameField(landlordTableClass::ID, true));
        $file_type = request::getInstance()->getPost(fileTableClass::getNameField(fileTableClass::FILE_TYPE, true));
        $file_name = request::getInstance()->getPost(fileTableClass::getNameField(fileTableClass::FILE_NAME, true));
        $file_path = request::getInstance()->getFile(fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true));
        $meta_description = request::getInstance()->getPost(fileTableClass::getNameField(fileTableClass::META_DESCRIPTION_FILE, true));
        $file_token = md5(md5(date('U')));
        if ($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["error"] == 0) {
          if (isset($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["type"])) {
            // direccion del archivo a subir

            $target_dir = config::getPathAbsolute() . "/web/cust_files/files/" . $landlord_id . "/" . $file_type . "/";
            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos

            if (!file_exists($target_dir)) {
              mkdir($target_dir, 0777, true);
              chmod($target_dir, 0777);
            }
            $upfile = basename($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["name"]);
            $file = basename($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["name"]);
            $carpeta = $target_dir;
            $target_file_ext = $carpeta . $upfile;

            $imageFileType = strtolower(pathinfo($target_file_ext, PATHINFO_EXTENSION));
            $new_file_name = str_replace(' ', '_', $file_name) . '.' . $imageFileType;
            $target_file = $carpeta . $new_file_name;


            $uploadOk = 1;

            // Check if file already exists
            if (file_exists($target_file)) {
              session::getInstance()->setError(" This file has already uploaded.");
              $uploadOk = 0;
            }
            // Check file size
            if ($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["size"] > 10485760) {
              session::getInstance()->setError(" Exceeded filesize limit. The Max filezise admitted is: 10 MB. Please, try again.");
              $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
              session::getInstance()->setError(" Invalid file format, only  DOC, DOCX & PDF  are allowed, please try again.");
              $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              session::getInstance()->setError(" Failed to upload file.");
              routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($landlord_id)));
              // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES[fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE, true)]["tmp_name"], $target_file)) {


                $files_fileds = array(
                    fileTableClass::LANDLORD_ID_LANDLORD => $landlord_id,
                    fileTableClass::FILE_NAME => $file_name,
                    fileTableClass::FILE_TYPE => $file_type,
                    fileTableClass::FILE_PATH_FILE => $new_file_name,
                    fileTableClass::META_DESCRIPTION_FILE => $meta_description,
                    fileTableClass::FILE_HASH => $file_token,
                );
                fileTableClass::insert($files_fileds);
                session::getInstance()->setSuccess("File uploaded successfully.");
                routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($landlord_id)));
              } else {
                session::getInstance()->setError(" Failed to move uploaded file.");
                routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($landlord_id)));
              }
            }
          }
        } else {
          session::getInstance()->setError(" Please select file to upload.");
          routing::getInstance()->redirect('landlord', 'manage', array(landlordTableClass::getNameField(landlordTableClass::LANDLORD_HASH, true) => landlordTableClass::getLandlordHash($landlord_id)));
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public static function getRentalAmenities() {

    $fields_rental_amenities = array(
        rentalAmenitiesTableClass::ID,
        rentalAmenitiesTableClass::DESCRIPTION_RENTAL_AMENITIES
    );
    $OrderBy_rental_amenities = array(
        rentalAmenitiesTableClass::ID
    );
    $objRentalAmenities = rentalAmenitiesTableClass::getAll($fields_rental_amenities, true, $OrderBy_rental_amenities, 'ASC');
    return $objRentalAmenities;
  }

}
