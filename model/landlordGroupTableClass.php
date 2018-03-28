<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of landlordGroupTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class landlordGroupTableClass extends landlordGroupBaseTableClass {

    /**
     * 
     * @param type $landlord_group_hash
     * @return type
     * @throws PDOException
     */
    public static function getLandlordGroupIdByHash($landlord_group_hash) {
        try {
            $sql = 'SELECT ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_HASH) . ', '
                    . landlordGroupTableClass::getNameField(landlordGroupTableClass::ID) . ' AS landlord_group_id'
                    . ' FROM  ' . landlordGroupTableClass::getNameTable()
                    . ' WHERE ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::DELETED_AT) . '  IS NULL'
                    . ' AND ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_HASH) . '  = :hash';
            $params = array(
                ':hash' => $landlord_group_hash,
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer[0]->landlord_group_id : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    /**
     * 
     * @param type $landlord_group_id
     * @return type
     * @throws PDOException
     */
    public static function getLandlordGroupNameById($landlord_group_id) {
        try {
            $sql = 'SELECT ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::ID) . ', '
                    . landlordGroupTableClass::getNameField(landlordGroupTableClass::LANDLORD_GROUP_NAME) . ' AS landlord_group_name'
                    . ' FROM  ' . landlordGroupTableClass::getNameTable()
                    . ' WHERE ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::DELETED_AT) . '  IS NULL'
                    . ' AND ' . landlordGroupTableClass::getNameField(landlordGroupTableClass::ID) . '  = :id';
            $params = array(
                ':id' => $landlord_group_id,
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer[0]->landlord_group_name : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
