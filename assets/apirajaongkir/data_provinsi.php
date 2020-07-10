<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 9000c3eb2c5a219fded1eb17cce0144f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	// dapatnya dalan bentuk json, sehingga di conversikan ke array,dengan menggunakn json_decode
	$array_response = json_decode($response, TRUE);
	// ambil isi arraynya saja.
	$data_provinsi = $array_response['rajaongkir']['results'];
		
	echo "<option>-- Pilih Provinsi --</option>";
	foreach($data_provinsi as $key => $tiap_provinsi) {
		echo "<option value='". $tiap_provinsi['province_id'] ."' id_provinsi='". $tiap_provinsi['province_id'] ."' >";
		echo $tiap_provinsi['province'];
		echo "</option>";
	}
	// echo "<pre>";
	// var_dump($data_provinsi);
	// echo "</pre>";
}