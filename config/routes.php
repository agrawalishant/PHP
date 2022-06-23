<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

// for admin direct

//$route['default_controller'] = 'login_controller/loadloginpage';

$route['default_controller'] = 'astro_controller/index';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

//$route['front_controller'] = 'welcome';
$route['checkout'] = 'products/buy';
$route['wallet'] = 'products/walletbuy';
$route['razorpay'] = 'Checkout_razorpay/callback';
// ------------------FRONT PAGES START

$route['front_page'] = 'astro_controller/index';
$route['astrologer_registration'] = 'astro_controller/astrologer_registration';
$route['about'] = 'front_controller/aboutus';
$route['termandcondition'] = 'front_controller/termandcondition';
$route['privacypolicy'] = 'front_controller/privacypolicy';
$route['services'] = 'astro_controller/services';
$route['match_making'] = 'astro_controller/match_making';
$route['prediction'] = 'astro_controller/prediction';
$route['product'] = 'astro_controller/product';
 $route['product/(:any)'] = 'astro_controller/product/$1';
 $route['product/(:any)/(:any)'] = 'astro_controller/product/$1/$2';
 $route['productdetails/(:any)'] = 'astro_controller/productdetails/$1';
 $route['add_to_card'] = 'astro_controller/add_to_card';
 $route['cart'] = 'astro_controller/cart';
 $route['add_to_card/(:any)'] = 'astro_controller/add_to_card/$1';
$route['contact'] = 'astro_controller/contact';
$route['services_landing/(:any)'] = 'astro_controller/services_landing/$1';
$route['astro_submit'] = 'astro_controller/astro_reg_submit';
$route['enquiry'] = 'front_controller/enquiery_submit';
$route['blog'] = 'front_controller/blog';
 $route['blogs/(:any)'] = 'front_controller/blogs_details/$1';
 $route['kundalienquiry'] = 'front_controller/kundali_enquiry';
 $route['comment_submit/(:any)'] = 'front_controller/comment_submit/$1';
 $route['astrotalk'] = 'astro_controller/astrotalk';
  $route['astrotalk/(:any)'] = 'astro_controller/astrotalk/$1';
  $route['astrotalk/(:any)/(:any)'] = 'astro_controller/astrotalk/$1/$2';
 $route['astrotalk_profile/(:any)'] = 'astro_controller/astrotalk_profile/$1';
 $route['horoscopeyearly_landing/(:any)'] = 'front_controller/horoscopeyearly_landing/$1';
 $route['matchmaking_submit'] = 'front_controller/matchmaking_submit';
// $route['astrologer_login'] = 'front_controller/astrologer_login';
// $route['blog'] = 'front_controller/blog';
 $route['prediction_submit'] = 'front_controller/prediction_submit';
 $route['pujaservicedetail'] = 'front_controller/pujaservicedetail';
//  pagination 
//$route['authors/(:num)'] = 'user_controller/dashboard/$1';
$route['authors/(:any)'] = 'user_controller/dashboard/$1';
// report download user
$route['report'] = 'user_controller/reportdownload';
$route['send_reply_report_fromastrologer'] = 'astrologer_controller/send_reply_report_fromastrologer';

