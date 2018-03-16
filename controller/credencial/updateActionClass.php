<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet(credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH, true))) {

        $credencial_hash = request::getInstance()->getGet(credencialTableClass::getNameField(credencialTableClass::CREDENCIAL_HASH, true));

        $credencial_id = credencialTableClass::getIdCredencialByHash($credencial_hash);

        /** INSERT ROLE PERMISSIONS INFORMATION * */
        /** PERMISSIONS INFO* */
        $permissions_fields = array(
            permissionsTableClass::ID,
            permissionsTableClass::NAME_PERMISSIONS,
            permissionsTableClass::MODULE,
            permissionsTableClass::ORDER_PERMISSIONS
        );
        $OrderBy_permissions = array(
            permissionsTableClass::ORDER_PERMISSIONS
        );
        $objPermissions = permissionsTableClass::getAll($permissions_fields, true, $OrderBy_permissions, 'ASC');

        $permissions_id_permissions_field = permissionsTableClass::ID;

        $roles_permissions_id = rolesPermissionsTableClass::getIdNewRolesPermissions($credencial_hash);
        $roles_permissions_id_field = rolesPermissionsTableClass::ID;

        $a = 0;
        for ($index = 1; $index <= count($objPermissions); $index++) {

          $permissions_id_permissions = $objPermissions[$a]->$permissions_id_permissions_field;
          $id_roles_permissions = $roles_permissions_id[$a]->$roles_permissions_id_field;

          $role_permissions_id = request::getInstance()->getPost(permissionsTableClass::getNameField(permissionsTableClass::ID . '_' . $index, true));

          if (isset($role_permissions_id)) {
            $role_permissions_status = 1;
          } else {
            $role_permissions_status = 0;
          }

          $data_role_permissions = array(
              rolesPermissionsTableClass::ROLE_PERMISSION_STATUS => $role_permissions_status
          );
          $ids = array(
              rolesPermissionsTableClass::ID => $id_roles_permissions
          );

          $role_permissions = rolesPermissionsTableClass::update($ids, $data_role_permissions);

          $a++;
        }

        $credencial_name = credencialTableClass::getNameCredencial($credencial_id);
        session::getInstance()->setSuccess("The Role Permissions for <b> $credencial_name </b> has been Successfully updated.");
        routing::getInstance()->redirect('credencial', 'index');
      } else {
        session::getInstance()->setError("The  Application encountered an error and it couldn't complete your request.<br> The <b>Credential Token (hash)</b> is missing, please try again!.  ");
        routing::getInstance()->redirect('credencial', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
