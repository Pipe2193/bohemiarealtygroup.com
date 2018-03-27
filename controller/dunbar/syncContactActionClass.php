<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of syncContactActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class syncContactActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->hasGet(appTableClass::getNameField(appTableClass::APP_TOKEN, true))) {

                $token = request::getInstance()->getGet(appTableClass::getNameField(appTableClass::APP_TOKEN, true));
                if (appTableClass::verifyAppToken($token) === true) {


                    $token_app_id = appTableClass::getAppTokenId($token);
                    $first_name = request::getInstance()->getPost("firstname");
                    $last_name = request::getInstance()->getPost("lastname");
                    $email_address = request::getInstance()->getPost("email");
                    $phone_number = request::getInstance()->getPost("phone");
                    $apt_size = request::getInstance()->getPost("apartmentsize");
                    $max_rent_rpice = request::getInstance()->getPost("maxrentalprice");
                    $open_house = request::getInstance()->getPost("openhouse");
                    $private_openhouse_date = request::getInstance()->getPost("day");
                    $private_openhouse_time = request::getInstance()->getPost("time");

                    $dunbar_contact_fields = array(
                        contactFormTableClass::ID => NULL,
                        contactFormTableClass::APP_ID_APP => $token_app_id,
                        contactFormTableClass::FIRST_NAME => $first_name,
                        contactFormTableClass::LAST_NAME => $last_name,
                        contactFormTableClass::EMAIL_ADDRESS => $email_address,
                        contactFormTableClass::PHONE_NUMBER => $phone_number,
                        contactFormTableClass::APT_SIZE => $apt_size,
                        contactFormTableClass::MAX_RENT_PRICE => $max_rent_rpice,
                        contactFormTableClass::OPEN_HOUSE => $open_house,
                        contactFormTableClass::PRIVATE_OPENHOUSE_DATE => $private_openhouse_date,
                        contactFormTableClass::PRIVATE_OPENHOUSE_TIME => $private_openhouse_time
                    );

                    contactFormTableClass::insert($dunbar_contact_fields);
                    header("Location: https://dunbarapts.com/thank_you.html ");
                } else {
                    $this->json = json_encode(
                            array("error" => "invalid Access. The application Token: $token is not valid.")
                    );
                    $this->defineView('syncContact', 'dunbar', session::getInstance()->getFormatOutput());
                }
            } else {
                $this->json = json_encode(
                        array("message" => "Restricted accesss.The application Token is missing.")
                );
                $this->defineView('syncContact', 'dunbar', session::getInstance()->getFormatOutput());
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            $this->json = json_encode(
                    array("error" => $exc)
            );
            $this->defineView('syncContact', 'dunbar', session::getInstance()->getFormatOutput());
        }
    }

}
