<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('SERVER_SETTINGS_TYPE_BETA_SERVICE')   OR define('SERVER_SETTINGS_TYPE_BETA_SERVICE', 0);
defined('SERVER_SETTINGS_TYPE_SERVER_DOWNTIMES')   OR define('SERVER_SETTINGS_TYPE_DOWNTIMES', 1);

defined('USER_TYPE_DEFAULT')   OR define('USER_TYPE_DEFAULT', 0);
defined('USER_TYPE_GENERAL')   OR define('USER_TYPE_GENERAL', 1);
defined('USER_TYPE_ADMIN')     OR define('USER_TYPE_ADMIN', 2);
defined('USER_TYPE_TEACHER')   OR define('USER_TYPE_TEACHER', 4);
defined('USER_TYPE_CENTER')    OR define('USER_TYPE_CENTER', 8);
defined('USER_TYPE_SHOP')      OR define('USER_TYPE_SHOP', 16);
defined('USER_TYPE_STUDIO')    OR define('USER_TYPE_STUDIO', 32);

defined('APPROVAL_DATA_INACTIVATE')   OR define('APPROVAL_DATA_NONE', -1);
defined('APPROVAL_DATA_INACTIVATE')   OR define('APPROVAL_DATA_INACTIVATE', 0);
defined('APPROVAL_DATA_ACTIVATE')     OR define('APPROVAL_DATA_ACTIVATE', 1);
defined('APPROVAL_DATA_REJECT')       OR define('APPROVAL_DATA_REJECT', 2);
defined('APPROVAL_DATA_NOT_ACTIVATE') OR define('APPROVAL_DATA_NOT_ACTIVATE', 3);

defined('APIKEY_SWEET_TRACKER')       OR define('APIKEY_SWEET_TRACKER', '9rLlfHBZoWzI7dQQ0GNbug');

defined('APIKEY_BOOTPAY_WEB')         OR define('APIKEY_BOOTPAY_WEB', '5ee197af8f0751001e4f2562');
defined('APIKEY_BOOTPAY_REST')        OR define('APIKEY_BOOTPAY_REST', '5ee197af8f0751001e4f2565');
defined('APIKEY_BOOTPAY_PRIVATE')     OR define('APIKEY_BOOTPAY_PRIVATE', 'e5KGzIH4VAY4FU1gY3o3AekqPk2AzF1fFaVx47MhI2Q=');

defined('APIKEY_KAKAO_NATIVE')        OR define('APIKEY_KAKAO_NATIVE', 'bad2d4f32906a248eb7fa819fb197ebb');
defined('APIKEY_KAKAO_REST')          OR define('APIKEY_KAKAO_REST', 'c08aebc9e7ed5722a399bbc3962ca051');
defined('APIKEY_KAKAO_JAVASCRIPT')    OR define('APIKEY_KAKAO_JAVASCRIPT', '8ee901a556539927d58b30a6bf21a781');
defined('APIKEY_KAKAO_ADMIN')         OR define('APIKEY_KAKAO_ADMIN', 'd2e5f8edf58af4cb5d7d04e14861b0f7');

defined('SERVER_CHECK')               OR define('SERVER_CHECK', false);
defined('SERVER_CHECK_START')         OR define('SERVER_CHECK_START', '2021-05-17 00:00:00');
defined('SERVER_CHECK_END')           OR define('SERVER_CHECK_END', '2021-05-17 06:00:00');
defined('SERVER_CHECK_POPUP_START')   OR define('SERVER_CHECK_POPUP_START', '2021-05-11 00:00:00');
defined('SERVER_CHECK_POPUP_END')     OR define('SERVER_CHECK_POPUP_END', SERVER_CHECK_END);

defined('CENTER_TYPE_YOGA')       OR define('CENTER_TYPE_YOGA', 1);
defined('CENTER_TYPE_PILATES')    OR define('CENTER_TYPE_PILATES', 2);

defined('STUDIO_TYPE_YOGA')       OR define('STUDIO_TYPE_YOGA', 1);
defined('STUDIO_TYPE_PILATES')    OR define('STUDIO_TYPE_PILATES', 2);

defined('FIND_TYPE_CENTER')       OR define('FIND_TYPE_CENTER', 1);
defined('FIND_TYPE_TEACHER')      OR define('FIND_TYPE_TEACHER', 2);
defined('FIND_TYPE_STUDIO')      OR define('FIND_TYPE_STUDIO', 3);

