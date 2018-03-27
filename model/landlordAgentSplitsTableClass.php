<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\routing\routingClass as routing;

/**
 * Description of landlordAgentSplitsTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class landlordAgentSplitsTableClass extends landlordAgentSplitsBaseTableClass {

    /**
     * 
     * @param type $landlord_group_id
     * @return type
     * @throws PDOException
     */
    public static function getLandlordAgentSplits($landlord_group_id) {
        try {
            $sql = 'SELECT ' . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::ID) . ', '
                    . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::AGENT_GROUP_ID) . ', '
                    . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::AGENT_GROUP_PERCENT) . ', '
                    . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::LANDLORD_GROUP_ID) . ' '
                    . ' FROM ' . landlordAgentSplitsTableClass::getNameTable()
                    . ' WHERE ' . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::DELETED_AT) . ' IS NULL'
                    . ' AND ' . landlordAgentSplitsTableClass::getNameField(landlordAgentSplitsTableClass::LANDLORD_GROUP_ID) . ' = :landlord_group_id';
            $params = array(
                ':landlord_group_id' => $landlord_group_id,
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
