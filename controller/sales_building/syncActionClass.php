<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of syncActionClass
 *
 * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
 */
class syncActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $sales_building_fields = array(
          salesBuildingTableClass::ID,
          salesBuildingTableClass::ADDRESS,
          salesBuildingTableClass::ALTERNATE_ADDRESS,
          salesBuildingTableClass::APARTMENTS_PER_FLOOR,
          salesBuildingTableClass::APARTMENT_COUNT,
          salesBuildingTableClass::Age,
          salesBuildingTableClass::BLOCK,
          salesBuildingTableClass::BOROUGH,
          salesBuildingTableClass::BUILDING_ACCESS,
          salesBuildingTableClass::BUILDING_CLASSIFICATION,
          salesBuildingTableClass::BUILDING_FEATURES_FEE_TYPE,
          salesBuildingTableClass::BUILDING_FEATURES_TYPE,
          salesBuildingTableClass::BUILDING_POLICY,
          salesBuildingTableClass::BUILDING_SIZE,
          salesBuildingTableClass::BUILDING_TYPE,
          salesBuildingTableClass::BUILT_DEPTH,
          salesBuildingTableClass::BUILT_DEPTH_IN,
          salesBuildingTableClass::BUILT_SIZE_IRREGULAR,
          salesBuildingTableClass::BUILT_WIDGTH_IN,
          salesBuildingTableClass::BUILT_WIDTH,
          salesBuildingTableClass::CERTIFICATE_OF_OCCUPANCY,
          salesBuildingTableClass::CITY,
          salesBuildingTableClass::COMMERCIAL_UNITS,
          salesBuildingTableClass::COMMERCIAL_VACANT_UNITS,
          salesBuildingTableClass::COMMUNITY_BOARD,
          salesBuildingTableClass::CONVERSION,
          salesBuildingTableClass::CONVERSION_YEAR,
          salesBuildingTableClass::CORPORATE_GUARANTOR_ALLOWED,
          salesBuildingTableClass::CORPORATE_LEASE_ALLOWED,
          salesBuildingTableClass::CORPORATE_OWNERSHIP_ALLOWED,
          salesBuildingTableClass::COUNTRY,
          salesBuildingTableClass::CO_PURCHASING,
          salesBuildingTableClass::CROSS_STREET1,
          salesBuildingTableClass::CROSS_STREET2,
          salesBuildingTableClass::DATE_ADDED,
          salesBuildingTableClass::DATE_MODIFIED,
          salesBuildingTableClass::DEMOLISHED,
          salesBuildingTableClass::DIPLOMATS_WELCOME,
          salesBuildingTableClass::ELEVATION,
          salesBuildingTableClass::ELEVATION_DESCRIPTION,
          salesBuildingTableClass::ELEVATOR,
          salesBuildingTableClass::ELEVATOR_COUNT,
          salesBuildingTableClass::ENTRY_TYPE,
          salesBuildingTableClass::EXTENSION,
          salesBuildingTableClass::EXTENSION_SIZE_IRREGULAR,
          salesBuildingTableClass::EXT_DEPTH,
          salesBuildingTableClass::EXT_DEPTH_IN,
          salesBuildingTableClass::EXT_WIDTH,
          salesBuildingTableClass::EXT_WIDTH_IN,
          salesBuildingTableClass::FAR,
          salesBuildingTableClass::FINANCING_ALLOWED,
          salesBuildingTableClass::FIRE_COMPANY,
          salesBuildingTableClass::FLIP_TAX,
          salesBuildingTableClass::FLIP_TAX_ON_SALE,
          salesBuildingTableClass::FLOOR_COUNT,
          salesBuildingTableClass::FUTURE_CONVERSION,
          salesBuildingTableClass::FUTURE_DEVELOPMENT,
          salesBuildingTableClass::GIFTING,
          salesBuildingTableClass::GREEN_BUILDING,
          salesBuildingTableClass::GROSS_LOT_AREA,
          salesBuildingTableClass::GUARANTOR_ALLOWED,
          salesBuildingTableClass::GUARANTOR_INCOME_REQUIREMENT,
          salesBuildingTableClass::HEALTH_AREA,
          salesBuildingTableClass::HEALTH_CENTER_DISTRICT,
          salesBuildingTableClass::INCOME_REQUIREMENT,
          salesBuildingTableClass::LANDMARK,
          salesBuildingTableClass::LAND_LEASE,
          salesBuildingTableClass::LAND_LEASE_EXPIRATION,
          salesBuildingTableClass::LAUNDRY_PER_APT,
          salesBuildingTableClass::LAUNDRY_PER_FLOOR,
          salesBuildingTableClass::LAUNDRY_TYPE,
          salesBuildingTableClass::LEAD_CERTIFICATION,
          salesBuildingTableClass::LOT,
          salesBuildingTableClass::LOT_DEPTH,
          salesBuildingTableClass::LOT_DEPTH_IN,
          salesBuildingTableClass::LOT_SIZE,
          salesBuildingTableClass::LOT_SIZE_IRREGULAR,
          salesBuildingTableClass::LOT_WIDTH,
          salesBuildingTableClass::LOT_WIDTH_IN,
          salesBuildingTableClass::MIDDLE_SCHOOL_NUMBER,
          salesBuildingTableClass::MINIMUM_TERM,
          salesBuildingTableClass::NAME,
          salesBuildingTableClass::NEIGHBORHOOD,
          salesBuildingTableClass::NEIGHBORHOOD_NAME,
          salesBuildingTableClass::OCCUPANCY_DATE,
          salesBuildingTableClass::OPEN_HOUSE_ALLOWED,
          salesBuildingTableClass::OUTSIDE_NEIGHBORHOOD,
          salesBuildingTableClass::OWNERSHIP_TYPE,
          salesBuildingTableClass::PARENTAL_PURCHASING,
          salesBuildingTableClass::PET_POLICY,
          salesBuildingTableClass::PET_POLICY_DESC,
          salesBuildingTableClass::PET_SECURITY_DEPOSIT,
          salesBuildingTableClass::PET_WEIGHT_LIMIT,
          salesBuildingTableClass::PICTURE_CONDITION,
          salesBuildingTableClass::POLICE_PRECINT,
          salesBuildingTableClass::PROFESSIONAL_UNITS,
          salesBuildingTableClass::PROFESSIONAL_VACANT_UNITS,
          salesBuildingTableClass::PUBLIC_SCHOOL_NUMBER,
          salesBuildingTableClass::RECIDENTIAL_VACANT_UNITS,
          salesBuildingTableClass::RENOVATIONS,
          salesBuildingTableClass::RENOVATION_TYPE,
          salesBuildingTableClass::RENTAL_COMPANY,
          salesBuildingTableClass::RENTAL_DEPOSIT,
          salesBuildingTableClass::RENTAL_DEPOSIT_REFUNDABLE,
          salesBuildingTableClass::RENTAL_POLICIES_SHARES,
          salesBuildingTableClass::RENT_POLICY_BOARD_APPROVAL_NECESSARY,
          salesBuildingTableClass::RENT_POLICY_WALLS,
          salesBuildingTableClass::RENT_STABILIZED,
          salesBuildingTableClass::RESIDENTIAL_UNITS,
          salesBuildingTableClass::SALE_GUARANTORS,
          salesBuildingTableClass::SCHOOL_DISTRICT,
          salesBuildingTableClass::SECONDARY_FAR,
          salesBuildingTableClass::SECONDARY_ZONING,
          salesBuildingTableClass::SELF_MANAGED,
          salesBuildingTableClass::SERVICE_LEVEL_TYPE,
          salesBuildingTableClass::SHARES_ALLOWED,
          salesBuildingTableClass::SIZE,
          salesBuildingTableClass::STATE,
          salesBuildingTableClass::STREET_TYPE,
          salesBuildingTableClass::SUPER_TYPE,
          salesBuildingTableClass::TAX_DEDUCT,
          salesBuildingTableClass::VACANT_UNITS,
          salesBuildingTableClass::YEAR_BUILT,
          salesBuildingTableClass::ZIPCODE,
          salesBuildingTableClass::ZONING,
          salesBuildingTableClass::ZONING_NOTES
      );
      $order_by_sales_buildings = array(
          salesBuildingTableClass::ID
      );


      $objSalesBuildings = salesBuildingTableClass::getAll($sales_building_fields, false, $order_by_sales_buildings, 'ASC', null, null, null, true);


      $sales_building_id = salesBuildingTableClass::ID;
      $sales_address = salesBuildingTableClass::ADDRESS;
      $sales_alt_address = salesBuildingTableClass::ALTERNATE_ADDRESS;
      $sales_apt_floor = salesBuildingTableClass::APARTMENTS_PER_FLOOR;
      $sales_apt_count = salesBuildingTableClass::APARTMENT_COUNT;
      $sales_age = salesBuildingTableClass::Age;
      $sales_block = salesBuildingTableClass::BLOCK;
      $sales_borough = salesBuildingTableClass::BOROUGH;
      $sales_building_access = salesBuildingTableClass::BUILDING_ACCESS;
      $sales_building_clasification = salesBuildingTableClass::BUILDING_CLASSIFICATION;
      $sales_building_features_fee_type = salesBuildingTableClass::BUILDING_FEATURES_FEE_TYPE;
      $sales_feature_type = salesBuildingTableClass::BUILDING_FEATURES_TYPE;
      $sales_building_policy = salesBuildingTableClass::BUILDING_POLICY;
      $sales_building_size = salesBuildingTableClass::BUILDING_SIZE;
      $sales_building_type = salesBuildingTableClass::BUILDING_TYPE;
      $sales_built_depth = salesBuildingTableClass::BUILT_DEPTH;
      $sales_built_depth_in = salesBuildingTableClass::BUILT_DEPTH_IN;
      $sales_built_size_irregular = salesBuildingTableClass::BUILT_SIZE_IRREGULAR;
      $sales_built_width_in = salesBuildingTableClass::BUILT_WIDGTH_IN;
      $sales_built_width = salesBuildingTableClass::BUILT_WIDTH;
      $sales_cert_occupancy = salesBuildingTableClass::CERTIFICATE_OF_OCCUPANCY;
      $sales_city = salesBuildingTableClass::CITY;
      $sales_commercial_units = salesBuildingTableClass::COMMERCIAL_UNITS;
      $sales_commercial_vacant_units = salesBuildingTableClass::COMMERCIAL_VACANT_UNITS;
      $sales_community_board = salesBuildingTableClass::COMMUNITY_BOARD;
      $sales_conversion = salesBuildingTableClass::CONVERSION;
      $sales_conversion_year = salesBuildingTableClass::CONVERSION_YEAR;
      $sales_corp_guarantor_allowed = salesBuildingTableClass::CORPORATE_GUARANTOR_ALLOWED;
      $sales_corp_lease_allowed = salesBuildingTableClass::CORPORATE_LEASE_ALLOWED;
      $sales_corp_ownership_allowed = salesBuildingTableClass::CORPORATE_OWNERSHIP_ALLOWED;
      $sales_country = salesBuildingTableClass::COUNTRY;
      $sales_co_purshasing = salesBuildingTableClass::CO_PURCHASING;
      $sales_cross_street1 = salesBuildingTableClass::CROSS_STREET1;
      $sales_cross_street2 = salesBuildingTableClass::CROSS_STREET2;
      $sales_date_added = salesBuildingTableClass::DATE_ADDED;
      $sales_date_modified = salesBuildingTableClass::DATE_MODIFIED;
      $sales_demolished = salesBuildingTableClass::DEMOLISHED;
      $sales_diplomats_welcome = salesBuildingTableClass::DIPLOMATS_WELCOME;
      $sales_elevation = salesBuildingTableClass::ELEVATION;
      $sales_elevation_desc = salesBuildingTableClass::ELEVATION_DESCRIPTION;
      $sales_elevator = salesBuildingTableClass::ELEVATOR;
      $sales_elevator_count = salesBuildingTableClass::ELEVATOR_COUNT;
      $sales_entry_type = salesBuildingTableClass::ENTRY_TYPE;
      $sales_extension = salesBuildingTableClass::EXTENSION;
      $sales_ext_size_irregular = salesBuildingTableClass::EXTENSION_SIZE_IRREGULAR;
      $sales_ext_depth = salesBuildingTableClass::EXT_DEPTH;
      $sales_ext_depth_in = salesBuildingTableClass::EXT_DEPTH_IN;
      $sales_ext_width = salesBuildingTableClass::EXT_WIDTH;
      $sales_ext_width_in = salesBuildingTableClass::EXT_WIDTH_IN;
      $sales_far = salesBuildingTableClass::FAR;
      $sales_financing_allowed = salesBuildingTableClass::FINANCING_ALLOWED;
      $sales_fire_company = salesBuildingTableClass::FIRE_COMPANY;
      $sales_flip_tax = salesBuildingTableClass::FLIP_TAX;
      $sales_flip_tax_on_sale = salesBuildingTableClass::FLIP_TAX_ON_SALE;
      $sales_floor_count = salesBuildingTableClass::FLOOR_COUNT;
      $sales_future_conversion = salesBuildingTableClass::FUTURE_CONVERSION;
      $sales_future_development = salesBuildingTableClass::FUTURE_DEVELOPMENT;
      $sales_gifting = salesBuildingTableClass::GIFTING;
      $sales_green_building = salesBuildingTableClass::GREEN_BUILDING;
      $sales_gross_lot_area = salesBuildingTableClass::GROSS_LOT_AREA;
      $sales_guarantor_allowed = salesBuildingTableClass::GUARANTOR_ALLOWED;
      $sales_guarantor_income_requirement = salesBuildingTableClass::GUARANTOR_INCOME_REQUIREMENT;
      $sales_health_area = salesBuildingTableClass::HEALTH_AREA;
      $sales_health_center_district = salesBuildingTableClass::HEALTH_CENTER_DISTRICT;
      $sales_income_requirement = salesBuildingTableClass::INCOME_REQUIREMENT;
      $sales_landmark = salesBuildingTableClass::LANDMARK;
      $sales_land_lease = salesBuildingTableClass::LAND_LEASE;
      $sales_land_lease_expiration = salesBuildingTableClass::LAND_LEASE_EXPIRATION;
      $sales_laundry_apt = salesBuildingTableClass::LAUNDRY_PER_APT;
      $sales_laundry_floor = salesBuildingTableClass::LAUNDRY_PER_FLOOR;
      $sales_laundry_type = salesBuildingTableClass::LAUNDRY_TYPE;
      $sales_lead_certification = salesBuildingTableClass::LEAD_CERTIFICATION;
      $sales_lot = salesBuildingTableClass::LOT;
      $sales_lot_depth = salesBuildingTableClass::LOT_DEPTH;
      $sales_lot_depth_in = salesBuildingTableClass::LOT_DEPTH_IN;
      $sales_lot_size = salesBuildingTableClass::LOT_SIZE;
      $sales_lot_size_irregular = salesBuildingTableClass::LOT_SIZE_IRREGULAR;
      $sales_lot_width = salesBuildingTableClass::LOT_WIDTH;
      $sales_lot_width_in = salesBuildingTableClass::LOT_WIDTH_IN;
      $sales_middle_school_number = salesBuildingTableClass::MIDDLE_SCHOOL_NUMBER;
      $sales_minimum_term = salesBuildingTableClass::MINIMUM_TERM;
      $sales_name = salesBuildingTableClass::NAME;
      $sales_neighborhood = salesBuildingTableClass::NEIGHBORHOOD;
      $sales_neighborhood_name = salesBuildingTableClass::NEIGHBORHOOD_NAME;
      $sales_occupancy_date = salesBuildingTableClass::OCCUPANCY_DATE;
      $sales_open_house_allowed = salesBuildingTableClass::OPEN_HOUSE_ALLOWED;
      $sales_outside_neighborhood = salesBuildingTableClass::OUTSIDE_NEIGHBORHOOD;
      $sales_ownership_type = salesBuildingTableClass::OWNERSHIP_TYPE;
      $sales_parental_purchasing = salesBuildingTableClass::PARENTAL_PURCHASING;
      $sales_pet_policy = salesBuildingTableClass::PET_POLICY;
      $sales_pet_policy_desc = salesBuildingTableClass::PET_POLICY_DESC;
      $sales_security_deposit = salesBuildingTableClass::PET_SECURITY_DEPOSIT;
      $sales_pet_weight_limit = salesBuildingTableClass::PET_WEIGHT_LIMIT;
      $sales_picture_condition = salesBuildingTableClass::PICTURE_CONDITION;
      $sales_police_precint = salesBuildingTableClass::POLICE_PRECINT;
      $sales_professional_units = salesBuildingTableClass::PROFESSIONAL_UNITS;
      $sales_professional_vacant_units = salesBuildingTableClass::PROFESSIONAL_VACANT_UNITS;
      $sales_public_school_number = salesBuildingTableClass::PUBLIC_SCHOOL_NUMBER;
      $sales_residential_vancant_units = salesBuildingTableClass::RECIDENTIAL_VACANT_UNITS;
      $sales_renovations = salesBuildingTableClass::RENOVATIONS;
      $sales_renovation_type = salesBuildingTableClass::RENOVATION_TYPE;
      $sales_rental_company = salesBuildingTableClass::RENTAL_COMPANY;
      $sales_rental_deposit = salesBuildingTableClass::RENTAL_DEPOSIT;
      $sales_rental_deposit_refundable = salesBuildingTableClass::RENTAL_DEPOSIT_REFUNDABLE;
      $sales_rental_policies_shares = salesBuildingTableClass::RENTAL_POLICIES_SHARES;
      $sales_rental_policy_board_approval_necessary = salesBuildingTableClass::RENT_POLICY_BOARD_APPROVAL_NECESSARY;
      $sales_rental_policy_walls = salesBuildingTableClass::RENT_POLICY_WALLS;
      $sales_rent_stabilized = salesBuildingTableClass::RENT_STABILIZED;
      $sales_residential_units = salesBuildingTableClass::RESIDENTIAL_UNITS;
      $sales_sale_guarantors = salesBuildingTableClass::SALE_GUARANTORS;
      $sales_school_district = salesBuildingTableClass::SCHOOL_DISTRICT;
      $sales_secondary_far = salesBuildingTableClass::SECONDARY_FAR;
      $sales_secondary_zoning = salesBuildingTableClass::SECONDARY_ZONING;
      $sales_self_managed = salesBuildingTableClass::SELF_MANAGED;
      $sales_service_level_type = salesBuildingTableClass::SERVICE_LEVEL_TYPE;
      $sales_shares_allowed = salesBuildingTableClass::SHARES_ALLOWED;
      $sales_size = salesBuildingTableClass::SIZE;
      $sales_state = salesBuildingTableClass::STATE;
      $sales_street_type = salesBuildingTableClass::STREET_TYPE;
      $sales_super_type = salesBuildingTableClass::SUPER_TYPE;
      $sales_tax_deduct = salesBuildingTableClass::TAX_DEDUCT;
      $sales_vacant_units = salesBuildingTableClass::VACANT_UNITS;
      $sales_year_built = salesBuildingTableClass::YEAR_BUILT;
      $sales_zipcode = salesBuildingTableClass::ZIPCODE;
      $sales_zoning = salesBuildingTableClass::ZONING;
      $sales_zoning_notes = salesBuildingTableClass::ZONING_NOTES;


      foreach ($objSalesBuildings as $sales_buildings):

        $sales_building_hash = md5(md5(date('U') . $sales_buildings->$sales_building_id));


        $validate = salesBuildingTableClass::getSalesBuildingHash($sales_buildings->$sales_building_id);
        if ($validate == false) {
          
          $data_sales_building = array(
              
              salesBuildingTableClass::ID => $sales_buildings->$sales_building_id,
              salesBuildingTableClass::ADDRESS => $sales_buildings->$sales_address,
              salesBuildingTableClass::ALTERNATE_ADDRESS => $sales_buildings->$sales_alt_address,
              salesBuildingTableClass::APARTMENTS_PER_FLOOR => $sales_buildings->$sales_apt_floor,
              salesBuildingTableClass::APARTMENT_COUNT => $sales_buildings->$sales_apt_count,
              salesBuildingTableClass::Age => $sales_buildings->$sales_age,
              salesBuildingTableClass::BLOCK => $sales_buildings->$sales_block,
              salesBuildingTableClass::BOROUGH => $sales_buildings->$sales_borough,
              salesBuildingTableClass::BUILDING_ACCESS => $sales_buildings->$sales_building_access,
              salesBuildingTableClass::BUILDING_CLASSIFICATION => $sales_buildings->$sales_building_clasification,
              salesBuildingTableClass::BUILDING_FEATURES_FEE_TYPE => $sales_buildings->$sales_building_features_fee_type,
              salesBuildingTableClass::BUILDING_FEATURES_TYPE => $sales_buildings->$sales_feature_type,
              salesBuildingTableClass::BUILDING_POLICY => $sales_buildings->$sales_building_policy,
              salesBuildingTableClass::BUILDING_SIZE => $sales_buildings->$sales_building_size,
              salesBuildingTableClass::BUILDING_TYPE => $sales_buildings->$sales_building_type,
              salesBuildingTableClass::BUILT_DEPTH => $sales_buildings->$sales_built_depth,
              salesBuildingTableClass::BUILT_DEPTH_IN => $sales_buildings->$sales_built_depth_in,
              salesBuildingTableClass::BUILT_SIZE_IRREGULAR => $sales_buildings->$sales_built_size_irregular,
              salesBuildingTableClass::BUILT_WIDGTH_IN => $sales_buildings->$sales_built_width_in,
              salesBuildingTableClass::BUILT_WIDTH => $sales_buildings->$sales_built_width,
              salesBuildingTableClass::CERTIFICATE_OF_OCCUPANCY => $sales_buildings->$sales_cert_occupancy,
              salesBuildingTableClass::CITY => $sales_buildings->$sales_city,
              salesBuildingTableClass::COMMERCIAL_UNITS => $sales_buildings->$sales_commercial_units,
              salesBuildingTableClass::COMMERCIAL_VACANT_UNITS => $sales_buildings->$sales_commercial_vacant_units,
              salesBuildingTableClass::COMMUNITY_BOARD => $sales_buildings->$sales_community_board,
              salesBuildingTableClass::CONVERSION => $sales_buildings->$sales_conversion,
              salesBuildingTableClass::CONVERSION_YEAR => $sales_buildings->$sales_conversion_year,
              salesBuildingTableClass::CORPORATE_GUARANTOR_ALLOWED => $sales_buildings->$sales_corp_guarantor_allowed,
              salesBuildingTableClass::CORPORATE_LEASE_ALLOWED => $sales_buildings->$sales_corp_lease_allowed,
              salesBuildingTableClass::CORPORATE_OWNERSHIP_ALLOWED => $sales_buildings->$sales_corp_ownership_allowed,
              salesBuildingTableClass::COUNTRY => $sales_buildings->$sales_country,
              salesBuildingTableClass::CO_PURCHASING => $sales_buildings->$sales_co_purshasing,
              salesBuildingTableClass::CROSS_STREET1 => $sales_buildings->$sales_cross_street1,
              salesBuildingTableClass::CROSS_STREET2 => $sales_buildings->$sales_cross_street2,
              salesBuildingTableClass::DATE_ADDED => $sales_buildings->$sales_date_added,
              salesBuildingTableClass::DATE_MODIFIED => $sales_buildings->$sales_date_modified,
              salesBuildingTableClass::DEMOLISHED => $sales_buildings->$sales_demolished,
              salesBuildingTableClass::DIPLOMATS_WELCOME => $sales_buildings->$sales_diplomats_welcome,
              salesBuildingTableClass::ELEVATION => $sales_buildings->$sales_elevation,
              salesBuildingTableClass::ELEVATION_DESCRIPTION => $sales_buildings->$sales_elevation_desc,
              salesBuildingTableClass::ELEVATOR => $sales_buildings->$sales_elevator,
              salesBuildingTableClass::ELEVATOR_COUNT => $sales_buildings->$sales_elevator_count,
              salesBuildingTableClass::ENTRY_TYPE => $sales_buildings->$sales_entry_type,
              salesBuildingTableClass::EXTENSION => $sales_buildings->$sales_extension,
              salesBuildingTableClass::EXTENSION_SIZE_IRREGULAR => $sales_buildings->$sales_ext_size_irregular,
              salesBuildingTableClass::EXT_DEPTH => $sales_buildings->$sales_ext_depth,
              salesBuildingTableClass::EXT_DEPTH_IN => $sales_buildings->$sales_ext_depth_in,
              salesBuildingTableClass::EXT_WIDTH => $sales_buildings->$sales_ext_width,
              salesBuildingTableClass::EXT_WIDTH_IN => $sales_buildings->$sales_ext_width_in,
              salesBuildingTableClass::FAR => $sales_buildings->$sales_far,
              salesBuildingTableClass::FINANCING_ALLOWED => $sales_buildings->$sales_financing_allowed,
              salesBuildingTableClass::FIRE_COMPANY => $sales_buildings->$sales_fire_company,
              salesBuildingTableClass::FLIP_TAX => $sales_buildings->$sales_flip_tax,
              salesBuildingTableClass::FLIP_TAX_ON_SALE => $sales_buildings->$sales_flip_tax_on_sale,
              salesBuildingTableClass::FLOOR_COUNT => $sales_buildings->$sales_floor_count,
              salesBuildingTableClass::FUTURE_CONVERSION => $sales_buildings->$sales_future_conversion,
              salesBuildingTableClass::FUTURE_DEVELOPMENT => $sales_buildings->$sales_future_development,
              salesBuildingTableClass::GIFTING => $sales_buildings->$sales_gifting,
              salesBuildingTableClass::GREEN_BUILDING => $sales_buildings->$sales_green_building,
              salesBuildingTableClass::GROSS_LOT_AREA => $sales_buildings->$sales_gross_lot_area,
              salesBuildingTableClass::GUARANTOR_ALLOWED => $sales_buildings->$sales_guarantor_allowed,
              salesBuildingTableClass::GUARANTOR_INCOME_REQUIREMENT => $sales_buildings->$sales_guarantor_income_requirement,
              salesBuildingTableClass::HEALTH_AREA => $sales_buildings->$sales_health_area,
              salesBuildingTableClass::HEALTH_CENTER_DISTRICT => $sales_buildings->$sales_health_center_district,
              salesBuildingTableClass::INCOME_REQUIREMENT => $sales_buildings->$sales_income_requirement,
              salesBuildingTableClass::LANDMARK => $sales_buildings->$sales_landmark,
              salesBuildingTableClass::LAND_LEASE => $sales_buildings->$sales_land_lease,
              salesBuildingTableClass::LAND_LEASE_EXPIRATION => $sales_buildings->$sales_land_lease_expiration,
              salesBuildingTableClass::LAUNDRY_PER_APT => $sales_buildings->$sales_laundry_apt,
              salesBuildingTableClass::LAUNDRY_PER_FLOOR => $sales_buildings->$sales_laundry_floor,
              salesBuildingTableClass::LAUNDRY_TYPE => $sales_buildings->$sales_laundry_type,
              salesBuildingTableClass::LEAD_CERTIFICATION => $sales_buildings->$sales_lead_certification,
              salesBuildingTableClass::LOT => $sales_buildings->$sales_lot,
              salesBuildingTableClass::LOT_DEPTH => $sales_buildings->$sales_lot_depth,
              salesBuildingTableClass::LOT_DEPTH_IN => $sales_buildings->$sales_lot_depth_in,
              salesBuildingTableClass::LOT_SIZE => $sales_buildings->$sales_lot_size,
              salesBuildingTableClass::LOT_SIZE_IRREGULAR => $sales_buildings->$sales_lot_size_irregular,
              salesBuildingTableClass::LOT_WIDTH => $sales_buildings->$sales_lot_width,
              salesBuildingTableClass::LOT_WIDTH_IN => $sales_buildings->$sales_lot_width_in,
              salesBuildingTableClass::MIDDLE_SCHOOL_NUMBER => $sales_buildings->$sales_middle_school_number,
              salesBuildingTableClass::MINIMUM_TERM => $sales_buildings->$sales_minimum_term,
              salesBuildingTableClass::NAME => $sales_buildings->$sales_name,
              salesBuildingTableClass::NEIGHBORHOOD => $sales_buildings->$sales_neighborhood,
              salesBuildingTableClass::NEIGHBORHOOD_NAME => $sales_buildings->$sales_neighborhood_name,
              salesBuildingTableClass::OCCUPANCY_DATE => $sales_buildings->$sales_occupancy_date,
              salesBuildingTableClass::OPEN_HOUSE_ALLOWED => $sales_buildings->$sales_open_house_allowed,
              salesBuildingTableClass::OUTSIDE_NEIGHBORHOOD => $sales_buildings->$sales_outside_neighborhood,
              salesBuildingTableClass::OWNERSHIP_TYPE => $sales_buildings->$sales_ownership_type,
              salesBuildingTableClass::PARENTAL_PURCHASING => $sales_buildings->$sales_parental_purchasing,
              salesBuildingTableClass::PET_POLICY => $sales_buildings->$sales_pet_policy,
              salesBuildingTableClass::PET_POLICY_DESC => $sales_buildings->$sales_pet_policy_desc,
              salesBuildingTableClass::PET_SECURITY_DEPOSIT => $sales_buildings->$sales_security_deposit,
              salesBuildingTableClass::PET_WEIGHT_LIMIT => $sales_buildings->$sales_pet_weight_limit,
              salesBuildingTableClass::PICTURE_CONDITION => $sales_buildings->$sales_picture_condition,
              salesBuildingTableClass::POLICE_PRECINT => $sales_buildings->$sales_police_precint,
              salesBuildingTableClass::PROFESSIONAL_UNITS => $sales_buildings->$sales_professional_units,
              salesBuildingTableClass::PROFESSIONAL_VACANT_UNITS => $sales_buildings->$sales_professional_vacant_units,
              salesBuildingTableClass::PUBLIC_SCHOOL_NUMBER => $sales_buildings->$sales_public_school_number,
              salesBuildingTableClass::RECIDENTIAL_VACANT_UNITS => $sales_buildings->$sales_residential_vancant_units,
              salesBuildingTableClass::RENOVATIONS => $sales_buildings->$sales_renovations,
              salesBuildingTableClass::RENOVATION_TYPE => $sales_buildings->$sales_renovation_type,
              salesBuildingTableClass::RENTAL_COMPANY => $sales_buildings->$sales_rental_company,
              salesBuildingTableClass::RENTAL_DEPOSIT => $sales_buildings->$sales_rental_deposit,
              salesBuildingTableClass::RENTAL_DEPOSIT_REFUNDABLE => $sales_buildings->$sales_rental_deposit_refundable,
              salesBuildingTableClass::RENTAL_POLICIES_SHARES => $sales_buildings->$sales_rental_policies_shares,
              salesBuildingTableClass::RENT_POLICY_BOARD_APPROVAL_NECESSARY => $sales_buildings->$sales_rental_policy_board_approval_necessary,
              salesBuildingTableClass::RENT_POLICY_WALLS => $sales_buildings->$sales_rental_policy_walls,
              salesBuildingTableClass::RENT_STABILIZED => $sales_buildings->$sales_rent_stabilized,
              salesBuildingTableClass::RESIDENTIAL_UNITS => $sales_buildings->$sales_residential_units,
              salesBuildingTableClass::SALE_GUARANTORS => $sales_buildings->$sales_sale_guarantors,
              salesBuildingTableClass::SCHOOL_DISTRICT => $sales_buildings->$sales_school_district,
              salesBuildingTableClass::SECONDARY_FAR => $sales_buildings->$sales_secondary_far,
              salesBuildingTableClass::SECONDARY_ZONING => $sales_buildings->$sales_secondary_zoning,
              salesBuildingTableClass::SELF_MANAGED => $sales_buildings->$sales_self_managed,
              salesBuildingTableClass::SERVICE_LEVEL_TYPE => $sales_buildings->$sales_service_level_type,
              salesBuildingTableClass::SHARES_ALLOWED => $sales_buildings->$sales_shares_allowed,
              salesBuildingTableClass::SIZE => $sales_buildings->$sales_size,
              salesBuildingTableClass::STATE => $sales_buildings->$sales_state,
              salesBuildingTableClass::STREET_TYPE => $sales_buildings->$sales_street_type,
              salesBuildingTableClass::SUPER_TYPE => $sales_buildings->$sales_super_type,
              salesBuildingTableClass::TAX_DEDUCT => $sales_buildings->$sales_tax_deduct,
              salesBuildingTableClass::VACANT_UNITS => $sales_buildings->$sales_vacant_units,
              salesBuildingTableClass::YEAR_BUILT => $sales_buildings->$sales_year_built,
              salesBuildingTableClass::ZIPCODE => $sales_buildings->$sales_zipcode,
              salesBuildingTableClass::ZONING => $sales_buildings->$sales_zoning,
              salesBuildingTableClass::ZONING_NOTES => $sales_buildings->$sales_zoning_notes,
              salesBuildingTableClass::SALES_BUILDING_HASH => $sales_building_hash
          );

          salesBuildingTableClass::insert($data_sales_building);
          
        } else {


          $data = array(
              salesBuildingTableClass::ADDRESS => $sales_buildings->$sales_address,
              salesBuildingTableClass::ALTERNATE_ADDRESS => $sales_buildings->$sales_alt_address,
              salesBuildingTableClass::APARTMENTS_PER_FLOOR => $sales_buildings->$sales_apt_floor,
              salesBuildingTableClass::APARTMENT_COUNT => $sales_buildings->$sales_apt_count,
              salesBuildingTableClass::Age => $sales_buildings->$sales_age,
              salesBuildingTableClass::BLOCK => $sales_buildings->$sales_block,
              salesBuildingTableClass::BOROUGH => $sales_buildings->$sales_borough,
              salesBuildingTableClass::BUILDING_ACCESS => $sales_buildings->$sales_building_access,
              salesBuildingTableClass::BUILDING_CLASSIFICATION => $sales_buildings->$sales_building_clasification,
              salesBuildingTableClass::BUILDING_FEATURES_FEE_TYPE => $sales_buildings->$sales_building_features_fee_type,
              salesBuildingTableClass::BUILDING_FEATURES_TYPE => $sales_buildings->$sales_feature_type,
              salesBuildingTableClass::BUILDING_POLICY => $sales_buildings->$sales_building_policy,
              salesBuildingTableClass::BUILDING_SIZE => $sales_buildings->$sales_building_size,
              salesBuildingTableClass::BUILDING_TYPE => $sales_buildings->$sales_building_type,
              salesBuildingTableClass::BUILT_DEPTH => $sales_buildings->$sales_built_depth,
              salesBuildingTableClass::BUILT_DEPTH_IN => $sales_buildings->$sales_built_depth_in,
              salesBuildingTableClass::BUILT_SIZE_IRREGULAR => $sales_buildings->$sales_built_size_irregular,
              salesBuildingTableClass::BUILT_WIDGTH_IN => $sales_buildings->$sales_built_width_in,
              salesBuildingTableClass::BUILT_WIDTH => $sales_buildings->$sales_built_width,
              salesBuildingTableClass::CERTIFICATE_OF_OCCUPANCY => $sales_buildings->$sales_cert_occupancy,
              salesBuildingTableClass::CITY => $sales_buildings->$sales_city,
              salesBuildingTableClass::COMMERCIAL_UNITS => $sales_buildings->$sales_commercial_units,
              salesBuildingTableClass::COMMERCIAL_VACANT_UNITS => $sales_buildings->$sales_commercial_vacant_units,
              salesBuildingTableClass::COMMUNITY_BOARD => $sales_buildings->$sales_community_board,
              salesBuildingTableClass::CONVERSION => $sales_buildings->$sales_conversion,
              salesBuildingTableClass::CONVERSION_YEAR => $sales_buildings->$sales_conversion_year,
              salesBuildingTableClass::CORPORATE_GUARANTOR_ALLOWED => $sales_buildings->$sales_corp_guarantor_allowed,
              salesBuildingTableClass::CORPORATE_LEASE_ALLOWED => $sales_buildings->$sales_corp_lease_allowed,
              salesBuildingTableClass::CORPORATE_OWNERSHIP_ALLOWED => $sales_buildings->$sales_corp_ownership_allowed,
              salesBuildingTableClass::COUNTRY => $sales_buildings->$sales_country,
              salesBuildingTableClass::CO_PURCHASING => $sales_buildings->$sales_co_purshasing,
              salesBuildingTableClass::CROSS_STREET1 => $sales_buildings->$sales_cross_street1,
              salesBuildingTableClass::CROSS_STREET2 => $sales_buildings->$sales_cross_street2,
              salesBuildingTableClass::DATE_ADDED => $sales_buildings->$sales_date_added,
              salesBuildingTableClass::DATE_MODIFIED => $sales_buildings->$sales_date_modified,
              salesBuildingTableClass::DEMOLISHED => $sales_buildings->$sales_demolished,
              salesBuildingTableClass::DIPLOMATS_WELCOME => $sales_buildings->$sales_diplomats_welcome,
              salesBuildingTableClass::ELEVATION => $sales_buildings->$sales_elevation,
              salesBuildingTableClass::ELEVATION_DESCRIPTION => $sales_buildings->$sales_elevation_desc,
              salesBuildingTableClass::ELEVATOR => $sales_buildings->$sales_elevator,
              salesBuildingTableClass::ELEVATOR_COUNT => $sales_buildings->$sales_elevator_count,
              salesBuildingTableClass::ENTRY_TYPE => $sales_buildings->$sales_entry_type,
              salesBuildingTableClass::EXTENSION => $sales_buildings->$sales_extension,
              salesBuildingTableClass::EXTENSION_SIZE_IRREGULAR => $sales_buildings->$sales_ext_size_irregular,
              salesBuildingTableClass::EXT_DEPTH => $sales_buildings->$sales_ext_depth,
              salesBuildingTableClass::EXT_DEPTH_IN => $sales_buildings->$sales_ext_depth_in,
              salesBuildingTableClass::EXT_WIDTH => $sales_buildings->$sales_ext_width,
              salesBuildingTableClass::EXT_WIDTH_IN => $sales_buildings->$sales_ext_width_in,
              salesBuildingTableClass::FAR => $sales_buildings->$sales_far,
              salesBuildingTableClass::FINANCING_ALLOWED => $sales_buildings->$sales_financing_allowed,
              salesBuildingTableClass::FIRE_COMPANY => $sales_buildings->$sales_fire_company,
              salesBuildingTableClass::FLIP_TAX => $sales_buildings->$sales_flip_tax,
              salesBuildingTableClass::FLIP_TAX_ON_SALE => $sales_buildings->$sales_flip_tax_on_sale,
              salesBuildingTableClass::FLOOR_COUNT => $sales_buildings->$sales_floor_count,
              salesBuildingTableClass::FUTURE_CONVERSION => $sales_buildings->$sales_future_conversion,
              salesBuildingTableClass::FUTURE_DEVELOPMENT => $sales_buildings->$sales_future_development,
              salesBuildingTableClass::GIFTING => $sales_buildings->$sales_gifting,
              salesBuildingTableClass::GREEN_BUILDING => $sales_buildings->$sales_green_building,
              salesBuildingTableClass::GROSS_LOT_AREA => $sales_buildings->$sales_gross_lot_area,
              salesBuildingTableClass::GUARANTOR_ALLOWED => $sales_buildings->$sales_guarantor_allowed,
              salesBuildingTableClass::GUARANTOR_INCOME_REQUIREMENT => $sales_buildings->$sales_guarantor_income_requirement,
              salesBuildingTableClass::HEALTH_AREA => $sales_buildings->$sales_health_area,
              salesBuildingTableClass::HEALTH_CENTER_DISTRICT => $sales_buildings->$sales_health_center_district,
              salesBuildingTableClass::INCOME_REQUIREMENT => $sales_buildings->$sales_income_requirement,
              salesBuildingTableClass::LANDMARK => $sales_buildings->$sales_landmark,
              salesBuildingTableClass::LAND_LEASE => $sales_buildings->$sales_land_lease,
              salesBuildingTableClass::LAND_LEASE_EXPIRATION => $sales_buildings->$sales_land_lease_expiration,
              salesBuildingTableClass::LAUNDRY_PER_APT => $sales_buildings->$sales_laundry_apt,
              salesBuildingTableClass::LAUNDRY_PER_FLOOR => $sales_buildings->$sales_laundry_floor,
              salesBuildingTableClass::LAUNDRY_TYPE => $sales_buildings->$sales_laundry_type,
              salesBuildingTableClass::LEAD_CERTIFICATION => $sales_buildings->$sales_lead_certification,
              salesBuildingTableClass::LOT => $sales_buildings->$sales_lot,
              salesBuildingTableClass::LOT_DEPTH => $sales_buildings->$sales_lot_depth,
              salesBuildingTableClass::LOT_DEPTH_IN => $sales_buildings->$sales_lot_depth_in,
              salesBuildingTableClass::LOT_SIZE => $sales_buildings->$sales_lot_size,
              salesBuildingTableClass::LOT_SIZE_IRREGULAR => $sales_buildings->$sales_lot_size_irregular,
              salesBuildingTableClass::LOT_WIDTH => $sales_buildings->$sales_lot_width,
              salesBuildingTableClass::LOT_WIDTH_IN => $sales_buildings->$sales_lot_width_in,
              salesBuildingTableClass::MIDDLE_SCHOOL_NUMBER => $sales_buildings->$sales_middle_school_number,
              salesBuildingTableClass::MINIMUM_TERM => $sales_buildings->$sales_minimum_term,
              salesBuildingTableClass::NAME => $sales_buildings->$sales_name,
              salesBuildingTableClass::NEIGHBORHOOD => $sales_buildings->$sales_neighborhood,
              salesBuildingTableClass::NEIGHBORHOOD_NAME => $sales_buildings->$sales_neighborhood_name,
              salesBuildingTableClass::OCCUPANCY_DATE => $sales_buildings->$sales_occupancy_date,
              salesBuildingTableClass::OPEN_HOUSE_ALLOWED => $sales_buildings->$sales_open_house_allowed,
              salesBuildingTableClass::OUTSIDE_NEIGHBORHOOD => $sales_buildings->$sales_outside_neighborhood,
              salesBuildingTableClass::OWNERSHIP_TYPE => $sales_buildings->$sales_ownership_type,
              salesBuildingTableClass::PARENTAL_PURCHASING => $sales_buildings->$sales_parental_purchasing,
              salesBuildingTableClass::PET_POLICY => $sales_buildings->$sales_pet_policy,
              salesBuildingTableClass::PET_POLICY_DESC => $sales_buildings->$sales_pet_policy_desc,
              salesBuildingTableClass::PET_SECURITY_DEPOSIT => $sales_buildings->$sales_security_deposit,
              salesBuildingTableClass::PET_WEIGHT_LIMIT => $sales_buildings->$sales_pet_weight_limit,
              salesBuildingTableClass::PICTURE_CONDITION => $sales_buildings->$sales_picture_condition,
              salesBuildingTableClass::POLICE_PRECINT => $sales_buildings->$sales_police_precint,
              salesBuildingTableClass::PROFESSIONAL_UNITS => $sales_buildings->$sales_professional_units,
              salesBuildingTableClass::PROFESSIONAL_VACANT_UNITS => $sales_buildings->$sales_professional_vacant_units,
              salesBuildingTableClass::PUBLIC_SCHOOL_NUMBER => $sales_buildings->$sales_public_school_number,
              salesBuildingTableClass::RECIDENTIAL_VACANT_UNITS => $sales_buildings->$sales_residential_vancant_units,
              salesBuildingTableClass::RENOVATIONS => $sales_buildings->$sales_renovations,
              salesBuildingTableClass::RENOVATION_TYPE => $sales_buildings->$sales_renovation_type,
              salesBuildingTableClass::RENTAL_COMPANY => $sales_buildings->$sales_rental_company,
              salesBuildingTableClass::RENTAL_DEPOSIT => $sales_buildings->$sales_rental_deposit,
              salesBuildingTableClass::RENTAL_DEPOSIT_REFUNDABLE => $sales_buildings->$sales_rental_deposit_refundable,
              salesBuildingTableClass::RENTAL_POLICIES_SHARES => $sales_buildings->$sales_rental_policies_shares,
              salesBuildingTableClass::RENT_POLICY_BOARD_APPROVAL_NECESSARY => $sales_buildings->$sales_rental_policy_board_approval_necessary,
              salesBuildingTableClass::RENT_POLICY_WALLS => $sales_buildings->$sales_rental_policy_walls,
              salesBuildingTableClass::RENT_STABILIZED => $sales_buildings->$sales_rent_stabilized,
              salesBuildingTableClass::RESIDENTIAL_UNITS => $sales_buildings->$sales_residential_units,
              salesBuildingTableClass::SALE_GUARANTORS => $sales_buildings->$sales_sale_guarantors,
              salesBuildingTableClass::SCHOOL_DISTRICT => $sales_buildings->$sales_school_district,
              salesBuildingTableClass::SECONDARY_FAR => $sales_buildings->$sales_secondary_far,
              salesBuildingTableClass::SECONDARY_ZONING => $sales_buildings->$sales_secondary_zoning,
              salesBuildingTableClass::SELF_MANAGED => $sales_buildings->$sales_self_managed,
              salesBuildingTableClass::SERVICE_LEVEL_TYPE => $sales_buildings->$sales_service_level_type,
              salesBuildingTableClass::SHARES_ALLOWED => $sales_buildings->$sales_shares_allowed,
              salesBuildingTableClass::SIZE => $sales_buildings->$sales_size,
              salesBuildingTableClass::STATE => $sales_buildings->$sales_state,
              salesBuildingTableClass::STREET_TYPE => $sales_buildings->$sales_street_type,
              salesBuildingTableClass::SUPER_TYPE => $sales_buildings->$sales_super_type,
              salesBuildingTableClass::TAX_DEDUCT => $sales_buildings->$sales_tax_deduct,
              salesBuildingTableClass::VACANT_UNITS => $sales_buildings->$sales_vacant_units,
              salesBuildingTableClass::YEAR_BUILT => $sales_buildings->$sales_year_built,
              salesBuildingTableClass::ZIPCODE => $sales_buildings->$sales_zipcode,
              salesBuildingTableClass::ZONING => $sales_buildings->$sales_zoning,
              salesBuildingTableClass::ZONING_NOTES => $sales_buildings->$sales_zoning_notes,
          );

          $ids_sales_building = array(
              salesBuildingTableClass::ID => $sales_buildings->$sales_building_id,
          );

          salesBuildingTableClass::update($ids_sales_building, $data);
        }
      endforeach;
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