defined('BLOG_TYPE_DEFAULT')        OR define('BLOG_TYPE_DEFAULT', 0);
defined('BLOG_TYPE_NOTICE_ALL')     OR define('BLOG_TYPE_NOTICE_ALL', 1);
defined('BLOG_TYPE_NOTICE_USER')    OR define('BLOG_TYPE_NOTICE_USER', 2);
defined('BLOG_TYPE_NOTICE_CENTER')  OR define('BLOG_TYPE_NOTICE_CENTER', 3);
defined('BLOG_TYPE_NOTICE_TEACHER') OR define('BLOG_TYPE_NOTICE_TEACHER', 4);
defined('BLOG_TYPE_NOTICE_BRAND')   OR define('BLOG_TYPE_NOTICE_BRAND', 5);
defined('BLOG_TYPE_NOTICE_FAQ')         OR define('BLOG_TYPE_NOTICE_FAQ', 6);
defined('BLOG_TYPE_NOTICE_INTRODUCE')   OR define('BLOG_TYPE_NOTICE_INTRODUCE', 7);

defined('SHOP_WORKER_CATEGORY_ETC')       OR define('SHOP_WORKER_CATEGORY_ETC', 99);
defined('SHOP_WORKER_CATEGORY_REPRESENT') OR define('SHOP_WORKER_CATEGORY_REPRESENT', 1);
defined('SHOP_WORKER_CATEGORY_SHIP')      OR define('SHOP_WORKER_CATEGORY_SHIP', 2);
defined('SHOP_WORKER_CATEGORY_ACCOUNT')   OR define('SHOP_WORKER_CATEGORY_ACCOUNT', 3);
defined('SHOP_WORKER_CATEGORY_CS')        OR define('SHOP_WORKER_CATEGORY_CS', 4);

defined('SHOP_BRAND_INFO_TYPE_DEFAULT')   OR define('SHOP_BRAND_INFO_TYPE_DEFAULT', 0);
defined('SHOP_BRAND_INFO_TYPE_PERIOD')    OR define('SHOP_BRAND_INFO_TYPE_PERIOD', 1);

defined('SHOP_PRODUCT_ITEM_TYPE_GENERAL')      OR define('SHOP_PRODUCT_ITEM_TYPE_GENERAL', 1);
defined('SHOP_PRODUCT_ITEM_TYPE_CUSTOM')       OR define('SHOP_PRODUCT_ITEM_TYPE_CUSTOM', 2);

defined('SHOP_PRODUCT_ITEM_NO_TAX')       OR define('SHOP_PRODUCT_ITEM_NO_TAX', 0);
defined('SHOP_PRODUCT_ITEM_TAX')          OR define('SHOP_PRODUCT_ITEM_TAX', 1);

defined('SHOP_PRODUCT_SHIPPING_CUSTOM')   OR define('SHOP_PRODUCT_SHIPPING_CUSTOM', 0);
defined('SHOP_PRODUCT_SHIPPING_1_DAYS')   OR define('SHOP_PRODUCT_SHIPPING_1_DAYS', 1);
defined('SHOP_PRODUCT_SHIPPING_2_DAYS')   OR define('SHOP_PRODUCT_SHIPPING_2_DAYS', 2);
defined('SHOP_PRODUCT_SHIPPING_3_DAYS')   OR define('SHOP_PRODUCT_SHIPPING_3_DAYS', 3);

defined('SHOP_PRODUCT_IMAGE_FILE_COUNT_MAX')   OR define('SHOP_PRODUCT_IMAGE_FILE_COUNT_MAX', 6); // require 1 + others 5
defined('SHOP_PRODUCT_REVIEW_IMAGE_COUNT_MAX')   OR define('SHOP_PRODUCT_REVIEW_IMAGE_COUNT_MAX', 3);

defined('SHOP_PRODUCT_STATUS_INIT')        OR define('SHOP_PRODUCT_STATUS_INIT', 0);
defined('SHOP_PRODUCT_STATUS_REQUEST')     OR define('SHOP_PRODUCT_STATUS_REQUEST', 1);
defined('SHOP_PRODUCT_STATUS_REJECT')      OR define('SHOP_PRODUCT_STATUS_REJECT', 2);
defined('SHOP_PRODUCT_STATUS_ON_SALE')     OR define('SHOP_PRODUCT_STATUS_ON_SALE', 3);
defined('SHOP_PRODUCT_STATUS_STOP_SALE')   OR define('SHOP_PRODUCT_STATUS_STOP_SALE', 4);
defined('SHOP_PRODUCT_STATUS_FINISH_SALE') OR define('SHOP_PRODUCT_STATUS_FINISH_SALE', 5);

