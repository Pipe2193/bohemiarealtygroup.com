<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of salesBuildingTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class salesBuildingTableClass extends salesBuildingBaseTableClass {

  /**
   * 
   * @param type $sales_building_id
   * @return type
   * @throws PDOException
   */
  public static function getSalesBuildingHash($sales_building_id) {
    try {
      $sql = 'SELECT ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH) . ' AS sales_building_hash '
              . ' FROM ' . salesBuildingTableClass::getNameTable()
              . ' WHERE ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $sales_building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_building_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $sales_building_hash
   * @return type
   * @throws PDOException
   */
  public static function getSalesBuildingId($sales_building_hash) {
    try {
      $sql = 'SELECT ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ID) . ' AS sales_building_id '
              . ' FROM ' . salesBuildingTableClass::getNameTable()
              . ' WHERE ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH) . ' = :hash';
      $params = array(
          ':hash' => $sales_building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_building_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $sales_building_hash
   * @return type
   * @throws PDOException
   */
  public static function getSalesBuildingAddressByHash($sales_building_hash) {
    try {
      $sql = 'SELECT ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ADDRESS) . ' AS sales_building_address '
              . ' FROM ' . salesBuildingTableClass::getNameTable()
              . ' WHERE ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::SALES_BUILDING_HASH) . ' = :hash';
      $params = array(
          ':hash' => $sales_building_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_building_address : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $sales_building_id
   * @return type
   * @throws PDOException
   */
    public static function getSalesBuildingAddressById($sales_building_id) {
    try {
      $sql = 'SELECT ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ADDRESS) . ' AS sales_building_address '
              . ' FROM ' . salesBuildingTableClass::getNameTable()
              . ' WHERE ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $sales_building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_building_address : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  /**
   * 
   * @param type $sales_building_id
   * @return type
   * @throws PDOException
   */
  public static function getSalesBuildingNeighborhood($sales_building_id) {
    try {
      $sql = 'SELECT ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::NEIGHBORHOOD_NAME) . ' AS sales_building_neighborhood '
              . ' FROM ' . salesBuildingTableClass::getNameTable()
              . ' WHERE ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . salesBuildingTableClass::getNameField(salesBuildingTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $sales_building_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_building_neighborhood : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
