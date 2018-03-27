<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;

/**
 * Description of appTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class appTableClass extends appBaseTableClass {

    /**
     * 
     * @param type $token
     * @return type
     * @throws PDOException
     */
    public static function verifyAppToken($token) {
        try {
            $sql = 'SELECT ' . appTableClass::getNameField(appTableClass::APP_TOKEN) . ' '
                    . ' FROM ' . appTableClass::getNameTable()
                    . ' WHERE ' . appTableClass::getNameField(appTableClass::DELETED_AT) . ' IS NULL'
                    . ' AND ' . appTableClass::APP_TOKEN . ' = :token ';
            $params = array(
                ':token' => $token,
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? true : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

    /**
     * 
     * @param type $token
     * @return type
     * @throws PDOException
     */
    public static function getAppTokenId($token) {
        try {
            $sql = 'SELECT ' . appTableClass::getNameField(appTableClass::APP_TOKEN) . ', '
                    . appTableClass::getNameField(appTableClass::ID) . ' AS app_id '
                    . ' FROM ' . appTableClass::getNameTable()
                    . ' WHERE ' . appTableClass::getNameField(appTableClass::DELETED_AT) . ' IS NULL'
                    . ' AND ' . appTableClass::APP_TOKEN . ' = :token ';
            $params = array(
                ':token' => $token,
            );
            $answer = model::getInstance()->prepare($sql);
            $answer->execute($params);
            $answer = $answer->fetchAll(PDO::FETCH_OBJ);
            return (count($answer) > 0 ) ? $answer[0]->app_id : false;
        } catch (PDOException $exc) {
            throw $exc;
        }
    }

}