$route['chat_on'] = 'astrologer_controller/astrologerdashboard';
$route['chat_off'] = 'astrologer_controller/astrologerdashboard';
$route['call_on'] = 'astrologer_controller/astrologerdashboard';
$route['call_off'] = 'astrologer_controller/astrologerdashboard';
$route['checkcoupan'] = 'front_controller/checkcoupan';
$route['commentrateastrologer'] = 'user_controller/commentrateastrologer';
// ------------------FRONT PAGES END
$route['destroy'] = 'astro_controller/destroy';
/****************************lOGIN START admin admin admin **************************/
/****************************lOGIN START admin admin admin **************************/
/****************************lOGIN START admin admin admin **************************/
$route['login_page'] = 'login_controller/loadloginpage';
$route['login_check_admin'] = 'login_controller/check_login_admin';
$route['admindashboard'] = 'admin_controller/dashboard';
$route['logout_admin'] = 'login_controller/admin_logout';
/************************************lOGIN admin admin adminEND ********************/ 
/****************************lOGIN STARTUSER USER **************************/
/****************************lOGIN STARTUSER USER **************************/
/****************************lOGIN REGISTER STARTUSER USER **************************/
$route['ajax_mobile_register'] = 'user_controller/ajax_mobile_register';
$route['user_register_submit'] = 'user_controller/user_register';
$route['user_login_submit'] = 'login_controller/check_login_user';
$route['userdashboard'] = 'user_controller/dashboard';
$route['userdashboard/(:any)'] = 'user_controller/dashboard/$1';
$route['logout_user'] = 'login_controller/user_logout';
$route['update_profile_user/(:any)/(:any)'] = 'user_controller/dashboard/$1/$2';
$route['update_user_password/(:any)'] = 'user_controller/dashboard/$1';
$route['detailsfill'] = 'login_controller/detailsfill';
$route['insertfb'] = 'User_controller/face';
// google login
$route['googlelogin'] = 'google_controller/login';
$route['subreport'] = 'user_controller/subreport';
/****************************lOGIN REGISTER END ASTROLOGER **************************/
/****************************lOGIN STARTUSER ASTROLOGER **************************/
/****************************lOGIN STARTUSER ASTROLOGER **************************/
/****************************lOGIN REGISTER START ASTROLOGER **************************/
$route['astrologer_login_page'] = 'astrologer_controller/astrologer_loginpage';
$route['astrologer_login_submit'] = 'login_controller/check_login_astrologer';
$route['astrologerdashboard'] = 'astrologer_controller/astrologerdashboard';
$route['logout_astrologer'] = 'login_controller/astrologer_logout';
$route['update_astrologer_profile/(:any)/(:any)'] = 'astrologer_controller/astrologerdashboard/$1/$2';
$route['update_astrologer_password/(:any)'] = 'astrologer_controller/astrologerdashboard/$1';
$route['update_astrologer_discount/(:any)/(:any)'] = 'astrologer_controller/astrologerdashboard/$1/$2';
/****************************lOGIN REGISTER END ASTROLOGER **************************/


/*******************************************ADMIN BACKEND START**************************** */

/*******************************************ADMIN BACKEND START **************************** */

/*************************************interested user *************************************************************************************/

$route['interested_userlist_view'] = 'admin_controller/interested_user';
//$route['update_profile/(:any)']='admin_controller/profile/$1';


/****************************subadmin*************************************************************************************/

$route['subadmin_view'] = 'admin_controller/subadmin_view';

$route['add_subadmin'] = 'admin_controller/add_subadmin';
$route['howtouse_view'] = 'admin_controller/howtouse_view';
$route['howtouseUpdate'] = 'admin_controller/howtouse';
$route['deletesubadmin/(:any)/(:any)/(:any)']='admin_controller/subadmin_view/$1/$2/$3';



/****************************permission/*************************************************************************************/

 $route['permission_view'] = 'admin_controller/permission_view';

 $route['updatepermission/(:any)/(:any)']='admin_controller/permission_view/$1/$2';

/*********************************************forget password****************************************/

$route['user_forgetpassword'] = 'user_controller/user_forgetpassword';
$route['astrologer_forgetpassword'] = 'astrologer_controller/astrologer_forgetpassword';
$route['forgetpassword_page'] = 'admin_controller/forgetpasswordpage';
$route['emailsubmit_forgetpassword_page'] = 'admin_controller/email_forgetpassword';

/*************************************profile*************************************************************************************/

$route['profile_view'] = 'admin_controller/profile';
$route['update_profile/(:any)']='admin_controller/profile/$1';
/*************************************kundali charges*************************************************************************************/

$route['kundalicharges_view'] = 'admin_controller/kundalicharges';
$route['update_kundalicharges/(:any)']='admin_controller/kundalicharges/$1';

/**********************************WEBSITE INFORMATION***************************************************/

 $route['websiteinformation'] = 'admin_controller/websiteinformation';

 $route['update_websiteinformation/(:any)']='admin_controller/websiteinformation/$1';

