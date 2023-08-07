<?php
#for xdebug
//xdebug_info();
#exit;
//echo '<script>console.log("It should be visible"); </script>';

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
