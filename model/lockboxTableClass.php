<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of lockboxTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class lockboxTableClass extends lockboxBaseTableClass {

  /**
   * 
   * @param type $lockbox_hash
   * @return type
   * @throws PDOException
   */
  public static function getLockboxIdByHash($lockbox_hash) {
    try {
      $sql = 'SELECT ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ' as id_lockbox '
              . ' FROM ' . lockboxTableClass::getNameTable()
              . ' WHERE ' . lockboxTableClass::getNameField(lockboxTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $lockbox_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->id_lockbox : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $lockbox_id
   * @return type
   * @throws PDOException
   */
  public static function isMaintenance($lockbox_id) {
    try {
      $sql = 'SELECT ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ', '
              . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' '
              . ' FROM ' . lockboxTableClass::getNameTable()
              . ' WHERE ' . lockboxTableClass::getNameField(lockboxTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ' = :id'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' = :status';
      $params = array(
          ':id' => $lockbox_id,
          ':status' => 2
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $lockbox_id
   * @return type
   * @throws PDOException
   */
  public static function isRemoved($lockbox_id) {
    try {
      $sql = 'SELECT ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ', '
              . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' '
              . ' FROM ' . lockboxTableClass::getNameTable()
              . ' WHERE ' . lockboxTableClass::getNameField(lockboxTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ' = :id'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' = :status';
      $params = array(
          ':id' => $lockbox_id,
          ':status' => 3
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $lockbox_id
   * @return type
   * @throws PDOException
   */
  public static function isActivated($lockbox_id) {
    try {
      $sql = 'SELECT ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ', '
              . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' '
              . ' FROM ' . lockboxTableClass::getNameTable()
              . ' WHERE ' . lockboxTableClass::getNameField(lockboxTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::ID) . ' = :id'
              . ' AND ' . lockboxTableClass::getNameField(lockboxTableClass::LOCKBOX_STATUS) . ' = :status';
      $params = array(
          ':id' => $lockbox_id,
          ':status' => 1
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