/****************************blog/*************************************************************************************/

 $route['blog_view'] = 'admin_controller/blog_view';

 $route['add_blog'] = 'admin_controller/add_blog';

 $route['updateblog/(:any)/(:any)']='admin_controller/blog_view/$1/$2';

 $route['deleteblog/(:any)/(:any)/(:any)']='admin_controller/blog_view/$1/$2/$3';

/***************************festival/*************************************************************************************/

 $route['festival_view'] = 'admin_controller/festival_view';

 $route['add_festival'] = 'admin_controller/add_festival';

 $route['updatefestival/(:any)/(:any)']='admin_controller/festival_view/$1/$2';

 $route['deletefestival/(:any)/(:any)']='admin_controller/festival_view/$1/$2';

/***************************userlist/*************************************************************************************/

 $route['userlist_view'] = 'admin_controller/userlist_view';

 //$route['add_festival'] = 'admin_controller/add_festival';

 //$route['updatefestival/(:any)/(:any)']='admin_controller/festival_view/$1/$2';

 $route['deleteuserlist/(:any)/(:any)']='admin_controller/userlist_view/$1/$2';
 $route['activeuserlist/(:any)/(:any)']='admin_controller/userlist_view/$1/$2';
 $route['inactiveuserlist/(:any)/(:any)']='admin_controller/userlist_view/$1/$2';
/******************************service************************************************************************************/

 $route['services_view'] = 'admin_controller/service_view';

 $route['add_service'] = 'admin_controller/add_service';

 $route['updateservice/(:any)/(:any)']='admin_controller/service_view/$1/$2';

 $route['deleteservice/(:any)/(:any)/(:any)']='admin_controller/service_view/$1/$2/$3';

/*************************** news *************************************************************************************/

 $route['news_view'] = 'admin_controller/news_view';

 $route['add_news'] = 'admin_controller/add_news';

 $route['updatenews/(:any)/(:any)']='admin_controller/news_view/$1/$2';

 $route['deletenews/(:any)/(:any)/(:any)']='admin_controller/news_view/$1/$2/$3';

/******************************testimonial*************************************************************************************/

 $route['testimonial_view'] = 'admin_controller/testimonial_view';

 $route['add_testimonial'] = 'admin_controller/add_testimonial';

 $route['updatetestimonial/(:any)/(:any)']='admin_controller/testimonial_view/$1/$2';

 $route['deletetestimonial/(:any)/(:any)/(:any)']='admin_controller/testimonial_view/$1/$2/$3';

/*********************************faq************************************************************************************/

 $route['faq_view'] = 'admin_controller/faq_view';

 $route['add_faq'] = 'admin_controller/add_faq';

 $route['updatefaq/(:any)/(:any)']='admin_controller/faq_view/$1/$2';

 $route['deletetefaq/(:any)/(:any)']='admin_controller/faq_view/$1/$2';

/*******************************horoscope yearly*************************************************************************************/

 $route['horoscopeyearly_view'] = 'admin_controller/horoscopeyearly_view';

 $route['updatehoroscopeyearly/(:any)/(:any)']='admin_controller/horoscopeyearly_view/$1/$2';

/********************************content management*************************************************************************************/

 $route['contentmgt_view'] = 'admin_controller/contentmgt_view';

 $route['add_contentmgt'] = 'admin_controller/add_contentmgt';

 $route['updatecontentmgt/(:any)/(:any)']='admin_controller/contentmgt_view/$1/$2';

 $route['deletetecontentmgt/(:any)/(:any)']='admin_controller/contentmgt_view/$1/$2';

/*********************************product category/*************************************************************************************/

 $route['product_category_view'] = 'admin_controller/product_category_view';

 $route['add_product_category'] = 'admin_controller/add_product_category';

 $route['updateproduct_category/(:any)/(:any)']='admin_controller/product_category_view/$1/$2';

 $route['deleteteproduct_category/(:any)/(:any)']='admin_controller/product_category_view/$1/$2';

/***********************************astrologer category*************************************************************************************/

$route['category_astrologer_view'] = 'admin_controller/category_astrologer_view';

