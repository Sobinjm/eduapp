<?php

// $method='GET'; $url="https://edcapitest.edcad.ae/api/eLearning/GetEdcLessonList"; $data = false;
		
// 			$curl = curl_init();
		
// 			switch ($method)
// 			{
// 				case "POST":
// 					curl_setopt($curl, CURLOPT_POST, 1);
		
// 					if ($data)
// 						curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
// 					break;
// 				case "PUT":
// 					curl_setopt($curl, CURLOPT_PUT, 1);
// 					break;
// 				default:
// 					if ($data)
// 						$url = sprintf("%s?%s", $url, http_build_query($data));
// 			}
// 			$authorization = "Authorization: Bearer FWA-ykHoyPw4qHpi6EBCugYOpzSDV4BQt1g6snXKH8k6RoNkXSVKi1sEQq9mNvdKGwW4AHaAhfrTytGp0vHDBslG7s2mqiz80Ovt7Y9mhpiy-hnaZFLFXUHKLDk7qQm5MVJesMxSqmZPFGr3lahjrrC6EiQATedjzmIRvjQ7LBA6dBiDPQGTkKrOFW_-SQ2sQ1E3dnJvePIlep2sXyPDIvC9lpKRzut16ysS-l6PT7-YqNQ9CGzh0nhEN8YM-dlQazbQ5Txffyim8oSQ3A2sqLozyklG_Ifp7LLIS7HRXFk_wU6FWsiBbAKM-zVTCiO9BGefhpKcBIi_T9LiOlKWo8IlLAnvQbj9fqEJsl7f0kIFv9Wcre3x9nGEn5wMceP0E7IZE6TBqvY5h9JzHmP5I1bm57P2xwKYvPdgrtyYumhmPT1prsd_hRJHhNJ87v2Al0S3wRG9ycrSGCCL2xsXjCWaUr2fQyPUBRlyqNzcJ8Ggrp82R4xyD0xebqBKKmtUjGFc7EJWK3IfC9MAfGnBTA";
// 			// Optional Authentication:
// 			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
   
// 			// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
// 			// curl_setopt($curl, CURLOPT_USERPWD, "username:password");
		
// 			curl_setopt($curl, CURLOPT_URL, $url);
// 			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
// 			$result = curl_exec($curl);
		
// 			curl_close($curl);
		
// 			print_r($result);





            
            ?>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	
    public function getToken()
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
//   echo $response;
  $response=json_decode($response);
   echo $token=$response->access_token;
}

die();
    }



public function getApiCourse()
    {
       $token_array= json_decode($this->getToken());
        $token=$token_array->access_token;
       // print_r($token_array);
       // die();
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
           "Postman-Token: 7d72da80-39a9-4fb1-b70a-104302db5754",
           "cache-control: no-cache"
         ),
       ));
       
       $response = curl_exec($curl);
       $err = curl_error($curl);
       
       curl_close($curl);
       
       if ($err) {
         echo "cURL Error #:" . $err;
       } else {
         return json_decode($response);
       }
    }

public function getApiLesson()
 {
    $token_array= json_decode($this->getToken());
     $token=$token_array->access_token;
    // print_r($token_array);
    // die();
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
        "Postman-Token: 7d72da80-39a9-4fb1-b70a-104302db5754",
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return json_decode($response);
    }
 }
 public function getStudentLogin()
 {
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://edcapitest.edcad.ae/api/eLearning/Login/111/111/111",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer FWA-ykHoyPw4qHpi6EBCugYOpzSDV4BQt1g6snXKH8k6RoNkXSVKi1sEQq9mNvdKGwW4AHaAhfrTytGp0vHDBslG7s2mqiz80Ovt7Y9mhpiy-hnaZFLFXUHKLDk7qQm5MVJesMxSqmZPFGr3lahjrrC6EiQATedjzmIRvjQ7LBA6dBiDPQGTkKrOFW_-SQ2sQ1E3dnJvePIlep2sXyPDIvC9lpKRzut16ysS-l6PT7-YqNQ9CGzh0nhEN8YM-dlQazbQ5Txffyim8oSQ3A2sqLozyklG_Ifp7LLIS7HRXFk_wU6FWsiBbAKM-zVTCiO9BGefhpKcBIi_T9LiOlKWo8IlLAnvQbj9fqEJsl7f0kIFv9Wcre3x9nGEn5wMceP0E7IZE6TBqvY5h9JzHmP5I1bm57P2xwKYvPdgrtyYumhmPT1prsd_hRJHhNJ87v2Al0S3wRG9ycrSGCCL2xsXjCWaUr2fQyPUBRlyqNzcJ8Ggrp82R4xyD0xebqBKKmtUjGFc7EJWK3IfC9MAfGnBTA",
        "Postman-Token: 1f800df0-042c-4f58-8046-9cccea73daa0",
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
 }







}


?>