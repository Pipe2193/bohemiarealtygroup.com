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

      $sales_listings_fields = array(
          saleslistingTableClass::ID,
          saleslistingTableClass::ACTYPE,
          saleslistingTableClass::AGENTS,
          saleslistingTableClass::ACCESS_TYPE,
          saleslistingTableClass::ADDRESS_DISPLAY_TYPE,
          saleslistingTableClass::ALARM_SECURITY_SYSTEM,
          saleslistingTableClass::APARTMENT_SIZE_TYPE,
          saleslistingTableClass::APT_GRADE,
          saleslistingTableClass::APT_NUMBER,
          saleslistingTableClass::APT_STATE,
          saleslistingTableClass::ARCHITECTURAL_DETAILS,
          saleslistingTableClass::ARCHITECTURAL_FEATURES,
          saleslistingTableClass::ASSESSMENT,
          saleslistingTableClass::ASSESSMENT_AMOUNT,
          saleslistingTableClass::ASSESSMENT_DATE,
          saleslistingTableClass::ASSESSMENT_EXPIRATION_DATE,
          saleslistingTableClass::ASSESSMENT_PAY_PERIOD,
          saleslistingTableClass::AVAILABILITY,
          saleslistingTableClass::AVAILABLE_LIGHT_TYPE,
          saleslistingTableClass::BATH_CONDI,
          saleslistingTableClass::BATH_FIXTURES,
          saleslistingTableClass::BATH_GRADE,
          saleslistingTableClass::BATHROOM_TYPE,
          saleslistingTableClass::BATHS,
          saleslistingTableClass::BATH_STATE,
          saleslistingTableClass::BEDROOMS,
          saleslistingTableClass::BOARD_APPROVAL,
          saleslistingTableClass::BOARD_APPROVAL_RENTAL,
          saleslistingTableClass::BUILDING_FEATURES,
          saleslistingTableClass::BUILDING_ID,
          saleslistingTableClass::BUILT_INS,
          saleslistingTableClass::BUYER_BROKER,
          saleslistingTableClass::BY_APPOINTMENT_ONLY,
          saleslistingTableClass::CALL_TO_REGISTER,
          saleslistingTableClass::CARPET_LAYOUT_TYPE,
          saleslistingTableClass::CEILING_HEIGHT,
          saleslistingTableClass::CLOSET_TYPE,
          saleslistingTableClass::SECOND_AGENT_ID,
          saleslistingTableClass::COMMON_CHARGES,
          saleslistingTableClass::COMPANY_WEB_LISTING_ID,
          saleslistingTableClass::CORP_LISTING_FEE,
          saleslistingTableClass::DATE_CLOSED,
          saleslistingTableClass::DATE_MODIFIED,
          saleslistingTableClass::DATE_LISTED,
          saleslistingTableClass::DAY_NOTICE,
          saleslistingTableClass::DESCRIPTION,
          saleslistingTableClass::DINING_TYPE,
          saleslistingTableClass::DISPLAY_ADDRESS,
          saleslistingTableClass::DOOR_TYPE,
          saleslistingTableClass::EFFECTIVE_DATE,
          saleslistingTableClass::EXPIRATION_DATE,
          saleslistingTableClass::EXPOSURE_TYPE,
          saleslistingTableClass::FEATURED_LISTING,
          saleslistingTableClass::FIRE_PLACE_TYPE,
          saleslistingTableClass::FLOOR_TYPE,
          saleslistingTableClass::FURNISHED,
          saleslistingTableClass::FURNISH_RENT,
          saleslistingTableClass::GUARANTOR_ALLOWED,
          saleslistingTableClass::GUARANTOR_REQUIRED,
          saleslistingTableClass::HALF_BATHS,
          saleslistingTableClass::HEAT,
          saleslistingTableClass::HIDE_APARTMENT_NUMBER,
          saleslistingTableClass::HOUSE_KEEPING_SCHEDULE_TYPE,
          saleslistingTableClass::INVESTMENT_UNIT,
          saleslistingTableClass::IN_WALL_SPEAKER_SYSTEM,
          saleslistingTableClass::IS_NOT_FEE,
          saleslistingTableClass::IS_ORL_MAX,
          saleslistingTableClass::KIT_BACK_SPLASH,
          saleslistingTableClass::KIT_CABIN_ENTRY_TYPE,
          saleslistingTableClass::KITCHEN_TYPE,
          saleslistingTableClass::KIT_CONDI,
          saleslistingTableClass::KIT_FIXTURES,
          saleslistingTableClass::KIT_FLOORING,
          saleslistingTableClass::KIT_GRADE,
          saleslistingTableClass::KIT_STATE,
          saleslistingTableClass::LAUNDRY_ROOM,
          saleslistingTableClass::LAYOUT_TYPE,
          saleslistingTableClass::LEASE_ASSIGNMENT,
          saleslistingTableClass::LEASE_ASSIGNMENT_DATE,
          saleslistingTableClass::LEASE_SUB_TYPE,
          saleslistingTableClass::LEASE_TYPE_CODE,
          saleslistingTableClass::LIGHTING_TYPE,
          saleslistingTableClass::LISTING_AGENT_ID,
          saleslistingTableClass::LISTING_BEGINS,
          saleslistingTableClass::INTERNAL_SOURCE,
          saleslistingTableClass::MA_BATHS,
          saleslistingTableClass::MAINTENANCE,
          saleslistingTableClass::MA_ROOMS,
          saleslistingTableClass::MAX_TERM,
          saleslistingTableClass::MIN_TERM,
          saleslistingTableClass::ORL_MAX_ALBUM_ID,
          saleslistingTableClass::ORIGINAL_ROOMS,
          saleslistingTableClass::OUTDOOR_TYPE,
          saleslistingTableClass::OUT_DR_DESC,
          saleslistingTableClass::OUTLOOK_TYPE,
          saleslistingTableClass::OVERALL_CONDI,
          saleslistingTableClass::OWNER_PAY_FEE,
          saleslistingTableClass::PET_POLICY_TYPE,
          saleslistingTableClass::PET_WEIGHT_LIMIT,
          saleslistingTableClass::POWDER_RM_COUNT,
          saleslistingTableClass::PRE_WAR_DETAILS_ADDED,
          saleslistingTableClass::PRICE,
          saleslistingTableClass::PRIMARY_RECIDENCE,
          saleslistingTableClass::RENT,
          saleslistingTableClass::RENT2,
          saleslistingTableClass::RENTAL_LISTING_TYPE,
          saleslistingTableClass::RENTAL_STATUS_CODE,
          saleslistingTableClass::RESTORED_DETAILS,
          saleslistingTableClass::RE_TAXES,
          saleslistingTableClass::ROOM_ATTRIBUTES,
          saleslistingTableClass::ROOM_DIMENSIONS,
          saleslistingTableClass::ROOMS,
          saleslistingTableClass::ROOMS_TYPE,
          saleslistingTableClass::SALE_LISTING_TYPE,
          saleslistingTableClass::SALE_STATUS_CODE,
          saleslistingTableClass::SECURITY_DEPOSIT,
          saleslistingTableClass::SHARES,
          saleslistingTableClass::SHARES_TYPE,
          saleslistingTableClass::SHOW_ADDRESS,
          saleslistingTableClass::SHOW_AGENT_ID,
          saleslistingTableClass::SHOW_BROKER_WEB,
          saleslistingTableClass::SHOW_BUILDING_PHOTO,
          saleslistingTableClass::SKY_LIGHT_COUNT,
          saleslistingTableClass::SPECIAL_FEATURES,
          saleslistingTableClass::SPONSOR_UNIT,
          saleslistingTableClass::SQUARE_FOOTAGE,
          saleslistingTableClass::SURROUND_SOUND_SYSTEM,
          saleslistingTableClass::TENANCY,
          saleslistingTableClass::THIRD_AGENT_ID,
          saleslistingTableClass::TIME_SHARE,
          saleslistingTableClass::TIME_SHARE_PERIOD_IN_WEEKS,
          saleslistingTableClass::VIEW_TYPE,
          saleslistingTableClass::WINDOW_COUNT,
          saleslistingTableClass::WINDOW_TYPE,
          saleslistingTableClass::WASHER_DRYER,
          saleslistingTableClass::IS_IDX_LISTING,
          saleslistingTableClass::IS_MARKETED,
          saleslistingTableClass::COMPANY_NAME,
          saleslistingTableClass::RENTAL_FEE_TYPE,
          saleslistingTableClass::EXT_DAILY,
          saleslistingTableClass::EXT_DAILY_MIN_TERM,
          saleslistingTableClass::EXT_DAILY_MAX_TERM,
          saleslistingTableClass::EXT_WEEKLY,
          saleslistingTableClass::EXT_WEEKLY_MIN_TERM,
          saleslistingTableClass::EXT_WEEKLY_MAX_TERM,
          saleslistingTableClass::SHORT_SALE,
          saleslistingTableClass::SHORT_DALE_DATE,
          saleslistingTableClass::FORECLOSURE,
          saleslistingTableClass::FORECLOSURE_DATE,
          saleslistingTableClass::COF,
          saleslistingTableClass::AVAIL_AT_AUCTION,
          saleslistingTableClass::AUCTION_DATE,
          saleslistingTableClass::WBFP,
          saleslistingTableClass::GAS_FP,
          saleslistingTableClass::DECO_FP,
          saleslistingTableClass::AVAILABILITY_STATUS
      );
      $order_by_sales_listings = array(
          saleslistingTableClass::ID
      );


      $objSalesListings = saleslistingTableClass::getAll($sales_listings_fields, false, $order_by_sales_listings, 'ASC', null, null, null, true);


      $sales_listing_id = saleslistingTableClass::ID;
      $sales_listing_actype = saleslistingTableClass::ACTYPE;
      $sales_listing_agents = saleslistingTableClass::AGENTS;
      $sales_listing_access_type = saleslistingTableClass::ACCESS_TYPE;
      $sales_listing_address_display_type = saleslistingTableClass::ADDRESS_DISPLAY_TYPE;
      $sales_listing_alarm_sec_system = saleslistingTableClass::ALARM_SECURITY_SYSTEM;
      $sales_listing_apt_size_type = saleslistingTableClass::APARTMENT_SIZE_TYPE;
      $sales_listing_apt_grade = saleslistingTableClass::APT_GRADE;
      $sales_listing_apt_number = saleslistingTableClass::APT_NUMBER;
      $sales_listing_apt_state = saleslistingTableClass::APT_STATE;
      $sales_listing_achitectural_details = saleslistingTableClass::ARCHITECTURAL_DETAILS;
      $sales_listing_archit_features = saleslistingTableClass::ARCHITECTURAL_FEATURES;
      $sales_listing_assessment = saleslistingTableClass::ASSESSMENT;
      $sales_listing_assessment_amount = saleslistingTableClass::ASSESSMENT_AMOUNT;
      $sales_listing_assessment_date = saleslistingTableClass::ASSESSMENT_DATE;
      $sales_listing_assessment_exp_date = saleslistingTableClass::ASSESSMENT_EXPIRATION_DATE;
      $sales_listing_1 = saleslistingTableClass::ASSESSMENT_PAY_PERIOD;
      $sales_listing_2 = saleslistingTableClass::AVAILABILITY;
      $sales_listing_3 = saleslistingTableClass::AVAILABLE_LIGHT_TYPE;
      $sales_listing_4 = saleslistingTableClass::BATH_CONDI;
      $sales_listing_5 = saleslistingTableClass::BATH_FIXTURES;
      $sales_listing_5_1 = saleslistingTableClass::BATH_GRADE;
      $sales_listing_6 = saleslistingTableClass::BATHROOM_TYPE;
      $sales_listing_7 = saleslistingTableClass::BATHS;
      $sales_listing_8 = saleslistingTableClass::BATH_STATE;
      $sales_listing_9 = saleslistingTableClass::BEDROOMS;
      $sales_listing_10 = saleslistingTableClass::BOARD_APPROVAL;
      $sales_listing_11 = saleslistingTableClass::BOARD_APPROVAL_RENTAL;
      $sales_listing_12 = saleslistingTableClass::BUILDING_FEATURES;
      $sales_listing_13 = saleslistingTableClass::BUILDING_ID;
      $sales_listing_14 = saleslistingTableClass::BUILT_INS;
      $sales_listing_15 = saleslistingTableClass::BUYER_BROKER;
      $sales_listing_16 = saleslistingTableClass::BY_APPOINTMENT_ONLY;
      $sales_listing_17 = saleslistingTableClass::CALL_TO_REGISTER;
      $sales_listing_18 = saleslistingTableClass::CARPET_LAYOUT_TYPE;
      $sales_listing_19 = saleslistingTableClass::CEILING_HEIGHT;
      $sales_listing_20 = saleslistingTableClass::CLOSET_TYPE;
      $sales_listing_21 = saleslistingTableClass::SECOND_AGENT_ID;
      $sales_listing_22 = saleslistingTableClass::COMMON_CHARGES;
      $sales_listing_23 = saleslistingTableClass::COMPANY_WEB_LISTING_ID;
      $sales_listing_24 = saleslistingTableClass::CORP_LISTING_FEE;
      $sales_listing_25 = saleslistingTableClass::DATE_CLOSED;
      $sales_listing_26 = saleslistingTableClass::DATE_MODIFIED;
      $sales_listing_27 = saleslistingTableClass::DATE_LISTED;
      $sales_listing_28 = saleslistingTableClass::DAY_NOTICE;
      $sales_listing_29 = saleslistingTableClass::DESCRIPTION;
      $sales_listing_30 = saleslistingTableClass::DINING_TYPE;
      $sales_listing_31 = saleslistingTableClass::DISPLAY_ADDRESS;
      $sales_listing_32 = saleslistingTableClass::DOOR_TYPE;
      $sales_listing_33 = saleslistingTableClass::EFFECTIVE_DATE;
      $sales_listing_34 = saleslistingTableClass::EXPIRATION_DATE;
      $sales_listing_35 = saleslistingTableClass::EXPOSURE_TYPE;
      $sales_listing_36 = saleslistingTableClass::FEATURED_LISTING;
      $sales_listing_37 = saleslistingTableClass::FIRE_PLACE_TYPE;
      $sales_listing_38 = saleslistingTableClass::FLOOR_TYPE;
      $sales_listing_39 = saleslistingTableClass::FURNISHED;
      $sales_listing_49 = saleslistingTableClass::FURNISH_RENT;
      $sales_listing_50 = saleslistingTableClass::GUARANTOR_ALLOWED;
      $sales_listing_51 = saleslistingTableClass::GUARANTOR_REQUIRED;
      $sales_listing_52 = saleslistingTableClass::HALF_BATHS;
      $sales_listing_53 = saleslistingTableClass::HEAT;
      $sales_listing_54 = saleslistingTableClass::HIDE_APARTMENT_NUMBER;
      $sales_listing_55 = saleslistingTableClass::HOUSE_KEEPING_SCHEDULE_TYPE;
      $sales_listing_56 = saleslistingTableClass::INVESTMENT_UNIT;
      $sales_listing_57 = saleslistingTableClass::IN_WALL_SPEAKER_SYSTEM;
      $sales_listing_58 = saleslistingTableClass::IS_NOT_FEE;
      $sales_listing_59 = saleslistingTableClass::IS_ORL_MAX;
      $sales_listing_60 = saleslistingTableClass::KIT_BACK_SPLASH;
      $sales_listing_61 = saleslistingTableClass::KIT_CABIN_ENTRY_TYPE;
      $sales_listing_62 = saleslistingTableClass::KITCHEN_TYPE;
      $sales_listing_63 = saleslistingTableClass::KIT_CONDI;
      $sales_listing_64 = saleslistingTableClass::KIT_FIXTURES;
      $sales_listing_65 = saleslistingTableClass::KIT_FLOORING;
      $sales_listing_66 = saleslistingTableClass::KIT_GRADE;
      $sales_listing_67 = saleslistingTableClass::KIT_STATE;
      $sales_listing_68 = saleslistingTableClass::LAUNDRY_ROOM;
      $sales_listing_69 = saleslistingTableClass::LAYOUT_TYPE;
      $sales_listing_70 = saleslistingTableClass::LEASE_ASSIGNMENT;
      $sales_listing_71 = saleslistingTableClass::LEASE_ASSIGNMENT_DATE;
      $sales_listing_72 = saleslistingTableClass::LEASE_SUB_TYPE;
      $sales_listing_73 = saleslistingTableClass::LEASE_TYPE_CODE;
      $sales_listing_74 = saleslistingTableClass::LIGHTING_TYPE;
      $sales_listing_75 = saleslistingTableClass::LISTING_AGENT_ID;
      $sales_listing_76 = saleslistingTableClass::LISTING_BEGINS;
      $sales_listing_77 = saleslistingTableClass::INTERNAL_SOURCE;
      $sales_listing_78 = saleslistingTableClass::MA_BATHS;
      $sales_listing_79 = saleslistingTableClass::MAINTENANCE;
      $sales_listing_80 = saleslistingTableClass::MA_ROOMS;
      $sales_listing_81 = saleslistingTableClass::MAX_TERM;
      $sales_listing_82 = saleslistingTableClass::MIN_TERM;
      $sales_listing_83 = saleslistingTableClass::ORL_MAX_ALBUM_ID;
      $sales_listing_84 = saleslistingTableClass::ORIGINAL_ROOMS;
      $sales_listing_85 = saleslistingTableClass::OUTDOOR_TYPE;
      $sales_listing_86 = saleslistingTableClass::OUT_DR_DESC;
      $sales_listing_87 = saleslistingTableClass::OUTLOOK_TYPE;
      $sales_listing_88 = saleslistingTableClass::OVERALL_CONDI;
      $sales_listing_89 = saleslistingTableClass::OWNER_PAY_FEE;
      $sales_listing_90 = saleslistingTableClass::PET_POLICY_TYPE;
      $sales_listing_91 = saleslistingTableClass::PET_WEIGHT_LIMIT;
      $sales_listing_92 = saleslistingTableClass::POWDER_RM_COUNT;
      $sales_listing_93 = saleslistingTableClass::PRE_WAR_DETAILS_ADDED;
      $sales_listing_94 = saleslistingTableClass::PRICE;
      $sales_listing_95 = saleslistingTableClass::PRIMARY_RECIDENCE;
      $sales_listing_96 = saleslistingTableClass::RENT;
      $sales_listing_97 = saleslistingTableClass::RENT2;
      $sales_listing_98 = saleslistingTableClass::RENTAL_LISTING_TYPE;
      $sales_listing_99 = saleslistingTableClass::RENTAL_STATUS_CODE;
      $sales_listing_100 = saleslistingTableClass::RESTORED_DETAILS;
      $sales_listing_101 = saleslistingTableClass::RE_TAXES;
      $sales_listing_102 = saleslistingTableClass::ROOM_ATTRIBUTES;
      $sales_listing_103 = saleslistingTableClass::ROOM_DIMENSIONS;
      $sales_listing_104 = saleslistingTableClass::ROOMS;
      $sales_listing_105 = saleslistingTableClass::ROOMS_TYPE;
      $sales_listing_106 = saleslistingTableClass::SALE_LISTING_TYPE;
      $sales_listing_107 = saleslistingTableClass::SALE_STATUS_CODE;
      $sales_listing_108 = saleslistingTableClass::SECURITY_DEPOSIT;
      $sales_listing_109 = saleslistingTableClass::SHARES;
      $sales_listing_110 = saleslistingTableClass::SHARES_TYPE;
      $sales_listing_111 = saleslistingTableClass::SHOW_ADDRESS;
      $sales_listing_112 = saleslistingTableClass::SHOW_AGENT_ID;
      $sales_listing_113 = saleslistingTableClass::SHOW_BROKER_WEB;
      $sales_listing_114 = saleslistingTableClass::SHOW_BUILDING_PHOTO;
      $sales_listing_115 = saleslistingTableClass::SKY_LIGHT_COUNT;
      $sales_listing_116 = saleslistingTableClass::SPECIAL_FEATURES;
      $sales_listing_117 = saleslistingTableClass::SPONSOR_UNIT;
      $sales_listing_118 = saleslistingTableClass::SQUARE_FOOTAGE;
      $sales_listing_119 = saleslistingTableClass::SURROUND_SOUND_SYSTEM;
      $sales_listing_120 = saleslistingTableClass::TENANCY;
      $sales_listing_121 = saleslistingTableClass::THIRD_AGENT_ID;
      $sales_listing_122 = saleslistingTableClass::TIME_SHARE;
      $sales_listing_123 = saleslistingTableClass::TIME_SHARE_PERIOD_IN_WEEKS;
      $sales_listing_124 = saleslistingTableClass::VIEW_TYPE;
      $sales_listing_125 = saleslistingTableClass::WINDOW_COUNT;
      $sales_listing_126 = saleslistingTableClass::WINDOW_TYPE;
      $sales_listing_127 = saleslistingTableClass::WASHER_DRYER;
      $sales_listing_128 = saleslistingTableClass::IS_IDX_LISTING;
      $sales_listing_129 = saleslistingTableClass::IS_MARKETED;
      $sales_listing_130 = saleslistingTableClass::COMPANY_NAME;
      $sales_listing_131 = saleslistingTableClass::RENTAL_FEE_TYPE;
      $sales_listing_132 = saleslistingTableClass::EXT_DAILY;
      $sales_listing_133 = saleslistingTableClass::EXT_DAILY_MIN_TERM;
      $sales_listing_134 = saleslistingTableClass::EXT_DAILY_MAX_TERM;
      $sales_listing_135 = saleslistingTableClass::EXT_WEEKLY;
      $sales_listing_136 = saleslistingTableClass::EXT_WEEKLY_MIN_TERM;
      $sales_listing_137 = saleslistingTableClass::EXT_WEEKLY_MAX_TERM;
      $sales_listing_138 = saleslistingTableClass::SHORT_SALE;
      $sales_listing_139 = saleslistingTableClass::SHORT_DALE_DATE;
      $sales_listing_140 = saleslistingTableClass::FORECLOSURE;
      $sales_listing_141 = saleslistingTableClass::FORECLOSURE_DATE;
      $sales_listing_142 = saleslistingTableClass::COF;
      $sales_listing_143 = saleslistingTableClass::AVAIL_AT_AUCTION;
      $sales_listing_144 = saleslistingTableClass::AUCTION_DATE;
      $sales_listing_145 = saleslistingTableClass::WBFP;
      $sales_listing_146 = saleslistingTableClass::GAS_FP;
      $sales_listing_147 = saleslistingTableClass::DECO_FP;
      $sales_listing_148 = saleslistingTableClass::AVAILABILITY_STATUS;


      foreach ($objSalesListings as $sales_listing):

        $sales_listing_hash = md5(md5(date('U') . $sales_listing->$sales_listing_id));


        $validate = salesListingTableClass::getSalesListingHash($sales_listing->$sales_listing_id);
        if ($validate == false) {

          $data_sales_listings = array(
              saleslistingTableClass::ID => $sales_listing->$sales_listing_id,
              saleslistingTableClass::ACTYPE => $sales_listing->$sales_listing_actype,
              saleslistingTableClass::AGENTS => $sales_listing->$sales_listing_agents,
              saleslistingTableClass::ACCESS_TYPE => $sales_listing->$sales_listing_access_type,
              saleslistingTableClass::ADDRESS_DISPLAY_TYPE => $sales_listing->$sales_listing_address_display_type,
              saleslistingTableClass::ALARM_SECURITY_SYSTEM => $sales_listing->$sales_listing_alarm_sec_system,
              saleslistingTableClass::APARTMENT_SIZE_TYPE => $sales_listing->$sales_listing_apt_size_type,
              saleslistingTableClass::APT_GRADE => $sales_listing->$sales_listing_apt_grade,
              saleslistingTableClass::APT_NUMBER => $sales_listing->$sales_listing_apt_number,
              saleslistingTableClass::APT_STATE => $sales_listing->$sales_listing_apt_state,
              saleslistingTableClass::ARCHITECTURAL_DETAILS => $sales_listing->$sales_listing_achitectural_details,
              saleslistingTableClass::ARCHITECTURAL_FEATURES => $sales_listing->$sales_listing_archit_features,
              saleslistingTableClass::ASSESSMENT => $sales_listing->$sales_listing_assessment,
              saleslistingTableClass::ASSESSMENT_AMOUNT => $sales_listing->$sales_listing_assessment_amount,
              saleslistingTableClass::ASSESSMENT_DATE => $sales_listing->$sales_listing_assessment_date,
              saleslistingTableClass::ASSESSMENT_EXPIRATION_DATE => $sales_listing->$sales_listing_assessment_exp_date,
              saleslistingTableClass::ASSESSMENT_PAY_PERIOD => $sales_listing->$sales_listing_1,
              saleslistingTableClass::AVAILABILITY => $sales_listing->$sales_listing_2,
              saleslistingTableClass::AVAILABLE_LIGHT_TYPE => $sales_listing->$sales_listing_3,
              saleslistingTableClass::BATH_CONDI => $sales_listing->$sales_listing_4,
              saleslistingTableClass::BATH_FIXTURES => $sales_listing->$sales_listing_5,
              saleslistingTableClass::BATH_GRADE => $sales_listing->$sales_listing_5_1,
              saleslistingTableClass::BATHROOM_TYPE => $sales_listing->$sales_listing_6,
              saleslistingTableClass::BATHS => $sales_listing->$sales_listing_7,
              saleslistingTableClass::BATH_STATE => $sales_listing->$sales_listing_8,
              saleslistingTableClass::BEDROOMS => $sales_listing->$sales_listing_9,
              saleslistingTableClass::BOARD_APPROVAL => $sales_listing->$sales_listing_10,
              saleslistingTableClass::BOARD_APPROVAL_RENTAL => $sales_listing->$sales_listing_11,
              saleslistingTableClass::BUILDING_FEATURES => $sales_listing->$sales_listing_12,
              saleslistingTableClass::BUILDING_ID => $sales_listing->$sales_listing_13,
              saleslistingTableClass::BUILT_INS => $sales_listing->$sales_listing_14,
              saleslistingTableClass::BUYER_BROKER => $sales_listing->$sales_listing_15,
              saleslistingTableClass::BY_APPOINTMENT_ONLY => $sales_listing->$sales_listing_16,
              saleslistingTableClass::CALL_TO_REGISTER => $sales_listing->$sales_listing_17,
              saleslistingTableClass::CARPET_LAYOUT_TYPE => $sales_listing->$sales_listing_18,
              saleslistingTableClass::CEILING_HEIGHT => $sales_listing->$sales_listing_19,
              saleslistingTableClass::CLOSET_TYPE => $sales_listing->$sales_listing_20,
              saleslistingTableClass::SECOND_AGENT_ID => $sales_listing->$sales_listing_21,
              saleslistingTableClass::COMMON_CHARGES => $sales_listing->$sales_listing_22,
              saleslistingTableClass::COMPANY_WEB_LISTING_ID => $sales_listing->$sales_listing_23,
              saleslistingTableClass::CORP_LISTING_FEE => $sales_listing->$sales_listing_24,
              saleslistingTableClass::DATE_CLOSED => $sales_listing->$sales_listing_25,
              saleslistingTableClass::DATE_MODIFIED => $sales_listing->$sales_listing_26,
              saleslistingTableClass::DATE_LISTED => $sales_listing->$sales_listing_27,
              saleslistingTableClass::DAY_NOTICE => $sales_listing->$sales_listing_28,
              saleslistingTableClass::DESCRIPTION => $sales_listing->$sales_listing_29,
              saleslistingTableClass::DINING_TYPE => $sales_listing->$sales_listing_30,
              saleslistingTableClass::DISPLAY_ADDRESS => $sales_listing->$sales_listing_31,
              saleslistingTableClass::DOOR_TYPE => $sales_listing->$sales_listing_32,
              saleslistingTableClass::EFFECTIVE_DATE => $sales_listing->$sales_listing_33,
              saleslistingTableClass::EXPIRATION_DATE => $sales_listing->$sales_listing_34,
              saleslistingTableClass::EXPOSURE_TYPE => $sales_listing->$sales_listing_35,
              saleslistingTableClass::FEATURED_LISTING => $sales_listing->$sales_listing_36,
              saleslistingTableClass::FIRE_PLACE_TYPE => $sales_listing->$sales_listing_37,
              saleslistingTableClass::FLOOR_TYPE => $sales_listing->$sales_listing_38,
              saleslistingTableClass::FURNISHED => $sales_listing->$sales_listing_39,
              saleslistingTableClass::FURNISH_RENT => $sales_listing->$sales_listing_49,
              saleslistingTableClass::GUARANTOR_ALLOWED => $sales_listing->$sales_listing_50,
              saleslistingTableClass::GUARANTOR_REQUIRED => $sales_listing->$sales_listing_51,
              saleslistingTableClass::HALF_BATHS => $sales_listing->$sales_listing_52,
              saleslistingTableClass::HEAT => $sales_listing->$sales_listing_53,
              saleslistingTableClass::HIDE_APARTMENT_NUMBER => $sales_listing->$sales_listing_54,
              saleslistingTableClass::HOUSE_KEEPING_SCHEDULE_TYPE => $sales_listing->$sales_listing_55,
              saleslistingTableClass::INVESTMENT_UNIT => $sales_listing->$sales_listing_56,
              saleslistingTableClass::IN_WALL_SPEAKER_SYSTEM => $sales_listing->$sales_listing_57,
              saleslistingTableClass::IS_NOT_FEE => $sales_listing->$sales_listing_58,
              saleslistingTableClass::IS_ORL_MAX => $sales_listing->$sales_listing_59,
              saleslistingTableClass::KIT_BACK_SPLASH => $sales_listing->$sales_listing_60,
              saleslistingTableClass::KIT_CABIN_ENTRY_TYPE => $sales_listing->$sales_listing_61,
              saleslistingTableClass::KITCHEN_TYPE => $sales_listing->$sales_listing_62,
              saleslistingTableClass::KIT_CONDI => $sales_listing->$sales_listing_63,
              saleslistingTableClass::KIT_FIXTURES => $sales_listing->$sales_listing_64,
              saleslistingTableClass::KIT_FLOORING => $sales_listing->$sales_listing_65,
              saleslistingTableClass::KIT_GRADE => $sales_listing->$sales_listing_66,
              saleslistingTableClass::KIT_STATE => $sales_listing->$sales_listing_67,
              saleslistingTableClass::LAUNDRY_ROOM => $sales_listing->$sales_listing_68,
              saleslistingTableClass::LAYOUT_TYPE => $sales_listing->$sales_listing_69,
              saleslistingTableClass::LEASE_ASSIGNMENT => $sales_listing->$sales_listing_70,
              saleslistingTableClass::LEASE_ASSIGNMENT_DATE => $sales_listing->$sales_listing_71,
              saleslistingTableClass::LEASE_SUB_TYPE => $sales_listing->$sales_listing_72,
              saleslistingTableClass::LEASE_TYPE_CODE => $sales_listing->$sales_listing_73,
              saleslistingTableClass::LIGHTING_TYPE => $sales_listing->$sales_listing_74,
              saleslistingTableClass::LISTING_AGENT_ID => $sales_listing->$sales_listing_75,
              saleslistingTableClass::LISTING_BEGINS => $sales_listing->$sales_listing_76,
              saleslistingTableClass::INTERNAL_SOURCE => $sales_listing->$sales_listing_77,
              saleslistingTableClass::MA_BATHS => $sales_listing->$sales_listing_78,
              saleslistingTableClass::MAINTENANCE => $sales_listing->$sales_listing_79,
              saleslistingTableClass::MA_ROOMS => $sales_listing->$sales_listing_80,
              saleslistingTableClass::MAX_TERM => $sales_listing->$sales_listing_81,
              saleslistingTableClass::MIN_TERM => $sales_listing->$sales_listing_82,
              saleslistingTableClass::ORL_MAX_ALBUM_ID => $sales_listing->$sales_listing_83,
              saleslistingTableClass::ORIGINAL_ROOMS => $sales_listing->$sales_listing_84,
              saleslistingTableClass::OUTDOOR_TYPE => $sales_listing->$sales_listing_85,
              saleslistingTableClass::OUT_DR_DESC => $sales_listing->$sales_listing_86,
              saleslistingTableClass::OUTLOOK_TYPE => $sales_listing->$sales_listing_87,
              saleslistingTableClass::OVERALL_CONDI => $sales_listing->$sales_listing_88,
              saleslistingTableClass::OWNER_PAY_FEE => $sales_listing->$sales_listing_89,
              saleslistingTableClass::PET_POLICY_TYPE => $sales_listing->$sales_listing_90,
              saleslistingTableClass::PET_WEIGHT_LIMIT => $sales_listing->$sales_listing_91,
              saleslistingTableClass::POWDER_RM_COUNT => $sales_listing->$sales_listing_92,
              saleslistingTableClass::PRE_WAR_DETAILS_ADDED => $sales_listing->$sales_listing_93,
              saleslistingTableClass::PRICE => $sales_listing->$sales_listing_94,
              saleslistingTableClass::PRIMARY_RECIDENCE => $sales_listing->$sales_listing_95,
              saleslistingTableClass::RENT => $sales_listing->$sales_listing_96,
              saleslistingTableClass::RENT2 => $sales_listing->$sales_listing_97,
              saleslistingTableClass::RENTAL_LISTING_TYPE => $sales_listing->$sales_listing_98,
              saleslistingTableClass::RENTAL_STATUS_CODE => $sales_listing->$sales_listing_99,
              saleslistingTableClass::RESTORED_DETAILS => $sales_listing->$sales_listing_100,
              saleslistingTableClass::RE_TAXES => $sales_listing->$sales_listing_101,
              saleslistingTableClass::ROOM_ATTRIBUTES => $sales_listing->$sales_listing_102,
              saleslistingTableClass::ROOM_DIMENSIONS => $sales_listing->$sales_listing_103,
              saleslistingTableClass::ROOMS => $sales_listing->$sales_listing_104,
              saleslistingTableClass::ROOMS_TYPE => $sales_listing->$sales_listing_105,
              saleslistingTableClass::SALE_LISTING_TYPE => $sales_listing->$sales_listing_106,
              saleslistingTableClass::SALE_STATUS_CODE => $sales_listing->$sales_listing_107,
              saleslistingTableClass::SECURITY_DEPOSIT => $sales_listing->$sales_listing_108,
              saleslistingTableClass::SHARES => $sales_listing->$sales_listing_109,
              saleslistingTableClass::SHARES_TYPE => $sales_listing->$sales_listing_110,
              saleslistingTableClass::SHOW_ADDRESS => $sales_listing->$sales_listing_111,
              saleslistingTableClass::SHOW_AGENT_ID => $sales_listing->$sales_listing_112,
              saleslistingTableClass::SHOW_BROKER_WEB => $sales_listing->$sales_listing_113,
              saleslistingTableClass::SHOW_BUILDING_PHOTO => $sales_listing->$sales_listing_114,
              saleslistingTableClass::SKY_LIGHT_COUNT => $sales_listing->$sales_listing_115,
              saleslistingTableClass::SPECIAL_FEATURES => $sales_listing->$sales_listing_116,
              saleslistingTableClass::SPONSOR_UNIT => $sales_listing->$sales_listing_117,
              saleslistingTableClass::SQUARE_FOOTAGE => $sales_listing->$sales_listing_118,
              saleslistingTableClass::SURROUND_SOUND_SYSTEM => $sales_listing->$sales_listing_119,
              saleslistingTableClass::TENANCY => $sales_listing->$sales_listing_120,
              saleslistingTableClass::THIRD_AGENT_ID => $sales_listing->$sales_listing_121,
              saleslistingTableClass::TIME_SHARE => $sales_listing->$sales_listing_122,
              saleslistingTableClass::TIME_SHARE_PERIOD_IN_WEEKS => $sales_listing->$sales_listing_123,
              saleslistingTableClass::VIEW_TYPE => $sales_listing->$sales_listing_124,
              saleslistingTableClass::WINDOW_COUNT => $sales_listing->$sales_listing_125,
              saleslistingTableClass::WINDOW_TYPE => $sales_listing->$sales_listing_126,
              saleslistingTableClass::WASHER_DRYER => $sales_listing->$sales_listing_127,
              saleslistingTableClass::IS_IDX_LISTING => $sales_listing->$sales_listing_128,
              saleslistingTableClass::IS_MARKETED => $sales_listing->$sales_listing_129,
              saleslistingTableClass::COMPANY_NAME => $sales_listing->$sales_listing_130,
              saleslistingTableClass::RENTAL_FEE_TYPE => $sales_listing->$sales_listing_131,
              saleslistingTableClass::EXT_DAILY => $sales_listing->$sales_listing_132,
              saleslistingTableClass::EXT_DAILY_MIN_TERM => $sales_listing->$sales_listing_133,
              saleslistingTableClass::EXT_DAILY_MAX_TERM => $sales_listing->$sales_listing_134,
              saleslistingTableClass::EXT_WEEKLY => $sales_listing->$sales_listing_135,
              saleslistingTableClass::EXT_WEEKLY_MIN_TERM => $sales_listing->$sales_listing_136,
              saleslistingTableClass::EXT_WEEKLY_MAX_TERM => $sales_listing->$sales_listing_137,
              saleslistingTableClass::SHORT_SALE => $sales_listing->$sales_listing_138,
              saleslistingTableClass::SHORT_DALE_DATE => $sales_listing->$sales_listing_139,
              saleslistingTableClass::FORECLOSURE => $sales_listing->$sales_listing_140,
              saleslistingTableClass::FORECLOSURE_DATE => $sales_listing->$sales_listing_141,
              saleslistingTableClass::COF => $sales_listing->$sales_listing_142,
              saleslistingTableClass::AVAIL_AT_AUCTION => $sales_listing->$sales_listing_143,
              saleslistingTableClass::AUCTION_DATE => $sales_listing->$sales_listing_144,
              saleslistingTableClass::WBFP => $sales_listing->$sales_listing_145,
              saleslistingTableClass::GAS_FP => $sales_listing->$sales_listing_146,
              saleslistingTableClass::DECO_FP => $sales_listing->$sales_listing_147,
              saleslistingTableClass::AVAILABILITY_STATUS => $sales_listing->$sales_listing_148,
              saleslistingTableClass::SALES_LISTING_HASH => $sales_listing_hash,
          );

          saleslistingTableClass::insert($data_sales_listings);
          
        } else {

          $data = array(
              saleslistingTableClass::ACTYPE => $sales_listing->$sales_listing_actype,
              saleslistingTableClass::AGENTS => $sales_listing->$sales_listing_agents,
              saleslistingTableClass::ACCESS_TYPE => $sales_listing->$sales_listing_access_type,
              saleslistingTableClass::ADDRESS_DISPLAY_TYPE => $sales_listing->$sales_listing_address_display_type,
              saleslistingTableClass::ALARM_SECURITY_SYSTEM => $sales_listing->$sales_listing_alarm_sec_system,
              saleslistingTableClass::APARTMENT_SIZE_TYPE => $sales_listing->$sales_listing_apt_size_type,
              saleslistingTableClass::APT_GRADE => $sales_listing->$sales_listing_apt_grade,
              saleslistingTableClass::APT_NUMBER => $sales_listing->$sales_listing_apt_number,
              saleslistingTableClass::APT_STATE => $sales_listing->$sales_listing_apt_state,
              saleslistingTableClass::ARCHITECTURAL_DETAILS => $sales_listing->$sales_listing_achitectural_details,
              saleslistingTableClass::ARCHITECTURAL_FEATURES => $sales_listing->$sales_listing_archit_features,
              saleslistingTableClass::ASSESSMENT => $sales_listing->$sales_listing_assessment,
              saleslistingTableClass::ASSESSMENT_AMOUNT => $sales_listing->$sales_listing_assessment_amount,
              saleslistingTableClass::ASSESSMENT_DATE => $sales_listing->$sales_listing_assessment_date,
              saleslistingTableClass::ASSESSMENT_EXPIRATION_DATE => $sales_listing->$sales_listing_assessment_exp_date,
              saleslistingTableClass::ASSESSMENT_PAY_PERIOD => $sales_listing->$sales_listing_1,
              saleslistingTableClass::AVAILABILITY => $sales_listing->$sales_listing_2,
              saleslistingTableClass::AVAILABLE_LIGHT_TYPE => $sales_listing->$sales_listing_3,
              saleslistingTableClass::BATH_CONDI => $sales_listing->$sales_listing_4,
              saleslistingTableClass::BATH_FIXTURES => $sales_listing->$sales_listing_5,
              saleslistingTableClass::BATH_GRADE => $sales_listing->$sales_listing_5_1,
              saleslistingTableClass::BATHROOM_TYPE => $sales_listing->$sales_listing_6,
              saleslistingTableClass::BATHS => $sales_listing->$sales_listing_7,
              saleslistingTableClass::BATH_STATE => $sales_listing->$sales_listing_8,
              saleslistingTableClass::BEDROOMS => $sales_listing->$sales_listing_9,
              saleslistingTableClass::BOARD_APPROVAL => $sales_listing->$sales_listing_10,
              saleslistingTableClass::BOARD_APPROVAL_RENTAL => $sales_listing->$sales_listing_11,
              saleslistingTableClass::BUILDING_FEATURES => $sales_listing->$sales_listing_12,
              saleslistingTableClass::BUILDING_ID => $sales_listing->$sales_listing_13,
              saleslistingTableClass::BUILT_INS => $sales_listing->$sales_listing_14,
              saleslistingTableClass::BUYER_BROKER => $sales_listing->$sales_listing_15,
              saleslistingTableClass::BY_APPOINTMENT_ONLY => $sales_listing->$sales_listing_16,
              saleslistingTableClass::CALL_TO_REGISTER => $sales_listing->$sales_listing_17,
              saleslistingTableClass::CARPET_LAYOUT_TYPE => $sales_listing->$sales_listing_18,
              saleslistingTableClass::CEILING_HEIGHT => $sales_listing->$sales_listing_19,
              saleslistingTableClass::CLOSET_TYPE => $sales_listing->$sales_listing_20,
              saleslistingTableClass::SECOND_AGENT_ID => $sales_listing->$sales_listing_21,
              saleslistingTableClass::COMMON_CHARGES => $sales_listing->$sales_listing_22,
              saleslistingTableClass::COMPANY_WEB_LISTING_ID => $sales_listing->$sales_listing_23,
              saleslistingTableClass::CORP_LISTING_FEE => $sales_listing->$sales_listing_24,
              saleslistingTableClass::DATE_CLOSED => $sales_listing->$sales_listing_25,
              saleslistingTableClass::DATE_MODIFIED => $sales_listing->$sales_listing_26,
              saleslistingTableClass::DATE_LISTED => $sales_listing->$sales_listing_27,
              saleslistingTableClass::DAY_NOTICE => $sales_listing->$sales_listing_28,
              saleslistingTableClass::DESCRIPTION => $sales_listing->$sales_listing_29,
              saleslistingTableClass::DINING_TYPE => $sales_listing->$sales_listing_30,
              saleslistingTableClass::DISPLAY_ADDRESS => $sales_listing->$sales_listing_31,
              saleslistingTableClass::DOOR_TYPE => $sales_listing->$sales_listing_32,
              saleslistingTableClass::EFFECTIVE_DATE => $sales_listing->$sales_listing_33,
              saleslistingTableClass::EXPIRATION_DATE => $sales_listing->$sales_listing_34,
              saleslistingTableClass::EXPOSURE_TYPE => $sales_listing->$sales_listing_35,
              saleslistingTableClass::FEATURED_LISTING => $sales_listing->$sales_listing_36,
              saleslistingTableClass::FIRE_PLACE_TYPE => $sales_listing->$sales_listing_37,
              saleslistingTableClass::FLOOR_TYPE => $sales_listing->$sales_listing_38,
              saleslistingTableClass::FURNISHED => $sales_listing->$sales_listing_39,
              saleslistingTableClass::FURNISH_RENT => $sales_listing->$sales_listing_49,
              saleslistingTableClass::GUARANTOR_ALLOWED => $sales_listing->$sales_listing_50,
              saleslistingTableClass::GUARANTOR_REQUIRED => $sales_listing->$sales_listing_51,
              saleslistingTableClass::HALF_BATHS => $sales_listing->$sales_listing_52,
              saleslistingTableClass::HEAT => $sales_listing->$sales_listing_53,
              saleslistingTableClass::HIDE_APARTMENT_NUMBER => $sales_listing->$sales_listing_54,
              saleslistingTableClass::HOUSE_KEEPING_SCHEDULE_TYPE => $sales_listing->$sales_listing_55,
              saleslistingTableClass::INVESTMENT_UNIT => $sales_listing->$sales_listing_56,
              saleslistingTableClass::IN_WALL_SPEAKER_SYSTEM => $sales_listing->$sales_listing_57,
              saleslistingTableClass::IS_NOT_FEE => $sales_listing->$sales_listing_58,
              saleslistingTableClass::IS_ORL_MAX => $sales_listing->$sales_listing_59,
              saleslistingTableClass::KIT_BACK_SPLASH => $sales_listing->$sales_listing_60,
              saleslistingTableClass::KIT_CABIN_ENTRY_TYPE => $sales_listing->$sales_listing_61,
              saleslistingTableClass::KITCHEN_TYPE => $sales_listing->$sales_listing_62,
              saleslistingTableClass::KIT_CONDI => $sales_listing->$sales_listing_63,
              saleslistingTableClass::KIT_FIXTURES => $sales_listing->$sales_listing_64,
              saleslistingTableClass::KIT_FLOORING => $sales_listing->$sales_listing_65,
              saleslistingTableClass::KIT_GRADE => $sales_listing->$sales_listing_66,
              saleslistingTableClass::KIT_STATE => $sales_listing->$sales_listing_67,
              saleslistingTableClass::LAUNDRY_ROOM => $sales_listing->$sales_listing_68,
              saleslistingTableClass::LAYOUT_TYPE => $sales_listing->$sales_listing_69,
              saleslistingTableClass::LEASE_ASSIGNMENT => $sales_listing->$sales_listing_70,
              saleslistingTableClass::LEASE_ASSIGNMENT_DATE => $sales_listing->$sales_listing_71,
              saleslistingTableClass::LEASE_SUB_TYPE => $sales_listing->$sales_listing_72,
              saleslistingTableClass::LEASE_TYPE_CODE => $sales_listing->$sales_listing_73,
              saleslistingTableClass::LIGHTING_TYPE => $sales_listing->$sales_listing_74,
              saleslistingTableClass::LISTING_AGENT_ID => $sales_listing->$sales_listing_75,
              saleslistingTableClass::LISTING_BEGINS => $sales_listing->$sales_listing_76,
              saleslistingTableClass::INTERNAL_SOURCE => $sales_listing->$sales_listing_77,
              saleslistingTableClass::MA_BATHS => $sales_listing->$sales_listing_78,
              saleslistingTableClass::MAINTENANCE => $sales_listing->$sales_listing_79,
              saleslistingTableClass::MA_ROOMS => $sales_listing->$sales_listing_80,
              saleslistingTableClass::MAX_TERM => $sales_listing->$sales_listing_81,
              saleslistingTableClass::MIN_TERM => $sales_listing->$sales_listing_82,
              saleslistingTableClass::ORL_MAX_ALBUM_ID => $sales_listing->$sales_listing_83,
              saleslistingTableClass::ORIGINAL_ROOMS => $sales_listing->$sales_listing_84,
              saleslistingTableClass::OUTDOOR_TYPE => $sales_listing->$sales_listing_85,
              saleslistingTableClass::OUT_DR_DESC => $sales_listing->$sales_listing_86,
              saleslistingTableClass::OUTLOOK_TYPE => $sales_listing->$sales_listing_87,
              saleslistingTableClass::OVERALL_CONDI => $sales_listing->$sales_listing_88,
              saleslistingTableClass::OWNER_PAY_FEE => $sales_listing->$sales_listing_89,
              saleslistingTableClass::PET_POLICY_TYPE => $sales_listing->$sales_listing_90,
              saleslistingTableClass::PET_WEIGHT_LIMIT => $sales_listing->$sales_listing_91,
              saleslistingTableClass::POWDER_RM_COUNT => $sales_listing->$sales_listing_92,
              saleslistingTableClass::PRE_WAR_DETAILS_ADDED => $sales_listing->$sales_listing_93,
              saleslistingTableClass::PRICE => $sales_listing->$sales_listing_94,
              saleslistingTableClass::PRIMARY_RECIDENCE => $sales_listing->$sales_listing_95,
              saleslistingTableClass::RENT => $sales_listing->$sales_listing_96,
              saleslistingTableClass::RENT2 => $sales_listing->$sales_listing_97,
              saleslistingTableClass::RENTAL_LISTING_TYPE => $sales_listing->$sales_listing_98,
              saleslistingTableClass::RENTAL_STATUS_CODE => $sales_listing->$sales_listing_99,
              saleslistingTableClass::RESTORED_DETAILS => $sales_listing->$sales_listing_100,
              saleslistingTableClass::RE_TAXES => $sales_listing->$sales_listing_101,
              saleslistingTableClass::ROOM_ATTRIBUTES => $sales_listing->$sales_listing_102,
              saleslistingTableClass::ROOM_DIMENSIONS => $sales_listing->$sales_listing_103,
              saleslistingTableClass::ROOMS => $sales_listing->$sales_listing_104,
              saleslistingTableClass::ROOMS_TYPE => $sales_listing->$sales_listing_105,
              saleslistingTableClass::SALE_LISTING_TYPE => $sales_listing->$sales_listing_106,
              saleslistingTableClass::SALE_STATUS_CODE => $sales_listing->$sales_listing_107,
              saleslistingTableClass::SECURITY_DEPOSIT => $sales_listing->$sales_listing_108,
              saleslistingTableClass::SHARES => $sales_listing->$sales_listing_109,
              saleslistingTableClass::SHARES_TYPE => $sales_listing->$sales_listing_110,
              saleslistingTableClass::SHOW_ADDRESS => $sales_listing->$sales_listing_111,
              saleslistingTableClass::SHOW_AGENT_ID => $sales_listing->$sales_listing_112,
              saleslistingTableClass::SHOW_BROKER_WEB => $sales_listing->$sales_listing_113,
              saleslistingTableClass::SHOW_BUILDING_PHOTO => $sales_listing->$sales_listing_114,
              saleslistingTableClass::SKY_LIGHT_COUNT => $sales_listing->$sales_listing_115,
              saleslistingTableClass::SPECIAL_FEATURES => $sales_listing->$sales_listing_116,
              saleslistingTableClass::SPONSOR_UNIT => $sales_listing->$sales_listing_117,
              saleslistingTableClass::SQUARE_FOOTAGE => $sales_listing->$sales_listing_118,
              saleslistingTableClass::SURROUND_SOUND_SYSTEM => $sales_listing->$sales_listing_119,
              saleslistingTableClass::TENANCY => $sales_listing->$sales_listing_120,
              saleslistingTableClass::THIRD_AGENT_ID => $sales_listing->$sales_listing_121,
              saleslistingTableClass::TIME_SHARE => $sales_listing->$sales_listing_122,
              saleslistingTableClass::TIME_SHARE_PERIOD_IN_WEEKS => $sales_listing->$sales_listing_123,
              saleslistingTableClass::VIEW_TYPE => $sales_listing->$sales_listing_124,
              saleslistingTableClass::WINDOW_COUNT => $sales_listing->$sales_listing_125,
              saleslistingTableClass::WINDOW_TYPE => $sales_listing->$sales_listing_126,
              saleslistingTableClass::WASHER_DRYER => $sales_listing->$sales_listing_127,
              saleslistingTableClass::IS_IDX_LISTING => $sales_listing->$sales_listing_128,
              saleslistingTableClass::IS_MARKETED => $sales_listing->$sales_listing_129,
              saleslistingTableClass::COMPANY_NAME => $sales_listing->$sales_listing_130,
              saleslistingTableClass::RENTAL_FEE_TYPE => $sales_listing->$sales_listing_131,
              saleslistingTableClass::EXT_DAILY => $sales_listing->$sales_listing_132,
              saleslistingTableClass::EXT_DAILY_MIN_TERM => $sales_listing->$sales_listing_133,
              saleslistingTableClass::EXT_DAILY_MAX_TERM => $sales_listing->$sales_listing_134,
              saleslistingTableClass::EXT_WEEKLY => $sales_listing->$sales_listing_135,
              saleslistingTableClass::EXT_WEEKLY_MIN_TERM => $sales_listing->$sales_listing_136,
              saleslistingTableClass::EXT_WEEKLY_MAX_TERM => $sales_listing->$sales_listing_137,
              saleslistingTableClass::SHORT_SALE => $sales_listing->$sales_listing_138,
              saleslistingTableClass::SHORT_DALE_DATE => $sales_listing->$sales_listing_139,
              saleslistingTableClass::FORECLOSURE => $sales_listing->$sales_listing_140,
              saleslistingTableClass::FORECLOSURE_DATE => $sales_listing->$sales_listing_141,
              saleslistingTableClass::COF => $sales_listing->$sales_listing_142,
              saleslistingTableClass::AVAIL_AT_AUCTION => $sales_listing->$sales_listing_143,
              saleslistingTableClass::AUCTION_DATE => $sales_listing->$sales_listing_144,
              saleslistingTableClass::WBFP => $sales_listing->$sales_listing_145,
              saleslistingTableClass::GAS_FP => $sales_listing->$sales_listing_146,
              saleslistingTableClass::DECO_FP => $sales_listing->$sales_listing_147,
              saleslistingTableClass::AVAILABILITY_STATUS => $sales_listing->$sales_listing_148
          );

          $ids_sales_listing = array(
              saleslistingTableClass::ID => $sales_listing->$sales_listing_id,
          );

          saleslistingTableClass::update($ids_sales_listing, $data);
        }
      endforeach;
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
