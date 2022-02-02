<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class HashHelper {


	function validate($tokenparam)
    {
         $secretKey = secret_key . date("d");
         $token =  hash('sha256', $secretKey);

        if($tokenparam == $token)
        {
            return true;
        }
        else

        {
            return false;
        }

    }

}