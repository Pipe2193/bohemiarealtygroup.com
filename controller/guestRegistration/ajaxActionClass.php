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
       * update User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['userID'])) {
          $userID = request::getInstance()->getPost("userID");

          $credencials = array(
              credencialTableClass::ID,
              credencialTableClass::NOMBRE,
              credencialTableClass::CREATED_AT,
              credencialTableClass::UPDATED_AT,
              credencialTableClass::DELETED_AT,
          );
          $credencialOrderBy = array(
              credencialTableClass::ID
          );
          $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
          $id = credencialTableClass::ID;
          $role = credencialTableClass::NOMBRE;
          $created_at = credencialTableClass::CREATED_AT;
          $updated_at = credencialTableClass::UPDATED_AT;

          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where = array(
              profileTableClass::USUARIO_ID => $userID
          );
          $objProfileUser = profileTableClass::getAll($fields, true, null, null, null, null, $where);
          $userfields = array(
              usuarioTableClass::ID,
              usuarioTableClass::USER,
              usuarioTableClass::EMAIL_ADDRESS,
              usuarioTableClass::PASSWORD,
              usuarioTableClass::ACTIVED,
              usuarioTableClass::UPDATED_AT
          );
          $userwhere = array(
              usuarioTableClass::ID => $userID
          );
          $objUser = usuarioTableClass::getAll($userfields, true, null, null, null, null, $userwhere);
          $user = usuarioTableClass::USER;
          $email = usuarioTableClass::EMAIL_ADDRESS;
          $pass = usuarioTableClass::PASSWORD;
          $status = usuarioTableClass::ACTIVED;
          $updated_at = usuarioTableClass::UPDATED_AT;

          $usercredfields = array(
              usuarioCredencialTableClass::ID,
              usuarioCredencialTableClass::CREDENCIAL_ID,
              usuarioCredencialTableClass::USUARIO_ID
          );
          $usercredwhere = array(
              usuarioCredencialTableClass::USUARIO_ID => $userID
          );
          $objUserCredencial = usuarioCredencialTableClass::getAll($usercredfields, true, null, null, null, null, $usercredwhere);
          $idUserCredencial = usuarioCredencialTableClass::ID;
          if (empty($objProfileUser)) {
            $username = $objUser[0]->$user;
          } else {
            $firstName = profileTableClass::FIRST_NAME;
            $middleName = profileTableClass::MIDDLE_NAME;
            $lastName = profileTableClass::LAST_NAME;

            $username = $objProfileUser[0]->$firstName . " " . $objProfileUser[0]->$middleName . " " . $objProfileUser[0]->$lastName;
          }
          ?>
          <div class="panel panel-success">
              <div class="panel-heading">
                  <h3 class="panel-title"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update User <?php echo $username; ?> <small></small></h2></h3>
              </div>
              <div class="panel-body">

                  <form id="updateUser" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "update", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $userID)); ?>">

                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title">User Credentials</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" value="<?php echo $objUser[0]->$user ?>" placeholder="Enter User Name" required readonly>
                                      <span class="fa fa-user-circle form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="email" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" value="<?php echo $objUser[0]->$email ?>" placeholder="Enter Email Address" required>
                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Privilege As</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 selectContainer">
                                          <select id="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" class="form-control">
                                              <option value="">Select Role</option>  
                                              <?php foreach ($this->getCredencials() as $credencial): ?>
                                                <?php
                                                $id = usuarioCredencialTableClass::getIdUserCredencial($userID);
                                                if ($id == $credencial->id) {
                                                  ?>
                                                  <option value="<?php echo $id ?>" selected><?php echo $credencial->nombre; ?></option>
                                                <?php } else { ?>
                                                  <option value="<?php echo $credencial->id ?>"><?php echo $credencial->nombre; ?></option>
                                                <?php } ?>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-danger btnClose_user"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Update User</button>
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                  </form>

                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="btn-group  btn-group-sm pull-right">
                              <button class="btn btn-info btnAdd_role" type="button"><i class="fa fa-address-card-o" aria-hidden="true"></i> Add Role</button>
                          </div>
                          <div id="addRole_panel"></div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="btn-group  btn-group-sm pull-right">
                              <button data-id="<?php echo $userID; ?>" class="btn btn-info btnChange_pass" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Change Password</button>
                          </div>
                          <div id="changePassword_panel"></div>
                      </div>
                  </div>

              </div>
          </div> 
          <script>
            $(document).ready(function () {
                $('#updateUser').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user name is required'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::USER_LENGTH ?>,
                                    message: 'The user name must be less than <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The user name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user role is required'
                                }
                            }
                        }
                    }
                });

                //button change ´password function
                var btnChange_pass = $(".btnChange_pass");
                $(btnChange_pass).on('click', function () {
                    var idUser = $(this).data("id");
                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "http://localhost/bohemiarealtygroup.com/web/index.php/users/ajax",
                        data: ('changePassId=' + idUser),
                        success: function (data) {
                            $('html, body').animate({scrollTop: $('#changePassword_panel').offset().top}, 'slow');
                            $("#changePassword_panel").show();
                            $("#changePassword_panel").html(data);
                        }
                    });
                });
                //button add role function
                var btnAdd_role = $(".btnAdd_role");
                $(btnAdd_role).on('click', function () {

                    $.ajax({
                        async: true,
                        type: "POST",
                        dataType: "html",
                        contentType: "application/x-www-form-urlencoded",
                        url: "http://localhost/bohemiarealtygroup.com/web/index.php/users/ajax",
                        data: ('addRole'),
                        success: function (data) {
                            $('html, body').animate({scrollTop: $('#addRole_panel').offset().top}, 'slow');
                            $("#addRole_panel").show();
                            $("#addRole_panel").html(data);
                        }
                    });
                });

                //button close update user function
                var btnClose_user = $(".btnClose_user");
                $(btnClose_user).on('click', function () {
                    $("#user_update_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }
      /**
       * delete User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['deleteUser'])) {
          $deleteUser = request::getInstance()->getPost("deleteUser");
          $fields = array(
              profileTableClass::FIRST_NAME,
              profileTableClass::MIDDLE_NAME,
              profileTableClass::LAST_NAME
          );
          $where = array(
              profileTableClass::USUARIO_ID => $deleteUser
          );
          $objProfileUser = profileTableClass::getAll($fields, true, null, null, null, null, $where);
          if (empty($objProfileUser)) {
            $fields = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER,
            );
            $where = array(
                usuarioTableClass::ID => $deleteUser
            );
            $objUser = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
            $user = usuarioTableClass::USER;
            $username = $objUser[0]->$user;
          } else {
            $firstName = profileTableClass::FIRST_NAME;
            $middleName = profileTableClass::MIDDLE_NAME;
            $lastName = profileTableClass::LAST_NAME;

            $username = $objProfileUser[0]->$firstName . " " . $objProfileUser[0]->$middleName . " " . $objProfileUser[0]->$lastName;
          }
          ?>
          <div class="panel panel-danger">
              <div class="panel-body">
                  <div class="btn-group  btn-group-sm pull-right">
                      <a class="btn btn-default btnClose_delete" type="button"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel </a>
                      <a href="<?php echo routing::getInstance()->getUrlWeb("usuario", "delete", array(usuarioTableClass::getNameField(usuarioTableClass::ID, true) => $deleteUser)); ?>" class="btn btn-danger" type="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Confirm Delete User <?php echo $username ?> </a>
                  </div>
              </div>
          </div>
          <script>
            $(document).ready(function () {

                //button close delete user function
                var btnClose_delete = $(".btnClose_delete");
                $(btnClose_delete).on('click', function () {
                    $("#deleteUser_panel").hide(300);
                    $('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * add User parcial form
       */
      if (request::getInstance()->isMethod('POST')) {
        if (isset($_POST['addUser'])) {
          $addUser = request::getInstance()->getPost("addUser");
          ?>

          <div class="panel panel-success">
              <div class="panel-heading">
                  <h3 class="panel-title">Add User<small></small></h3>
              </div>
              <div class="panel-body">

                  <form id="addUser" class="form-horizontal form-label-left input_mask" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "create"); ?>">

                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title">User Credentials</h3>
                          </div>
                          <div class="panel-body">
                              <p><small>Fields marked with (*) are mandatory.</small></p>
                              <div class="form-group">
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="text" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" placeholder="Enter User Name" required>
                                      <span class="fa fa-user-circle form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="email" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" placeholder="Enter Email Address" required>
                                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" placeholder="Enter Password" required>
                                      <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm Password" required>
                                      <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Privilege As</label>
                                      <div class="col-md-9 col-sm-9 col-xs-12 selectContainer">
                                          <select id="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>" class="form-control">
                                              <option value="">Select Role</option>  
                                              <?php foreach ($this->getCredencials() as $credencial): ?>
                                                <option value="<?php echo $credencial->id ?>"><?php echo $credencial->nombre; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <button type="button" class="btn btn-danger btnClose_adduser"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                              <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add User</button>
                          </div>
                      </div>
                  </form>

              </div>
          </div>
          <script>
            $(document).ready(function () {
                $('#addUser').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user name is required'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::USER_LENGTH ?>,
                                    message: 'The user name must be less than <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER_LENGTH, true) ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The user name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::EMAIL_ADDRESS, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The email address is required'
                                },
                                emailAddress: {
                                    message: 'The value is not a valid email address'
                                },
                                regexp: {
                                    regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                                    message: 'The value is not a valid email address'
                                },
                                stringLength: {
                                    max: <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?>,
                                    message: 'The email address must be less than <?php echo usuarioTableClass::EMAIL_ADDRESS_LENGTH; ?> characters long'
                                }
                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>,
                                    message: 'The Password and its confirmation are not the same'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }

                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: '<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>',
                                    message: 'The Passwords must be the same.'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }
                            }
                        },
          <?php echo credencialTableClass::getNameField(credencialTableClass::ID, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The user role is required'
                                }
                            }
                        }
                    }
                });

                //button close adduser user function
                var btnClose_adduser = $(".btnClose_adduser");
                $(btnClose_adduser).on('click', function () {
                    $("#addUser_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });

            });
          </script>
          <?php
        }
      }

      /**
       * change password parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["changePassId"])) {
          $userID = request::getInstance()->getPost("changePassId");
          ?>
          <form id="changePassword" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb("usuario", "update", array( 'updatedUserID' => $userID)); ?>">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <h4 class="panel-title"><small>Fields marked with (*) are mandatory.</small></h4>
                  </div>

                  <div class="panel-body">

                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"  placeholder="Enter New Password" required>
                              <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="password" class="form-control has-feedback-left" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm New Password" required>
                              <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="button" class="btn btn-danger btnClose_changePass"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Save Password</button>
                  </div>
              </div>

          </form>
          <script>
            $(document).ready(function () {
                $('#changePassword').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>,
                                    message: 'The Password and its confirmation are not the same'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }

                            }
                        },
          <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The Password is required'
                                },
                                identical: {
                                    field: '<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>',
                                    message: 'The Passwords must be the same.'
                                },
                                stringLength: {
                                    min: 8,
                                    max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                    message: 'The Password must be at least 8 characters long'
                                }
                            }
                        }
                    }
                });

                //button close change passwordd user function
                var btnClose_changePass = $(".btnClose_changePass");
                $(btnClose_changePass).on('click', function () {
                    $("#changePassword_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });


            });
          </script>
          <?php
        }
      }

      /**
       * Add Role parcial form
       */
      if (request::getInstance()->isMethod("POST")) {
        if (isset($_POST["addRole"])) {
          $addRole = request::getInstance()->getPost("addRole");
          ?>
          <form id="addRole" role="form" method="POST"  action="<?php echo routing::getInstance()->getUrlWeb("credencial", "create"); ?>">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <h4 class="panel-title"><small>Fields marked with (*) are mandatory.</small></h4>
                  </div>

                  <div class="panel-body">

                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"  placeholder="Enter Role Name" required>
                              <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="<?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION, true) ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION, true) ?>" placeholder="Enter Role Description" required>
                              <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="button" class="btn btn-danger btnClose_addRole"><i class="fa fa-times-circle-o" aria-hidden="true"></i> Cancel</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Role</button>
                  </div>
              </div>

          </form>
          <script>
            $(document).ready(function () {
                $('#addRole').formValidation({
                    framework: 'bootstrap',
                    err: {
                        container: 'tooltip'
                    },
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    addOns: {
                        mandatoryIcon: {
                            icon: 'glyphicon glyphicon-asterisk'
                        }
                    },
                    fields: {
          <?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The role name is required'
                                },
                                stringLength: {
                                    max: <?php echo credencialTableClass::NOMBRE_LENGTH ?>,
                                    message: 'The role name must be less than <?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The role name can only consist of alphabetical, and spaces.'
                                }
                            }
                        },
          <?php echo credencialBaseTableClass::getNameField(credencialTableClass::DESCRIPTION, true); ?>: {
                            validators: {
                                notEmpty: {
                                    message: 'The description is required'
                                },
                                stringLength: {
                                    max: <?php echo credencialTableClass::DESCRIPTION_LENGTH ?>,
                                    message: 'The description be less than <?php echo credencialTableClass::getNameField(credencialTableClass::DESCRIPTION_LENGTH, true); ?> characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z ]/,
                                    message: 'The description can only consist of alphabetical, and spaces.'
                                }
                            }
                        }
                    }
                });
                
                 //button close add role user function
                var btnClose_addRole = $(".btnClose_addRole");
                $(btnClose_addRole).on('click', function () {
                    $("#addRole_panel").hide(300);
                    //$('html, body').animate({scrollTop: $('#usuarios').offset().top}, 'slow');
                });
            });
          </script>
          <?php
        }
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

  public function getCredencials() {
    $credencials = array(
        credencialTableClass::ID,
        credencialTableClass::NOMBRE,
        credencialTableClass::CREATED_AT,
        credencialTableClass::UPDATED_AT,
        credencialTableClass::DELETED_AT,
    );
    $credencialOrderBy = array(
        credencialTableClass::ID
    );
    $objCredencials = credencialTableClass::getAll($credencials, true, $credencialOrderBy, 'ASC');
    return $objCredencials;
  }

}
