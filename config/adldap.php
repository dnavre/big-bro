<?php


// Example adldap.php file.
return [
    'account_suffix' => "@sflpro.local",

    'domain_controllers' => array("sfl-dc01"), // An array of domains may be provided for load balancing.

    'base_dn' => 'DC=sflpro,DC=local',

    'admin_username' => 'ldap',

    'admin_password' => 'Ldhackton01',

    //'real_primary_group' => true, // Returns the primary group (an educated guess).

    //'use_ssl' => true, // If TLS is true this MUST be false.

    //'use_tls' => false, // If SSL is true this MUST be false.

    //'recursive_groups' => true,
];