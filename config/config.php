<?php

use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;
use mvc\request\requestClass as request;

config::setRowGrid(10);

config::setSohoFrameworkVersion("1.0.15");
config::setSohoFrameworkAppName("Bohemia Realty Group Administrator");
config::setSohoFrameworAccronName("BRG");
config::setGoogleMapsAPI("AIzaSyB66A5RHKq2AH4M2suZb0G1KXDItH9mLwc");
config::setScope('dev'); // prod
config::setRemoteAccess('off');

if (config::getScope() == 'dev') {

  config::setDbHost('localhost');
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('brgny_bohemia_group');
  config::setDbPort(3306); // 5432 3306
  config::setDbUser('root');
  config::setDbPassword('');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }


  //bohemia db
  config::setBohemiaDbHost('67.225.229.143'); //10.195.64.110
  config::setBohemiaDbDriver('mysql'); // pgsql mysql
  config::setBohemiaDbName('intranet_bohemia');
  config::setBohemiaDbPort(3306); // 5432 3306
  config::setBohemiaDbUser('intranet');
  config::setBohemiaDbPassword('[>=5-njb2|1#%$M');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setBohemiaDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getBohemiaDbUnixSocket() !== null) {
    config::setBohemiaDbDsn(
            config::getBohemiaDbDriver()
            . ':unix_socket=' . config::getBohemiaDbUnixSocket()
            . ';dbname=' . config::getBohemiaDbName()
    );
  } else {
    config::setBohemiaDbDsn(
            config::getBohemiaDbDriver()
            . ':host=' . config::getBohemiaDbHost()
            . ';port=' . config::getBohemiaDbPort()
            . ';dbname=' . config::getBohemiaDbName()
    );
  }

  if (config::getRemoteAccess() == 'on') {
    $remote_address = $_SERVER['SERVER_ADDR'];
    config::setPathAbsolute('/opt/lampp/htdocs/bohemiarealtygroup/');
    config::setUrlBase('http://' . $remote_address . '/bohemiarealtygroup/web/');
  } elseif (config::getRemoteAccess() == 'off') {
    config::setPathAbsolute('/opt/lampp/htdocs/bohemiarealtygroup/');
    config::setUrlBase('http://localhost/bohemiarealtygroup/web/');
  }
} elseif (config::getScope() == 'prod') {

  //local db
  config::setDbHost('localhost'); //10.195.64.110
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('brgny_bohemia_group');
  config::setDbPort(3306); // 5432 3306
  config::setDbUser('brgny_bohemia');
  config::setDbPassword('b0hem1a2017');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }

  //bohemia db
  config::setBohemiaDbHost('67.225.229.143'); //10.195.64.110
  config::setBohemiaDbDriver('mysql'); // pgsql mysql
  config::setBohemiaDbName('intranet_bohemia');
  config::setBohemiaDbPort(3306); // 5432 3306
  config::setBohemiaDbUser('intranet');
  config::setBohemiaDbPassword('[>=5-njb2|1#%$M');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setBohemiaDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getBohemiaDbUnixSocket() !== null) {
    config::setBohemiaDbDsn(
            config::getBohemiaDbDriver()
            . ':unix_socket=' . config::getBohemiaDbUnixSocket()
            . ';dbname=' . config::getBohemiaDbName()
    );
  } else {
    config::setBohemiaDbDsn(
            config::getBohemiaDbDriver()
            . ':host=' . config::getBohemiaDbHost()
            . ';port=' . config::getBohemiaDbPort()
            . ';dbname=' . config::getBohemiaDbName()
    );
  }

  config::setPathAbsolute('/home/brgny/public_html/dev/');
  config::setUrlBase('https://dev.brg-ny.com/web/');
} elseif (config::getScope() == 'test') {

  config::setDbHost('166.62');
  config::setDbDriver('mysql'); // pgsql mysql
  config::setDbName('mptechno_bohemia_group');
  config::setDbPort(3306); // 5432
  config::setDbUser('mptechno_bohemia');
  config::setDbPassword('b0hem1a2017');
// Esto solo es necesario en caso de necesitar un socket para la DB
  config::setDbUnixSocket(null); ///tmp/mysql.sock

  if (config::getDbUnixSocket() !== null) {
    config::setDbDsn(
            config::getDbDriver()
            . ':unix_socket=' . config::getDbUnixSocket()
            . ';dbname=' . config::getDbName()
    );
  } else {
    config::setDbDsn(
            config::getDbDriver()
            . ':host=' . config::getDbHost()
            . ';port=' . config::getDbPort()
            . ';dbname=' . config::getDbName()
    );
  }
}

if (session::getInstance()->hasDefaultCulture() === false) {
  config::setDefaultCulture('en');
} else {
  config::setDefaultCulture(session::getInstance()->getDefaultCulture());
}

config::setIndexFile('index.php');

config::setFormatTimestamp('Y-m-d H:i:s');

config::setHeaderJson('Content-Type: application/json; charset=utf-8');
config::setHeaderXml('Content-Type: application/xml; charset=utf-8');
config::setHeaderHtml('Content-Type: text/html; charset=utf-8');
config::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
config::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
config::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
config::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

config::setCookieNameRememberMe('mvcSiteRememberMe');
config::setCookieNameSite('mvcSite');
config::setCookiePath('/' . config::getIndexFile());
config::setCookieDomain('http://dev.brg-ny.com/');
config::setCookieTime(3600 * 8); // una hora en segundo 3600 y por 8 serían 8 horas

config::setDefaultModule('default');
config::setDefaultAction('index');

config::setDefaultModuleSecurity('shfSecurity');
config::setDefaultActionSecurity('index');

config::setDefaultModulePermission('shfSecurity');
config::setDefaultActionPermission('noPermission');

config::setDefaultModuleException('shfSecurity');
config::setDefaultActionException('exception');

