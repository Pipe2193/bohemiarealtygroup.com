<?php

use mvc\model\table\tableBaseClass;

/**
 * Description of salesBuildingBaseTableClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class salesBuildingBaseTableClass extends tableBaseClass {

  const ID = 'BuildingID';
  const ADDRESS = 'Address';
  const Age = 'Age';
  const ALTERNATE_ADDRESS = 'AlternateAddress';
  const APARTMENT_COUNT = 'ApartmentCount';
  const APARTMENTS_PER_FLOOR = 'ApartmentsPerFloor';
  const BLOCK = 'Block';
  const BOROUGH = 'Borough';
  const BUILDING_ACCESS = 'BuildingAccess';
  const BUILDING_CLASSIFICATION = 'BuildingClassification';
  const BUILDING_FEATURES_FEE_TYPE = 'BuildingFeaturesFeeType';
  const BUILDING_FEATURES_TYPE = 'BuildingFeaturesType';
  const BUILDING_POLICY = 'BuildingPolicy';
  const BUILDING_SIZE = 'BuildingSize';
  const BUILDING_TYPE = 'BuildingType';
  const BUILT_DEPTH = 'BuiltDepth';
  const BUILT_DEPTH_IN = 'BuiltDepthIn';
  const BUILT_SIZE_IRREGULAR = 'BuiltSizeIrregular';
  const BUILT_WIDTH = 'BuiltWidth';
  const BUILT_WIDGTH_IN = 'BuiltWidthIn';
  const CERTIFICATE_OF_OCCUPANCY = 'CertificateOfOccupancy';
  const CITY = 'City';
  const COMMERCIAL_UNITS = 'CommercialUnits';
  const COMMERCIAL_VACANT_UNITS = 'CommercialVacantUnits';
  const COMMUNITY_BOARD = 'CommunityBoard';
  const CONVERSION = 'Conversion';
  const CONVERSION_YEAR = 'ConversionYear';
  const CO_PURCHASING = 'CoPurchasing';
  const CORPORATE_GUARANTOR_ALLOWED = 'CorporateGuarantorAllowed';
  const CORPORATE_LEASE_ALLOWED = 'CorporateLeaseAllowed';
  const CORPORATE_OWNERSHIP_ALLOWED = 'CorporateOwnershipAllowed';
  const COUNTRY = 'Country';
  const CROSS_STREET1 = 'CrossStreet1';
  const CROSS_STREET2 = 'CrossStreet2';
  const DATE_ADDED = 'DateAdded';
  const DATE_MODIFIED = 'DateModified';
  const DEMOLISHED = 'Demolished';
  const DIPLOMATS_WELCOME = 'DiplomatsWelcome';
  const ELEVATION = 'Elevation';
  const ELEVATION_DESCRIPTION = 'ElevationDescription';
  const ELEVATOR = 'Elevator';
  const ELEVATOR_COUNT = 'ElevatorCount';
  const ENTRY_TYPE = 'EntryType';
  const EXT_DEPTH = 'ExtDepth';
  const EXT_DEPTH_IN = 'ExtDepthIn';
  const EXTENSION = 'Extension';
  const EXTENSION_SIZE_IRREGULAR = 'ExtensionSizeIrregular';
  const EXT_WIDTH = 'ExtWidth';
  const EXT_WIDTH_IN = 'ExtWidthIn';
  const FAR = 'FAR';
  const FINANCING_ALLOWED = 'FinancingAllowed';
  const FIRE_COMPANY = 'FireCompany';
  const FLIP_TAX = 'FlipTax';
  const FLIP_TAX_ON_SALE = 'FlipTaxOnSale';
  const FUTURE_CONVERSION = 'FutureConversion';
  const FUTURE_DEVELOPMENT = 'FutureDevelopment';
  const GIFTING = 'Gifting';
  const GREEN_BUILDING = 'GreenBuilding';
  const GROSS_LOT_AREA = 'GrossLotArea';
  const GUARANTOR_ALLOWED = 'GuarantorAllowed';
  const GUARANTOR_INCOME_REQUIREMENT = 'GuarantorIncomeRequirement';
  const GUARANTOR_REQUIRED = 'GuarantorRequired';
  const HEALTH_AREA = 'HealthArea';
  const HEALTH_CENTER_DISTRICT = 'HealthCenterDistrict';
  const INCOME_REQUIREMENT = 'IncomeRequirement';
  const LAND_LEASE = 'LandLease';
  const LAND_LEASE_EXPIRATION = 'LandLeaseExpiration';
  const LANDMARK = 'Landmark';
  const LAUNDRY_PER_APT = 'LaundryPerApt';
  const LAUNDRY_PER_FLOOR = 'LaundryPerFloor';
  const LAUNDRY_TYPE = 'LaundryType';
  const LEAD_CERTIFICATION = 'LeedCertification';
  const LOT = 'Lot';
  const LOT_DEPTH = 'LotDepth';
  const LOT_DEPTH_IN = 'LotDepthIn';
  const LOT_SIZE = 'LotSize';
  const LOT_SIZE_IRREGULAR = 'LotSizeIrregular';
  const LOT_WIDTH = 'LotWidth';
  const LOT_WIDTH_IN = 'LotWidthIn';
  const MIDDLE_SCHOOL_NUMBER = 'MiddleSchoolNumber';
  const MINIMUM_TERM = 'MinimumTerm';
  const NAME = 'Name';
  const NEIGHBORHOOD = 'Neighborhood';
  const OCCUPANCY_DATE = 'OccupancyDate';
  const OPEN_HOUSE_ALLOWED = 'OpenHouseAllowed';
  const OUTSIDE_NEIGHBORHOOD = 'OutsideNeighborhood';
  const OWNERSHIP_TYPE = 'OwnershipType';
  const PARENTAL_PURCHASING = 'ParentalPurchasing';
  const PET_POLICY = 'PetPolicy';
  const PET_POLICY_DESC = 'PetPolicyDesc';
  const PET_SECURITY_DEPOSIT = 'PetSecurityDeposit';
  const PET_WEIGHT_LIMIT = 'PetWeightLimit';
  const PICTURE_CONDITION = 'PictureCondition';
  const POLICE_PRECINT = 'PolicePrecinct';
  const PROFESSIONAL_UNITS = 'ProfessionalUnits';
  const PROFESSIONAL_VACANT_UNITS = 'ProfessionalVacantUnits';
  const PUBLIC_SCHOOL_NUMBER = 'PublicSchoolNumber';
  const RENOVATIONS = 'Renovations';
  const RENOVATION_TYPE = 'RenovationType';
  const RENTAL_COMPANY = 'Rentalcompany';
  const RENTAL_DEPOSIT = 'RentalDeposit';
  const RENTAL_DEPOSIT_REFUNDABLE = 'RentalDepositRefundable';
  const RENT_POLICY_BOARD_APPROVAL_NECESSARY = 'RentPolicyBoardApprovalNecessary';
  const RENTAL_POLICIES_SHARES = 'RentPolicyShares';
  const RENT_POLICY_WALLS = 'RentPolicyWalls';
  const RENT_STABILIZED = 'RentStabilized';
  const RESIDENTIAL_UNITS = 'ResidentialUnits';
  const RECIDENTIAL_VACANT_UNITS = 'ResidentialVacantUnits';
  const SALE_GUARANTORS = 'SaleGuarantors';
  const SCHOOL_DISTRICT = 'SchoolDistrict';
  const SECONDARY_FAR = 'SecondaryFAR';
  const SECONDARY_ZONING = 'SecondaryZoning';
  const SELF_MANAGED = 'SelfManaged';
  const SERVICE_LEVEL_TYPE = 'ServiceLevelType';
  const SHARES_ALLOWED = 'SharesAllowed';
  const SIZE = 'Size';
  const STATE = 'State';
  const STREET_TYPE = 'StreetType';
  const SUPER_TYPE = 'SuperType';
  const TAX_DEDUCT = 'TaxDeduct';
  const VACANT_UNITS = 'VacantUnits';
  const YEAR_BUILT = 'YearBuilt';
  const ZIPCODE = 'ZipCode';
  const ZONING = 'Zoning';
  const ZONING_NOTES = 'ZoningNotes';
  const NEIGHBORHOOD_NAME = 'NeighborhoodName';
  const FLOOR_COUNT = 'FloorCount';
  const SALES_BUILDING_HASH = 'sales_building_hash';
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
    return 'sales_buildings';
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
