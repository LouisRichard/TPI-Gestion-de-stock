<?php
/**
 * Author : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : File used to encrypt and decrypt char
 */

/**
 * Function who encrypt a string
 * @param $string - string to encrypt
 * @return string - string encrypted
 */
function encrypt($string){
    $pwdK = "mkHndhU83csnUia.Dhjc73jh";
    return $pwdK . base64_encode($string);
}

/**
 * Function used to decrypt string
 * @param $string - string to decrypt
 * @return string - return string decrypted
 */
function decrypt($string){
    $pwdK = "mkHndhU83csnUia.Dhjc73jh";
    $str = str_replace($pwdK, "", $string);
    return base64_decode($str);
}