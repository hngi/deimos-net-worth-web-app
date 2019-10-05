
<?php
$ip = 'check';
$access_key = '2fcb2e145928b13e951d17f183cd12dd';

// Initialize CURL:
$ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);


// Decode JSON response:
$api_result = json_decode($json, true);
// Output the "capital" object inside "location"
$country_name = $api_result['country_name'];
$country_code = $api_result['country_code'];


$curr = array(
 '$'=>'United States','₦' =>'Nigeria','Z$'=> 'Zimbabwe',
 '£' => 'United Kingdom','¥'=>'Japan','¥'=>'China',
 'R'=> 'South Africa','лв'=> 'Bulgaria','¢'=> 'Ghana','£'=> 'Lebanon','CHF'=> 'Switzerland','$'=> 'Singapore','MT'=> 'Mozambique');

?>