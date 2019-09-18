<?php 
class Mapi extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
      $this->load->database();
      

        }
  function getToken()
  {
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://edcapitest.edcad.ae/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "grant_type=password&username=eLearning%40edcad.ae&password=Edc%402019",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded",
    "Postman-Token: 297c12cb-5d02-4d1b-809e-87e16086da74",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $response=json_decode($response);
   $token=$response->access_token;
   return $token;
}
  }
function getStudentLogin($studentNo,$trafficNo,$fileNo,$token)
 {
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://edcapitest.edcad.ae/api/eLearning/Login/".$studentNo."/".$trafficNo."/".$fileNo,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$token,
        "Postman-Token: 1f800df0-042c-4f58-8046-9cccea73daa0",
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return json_decode($response);
    }
 }
function getCourseList($token)
{
  
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://edcapitest.edcad.ae/api/eLearning/GetEdcCourseList",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$token,
      "cache-control: no-cache"
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $response=json_decode($response);
   
    return $response;
    // echo $response;
  }
}

function getLessonList($token)
{
  
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://edcapitest.edcad.ae/api/eLearning/GetEdcLessonList",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$token,
      "cache-control: no-cache"
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $response=json_decode($response);
   
    return $response;
    // echo $response;
  }
}
function setStudentResult($student_no,$lesson_code,$token)
{
  

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://edcapitest.edcad.ae/api/eLearning/PosteLearningLessonAttendance",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n  \"studentNumber\": \"12345\",\r\n  \"LessonCode\": \"L1\",\r\n  \"Date\": \"2019-05-09 12:12:54\"\r\n}\r\n",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$token,
    "Content-Type: application/json",
    "Postman-Token: 967cd29a-24d4-4766-9934-1f9094cf96d2",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  return $response;
}
}


    }

    