<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of salesListingTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class salesListingTableClass extends salesListingBaseTableClass {

/**
 * 
 * @param type $sales_listing_id
 * @return type
 * @throws PDOException
 */
  public static function getSalesListingHash($sales_listing_id) {
    try {
      $sql = 'SELECT ' . saleslistingTableClass::getNameField(saleslistingTableClass::SALES_LISTING_HASH) . ' AS sales_listing_hash '
              . ' FROM ' . saleslistingTableClass::getNameTable()
              . ' WHERE ' . saleslistingTableClass::getNameField(saleslistingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . saleslistingTableClass::getNameField(saleslistingTableClass::ID) . ' = :id';
      $params = array(
          ':id' => $sales_listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_listing_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

/**
 * 
 * @param type $sales_listing_hash
 * @return type
 * @throws PDOException
 */
  public static function getSalesListingId($sales_listing_hash) {
    try {
      $sql = 'SELECT ' . saleslistingTableClass::getNameField(saleslistingTableClass::ID) . ' AS sales_listing_id '
              . ' FROM ' . saleslistingTableClass::getNameTable()
              . ' WHERE ' . saleslistingTableClass::getNameField(saleslistingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . saleslistingTableClass::getNameField(saleslistingTableClass::SALES_LISTING_HASH) . ' = :hash';
      $params = array(
          ':hash' => $sales_listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->sales_listing_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }


}
