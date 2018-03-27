<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of agentGroupTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class agentGroupTableClass extends agentGroupBaseTableClass {

    /**
     * 
     * @param type $agent_group_id
     * @return type
     * @throws PDOException
     */
    public static function getAgentGroupName($agent_group_id) {
        try {
            $sql = 'SELECT ' . agentGroupTableClass::getNameField(agentGroupTableClass::AGENT_GROUP_NAME) . ' AS agent_group_name '
                    . ' FROM ' . agentGroupTableClass::getNameTable()
                    . ' WHERE ' . agentGroupTableClass::getNameField(agentGroupTableClass::DELETED_AT) . ' IS NULL '
                    . ' AND ' . agentGroupTableClass::getNameField(agentGroupTableClass::ID) . ' = :id ';
            $params = array(
                ':id' => $agent_group_id,
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer[0]->agent_group_name : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
