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

defined('USER_TYPE_GENERAL')   OR define('USER_TYPE_GENERAL', 1);
defined('USER_TYPE_ADMIN')     OR define('USER_TYPE_ADMIN', 2);
defined('USER_TYPE_TEACHER')   OR define('USER_TYPE_TEACHER', 4);
defined('USER_TYPE_CENTER')    OR define('USER_TYPE_CENTER', 8);
defined('USER_TYPE_SHOP')      OR define('USER_TYPE_SHOP', 16);

defined('CENTER_TYPE_YOGA')       OR define('CENTER_TYPE_YOGA', 1);
defined('CENTER_TYPE_PILATES')    OR define('CENTER_TYPE_PILATES', 2);

defined('FIND_TYPE_CENTER')       OR define('FIND_TYPE_CENTER', 1);
defined('FIND_TYPE_TEACHER')      OR define('FIND_TYPE_TEACHER', 2);

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

defined('BLOG_LIST_PAGE_SIZE')          OR define('BLOG_LIST_PAGE_SIZE', 6);
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
defined('SHOP_PURCHASE_STATUS_ALL_CANCELED')          OR define('SHOP_PURCHASE_STATUS_ALL_CANCELED', 10);

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

defined('SHOP_ADMIN_ITEM_LIST_PAGE_SIZE') OR define('SHOP_ADMIN_ITEM_LIST_PAGE_SIZE', 10);

defined('SERVER_EMAIL_TYPE_DEFAULT') OR define('SERVER_EMAIL_TYPE_DEFAULT', 0);
defined('SERVER_EMAIL_TYPE_TEACHER_APPROVAL') OR define('SERVER_EMAIL_TYPE_TEACHER_APPROVAL', 1);
defined('SERVER_EMAIL_TYPE_TEACHER_REJECT') OR define('SERVER_EMAIL_TYPE_TEACHER_REJECT', 2);
defined('SERVER_EMAIL_TYPE_CENTER_APPROVAL') OR define('SERVER_EMAIL_TYPE_CENTER_APPROVAL', 3);
defined('SERVER_EMAIL_TYPE_CENTER_REJECT') OR define('SERVER_EMAIL_TYPE_CENTER_REJECT', 4);
defined('SERVER_EMAIL_TYPE_SHOP_APPROVAL') OR define('SERVER_EMAIL_TYPE_SHOP_APPROVAL', 5);
defined('SERVER_EMAIL_TYPE_RESET_PW') OR define('SERVER_EMAIL_TYPE_RESET_PW', 6);
defined('SERVER_EMAIL_TYPE_USER_QNA') OR define('SERVER_EMAIL_TYPE_USER_QNA', 7);
defined('SERVER_EMAIL_TYPE_USER_APPROVAL') OR define('SERVER_EMAIL_TYPE_USER_APPROVAL', 8);

defined('COUPON_USER_TYPE_DEFAULT')       OR define('COUPON_USER_TYPE_DEFAULT', 0);
defined('COUPON_USER_TYPE_REGISTER')       OR define('COUPON_USER_TYPE_REGISTER', 1);

defined('COUPON_TYPE_DEFAULT')                    OR define('COUPON_TYPE_DEFAULT', 0);
defined('COUPON_TYPE_SHOP_DISCOUNT_PRICE')        OR define('COUPON_TYPE_SHOP_DISCOUNT_PRICE', 1);
defined('COUPON_TYPE_SHOP_DISCOUNT_PERCENT')      OR define('COUPON_TYPE_SHOP_DISCOUNT_PERCENT', 2);


defined('COUPON_LIST_PAGE_SIZE')      OR define('COUPON_LIST_PAGE_SIZE', 10);
