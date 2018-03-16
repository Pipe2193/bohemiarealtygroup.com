<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of createActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $roleName = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true));
        $roleDescription = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::DESCRIPTION, true));

        if (credencialTableClass::getVerifyExistingCredencial($roleName) == false) {

          $credencial_hash = md5(md5(date('U')));
          $data = array(
              credencialTableClass::ID => null,
              credencialTableClass::NOMBRE => $roleName,
              credencialTableClass::DESCRIPTION => $roleDescription,
              credencialTableClass::CREDENCIAL_HASH => $credencial_hash
          );
          
          credencialTableClass::insert($data);

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

          $a = 0;
          for ($index = 1; $index <= count($objPermissions); $index++) {

            $permissions_id_permissions = $objPermissions[$a]->$permissions_id_permissions_field;

            $role_permissions_id = request::getInstance()->getPost(permissionsTableClass::getNameField(permissionsTableClass::ID . '_' . $index, true));

            if (isset($role_permissions_id)) {
              $role_permissions_status = 1;
            } else {
              $role_permissions_status = 0;
            }

            $data_role_permissions = array(
                rolesPermissionsTableClass::ID => null,
                rolesPermissionsTableClass::ROLE_PERMISSIONS_HASH => $credencial_hash,
                rolesPermissionsTableClass::ROLE_PERMISSION_STATUS => $role_permissions_status,
                rolesPermissionsTableClass::PERMISSIONS_ID_PERMISSIONS => $permissions_id_permissions,
                rolesPermissionsTableClass::CREDENCIAL_ID => $credencial_id
            );

            $role_permissions = rolesPermissionsTableClass::insert($data_role_permissions);

            $a++;
          }

          session::getInstance()->setSuccess("The Role <b>" . $roleName . "</b> has been Successfully Registered.");
          routing::getInstance()->redirect('credencial', 'index');
        } else {
          session::getInstance()->setError("The Role name <b>" . $roleName . " is already registered.");
          routing::getInstance()->redirect('credencial', 'index');
        }
      } else {
        routing::getInstance()->redirect('credencial', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
