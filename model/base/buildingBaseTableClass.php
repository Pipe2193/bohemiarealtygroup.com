<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of buildingBaseTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class buildingBaseTableClass extends tableBaseClass {

  const ID = 'id_building';
  const DESCRIPTION_BUILDING = 'description_building';
  const DESCRIPTION_BUILDING_LENTH = 155;
  const ADDRESS = 'address_building';
  const STREET_NUMBER_BUILDING = 'street_number_building';
  const ROUTE_BUILDING = 'route_building';
  
  const ADDRESS_LENTH = 255;
  const STATE_ID = 'states_state_id';
  const CITY = 'city_building';
  const COUNTY_BUILDING = 'county_building';
  const ZIPCODE = 'zipcode_building';
  const ZIPCODE_LENTH = 5;
  const ADDON_CODES_ZIPCODE = 'addon_codes_zipcode_building';
  const ADDON_CODES_ZIPCODE_LENTH = 4;
  const CROSS_ADDRESS = 'cross_address_building';
  const CROSS_ADDRESS_LENTH = 255;
  const COUNTRY_BUILDING = 'country_building';
  const LATITUDE = 'latitude';
  const LONGITUDE = 'longitude';
  const LOCKBOX_BUILDING = 'lockbox_building';
  const LOCKBOX_BUILDING_LENGTH = 80;
  const STATUS = 'status';
  const NOTES_BUILDING = 'notes_building';
  const NOTES_BUILDING_LENGTH = 255;
  const BUILDING_HASH = 'building_hash';
  const ID_BUILDING_FEATURES = 'building_features_id_building_features';
  const ID_PETS_POLICY = 'pets_policy_id_pets_case';
  const ID_LANDLORD = 'landlord_id_landlord';
  const ID_NEIGHBORHOOD = 'neighborhood_id_neighborhood';
  const ID_LISTING_TYPE = 'listing_type_id_listing_type';
  const ID_ACCESS = 'access_id_access';
  const SYNC_ID_SYNC = 'sync_id_sync';
  const ID_SUPER = 'super_id_super';
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  const DELETED_AT = 'deleted_at';

  /**
   * Método para obtener el nombre del campo más la tabla ya sea en formato
   * DB (.) o en formato HTML (_)
   *
   * @param string $field Nombre del campo
   * @param string $html [optional] Por defecto traerá el nombre del campo en
   * versión DB
   * @return string
   */
  public static function getNameField($field, $html = false, $table = null) {
    return parent::getNameField($field, self::getNameTable(), $html);
  }

  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
    return 'building';
  }

  /**
   * Método para borrar un registro de una tabla X en la base de datos
   *
   * @param array $ids Array con los campos por posiciones
   * asociativas y los valores por valores a tener en cuenta para el borrado.
   * Ejemplo $fieldsAndValues['id'] = 1
   * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
   * borrado físico de un registro en una tabla de la base de datos
   * @return PDOException|boolean
   */
  public static function delete($ids, $deletedLogical = true, $table = null) {
    return parent::delete($ids, $deletedLogical, self::getNameTable());
  }

  /**
   * Método para insertar en una tabla usuario
   *
   * @param array $data Array asociativo donde las claves son los nombres de
   * los campos y su valor sería el valor a insertar. Ejemplo:
   * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
   * @return PDOException|boolean
   */
  public static function insert($data, $table = null) {
    return parent::insert(self::getNameTable(), $data);
  }

  /**
   * Método para leer todos los registros de una tabla
   *
   * @param array $fields Array con los nombres de los campos a solicitar
   * @param boolean $deletedLogical [optional] Indicación de borrado lógico
   * o borrado físico
   * @param array $orderBy [optional] Array con el o los nombres de los campos
   * por los cuales se ordenará la consulta
   * @param string $order [optional] Forma de ordenar la consulta
   * (por defecto NULL), pude ser ASC o DESC
   * @param integer $limit [optional] Cantidad de resultados a mostrar
   * @param integer $offset [optional] Página solicitadad sobre la cantidad
   * de datos a mostrar
   * @return mixed una instancia de una clase estandar, la cual tendrá como
   * variables publica los nombres de las columnas de la consulta o una
   * instancia de \PDOException en caso de fracaso.
   */
  public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
    return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
  }

  /**
   * Método para actualizar un registro en una tabla de una base de datos
   *
   * @param array $ids Array asociativo con las posiciones por nombres de los
   * campos y los valores son quienes serían las llaves a buscar.
   * @param array $data Array asociativo con los datos a modificar,
   * las posiciones por nombres de las columnas con los valores por los nuevos
   * datos a escribir
   * @return PDOException|boolean
   */
  public static function update($ids, $data, $table = null) {
    return parent::update($ids, $data, self::getNameTable());
  }

}
