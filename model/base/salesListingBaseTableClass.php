<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of saleslistingBaseTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class saleslistingBaseTableClass extends tableBaseClass {

  const ID = 'ListingID';
  const ACTYPE = 'ACType';
  const AGENTS = 'Agents';
  const ACCESS_TYPE = 'AccessType';
  const ADDRESS_DISPLAY_TYPE = 'AddressDisplayType';
  const ALARM_SECURITY_SYSTEM = 'AlarmSecuritySystem';
  const APARTMENT_SIZE_TYPE = 'ApartmentSizeType';
  const APT_GRADE = 'AptGrade';
  const APT_NUMBER = 'AptNumber';
  const APT_STATE = 'AptState';
  const ARCHITECTURAL_DETAILS = 'ArchitecturalDetails';
  const ARCHITECTURAL_FEATURES = 'ArchitecturalFeatures';
  const ASSESSMENT = 'Assessment';
  const ASSESSMENT_AMOUNT = 'AssessmentAmount';
  const ASSESSMENT_DATE = 'AssessmentDate';
  const ASSESSMENT_EXPIRATION_DATE = 'AssessmentExpirationDate';
  const ASSESSMENT_PAY_PERIOD = 'AssessmentPayPeriod';
  const AVAILABILITY = 'Availability';
  const AVAILABLE_LIGHT_TYPE = 'AvailableLightType';
  const BATH_CONDI = 'BathCondi';
  const BATH_FIXTURES = 'BathFixtures';
  const BATH_GRADE = 'BathGrade';
  const BATHROOM_TYPE = 'BathroomType';
  const BATHS = 'Baths';
  const BATH_STATE = 'BathState';
  const BEDROOMS = 'Bedrooms';
  const BOARD_APPROVAL = 'BoardApproval';
  const BOARD_APPROVAL_RENTAL = 'BoardApprovalRental';
  const BUILDING_FEATURES = 'BuildingFeatures';
  const BUILDING_ID = 'BuildingID';
  const BUILT_INS = 'BuiltIns';
  const BUYER_BROKER = 'BuyerBroker';
  const BY_APPOINTMENT_ONLY = 'ByAppointmentOnly';
  const CALL_TO_REGISTER = 'CallToRegister';
  const CARPET_LAYOUT_TYPE = 'CarpetLayoutType';
  const CEILING_HEIGHT = 'CeilingHeight';
  const CLOSET_TYPE = 'ClosetType';
  const SECOND_AGENT_ID = 'SecondAgentID';
  const COMMON_CHARGES = 'CommonCharges';
  const COMPANY_WEB_LISTING_ID = 'CompanyWebListingID';
  const CORP_LISTING_FEE = 'CorpListingFee';
  const DATE_CLOSED = 'DateClosed';
  const DATE_MODIFIED = 'DateModified';
  const DATE_LISTED = 'DateListed';
  const DAY_NOTICE = 'DayNotice';
  const DESCRIPTION = 'Description';
  const DINING_TYPE = 'DiningType';
  const DISPLAY_ADDRESS = 'DisplayAddress';
  const DOOR_TYPE = 'DoorType';
  const EFFECTIVE_DATE = 'EffectiveDate';
  const EXPIRATION_DATE = 'ExpirationDate';
  const EXPOSURE_TYPE = 'ExposureType';
  const FEATURED_LISTING = 'FeaturedListing';
  const FIRE_PLACE_TYPE = 'FirePlaceType';
  const FLOOR_TYPE = 'FloorType';
  const FURNISHED = 'Furnished';
  const FURNISH_RENT = 'FurnishRent';
  const GUARANTOR_ALLOWED = 'GuarantorAllowed';
  const GUARANTOR_REQUIRED = 'GuarantorRequired';
  const HALF_BATHS = 'HalfBaths';
  const HEAT = 'Heat';
  const HIDE_APARTMENT_NUMBER = 'HideApartmentNumber';
  const HOUSE_KEEPING_SCHEDULE_TYPE = 'HousekeepingScheduleType';
  const INVESTMENT_UNIT = 'InvestmentUnit';
  const IN_WALL_SPEAKER_SYSTEM = 'InWallSpeakerSystem';
  const IS_NOT_FEE = 'IsNoFee';
  const IS_ORL_MAX = 'IsOlrMax';
  const KIT_BACK_SPLASH = 'KitBackSplash';
  const KIT_CABIN_ENTRY_TYPE = 'KitCabinetryType';
  const KITCHEN_TYPE = 'KitchenType';
  const KIT_CONDI = 'KitCondi';
  const KIT_FIXTURES = 'KitFixtures';
  const KIT_FLOORING = 'KitFlooring';
  const KIT_GRADE = 'KitGrade';
  const KIT_STATE = 'KitState';
  const LAUNDRY_ROOM = 'LaundryRoom';
  const LAYOUT_TYPE = 'LayoutType';
  const LEASE_ASSIGNMENT = 'LeaseAssignment';
  const LEASE_ASSIGNMENT_DATE = 'LeaseAssignmentDate';
  const LEASE_SUB_TYPE = 'LeaseSubType';
  const LEASE_TYPE_CODE = 'LeaseTypeCode';
  const LIGHTING_TYPE = 'LightingType';
  const LISTING_AGENT_ID = 'ListingAgentID';
  const LISTING_BEGINS = 'ListingBegins';
  const INTERNAL_SOURCE = 'InternalSource';
  const MA_BATHS = 'MABaths';
  const MAINTENANCE = 'Maintenance';
  const MA_ROOMS = 'MARooms';
  const MAX_TERM = 'MaxTerm';
  const MIN_TERM = 'MinTerm';
  const ORL_MAX_ALBUM_ID = 'OLRMaxAlbumID';
  const ORIGINAL_ROOMS = 'OriginalRooms';
  const OUTDOOR_TYPE = 'OutDoorType';
  const OUT_DR_DESC = 'OutDrDesc';
  const OUTLOOK_TYPE = 'OutlookType';
  const OVERALL_CONDI = 'OverallCondi';
  const OWNER_PAY_FEE = 'OwnerPayFee';
  const PET_POLICY_TYPE = 'PetPolicyType';
  const PET_WEIGHT_LIMIT = 'PetWeightLimit';
  const POWDER_RM_COUNT = 'PowderRmCount';
  const PRE_WAR_DETAILS_ADDED = 'PreWarDetailsAdded';
  const PRICE = 'Price';
  const PRIMARY_RECIDENCE = 'PrimaryResidence';
  const RENT = 'Rent';
  const RENT2 = 'Rent2';
  const RENTAL_LISTING_TYPE = 'RentalListingType';
  const RENTAL_STATUS_CODE = 'RentalStatusCode';
  const RESTORED_DETAILS = 'RestoredDetails';
  const RE_TAXES = 'RETaxes';
  const ROOM_ATTRIBUTES = 'RoomAttributes';
  const ROOM_DIMENSIONS = 'RoomDimensions';
  const ROOMS = 'Rooms';
  const ROOMS_TYPE = 'RoomsType';
  const SALE_LISTING_TYPE = 'SaleListingType';
  const SALE_STATUS_CODE = 'SaleStatusCode';
  const SECURITY_DEPOSIT = 'SecurityDeposit';
  const SHARES = 'Shares';
  const SHARES_TYPE = 'SharesType';
  const SHOW_ADDRESS = 'ShowAddress';
  const SHOW_AGENT_ID = 'ShowAgentID';
  const SHOW_BROKER_WEB = 'ShowBrokerWeb';
  const SHOW_BUILDING_PHOTO = 'ShowBuildingPhoto';
  const SKY_LIGHT_COUNT = 'SkylightCount';
  const SPECIAL_FEATURES = 'SpecialFeatures';
  const SPONSOR_UNIT = 'SponsorUnit';
  const SQUARE_FOOTAGE = 'SquareFootage';
  const SURROUND_SOUND_SYSTEM = 'SurroundSoundSystem';
  const TENANCY = 'Tenancy';
  const THIRD_AGENT_ID = 'ThirdAgentId';
  const TIME_SHARE = 'TimeShare';
  const TIME_SHARE_PERIOD_IN_WEEKS = 'TimeSharePeriodInWeeks';
  const VIEW_TYPE = 'ViewType';
  const WINDOW_COUNT = 'WindowCount';
  const WINDOW_TYPE = 'WindowType';
  const WASHER_DRYER = 'WasherDryer';
  const IS_IDX_LISTING = 'IsIDXListing';
  const IS_MARKETED = 'IsMarketed';
  const COMPANY_NAME = 'CompanyName';
  const RENTAL_FEE_TYPE = 'RentalFeeType';
  const EXT_DAILY = 'ExtDaily';
  const EXT_DAILY_MIN_TERM = 'ExtDailyMinTerm';
  const EXT_DAILY_MAX_TERM = 'ExtDailyMaxTerm';
  const EXT_WEEKLY = 'ExtWeekly';
  const EXT_WEEKLY_MIN_TERM = 'ExtWeeklyMinTerm';
   const EXT_WEEKLY_MAX_TERM = 'ExtWeeklyMaxTerm';
  const SHORT_SALE = 'ShortSale';
  const SHORT_DALE_DATE = 'ShortSaleDate';
  const FORECLOSURE = 'Foreclosure';
  const FORECLOSURE_DATE = 'ForeclosureDate';
  const COF = 'COF';
  const AVAIL_AT_AUCTION = 'AvailAtAuction';
  const AUCTION_DATE = 'AuctionDate';
  const WBFP = 'WBFP';
  const GAS_FP = 'GasFP';
  const DECO_FP = 'DecoFP';
  const AVAILABILITY_STATUS = 'AvailabilityStatus';
  const SALES_LISTING_HASH = 'sales_listing_hash';
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
    return 'sales_listings';
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
  public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $bohemiadb = null, $table = null) {
    return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where, $bohemiadb);
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
