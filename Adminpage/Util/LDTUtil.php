<?php
define("TY_GIA",1500);
 function chuyenUSD2VND($gia)
 {
     return number_format($gia * TY_GIA,0,",",".");
 }
 function chuyenVND2USD($gia)
 {
     return number_format($gia / TY_GIA,0,".",",") . " $";
 }

 function formatPrice($gia)
{
    return number_format($gia,0,",","."). " VNĐ";
}
