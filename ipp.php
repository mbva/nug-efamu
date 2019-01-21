<?php  
date_default_timezone_set("Africa/Nairobi");
 $time =date("Y-m-d H:i:s");function getIp(){

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }
$ip=getIp();
//echo "<h2> ip $ip </h2>"; 
$urlTemplate = 'http://api.ip2location.com/?' . 'ip='.$ip.'&key=demo' . '&package=WS24&format=json';
 $host= gethostname();
 $ipAddress = gethostbyname($host);
 
 // replace the "%s" with real IP address
 $urlToCall = sprintf( $urlTemplate, $ipAddress);
 
 $rawJson = file_get_contents( $urlToCall );
 
 $geoLocation = json_decode( $rawJson, true );
 
 if(isset($geoLocation['city_name'])){
 
    if($geoLocation['city_name']!="-"){
       /* echo '<script language="javascript">';
        echo 'alert("Welcome Visitors from '.$geoLocation['city_name'].'")';
        echo '</script>';*/
    }else
    {
       /* echo '<center>You are in local server!</center><br>';
        echo '<script language="javascript">';
        echo 'alert("You are in local server!")';
        echo '</script>';
		*/
    }
 }else{
     //echo 'IP Address parsing error!';
 }
 
 ?>
 

      <center>
      <?php
	  include("db.php");
if(isset($geoLocation['country_code'])&&isset($geoLocation['country_name'])&&isset($geoLocation['region_name'])&&isset($geoLocation['city_name'])&&isset($geoLocation['latitude'])&&isset($geoLocation['longitude'])&&isset($geoLocation['zip_code'])&&isset($geoLocation['time_zone'])){
        $code=$geoLocation['country_code'];
        $country=$geoLocation['country_name'];
       $region=$geoLocation['region_name'];
        $city=$geoLocation['city_name'];
        $lat= $geoLocation['latitude'];
        $long=$geoLocation['longitude'];
        $zone= $geoLocation['time_zone'];
       $sql_user = "insert into user_sources
	   (logtime,country_code,country_name,region_name,city_name,latitude,longitude,time_zone)
	   VALUES ('$time','$code','$country','$region','$city','$lat','$long','$zone')";
               
		$insert_user = mysqli_query($con,$sql_user);
		if($insert_user){
		}else{
			//echo "<h2>FAILED</h2>".mysqli_error($con);
		}
		}else{
          //echo 'IP Address parsing error!';
      }
	  
	  
      ?>
      </center>
</div>
</body>
</html>