$route['add_category_astrologer'] = 'admin_controller/add_category_astrologer';

$route['updatecategory_astrologer/(:any)/(:any)']='admin_controller/category_astrologer_view/$1/$2';

$route['deletetecategory_astrologer/(:any)/(:any)']='admin_controller/category_astrologer_view/$1/$2';

/*************************************************************************************/

/******************************product add*************************************************************************************/

$route['product_view'] = 'admin_controller/product_view';

$route['add_product'] = 'admin_controller/add_product';

$route['updateproduct/(:any)/(:any)']='admin_controller/product_view/$1/$2';

$route['deleteproduct/(:any)/(:any)']='admin_controller/product_view/$1/$2';

/******************************************Product End*************************************************************************/
/******************************sub product add*************************************************************************************/

$route['sub_product_view'] = 'admin_controller/sub_product_view';
$route['sub_add_product'] = 'admin_controller/sub_add_product';
$route['sub_deleteproduct/(:any)/(:any)']='admin_controller/sub_product_view/$1/$2';

$route['sub_updateproduct/(:any)/(:any)']='admin_controller/sub_product_view/$1/$2';



/******************************************Product End*************************************************************************/

/****************************** ASTROLOGERS *************************************************************************************/

$route['astrologers_view'] = 'admin_controller/astrologers_view';

$route['add_astrologers'] = 'admin_controller/add_astrologers';

$route['updateastrologers/(:any)/(:any)']='admin_controller/astrologers_view/$1/$2';

$route['deleteastrologers/(:any)/(:any)']='admin_controller/astrologers_view/$1/$2';

$route['active_astrologer/(:any)/(:any)'] = 'admin_controller/astrologers_view/$1/$2';

$route['deactive_astrologer/(:any)/(:any)'] = 'admin_controller/astrologers_view/$1/$2';



/************************************ASTROLOGERS end*******************************************************************************/

/****************************** MATCH MAKING BANNER *************************************************************************************/

$route['mmbanner_view'] = 'admin_controller/mmbanner_view';

$route['add_mmbanner'] = 'admin_controller/add_mmbanner';

$route['updatmmbanner/(:any)/(:any)']='admin_controller/mmbanner_view/$1/$2';

$route['deletemmbanner/(:any)/(:any)/(:any)']='admin_controller/mmbanner_view/$1/$2/$3';

/*******************************************************************************************************************/

/****************************** ASTROLOGERS  ADMIN TEAM START *************************************************************************************/

$route['aateam_view'] = 'admin_controller/aateam_view';

$route['add_aateam'] = 'admin_controller/add_aateam';

$route['updateaateam/(:any)/(:any)']='admin_controller/aateam_view/$1/$2';

$route['deleteaateam/(:any)/(:any)/(:any)']='admin_controller/aateam_view/$1/$2/$3';

$route['active_aateam/(:any)/(:any)'] = 'admin_controller/aateam_view/$1/$2';

$route['deactive_aateam/(:any)/(:any)'] = 'admin_controller/aateam_view/$1/$2';

/********************************* ASTROLOGERS  ADMIN TEAM  END **********************************************************************************/

/***********************************astrologer language start*************************************************************************************/

$route['language_astrologer_view'] = 'admin_controller/language_astrologer_view';

$route['add_language_astrologer'] = 'admin_controller/add_language_astrologer';

$route['updatelanguage_astrologer/(:any)/(:any)']='admin_controller/language_astrologer_view/$1/$2';

// $route['deletetelanguage_astrologer/(:any)/(:any)']='admin_controller/language_astrologer_view/$1/$2';

/*******************************************astrologer language end******************************************/

/***************************enquiry start*************************************************************************************/

$route['enquiry_view'] = 'admin_controller/enquiry_view';

$route['deleteenquiry/(:any)/(:any)']='admin_controller/enquiry_view/$1/$2';

/******************************enquiry start************************************************************************************/

/*************************** advertisement start*************************************************************************************/

$route['advertisement_view'] = 'admin_controller/advertisement_view';

$route['add_advertisement'] = 'admin_controller/add_advertisement';