defined('BLOG_LIST_PAGE_SIZE')          OR define('BLOG_LIST_PAGE_SIZE', 10);
defined('NOTICE_LIST_PAGE_SIZE')          OR define('NOTICE_LIST_PAGE_SIZE', 10);

defined('SHOP_PRODUCT_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_LIST_PAGE_SIZE', 8);
defined('SHOP_PRODUCT_NEW_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_NEW_LIST_PAGE_SIZE', 10);
defined('SHOP_PRODUCT_MAIN_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_MAIN_LIST_PAGE_SIZE', 6);
defined('SHOP_PRODUCT_BEST_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_BEST_LIST_PAGE_SIZE', 8);
defined('SHOP_PRODUCT_LIKE_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_LIKE_LIST_PAGE_SIZE', 10);
defined('SHOP_PRODUCT_PURCHASE_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_PURCHASE_LIST_PAGE_SIZE', 10);
defined('SHOP_PRODUCT_QNA_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_QNA_LIST_PAGE_SIZE', 5);
defined('SHOP_PRODUCT_REVIEW_LIST_PAGE_SIZE')  OR define('SHOP_PRODUCT_REVIEW_LIST_PAGE_SIZE', 5);

defined('SHOP_PURCHASE_STATUS_PREPARED')          OR define('SHOP_PURCHASE_STATUS_PREPARED', 0);
defined('SHOP_PURCHASE_STATUS_PURCHASING')        OR define('SHOP_PURCHASE_STATUS_PURCHASING', 1);
defined('SHOP_PURCHASE_STATUS_PAYING')            OR define('SHOP_PURCHASE_STATUS_PAYING', 2);
defined('SHOP_PURCHASE_STATUS_PAYING_CANCELED')   OR define('SHOP_PURCHASE_STATUS_PAYING_CANCELED', 3);
defined('SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS')   OR define('SHOP_PURCHASE_STATUS_CONFIRM_SUCCESS', 4);
defined('SHOP_PURCHASE_STATUS_CONFIRM_FAIL')      OR define('SHOP_PURCHASE_STATUS_CONFIRM_FAIL', 5);
defined('SHOP_PURCHASE_STATUS_DONE_SUCCESS')      OR define('SHOP_PURCHASE_STATUS_DONE_SUCCESS', 6);
defined('SHOP_PURCHASE_STATUS_DONE_FAIL')         OR define('SHOP_PURCHASE_STATUS_DONE_FAIL', 7);
defined('SHOP_PURCHASE_STATUS_COMPLETED')         OR define('SHOP_PURCHASE_STATUS_COMPLETED', 8);
defined('SHOP_PURCHASE_STATUS_PART_CANCELED')     OR define('SHOP_PURCHASE_STATUS_PART_CANCELED', 9);
defined('SHOP_PURCHASE_STATUS_ALL_CANCELED')      OR define('SHOP_PURCHASE_STATUS_ALL_CANCELED', 10);

defined('SHOP_SHIPPING_STATUS_NONE')                OR define('SHOP_SHIPPING_STATUS_NONE', 0);
defined('SHOP_SHIPPING_STATUS_WAIT')                OR define('SHOP_SHIPPING_STATUS_WAIT', 0);
defined('SHOP_SHIPPING_STATUS_ORDER_COMPLETED')       OR define('SHOP_SHIPPING_STATUS_ORDER_COMPLETED', 1);
defined('SHOP_SHIPPING_STATUS_ORDER_CANCELED')       OR define('SHOP_SHIPPING_STATUS_ORDER_CANCELED', 2);
defined('SHOP_SHIPPING_STATUS_PREPARE')             OR define('SHOP_SHIPPING_STATUS_PREPARE', 3);
defined('SHOP_SHIPPING_STATUS_IN_PROGRESS')         OR define('SHOP_SHIPPING_STATUS_IN_PROGRESS', 4);
defined('SHOP_SHIPPING_STATUS_COMPLETED')           OR define('SHOP_SHIPPING_STATUS_COMPLETED', 5);
defined('SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED')  OR define('SHOP_SHIPPING_STATUS_PURCHASE_COMPLETED', 6);
defined('SHOP_SHIPPING_STATUS_PURCHASE_CANCELED')  OR define('SHOP_SHIPPING_STATUS_PURCHASE_CANCELED', 7);
defined('SHOP_SHIPPING_STATUS_PURCHASE_CANCELING')  OR define('SHOP_SHIPPING_STATUS_PURCHASE_CANCELING', 8);
defined('SHOP_SHIPPING_STATUS_PURCHASE_CHANGED')  OR define('SHOP_SHIPPING_STATUS_PURCHASE_CHANGED', 9);
defined('SHOP_SHIPPING_STATUS_PURCHASE_CHANGING')  OR define('SHOP_SHIPPING_STATUS_PURCHASE_CHANGING', 10);

