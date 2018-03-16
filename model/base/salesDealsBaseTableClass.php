<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of salesDealsBaseTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class salesDealsBaseTableClass extends tableBaseClass {

  const ID = 'sales_deal_id';
  const ADDRESS = 'address';
  const RENT = 'rent';
  const FULLTEXT_INDEX = 'fulltext_index';
  const DEAL_CLOSED_PRICE = 'deal_closed_price';
  const FEE = 'fee';
  const DEAL_MOVE_IN_DATE = 'deal_move_in_date';
  const WITHDRAW_LISTING_STATUS = 'withdraw_listing_status';
  const UNIT = 'unit';
  const DEAL_NOTES = 'deal_notes';
  const SEND_MAIL_TO_COMPANY = 'send_mail_to_company';
  const SEND_MAIL_TO_LANDLORD = 'send_mail_to_landlord';
  const SALES_DEAL_DATE_SOLD = 'sales_deal_date_sold';
  const SALES_DEAL_DATE_CLOSED = 'sales_deal_date_closed';
  const DEAL_TYPE = 'deal_type';
  const LISTING_MANAGER_ID_LISTING_MANAGER = 'listing_manager';
  const LISTING_ID_LISTING = 'listing_id';
  const LANDLORD_ID_LANDLORD = 'landlord_id';
  const USUARIO_ID = 'user_id';
  const STATUS = 'status';
  const SALES_DEALS_HASH = 'sales_deals_hash';
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
    return 'sales_deals';
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
