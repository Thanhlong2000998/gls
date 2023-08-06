error_reporting(0);
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$Ngay=`date "+%d/%m/%Y"`;

$Blue="\033[0;34m";
$lime="\033[1;32m";
$red="\033[1;31m";
$xanh="\033[1;32m";
$cyan="\033[1;36m";
$yellow="\033[1;33m";
$turquoise="\033[1;34m";
$maugi="\033[1;35m";
$white= "\033[1;37m";
$xnhac = "\033[1;96m";
$den = "\033[1;90m";
$do = "\033[1;91m";
$luc = "\033[1;92m";
$vang = "\033[1;33m";
$xduong = "\033[1;94m";
$hong = "\033[1;95m";
$trang = "\033[1;97m";
$do="\033[1;91m";
$van = $trang."(".$do."◕‿◕".$trang.")".$do."➜".$luc;
system('clear');
$logo = "
\033[1;34m██      █████   ████    ██   ████
\033[1;97m██     ██   ██  ██ ██   ██  █   █
\033[1;34m██     ██   ██  ██  ██  ██ ██
\033[1;97m██     ██   ██  ██   ██ ██ ██ █████
\033[1;34m██     ██   ██  ██    ████ ██   ██
\033[1;97m██████  █████   ██     ███  █████
\n";

echo $logo;
echo $trang."= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "$van \033[1;97mBẢN QUYỀN : \033[1;93m Thành Long \n";
echo "$van \033[1;97mTOOL   \n";
echo $trang."= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo $van." NHẬP AUTHORIZATION GOLIKE : ";
$authorization = trim(fgets(STDIN));
echo $van." NHẬP ACCOUNT_ID JOB TIKTOK : ";
$account_id = trim(fgets(STDIN));
echo $van." Nhập Delay : ";
$dl = trim(fgets(STDIN));

$url = "https://sv5.golike.net/api/users/me";
$tsm = array(
"Host:sv5.golike.net",
"accept:application/json, text/plain, */*",
##"t:VFZSWk5FNXFhelJOUkVVMVRsRTlQUT09",
"authorization:".$authorization,
"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1912 Build/O11019) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.130 Mobile Safari/537.36",
"content-type:application/json;charset=utf-8",
"origin:https://app.golike.net",
);
$home = post_type($url, $tsm);

if ($home["success"]== 200 ){
	echo " ĐĂNG NHẬP THÀNH CÔNG \n";
	$username = $home["data"]["username"];
	$coin = $home["data"]["coin"];
}else{
	echo " ĐĂNG NHẬP THẤT BẠI \n";
	exit;
}
system('clear');
echo $logo;
echo $trang."= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
echo "$van \033[1;97mBẢN QUYỀN : \033[1;93m Thành Long \n";
echo "$van \033[1;97mTOOL   \n";
echo $trang."= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";

echo $van." TÀI KHOẢN : ".$trang.$username." \n";
echo $van." SỐ DƯ : ".$trang.$coin." \n";
echo $van." LƯU Ý : LỖI KHÔNG CHẠY LÀ DÍNH CAPTCHA NÊN AE VÀO LÀM TAY 1 JOB RỒI LẤY LẠI AUTHORIZATION NHÉ \n";
echo $trang."= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =\n";
while(true){
//// nhận job 

$url_1 = "https://sv2.golike.net/api/advertising/publishers/tiktok/jobs?account_id=".$account_id."&data=null";
$tsm_1 = array(
"Host:sv2.golike.net",
"accept:application/json, text/plain, */*",
"authorization:".$authorization,
"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1912 Build/O11019) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.130 Mobile Safari/537.36",
"content-type:application/json;charset=utf-8",
"origin:https://app.golike.net",
);
$home_1 = post_type($url_1,$tsm_1);

if ($home_1["success"]== 200 ){
	$ads_id = $home_1["data"]["id"];
	$link = $home_1["data"]["link"];
	$type = $home_1["data"]["type"];
	$object_id = $home_1["data"]["object_id"];
	if ( $type == "follow"){
		echo $van." NHẬN NHIỆM VỤ THÀNH CÔNG : $type \r";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') {
    	 	   @system('xdg-open '.$link);
    		} else {
        		@system('cmd /c start '.$link);
    		}
    }else{
    	echo $van." TÌM NHIỆM VỤ : $type LỖI KHÔNG THỂ LÀM NV NÀY ĐƯỢC  \n";
    	$url_3 = "https://sv5.golike.net/api/advertising/publishers/tiktok/skip-jobs";
    	$tsm_3 = array(
    	"Host:sv5.golike.net",
    	"accept:application/json, text/plain, */*",
    	"authorization:".$authorization,
		"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1912 Build/O11019) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.130 Mobile Safari/537.36",
		"content-type:application/json;charset=utf-8",
		"origin:https://app.golike.net",
    	);
    	$data_1 = '{"ads_id":'.$ads_id.',"object_id":"'.$object_id.'","account_id":'.$account_id.',"type":"'.$type.'"}';
    	$skip = post_type2($url_3, $tsm_3, $data_1);
    	$message = $skip["message"];
    	echo $van." $message \r";
    	continue;
    }
    
}else{
	$message = $home_1["message"];
	if ( $message == "Bấm load jobs lại để lấy 100 jobs mới,cảm ơn bạn !"){
	echo $van." TÌM NHIỆM VỤ THẤT BẠI : $message \n";
	continue;
	}else{
		echo $van." TÌM NHIỆM VỤ THẤT BẠI : $message \n";
        continue;
	}
}

for($m=$dl;$m>-1;$m--){
sleep(1);
echo $van." Đang Delay $m \r";
}
//// nhận 
$url_2 = "https://sv5.golike.net/api/advertising/publishers/tiktok/complete-jobs";
$tsm_2 = array(
"Host:sv5.golike.net",
"accept:application/json, text/plain, */*",
"authorization:".$authorization,
"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1912 Build/O11019) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.130 Mobile Safari/537.36",
"content-type:application/json;charset=utf-8",
"origin:https://app.golike.net",
);
$data = '{"ads_id":'.$ads_id.',"account_id":'.$account_id.',"async":true,"data":null}';
$nhan_coin = post_type2($url_2, $tsm_2, $data);

if ($nhan_coin["success"]== 200 ){
	$type_2 = $nhan_coin["data"]["type"];
	$object_id = $nhan_coin["data"]["object_id"];
	$gio = date("H:i");
$tt = $tt+1;
echo "".$do." | ".$BBlue.$tt.$do." | ".$luc.$gio.$do." | ".$trang.$type_2.$do." | ".$vang.$object_id.$do." | ".$BBlue."SUCCESS ".$do."|\n";
}else{
    echo "Hoàn thành lại\n";
    $nhan_coin = post_type2($url_2, $tsm_2, $data);
    if ($nhan_coin["success"]== 200 ){
	$type_2 = $nhan_coin["data"]["type"];
	$object_id = $nhan_coin["data"]["object_id"];
	$gio = date("H:i");
$tt = $tt+1;
echo "SUCCESS\n";
// echo "".$do." | ".$BBlue.$tt.$do." | ".$luc.$gio.$do." | ".$trang.$type_2.$do." | ".$vang.$object_id.$do." | ".$BBlue."SUCCESS ".$do."|\n";
}
    else{
        echo " NHẬN COIN THẤT BẠI \n";
            $url_3 = "https://sv5.golike.net/api/advertising/publishers/tiktok/skip-jobs";
            $tsm_3 = array(
            "Host:sv5.golike.net",
            "accept:application/json, text/plain, */*",
            "authorization:".$authorization,
            "user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1912 Build/O11019) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.130 Mobile Safari/537.36",
            "content-type:application/json;charset=utf-8",
            "origin:https://app.golike.net",
            );
            $data_1 = '{"ads_id":'.$ads_id.',"object_id":"'.$object_id.'","account_id":'.$account_id.',"type":"'.$type.'"}';
            $skip = post_type2($url_3, $tsm_3, $data_1);
            $message = $skip["message"];
            echo $van." $message \n";
        }
}




}
function post_type2($url, $tsm, $data){
$mr = curl_init();
curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => $tsm));
$mr2 = curl_exec($mr); curl_close($mr);
$js = json_decode($mr2,true);
return $js;
}
function post_type($url, $tsm){
$mr = curl_init();
curl_setopt_array($mr, array(
  CURLOPT_PORT => "443",
  CURLOPT_URL => "$url",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => $tsm));
$mr2 = curl_exec($mr); curl_close($mr);
$js = json_decode($mr2,true);
return $js;
}