defined('SHOP_ORDER_REQ_TYPE_DEFAULT')  OR define('SHOP_ORDER_REQ_TYPE_DEFAULT', 0);
defined('SHOP_ORDER_REQ_TYPE_CANCEL')  OR define('SHOP_ORDER_REQ_TYPE_CANCEL', 1);
defined('SHOP_ORDER_REQ_TYPE_CHANGE')  OR define('SHOP_ORDER_REQ_TYPE_CHANGE', 2);
defined('SHOP_ORDER_REQ_TYPE_RETURN')  OR define('SHOP_ORDER_REQ_TYPE_RETURN', 3);

defined ('SHOP_SHIPPING_REQ_DEFAULT')             OR define('SHOP_SHIPPING_REQ_DEFAULT',0);
defined ('SHOP_SHIPPING_REQ_IN_FRONT_OF_DOOR')    OR define('SHOP_SHIPPING_REQ_IN_FRONT_OF_DOOR',1);
defined ('SHOP_SHIPPING_REQ_OFFICE')    OR define('SHOP_SHIPPING_REQ_OFFICE',2);
defined ('SHOP_SHIPPING_REQ_PHONE_OR_SMS')    OR define('SHOP_SHIPPING_REQ_PHONE_OR_SMS',3);
defined ('SHOP_SHIPPING_REQ_PHONE_BEFORE_SHIPPING')    OR define('SHOP_SHIPPING_REQ_PHONE_BEFORE_SHIPPING',4);
defined ('SHOP_SHIPPING_REQ_DIRECT_INPUT')    OR define('SHOP_SHIPPING_REQ_DIRECT_INPUT',5);

defined('SHOP_SHIPPING_ADDRESS_MAX_CNT') OR define('SHOP_SHIPPING_ADDRESS_MAX_CNT', 3);

defined('SHOP_ADMIN_ITEM_LIST_PAGE_SIZE')   OR define('SHOP_ADMIN_ITEM_LIST_PAGE_SIZE', 10);
defined('CENTER_ADMIN_ITEM_LIST_PAGE_SIZE') OR define('CENTER_ADMIN_ITEM_LIST_PAGE_SIZE', 10);

defined('SERVER_EMAIL_TYPE_DEFAULT')                OR define('SERVER_EMAIL_TYPE_DEFAULT', 0);
defined('SERVER_EMAIL_TYPE_USER_SHIPPING_STATUS')   OR define('SERVER_EMAIL_TYPE_USER_SHIPPING_STATUS', 1);
defined('SERVER_EMAIL_TYPE_USER_ORDER_STATUS')      OR define('SERVER_EMAIL_TYPE_USER_ORDER_STATUS', 2);
defined('SERVER_EMAIL_TYPE_USER_PROMOTION_COUPON')  OR define('SERVER_EMAIL_TYPE_USER_PROMOTION_COUPON', 3);
defined('SERVER_EMAIL_TYPE_USER_APPROVAL_CODE')     OR define('SERVER_EMAIL_TYPE_USER_APPROVAL_CODE', 4);
defined('SERVER_EMAIL_TYPE_RESET_PW')               OR define('SERVER_EMAIL_TYPE_RESET_PW', 5);
defined('SERVER_EMAIL_TYPE_TEACHER_APPROVAL')       OR define('SERVER_EMAIL_TYPE_TEACHER_APPROVAL', 6);
defined('SERVER_EMAIL_TYPE_CENTER_APPROVAL')        OR define('SERVER_EMAIL_TYPE_CENTER_APPROVAL', 7);
defined('SERVER_EMAIL_TYPE_CENTER_REJECT')          OR define('SERVER_EMAIL_TYPE_CENTER_REJECT', 8);
defined('SERVER_EMAIL_TYPE_SHOP_ORDER_STATUS')      OR define('SERVER_EMAIL_TYPE_SHOP_ORDER_STATUS', 9);
defined('SERVER_EMAIL_TYPE_TEACHER_REJECT')         OR define('SERVER_EMAIL_TYPE_TEACHER_REJECT', 10);
defined('SERVER_EMAIL_TYPE_SHOP_UNCONFIRMED')       OR define('SERVER_EMAIL_TYPE_SHOP_UNCONFIRMED', 11);
defined('SERVER_EMAIL_TYPE_STUDIO_APPROVAL')       OR define('SERVER_EMAIL_TYPE_STUDIO_APPROVAL', 12);
defined('SERVER_EMAIL_TYPE_STUDIO_REJECT')       OR define('SERVER_EMAIL_TYPE_STUDIO_REJECT', 13);
defined('SERVER_EMAIL_TYPE_ONLINE_CLASS_REGISTER')       OR define('SERVER_EMAIL_TYPE_ONLINE_CLASS_REGISTER', 14);
defined('SERVER_EMAIL_TYPE_ONLINE_CLASS_RESERVE')       OR define('SERVER_EMAIL_TYPE_ONLINE_CLASS_RESERVE', 15);
defined('SERVER_EMAIL_TYPE_ONLINE_CLASS_LINK')       OR define('SERVER_EMAIL_TYPE_ONLINE_CLASS_LINK', 16);
defined('SERVER_EMAIL_TYPE_ONLINE_CLASS_CANCEL')       OR define('SERVER_EMAIL_TYPE_ONLINE_CLASS_CANCEL', 17);
defined('SERVER_EMAIL_TYPE_ONLINE_CLASS_CONFIRM')       OR define('SERVER_EMAIL_TYPE_ONLINE_CLASS_CONFIRM', 18);

