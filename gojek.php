<?php
error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}
include ("curl.php");
echo "\n";
echo "\e[94m   == SCRIPT GOJEK AUTO REGISTER + AUTO CLAIM VOUCHER ==    \n";
echo "\e[94m               == TIDAK UNTUK KONSUMSI UMUM ==            \n";
echo "\e[91m                MILIK KOMUNITAS, SANGAT RAHASIA!!!         '\n";
echo "\e[93m                     PROGRAM CREATED BY FAIZAL             \n";
echo "\n";
echo "\e[96m[?] Masukkan Nomor Fresh : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[91m[x] Nomor Telah Terdaftar gblk ganti laen\n";
    }
  else
    {
    otp:
    echo "\e[96m[!] Masukkan Kode Verifikasi nya gblk (OTP) : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[91m[x] Kode Verifikasi Salah gblk\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[!] Mencoba Me-redeem Voucher Gofood Pecahan 20.000 - 10.0000 !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(3);
            echo "\e[93m[!] Mencoba Me-redeem Voucher Gofood Pecahan 15.000 - 10.000 !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] Mencoba Me-redeem Voucher Goride V1 (COBAINGOJEK) !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Mencoba Me-redeem Voucher Gofood Pecahan 10.000 - 10.000 (10+10) !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!] Mencoba Me-redeem Voucher Goride V1 (COBAINGOJEK) !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Mencoba Me-redeem Voucher Goride V1 (COBAINGOJEK) !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[92m[+] ".$claim . "\n";
            sleep(3);
            echo "\e[93m[!] Mencoba Me-redeem Voucher Goride V1 (COBAINGOJEK) !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[92m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[93m[!] Mencoba Me-redeem Voucher Goride V2 (AYOCOBAGOJEK) !\n";
                sleep(3);
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                sleep(3);
                echo "\e[93m[!]  Mencoba Me-redeem Voucher Goride V2 (AYOCOBAGOJEK)!\n";
                sleep(3);
                goto pengen;
            }
            pengen:
            $claim = cekvocer($verif);
            if ($claim == false ) {
                echo "\033VOUCHER INVALID/GAGAL REDEEM\n";
            }
            else{
                echo "\e[92m[+] ".$claim."\n";
                
        }
    }
    }
?>
