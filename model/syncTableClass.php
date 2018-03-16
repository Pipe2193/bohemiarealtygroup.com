<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of syncTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class syncTableClass extends syncBaseTableClass {

  /**
   * 
   * @param type $sync_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewSync($sync_hash) {
    try {
      $sql = 'SELECT ' . syncTableClass::getNameField(syncTableClass::ID) . ' AS sync_id '
              . ' FROM ' . syncTableClass::getNameTable()
              . ' WHERE ' . syncTableClass::getNameField(syncTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . syncTableClass::getNameField(syncTableClass::SYNC_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $sync_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sync_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $sync_id
   * @return type
   * @throws PDOException
   */
  public static function getSyncSource($sync_id) {
    try {
      $sql = 'SELECT ' . syncTableClass::getNameField(syncTableClass::SOURCE_ID_SOURCE) . ' AS source_id'
              . ' FROM ' . syncTableClass::getNameTable()
              . ' WHERE ' . syncTableClass::getNameField(syncTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . syncTableClass::getNameField(syncTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $sync_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->source_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
