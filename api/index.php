<?php
// Define path to data folder
define('DATA_PATH', realpath(dirname(__FILE__).'/data'));

//Define our id-key pairs
$applications = array(
	'CAPI' => '28e336ac6c9423d946ba02d19c6a2632', //security  random key
);

include_once 'models/categories.php';

try {
	//$app_id = $_REQUEST['app_id'];

	/*if( !isset($applications[$app_id]) ) {
        throw new Exception('Application does not exist!');
    }*/
    
    $params = $_REQUEST;	
	
	//if( $params == false || isset($params->controller) == false || isset($params->action) == false ) {
    if( $params == false) {
        throw new Exception('Request is not valid');
	}
	
	

    //$params = $_REQUEST;
    $controller = ucfirst(strtolower($params['controller']));
     
    //get the action and format it correctly so all the
    //letters are not capitalized, and append 'Action'
    $met = strtolower($params['action']);
 
    if( file_exists("controller/{$controller}.php") ) {
        include_once "controller/{$controller}.php";
    } else {
        throw new Exception('Controller is invalid.');
	}
	
    $controller = new $controller($params);
     
    //check if the action exists in the controller. if not, throw an exception.
    if( method_exists($controller, $met) === false ) {
        throw new Exception('Method is invalid.');
    }
     
    //execute the action
    $result['data'] = $controller->$met();
    $result['success'] = true;
	
} catch( Exception $e ) {
	//catch any exceptions and report the problem
	$result = array();
	$result['success'] = false;
	$result['errormsg'] = $e->getMessage();
}

//echo the result of the API call
echo json_encode($result);
exit();