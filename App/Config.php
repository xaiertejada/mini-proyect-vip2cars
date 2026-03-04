<?php

namespace App;

class Config
{

    const DB_HOST = \CONFIG[\ENVIRONMENT]['database']['hostname'];

    const DB_NAME = \CONFIG[\ENVIRONMENT]['database']['database'];

    const DB_USER = \CONFIG[\ENVIRONMENT]['database']['username'];

    const DB_PASSWORD = \CONFIG[\ENVIRONMENT]['database']['password'];

    const SHOW_ERRORS = true;

}