<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of fileTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class fileTableClass extends fileBaseTableClass {
  
  /**
   * 
   * @param type $file_id
   * @param type $landlord_id
   * @return type
   * @throws PDOException
   */
 public static function getFilePath($file_id, $file_type, $landlord_id) {
    try {
      $sql = 'SELECT ' . fileTableClass::getNameField(fileTableClass::ID) . ', '
              . fileTableClass::getNameField(fileTableClass::FILE_PATH_FILE) . ' AS path, '
              . fileTableClass::getNameField(fileTableClass::LANDLORD_ID_LANDLORD) . ' AS landlord, '
              . fileTableClass::getNameField(fileTableClass::FILE_TYPE) . ' AS type '
              . ' FROM  ' . fileTableClass::getNameTable()
              . ' WHERE ' . fileTableClass::getNameField(fileTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . fileTableClass::getNameField(fileTableClass::ID) . ' = :file_id '
              . ' AND ' . fileTableClass::getNameField(fileTableClass::LANDLORD_ID_LANDLORD) . ' = :landlord_id ';
      $params = array(
          ':file_id'=> $file_id,
          ':landlord_id' => $landlord_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->landlord . '/' . $answer[0]->type . '/' .$answer[0]->path : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
