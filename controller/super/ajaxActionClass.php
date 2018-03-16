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

      /**
       * show info super parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["super_hash"])) {
          $super_hash = request::getInstance()->getPost("super_hash");

          $fields = array(
              superTableClass::SUPER_EMAIL_ADDRESS,
              superTableClass::SUPER_FIRST_NAME,
              superTableClass::SUPER_MIDDLE_NAME,
              superTableClass::SUPER_LAST_NAME,
              superTableClass::SUPER_PHONE_NUMBER,
              superTableClass::SUPER_NOTES
          );
          $where = array(
              superTableClass::SUPER_HASH => $super_hash
          );
          $objSuper = superTableClass::getAll($fields, true, null, null, null, null, $where);
          $super_first_name = superTableClass:: SUPER_FIRST_NAME;
          $super_middle_name = superBaseTableClass::SUPER_MIDDLE_NAME;
          $super_last_name = superTableClass:: SUPER_LAST_NAME;
          $super_email_address = superTableClass::SUPER_EMAIL_ADDRESS;
          $super_phone_number = superTableClass::SUPER_PHONE_NUMBER;
          $super_notes = superTableClass::SUPER_NOTES;
          
          ?>
          <script>
            $(document).ready(function () {
                $('#super_info').modal('show');
            });
          </script>
          <!-- Modal -->
          <div class="modal fade" id="super_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bohemia-">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title">   <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"><b> Super Details</b></button> </h4>
                      </div>
                      <div class="modal-body">
                          <table id="listing" class="table dt-responsive nowrap" cellspacing="0" width="100%">

                              <tbody>
                                  <tr>
                                      <td colspan="2" class="table_title"> <i class="fa fa-phone" aria-hidden="true"></i> Super Information </td>
                                  </tr>
                                  <tr>
                                      <td><b> NAME</b></td>
                                      <td>
                                          <?php if (empty($objSuper[0]->$super_first_name)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Name</button>
                                          <?php } else { ?>
                                            <?php echo $objSuper[0]->$super_first_name . ' ' . $objSuper[0]->$super_middle_name . ' ' . $objSuper[0]->$super_last_name; ?>
                                          <?php } ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>EMAIL ADDRESS</b></td>
                                      <td>
                                          <?php if (empty($objSuper[0]->$super_email_address)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Email Address</button>
                                          <?php } else { ?>
                                            <a href="mailto:<?php echo $objSuper[0]->$super_email_address; ?>"><?php echo $objSuper[0]->$super_email_address; ?></a>
                                          <?php } ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>PHONE</b></td>
                                      <td>
                                          <?php if (empty($objSuper[0]->$super_phone_number)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Phone Number</button>
                                          <?php } else { ?>
                                            <a href="tel:<?php echo $objSuper[0]->$super_phone_number; ?>"><?php echo $objSuper[0]->$super_phone_number; ?></a>
                                          <?php } ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><b>NOTES</b></td>
                                      <td>
                                          <?php if (empty($objSuper[0]->$super_notes)) { ?>
                                            <button  class="mdl-button mdl-js-button" type="button"><i class="fa fa-info-circle" aria-hidden="true"></i>  No Notes</button>
                                          <?php } else { ?>
                                            <?php echo $objSuper[0]->$super_notes; ?></td>
                                      <?php } ?>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class=" modal-footer">
                          <div class="pull-right">
                              <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" data-dismiss="modal"> <i class="fa fa-times-circle-o"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
