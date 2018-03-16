<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of moduleTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class moduleTableClass extends moduleBaseTableClass {

  /**
   * 
   * @param type $module_id
   * @return type
   * @throws PDOException
   */
  public static function getModuleName($module_id) {
    try {
      $sql = 'SELECT ' . moduleTableClass::getNameField(moduleTableClass::ID) . ', '
              . moduleTableClass::getNameField(moduleTableClass::MODULE_NAME) . ' AS module'
              . ' FROM  ' . moduleTableClass::getNameTable()
              . ' WHERE ' . moduleTableClass::getNameField(moduleTableClass::DELETED_AT) . '  IS NULL'
              . ' AND ' . moduleTableClass::getNameField(moduleTableClass::ID) . '  = :id';
      $params = array(
          ':id' => $module_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->module : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
