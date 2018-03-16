<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of manageActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class manageActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {


    try {
      $fields = array(
          profileTableClass::FIRST_NAME,
          profileTableClass::MIDDLE_NAME,
          profileTableClass::LAST_NAME,
          profileTableClass::EMAIL_ADDRESS,
          profileTableClass::PHONE_NUMBER,
          profileTableClass::EXT_PHONE_NUMBER,
      );
      $where = array(
          profileTableClass::USUARIO_ID => session::getInstance()->getUserId()
      );
      $this->objProfile = profileTableClass::getAll($fields, true, null, null, null, null, $where);
      
      $credencial_hash = request::getInstance()->getGet(credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH, true));
      /**
       * Get User Roles
       */
      $credencials = array(
          credencialTableClass::ID,
          credencialTableClass::NOMBRE,
          credencialTableClass::DESCRIPTION,
          credencialTableClass::CREDENCIAL_HASH,
          credencialTableClass::CREATED_AT,
          credencialTableClass::UPDATED_AT,
          credencialTableClass::DELETED_AT,
      );
      $credencial_where = array(
          credencialTableClass::CREDENCIAL_HASH => $credencial_hash
      );
      $this->objCredencial = credencialTableClass::getAll($credencials, true, null, null, null, null, $credencial_where);
      
      /** PERMISSIONS INFO* */
      $permissions_fields = array(
          permissionsTableClass::ID,
          permissionsTableClass::NAME_PERMISSIONS,
          permissionsTableClass::MODULE,
          permissionsTableClass::MODULE_ID_MODULE,
          permissionsTableClass::ORDER_PERMISSIONS
      );
      $OrderBy_permissions = array(
          permissionsTableClass::ORDER_PERMISSIONS
      );
      $this->objPermissions = permissionsTableClass::getAll($permissions_fields, true, $OrderBy_permissions, 'ASC');
      
      /** ROLE PERMISSIONS INFO* */
      $role_permissions_fields = array(
          rolesPermissionsTableClass::ID,
          rolesPermissionsTableClass::CREDENCIAL_ID,
          rolesPermissionsTableClass::PERMISSIONS_ID_PERMISSIONS,
          rolesPermissionsTableClass::ROLE_PERMISSION_STATUS,
          rolesPermissionsTableClass::ROLE_PERMISSIONS_HASH
      );
      $roles_permissions_where = array(
          rolesPermissionsTableClass::ROLE_PERMISSIONS_HASH => $credencial_hash
      );
      $this->objRolesPermissions = rolesPermissionsTableClass::getAll($role_permissions_fields, true, null, null, null, null, $roles_permissions_where);
      
      session::getInstance()->setFlash("credential_manage", "credential_manage");
      $this->defineView('manage', 'credencial', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