$route['updateadvertisement/(:any)/(:any)']='admin_controller/advertisement_view/$1/$2';

$route['deleteadvertisement/(:any)/(:any)/(:any)']='admin_controller/advertisement_view/$1/$2/$3';

/*************************** advertisement end *************************************************************************************/

/***************************enquiryfreekundali start*************************************************************************************/

$route['enquiryfreekundali_view'] = 'admin_controller/enquiryfreekundali_view';

$route['deleteenquiryfreekundali/(:any)/(:any)']='admin_controller/enquiryfreekundali_view/$1/$2';

$route['active_freekun/(:any)/(:any)'] = 'admin_controller/enquiryfreekundali_view/$1/$2';

$route['deactive_freekun/(:any)/(:any)'] = 'admin_controller/enquiryfreekundali_view/$1/$2';

/******************************enquiry ************************************************************************************/

/*********************************Notification start************************************************************************************/

$route['notification_view'] = 'admin_controller/notification_view';

$route['add_notification'] = 'admin_controller/add_notification';

$route['updatenotification/(:any)/(:any)']='admin_controller/notification_view/$1/$2';

$route['deletetenotification/(:any)/(:any)']='admin_controller/notification_view/$1/$2';

/*********************************Notification end************************************************************************************/

/******************************onlinepujadetail add*************************************************************************************/

$route['onlinepujadetail_view'] = 'admin_controller/onlinepujadetail_view';

$route['add_onlinepujadetail'] = 'admin_controller/add_onlinepujadetail';

$route['updateonlinepujadetail/(:any)/(:any)']='admin_controller/onlinepujadetail_view/$1/$2';

$route['deleteonlinepujadetail/(:any)/(:any)/(:any)']='admin_controller/onlinepujadetail_view/$1/$2/$3';

/************************************************onlinepujadetail end*******************************************************************/

/***************************blog commentappdisapp start*************************************************************************************/

$route['commentappdisapp_view'] = 'admin_controller/commentsapproval_view';

$route['deletecommentsapproval/(:any)/(:any)']='admin_controller/commentsapproval_view/$1/$2';

$route['active_commentsapproval/(:any)/(:any)'] = 'admin_controller/commentsapproval_view/$1/$2';

$route['deactive_commentsapproval/(:any)/(:any)'] = 'admin_controller/commentsapproval_view/$1/$2';

/******************************commentsapproval ************************************************************************************/

/***************************free prediction start*************************************************************************************/

$route['enquiryfreeprediction_view'] = 'admin_controller/enquiryfreeprediction_view';

$route['deleteenquiryfreeprediction/(:any)/(:any)']='admin_controller/enquiryfreeprediction_view/$1/$2';

$route['active_freepre/(:any)/(:any)'] = 'admin_controller/enquiryfreeprediction_view/$1/$2';

$route['deactive_freepre/(:any)/(:any)'] = 'admin_controller/enquiryfreeprediction_view/$1/$2';

/******************************free prediction ************************************************************************************/
/***************************predition data entry start*************************************************************************************/
$route['predictiondataentry_view'] = 'admin_controller/predictiondataentry_view';
$route['updatepredictiondataentry/(:any)/(:any)']='admin_controller/predictiondataentry_view/$1/$2';
/***************************predition data entry Endt*************************************************************************************/

/***************************Transactions/*************************************************************************************/
$route['transaction_view'] = 'admin_controller/transaction_view';
/***************************Transactions/*************************************************************************************/
/***************************reportgeneration history admin panel start*************************************************************************************/

$route['reportgen_user_history_adminpanel'] = 'admin_controller/reportgen_user_history_adminpanel_view';
//  this is for astrologer active inactive
$route['problemactive/(:any)/(:any)'] = 'admin_controller/reportgen_user_history_adminpanel_view/$1/$2';
 $route['probleminactive/(:any)/(:any)'] = 'admin_controller/reportgen_user_history_adminpanel_view/$1/$2';
 $route['paytoastrologer/(:any)/(:any)/(:any)'] = 'admin_controller/reportgen_user_history_adminpanel_view/$1/$2/$3';
