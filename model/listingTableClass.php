<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of listingTableClass
 *
 * @author Andres Felipe Alvarez <andresf9321@gmail.com>
 */
class listingTableClass extends listingBaseTableClass {

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function getIdNewListing($listing_hash) {
    try {
      $sql = 'SELECT ' . listingTableClass::ID . ' AS listing_id '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::LISTING_HASH . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function getListingStatusByHash($listing_hash) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::STATUS) . ' AS listing_status '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_status : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $table
   * @param type $fields
   * @param type $sSearch
   * @param type $deletedLogical
   * @param type $orderBy
   * @param type $order
   * @param type $limit
   * @param type $offset
   * @param type $where
   * @param type $like
   * @return type
   * @throws PDOException
   */
  public static function sSearchListing($table, $fields, $sSearch, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $like = null) {
    try {
      $sql = 'SELECT ';

      foreach ($fields as $field) {
        $sql = $sql . $table . '.' . $field . ', ';
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . ' FROM ' . $table;

      $flag = false;

      if ($deletedLogical === true) {
        $sql = $sql . ' WHERE ' . $table . '.' . 'deleted_at' . ' IS NULL';
        $flag = true;
      }

      if ($deletedLogical === false and is_array($where) === true) {
//$sql = $sql . ' WHERE ';
        $flag = false;
      }

      /**
       * array(
       *    campo => valor,
       *    campo => array(
       *      fecha1,
       *      fecha2
       *    ),
       *    0 => valorSQL
       * )
       */
      if (is_array($where) === true) {
        foreach ($where as $field => $value) {
          if (is_array($value)) {
            if ($flag === false) {
              $sql = $sql . ' WHERE ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1])) ? $value[1] : "'$value[1]'") . ' ';
              $flag = true;
            } else {
              $sql = $sql . ' AND ' . $field . ' BETWEEN ' . ((is_numeric($value[0])) ? $value[0] : "'$value[0]'") . ' AND ' . ((is_numeric($value[1])) ? $value[1] : "'$value[1]'") . ' ';
            }
          } else {
            if ($flag === false) {
              if (is_numeric($field)) {
                $sql = $sql . ' WHERE ' . $value . ' ';
              } else {
                $sql = $sql . ' WHERE ' . $field . ' = ' . ((is_numeric($value)) ? $value : "'$value'") . ' ';
              }
              $flag = true;
            } else {
              if (is_numeric($field)) {
                $sql = $sql . ' AND ' . $value . ' ';
              } else {
                $sql = $sql . ' AND ' . $field . ' = ' . ((is_numeric($value)) ? $value : "'$value'") . ' ';
              }
            }
          }
        }
      }


      if (is_array($like) === true) {
        foreach ($like as $field => $value) {

          if ($flag === false) {
            $sql = $sql . $field . ' LIKE "%' . $sSearch . '%"';
            $flag = true;
          } else {
            $sql = $sql . ' OR ' . $field . ' LIKE "%' . $sSearch . '%"';
          }
        }
      }



      if ($orderBy !== null) {
        $sql = $sql . ' ORDER BY ';

        foreach ($orderBy as $value) {
          $sql = $sql . $table . '.' . $value . ', ';
        }

        $newLeng = strlen($sql) - 2;
        $sql = substr($sql, 0, $newLeng) . (($order !== null) ? " $order" : '');
      }

      if ($limit !== null and $offset === null) {
        $sql = $sql . ' LIMIT ' . $limit;
      }


      if ($limit !== null and $offset !== null) {
        $sql = $sql . ' LIMIT ' . $limit . ' OFFSET ' . $offset;
      }

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

//  
//   public static function getListingSSearch($limit, $offset) {
//    try {
//      $sql = 'SELECT * '
//              . ' FROM ' . listingTableClass::getNameTable()
//              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
//              . ' ORDER  BY' . listingTableClass::CREATED_AT . ' DESC '
//              . ' LIMIT :limit OFFSET :offset ' 
//              . ' AND ' . listingTableClass::LISTING_HASH . ' = :hash ';
//      $params = array(
//          ':limit' => $limit,
//          ':offset' => $offset,
//      );
//      $answer = model::getInstance()->prepare($sql);
//      $answer->execute($params);
//      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
//      return (count($answer) > 0 ) ? $answer[0]->listing_id : false;
//    } catch (PDOException $exc) {
//      throw $exc;
//    }
//  }

  /**
   * 
   * @param type $listing_id
   * @return type
   * @throws PDOException
   */
  public static function getListingHashById($listing_id) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ' AS listing_hash '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::getNameField(listingTableClass::ID) . ' = :id ';
      $params = array(
          ':id' => $listing_id,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_hash : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $listing_id
   * @return type
   */
  public static function getListingById($listing_id) {

    $listing_fields = array(
        listingTableClass::ID,
        listingTableClass::RENT_LISTING,
        listingTableClass::UNIT_NUMBER_LISTING,
        listingTableClass::BATH_SIZE_LISTING,
        listingTableClass::FEE_OP_LISTING,
        listingTableClass::CUSTOM_FEE_OP_LISTING,
        listingTableClass::LEASE_TERM_START,
        listingTableClass::LEASE_TERM_END,
        listingTableClass::ACCESS_ID_ACCESS,
        listingTableClass::LOCKBOX_LISTING,
        listingTableClass::FLOOR_NUMBER_LISTING,
        listingTableClass::NOTES_LISTING,
        listingTableClass::DESCRIPTION_LISTING,
        listingTableClass::CONTACT_FIRST_NAME,
        listingTableClass::CONTACT_MIDDLE_NAME,
        listingTableClass::CONTACT_LAST_NAME,
        listingTableClass::CONTACT_EMAIL_ADDRESS,
        listingTableClass::CONTACT_PHONE_NUMBER,
        listingTableClass::CONTACT_NOTES,
        listingTableClass::STATUS,
        listingTableClass::EMAIL_NOTIFICATION_STATUS,
        listingTableClass::LISTING_SIZE_ID_LISTING_SIZE,
        listingTableClass::BUILDING_ID_BUILDING,
        listingTableClass::LANDLORD_ID_LANDLORD,
        listingTableClass::LISTING_FEATURES_ID_LISTING_FEATURES,
        listingTableClass::LISTING_HASH,
        listingTableClass::CREATED_AT,
        listingTableClass::UPDATED_AT,
        listingTableClass::SYNC_ID_SYNC
    );
    $where_listing = array(
        listingTableClass::ID => $listing_id,
    );

    $objListing = listingTableClass::getAll($listing_fields, true, null, null, null, null, $where_listing);

    return $objListing;
  }

  /**
   * 
   * @param type $listing_hash
   * @return type
   * @throws PDOException
   */
  public static function VerifyListingHash($listing_hash) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::ID) . ' AS listing_id '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL'
              . ' AND ' . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ' = :hash ';
      $params = array(
          ':hash' => $listing_hash,
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer[0]->listing_id : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  /**
   * 
   * @param type $landlord_id
   * @param type $listing_status
   * @return type
   * @throws PDOException
   */
  public static function getDunbarListings($landlord_id, $listing_status) {
    try {
      $sql = 'SELECT ' . listingTableClass::getNameField(listingTableClass::ID) . ', '
              . listingTableClass::getNameField(listingTableClass::RENT_LISTING) . ', '
              . listingTableClass::getNameField(listingTableClass::UNIT_NUMBER_LISTING) . ', '
              . listingTableClass::getNameField(listingTableClass::BATH_SIZE_LISTING) . ', '
              . listingTableClass::getNameField(listingTableClass::LEASE_TERM_START) . ', '
              . listingTableClass::getNameField(listingTableClass::LEASE_TERM_END) . ', '
              . listingTableClass::getNameField(listingTableClass::DESCRIPTION_LISTING) . ', '
              . listingTableClass::getNameField(listingTableClass::STATUS) . ', '
              . listingTableClass::getNameField(listingTableClass::LISTING_SIZE_ID_LISTING_SIZE) . ', '
              . listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING) . ', '
              . listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD) . ', '
              . listingTableClass::getNameField(listingTableClass::LISTING_HASH) . ', '
              . listingTableClass::getNameField(listingTableClass::CREATED_AT) . ', '
              . listingTableClass::getNameField(listingTableClass::UPDATED_AT) . ' '
              . ' FROM ' . listingTableClass::getNameTable()
              . ' WHERE ' . listingTableClass::getNameField(listingTableClass::DELETED_AT) . ' IS NULL '
              . ' AND ' . listingTableClass::getNameField(listingTableClass::LANDLORD_ID_LANDLORD) . ' = :landlord_id '
              . ' AND ' . listingTableClass::getNameField(listingTableClass::STATUS) . ' = :status '
              . ' AND ' . listingTableClass::getNameField(listingTableClass::BUILDING_ID_BUILDING) . ' IN (:bld_1, :bld_2, :bld_3, :bld_4, :bld_5, :bld_6, :bld_7, :bld_8, :bld_9, :bld_10)';
      $params = array(
          ':landlord_id' => $landlord_id,
          ':status' => $listing_status,
          ':bld_1' => 10891,
          ':bld_2' => 6355,
          ':bld_3' => 6302,
          ':bld_4' => 8090,
          ':bld_5' => 11458,
          ':bld_6' => 10892,
          ':bld_7' => 6297,
          ':bld_8' => 6295,
          ':bld_9' => 10961,
          ':bld_10' => 6297,
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
