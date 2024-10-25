<?php

class BadCode{


    /**
     * accept string to encrypt or decrypt , by success return string by failure return null
     * @param string $inputString
     * @param bool $encType
     * @return string|null
     */
    public function crypt(string $inputString , bool $encType , string $decryptCode = null):string|null{
        if($encType)
        {
            //do encrypt return encrypted string
        }

        else
        {
            //do decrypt 
            //return bull oder decrypted string
        }

    }
    /**
     * Summary of encrypt
     * @param string $input
     * @return string
     */
    public function encrypt(string $input):string{

    }

    public function decrypt(string $input , string $decryptCode):string|null{
        
        return false;
    }


}