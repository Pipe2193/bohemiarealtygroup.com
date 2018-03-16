<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ajaxActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class ajaxActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        if (request::getInstance()->hasPost("ListingsData")) {
          ?>
          <td>
          <th><input type="checkbox" id="check-all" class="flat"></th>
          </td>
          <td>121122</td>
          <td>540w 165th street</td>
          <td>3A</td>
          <td>Washington heights</td>
          <td>2,500</td>
          <td>0/1</td>
          <td>none</td>
          <td>n/a</td>
          <td>testing notes testing notes</td>
          <td>Rose Associates</td>
          <td>2017-07-27 16:50:25</td>
          <td>2017-07-28 16:50:25</td>
          <td><button type="button" class="btn btn-success btn-xs">BRG</button></td>
          <td>
              <div class="btn-group  btn-group-sm">
                  <button class="btn btn-info" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-default" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                  <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                  <button class="btn btn-primary" type="button"><i class="fa fa-ban" aria-hidden="true"></i></button>
              </div>
          </td>
          <?php

        }
        if (request::getInstance()->hasPost("")) {
          $RCN = $_POST['countCust'];
          //$RC = countAllCustomers();

          if ($RCN != $RC) {
            ?>
            <script>
              $(document).ready(function () {
                  //$('#notification').modal('show');
                  Push.Permission.get();
                  Push.create('PMI Notification', {
                      body: '  Info! Customer Account in the works online! ',
                      icon: 'https://onaf.pmi.ky/onaf_form/view/includes/assets/img/logo_notify.png',
                      timeout: 5000,
                      onClick: function () {
                          window.location = urlsettings + "?p=app_forms";
                      }
                  });
              });
            </script>
            <?php
          }
        }
      } elseif (request::getInstance()->isMethod('GET')) {

        routing::getInstance()->redirect('default', 'index');
      } else {
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