defined('SERVER_NOTICE_TYPE_DEFAULT')     OR define('SERVER_NOTICE_TYPE_DEFAULT', 0);
defined('SERVER_NOTICE_TYPE_COUPON')      OR define('SERVER_NOTICE_TYPE_COUPON', 1);

defined('SERVER_NOTICE_STATUS_DEFAULT')           OR define('SERVER_NOTICE_STATUS_DEFAULT', 0);
defined('SERVER_NOTICE_STATUS_REGISTER')          OR define('SERVER_NOTICE_STATUS_REGISTER', 1);
defined('SERVER_NOTICE_STATUS_COMPLETE')     OR define('SERVER_NOTICE_STATUS_COMPLETE', 2);
defined('SERVER_NOTICE_STATUS_FAIL')     OR define('SERVER_NOTICE_STATUS_FAIL', 3);

defined('COUPON_USER_TYPE_DEFAULT')             OR define('COUPON_USER_TYPE_DEFAULT', 0);
defined('COUPON_USER_TYPE_REGISTER')            OR define('COUPON_USER_TYPE_REGISTER', 1);
defined('COUPON_USER_TYPE_SHOP_PURCHASING')     OR define('COUPON_USER_TYPE_SHOP_PURCHASING', 2);
defined('COUPON_USER_TYPE_CENTER')              OR define('COUPON_USER_TYPE_CENTER', 3);
defined('COUPON_USER_TYPE_TEACHER')             OR define('COUPON_USER_TYPE_TEACHER', 4);
//defined('COUPON_USER_TYPE_CENTER_TEACHER')      OR define('COUPON_USER_TYPE_CENTER_TEACHER', 5);

defined('COUPON_TYPE_DEFAULT')                    OR define('COUPON_TYPE_DEFAULT', 0);
defined('COUPON_TYPE_SHOP_DISCOUNT_PRICE')        OR define('COUPON_TYPE_SHOP_DISCOUNT_PRICE', 1);
defined('COUPON_TYPE_SHOP_DISCOUNT_PERCENT')      OR define('COUPON_TYPE_SHOP_DISCOUNT_PERCENT', 2);
defined('COUPON_TYPE_SHOP_FREE_SHIPPING')         OR define('COUPON_TYPE_SHOP_FREE_SHIPPING', 3);

defined('COUPON_UNRECEIVABLE')    OR define('COUPON_UNRECEIVABLE', 0);
defined('COUPON_RECEIVABLE')      OR define('COUPON_RECEIVABLE', 1);
defined('COUPON_RECEIVED')        OR define('COUPON_RECEIVED', 2);

defined('COUPON_LIST_PAGE_SIZE')      OR define('COUPON_LIST_PAGE_SIZE', 10);

defined('MAIN_SLIDER_TYPE_HOME')      OR define('MAIN_SLIDER_TYPE_HOME', 0);
defined('MAIN_SLIDER_TYPE_SHOP')      OR define('MAIN_SLIDER_TYPE_SHOP', 1);

