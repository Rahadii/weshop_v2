<?php 
if( !function_exists('city')){
    function city($id=null){
		if($id < 1){
			$uri = "http://api.rajaongkir.com/starter/city";
		}else{
			$uri = "http://api.rajaongkir.com/starter/city?id=".$id;
		}
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: d30e7b1bcab89c8d7ad50369e5625342"
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

if(!function_exists('cost')){
  function cost($origin,$destination,$weight,$courier){
    
    $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: d30e7b1bcab89c8d7ad50369e5625342"
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

?>