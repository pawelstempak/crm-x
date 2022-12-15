<?php

return [
    // slugged client name e.g. clm, rgl, etc.
    'crm_user' => 'local',

    // mobile tag - it should match tag from api-locations
    'crm_mobile_tag' => '',

    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    /* This timezone should be set to the same value as DB server timezone 
     * and to the same as any earlier date entries in case this application 
     * will use database with existing data. For example if in database
     * there are date entries in America/Chicago timezone and DB server 
     * timezone is configured to America/Chicago below timezone value should
     * be also set to America/Chicago.
     * 
     * This value will also impact how dates will be handled by frontend 
     * application. If timezone is set to non-UTC (legacy mode) all dates 
     * will be displayed `as is` and the same way they will be send to API
     * even if user is in other timezone than specified below. However if
     * timezone will be set to UTC, frontend will convert any dates from API
     * to user timezone before displaying and before sending any dates to API 
     * it will convert them to UTC  
     */
    'timezone' => 'America/Chicago',

    // Temporary directory. Because we generate different files in this
    // directory, this directory should be unique between CRM installations
    // to avoid any collisions
    'tmp_dir' => '/tmp/',
    'cipher' => 'AES-256-CBC',
];