defined('CENTER_TICKET_TYPE_DEFAULT')    OR define('CENTER_TICKET_TYPE_DEFAULT', 0);
defined('CENTER_TICKET_TYPE_COUNT')      OR define('CENTER_TICKET_TYPE_COUNT', 1);
defined('CENTER_TICKET_TYPE_DURATION')     OR define('CENTER_TICKET_TYPE_DURATION', 2);

defined('CENTER_TICKET_MEMBER_ACTION_DEFAULT')            OR define('CENTER_TICKET_MEMBER_ACTION_DEFAULT', 0);
defined('CENTER_TICKET_MEMBER_ACTION_JOIN')               OR define('CENTER_TICKET_MEMBER_ACTION_JOIN', 1);
defined('CENTER_TICKET_MEMBER_ACTION_STOP')               OR define('CENTER_TICKET_MEMBER_ACTION_STOP', 2);
defined('CENTER_TICKET_MEMBER_ACTION_RENEWAL')            OR define('CENTER_TICKET_MEMBER_ACTION_RENEWAL', 3);
defined('CENTER_TICKET_MEMBER_ACTION_REFUND')             OR define('CENTER_TICKET_MEMBER_ACTION_REFUND', 4);
defined('CENTER_TICKET_MEMBER_ACTION_DELETE')             OR define('CENTER_TICKET_MEMBER_ACTION_DELETE', 5);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE')            OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE', 6);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT')       OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT', 7);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL')     OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL', 8);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_FAIL')       OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_FAIL', 9);
defined('CENTER_TICKET_MEMBER_ACTION_MODIFY')             OR define('CENTER_TICKET_MEMBER_ACTION_MODIFY', 10);
defined('CENTER_TICKET_MEMBER_ACTION_ADDITION')           OR define('CENTER_TICKET_MEMBER_ACTION_ADDITION', 11);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_TRANS')      OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_TRANS', 12);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT_TRANS') OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_WAIT_TRANS', 13);
defined('CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL_TRANS')OR define('CENTER_TICKET_MEMBER_ACTION_RESERVE_CANCEL_TRANS', 14);

defined('STUDIO_TICKET_ACTION_DEFAULT')            OR define('STUDIO_TICKET_ACTION_DEFAULT', 0);
defined('STUDIO_TICKET_ACTION_RESERVE')            OR define('STUDIO_TICKET_ACTION_RESERVE', 1);
defined('STUDIO_TICKET_ACTION_RESERVE_WAIT')       OR define('STUDIO_TICKET_ACTION_RESERVE_WAIT', 2);
defined('STUDIO_TICKET_ACTION_RESERVE_CANCEL')     OR define('STUDIO_TICKET_ACTION_RESERVE_CANCEL', 3);
defined('STUDIO_TICKET_ACTION_RESERVE_FAIL')       OR define('STUDIO_TICKET_ACTION_RESERVE_FAIL', 4);

// time
defined('ONE_MINUTE')   OR define('ONE_MINUTE', 60);
defined('ONE_HOUR')     OR define('ONE_HOUR', 60 * ONE_MINUTE);
defined('ONE_DAY')      OR define('ONE_DAY', 24 * ONE_HOUR);
defined('ONE_WEEK')     OR define('ONE_WEEK', 7 * ONE_DAY);
defined('30_DAY')       OR define('30_DAY', 30 * ONE_DAY);
defined('60_DAY')       OR define('60_DAY', 60 * ONE_DAY);
defined('120_DAY')      OR define('120_DAY', 120 * ONE_DAY);
defined('ONE_YEAR')     OR define('ONE_YEAR', 365 * ONE_DAY);

// user_auth
defined('USER_AUTH_TYPE_NICE_CHECK_PLUS_SAFE') OR define('USER_AUTH_TYPE_NICE_CHECK_PLUS_SAFE', 1);

defined('STUDIO_OPEN') OR define('STUDIO_OPEN', true);

defined('STUDIO_RESERVE_POPUP_QA1') OR define('STUDIO_RESERVE_POPUP_QA1', '티켓팅 확정 후 예약 취소는 불가합니다.');
defined('STUDIO_RESERVE_POPUP_QA2') OR define('STUDIO_RESERVE_POPUP_QA2', '티켓팅 후 4시간 이내 미입금 시 예약이 취소됩니다.');
defined('STUDIO_RESERVE_POPUP_QA3') OR define('STUDIO_RESERVE_POPUP_QA3', '다회권을 가지셨다면, 중복결제 하지 않게 주의해 주세요.');