/***************************reportgeneration history admin panel end*************************************************************************************/
/***************************admin commission histor/*************************************************************************************/
$route['admin_comission_history'] = 'admin_controller/admin_transaction_view';
/***************************************************************************************************************/
/*************************** Request amount ansrologer admin *************************************************************************************/
$route['request_amount_astrologer/(:any)'] = 'astrologer_controller/amount_request_astrologer/$1';//ASTRO REQUEST
$route['amtrequestlist'] = 'admin_controller/amtrequestlist';//ADMIN PANEL
$route['amountcredited/(:any)/(:any)/(:any)/(:any)'] = 'admin_controller/amtrequestlist/$1/$2/$3/$4';//credit amount

/*************************** Request amount ansrologer admin ************************************************************************************/

/************************** chat rate data start ************************************************************************************/
$route['chat_data'] = 'user_controller/chat_data';
$route['wattingtime/(:any)'] = 'astro_controller/watting_time/$1';
/*************************** chat rate data end ************************************************************************************/

/*************************** call rate data start ************************************************************************************/
$route['call_data'] = 'user_controller/call_data';
$route['Call_Code'] = 'user_controller/call_Code_data';
// 19042021 start
$route['updatecall_data/(:any)'] = 'user_controller/updatecall_data/$1';
// 19042021 end
/*************************** chat rate data end ************************************************************************************/

/*********************************coupan************************************************************************************/

$route['coupan_view'] = 'admin_controller/coupan_view';

$route['add_coupan'] = 'admin_controller/add_coupan';

$route['updatecoupan/(:any)/(:any)']='admin_controller/coupan_view/$1/$2';

$route['deletetecoupan/(:any)/(:any)']='admin_controller/coupan_view/$1/$2';

/*******************************coupan*************************************************************************************/
$route['Calling-Coupan'] = 'Astro_controller/callcoupon';
$route['Call-Coupan'] = 'admin_controller/call_coupan';
$route['Add-Call-Coupan'] = 'admin_controller/add_callcoupan';
$route['Update-Coupan/(:any)/(:any)'] = 'admin_controller/call_coupan/$1/$2';
/***************************Astro commentappdisapp start*************************************************************************************/

$route['astrocommentappdisapp_view'] = 'admin_controller/astrocommentsapproval_view';

$route['deletecommentsapprovalastro/(:any)/(:any)']='admin_controller/astrocommentsapproval_view/$1/$2';

$route['active_commentsapprovalastro/(:any)/(:any)'] = 'admin_controller/astrocommentsapproval_view/$1/$2';

$route['deactive_commentsapprovalastro/(:any)/(:any)'] = 'admin_controller/astrocommentsapproval_view/$1/$2';

/******************************astro commentsapproval ************************************************************************************/

/*********************************report question************************************************************************************/

$route['reportquestion_view'] = 'admin_controller/reportquestion_view';

$route['add_reportquestion'] = 'admin_controller/add_reportquestion';

$route['updatereportquestion/(:any)/(:any)']='admin_controller/reportquestion_view/$1/$2';

$route['deletetereportquestion/(:any)/(:any)']='admin_controller/reportquestion_view/$1/$2';

/*******************************report question*************************************************************************************/
/***************************orders start*************************************************************************************/

$route['orders_view'] = 'admin_controller/orders_view';

$route['active_orders/(:any)/(:any)'] = 'admin_controller/orders_view/$1/$2';

$route['deactive_orders/(:any)/(:any)'] = 'admin_controller/orders_view/$1/$2';

/******************************orders approval ************************************************************************************/
/******************************call history admin start ************************************************************************************/
$route['historycall_view'] = 'admin_controller/historycall_view';
/******************************call history admin end ************************************************************************************/
/******************************chat history admin start ************************************************************************************/
$route['historychat_view'] = 'admin_controller/historychat_view';
/******************************chat history admin end ************************************************************************************/
$route['astrochat'] = 'Astrologer_controller/astrologer_chat';
$route['astrochat/(:any)/(:any)'] = 'Astrologer_controller/astrologer_chats/$1/$2';
$route['call-Coupon'] = 'Astro_controller/callcoupon';
// end

?>