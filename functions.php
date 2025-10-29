<?php

/****************************** Required Files */
require_once(__DIR__ . '/inc/functions/theme-init.php');
require_once(__DIR__ . '/inc/functions/register.php');
require_once(__DIR__ . '/inc/functions/customize.php');
require_once(__DIR__ . '/inc/functions/acf.php');
require_once(__DIR__ . '/inc/functions/general.php');
require_once(__DIR__ . '/inc/functions/form.php');
require_once(__DIR__ . '/inc/classes/metabox.php');
require_once (__DIR__ . '/inc/functions/acf-fields.php');
require_once (__DIR__ . '/inc/functions/query.php');
new meta_box();
add_action('acf/init', 'register_acf');



 

                                                                                     