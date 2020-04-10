<?php

use Symfony\Component\Dotenv\Dotenv;

$filePath = APP_ROOT_PATH.'/.env';

if( file_exists($filePath) ){
    (new Dotenv())->load($filePath);
}

function env()
{

}
