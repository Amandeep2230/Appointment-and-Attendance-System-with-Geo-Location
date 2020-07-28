<?php





//get lat long of user
function get_ip(){

if (isset($_SERVER['HTTP_CLIENT_IP']))
{
	return $_SERVER['HTTP_CLIENT_IP'];
}
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
{
	return $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else{
	return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
}
}
$ip = get_ip();

//Use an API to get visitor data
$query = @unserialize(file_get_contents('http://ip-api.com/php/182.64.120.170'));
if ($query && $query['status'] == 'success')
{
	$GLOBALS['lat1'] = $query['lat'];
	$GLOBALS['lng1'] = $query['lon'];
}
else
{
	echo "Something is wrong.";
}

$lat2 = 28.6504;
$lng2 = 77.2372;
//to check if user in 100m range
function distance($lat1, $lng1, $lat2, $lng2){
    $pi80 = M_PI / 180;
    $lat1 *= $pi80;
    $lng1 *= $pi80;
    $lat2 *= $pi80;
    $lng2 *= $pi80;
    $r = 6372.797; // mean radius of Earth in km
    $dlat = $lat2 - $lat1;
    $dlng = $lng2 - $lng1;
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $km = $r * $c;
    return floor($km);
}



function is_within_100_m($lat1, $lng1, $lat2, $lng2){
    $d = distance($lat1, $lng1, $lat2, $lng2);
    if( $d <= 0.1 ){
        echo "<h3 style= 'padding: 20px;'>In premises</h3>";
    }else{
        echo "<h3 style= 'padding: 20px;'>Outside premises</h3>";
    }
}

if (isset($_POST['submitCheckin']))
{
is_within_100_m($lat1, $lng1, $lat2, $lng2);
}
else
{
   echo "<script>
alert('Click the submit button');
window.location.href='../ticket.php';
</script>"; 
}
?>