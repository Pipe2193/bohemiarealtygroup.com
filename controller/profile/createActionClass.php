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
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet("activation_hash")) {


        $profile_FistName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::FIRST_NAME, true));
        $profile_LastName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::LAST_NAME, true));
        $profile_MiddleName = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::MIDDLE_NAME, true));
        $profile_EmailAddress = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::EMAIL_ADDRESS, true));
        $profile_PhoneNumber = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::PHONE_NUMBER, true));
        $profile_PhoneExt = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::EXT_PHONE_NUMBER, true));
        $profile_profile_bio_summary = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::PROFILE_BIO_SUMMARY, true));
        $profile_profile_bio = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::PROFILE_BIO, true));
        $profile_secondary_phone_number = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::OFFICE_PHONE_NUMBER, true));
        $profile_secondary_phone_ext = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::OFFICE_EXT_NUMBER, true));
        $profile_fax_number = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::FAX_NUMBER, true));
        $profile_position = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::POSITION, true));
//        $profile_website_url = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::WEBSITE_URL, true));

        $profile_facebook_link = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::FACEBOOK_LINK, true));
        $profile_twitter_link = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::TWITTER_LINK, true));
        $profile_instagram_link = request::getInstance()->getPost(profileTableClass::getNameField(profileTableClass::INSTAGRAM_LINK, true));

        if (empty($profile_facebook_link)) {
          $profile_facebook_link = "https://www.facebook.com/BohemiaRealtyGroup/";
        }

        if (empty($profile_twitter_link)) {
          $profile_twitter_link = "https://twitter.com/BohemiaRealtyGr";
        }
        
        if (empty($profile_instagram_link)) {
          $profile_instagram_link = "https://www.instagram.com/bohemiarealty/";
        }

        $username = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
        $confirmPass = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD . '_confirm', true));
        $activation_hash = request::getInstance()->getGet("activation_hash");

        $userID = usuarioTableClass::VerifyUserHash($activation_hash);

        if ($userID != false) {

          $data = array(
              profileTableClass::ID => null,
              profileTableClass::FIRST_NAME => $profile_FistName,
              profileTableClass::MIDDLE_NAME => $profile_MiddleName,
              profileTableClass::LAST_NAME => $profile_LastName,
              profileTableClass::EMAIL_ADDRESS => $profile_EmailAddress,
              profileTableClass::PHONE_NUMBER => $profile_PhoneNumber,
              profileTableClass::EXT_PHONE_NUMBER => $profile_PhoneExt,
              profileTableClass::PROFILE_BIO_SUMMARY => $profile_profile_bio_summary,
              profileTableClass::PROFILE_BIO => $profile_profile_bio,
              profileTableClass::FAX_NUMBER => $profile_fax_number,
              profileTableClass::ACTIVED => 1,
              profileTableClass::PROFILE_HASH => $activation_hash,
              profileTableClass::OFFICE_PHONE_NUMBER => $profile_secondary_phone_number,
              profileTableClass::OFFICE_EXT_NUMBER => $profile_secondary_phone_ext,
              profileTableClass::FACEBOOK_LINK => $profile_facebook_link,
              profileTableClass::TWITTER_LINK => $profile_twitter_link,
              profileTableClass::POSITION => $profile_position,
              profileTableClass::INSTAGRAM_LINK => $profile_instagram_link,
              profileTableClass::USUARIO_ID => $userID
          );

          profileTableClass::insert($data);

          $ids_usuario = array(
              usuarioTableClass::ID => $userID
          );
          $data_usuario = array(
              usuarioTableClass::USER => $username,
              usuarioTableClass::PASSWORD => md5(md5($password))
          );
          usuarioTableClass::update($ids_usuario, $data_usuario);
          session::getInstance()->setSuccess(" Your BRG Account has been Created successfully. Please Log In");
          routing::getInstance()->redirect('shfSecurity', 'index');
        } else {
          session::getInstance()->setError(" Your BRG Account could not complete the se up process.The activation hash <b>($activation_hash)</b> it's not valid, please try again. ");
          session::getInstance()->hasFlash("exception");
          routing::getInstance()->redirect('usuario', 'activation');
        }
      } else {
        session::getInstance()->hasFlash("exception");
        routing::getInstance()->redirect('usuario', 'activation');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
