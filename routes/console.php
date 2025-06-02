<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// php artisan queue:work
// php artisan queue:listen
// /usr/bin/php8.2 /home/ducafrica-app/htdocs/app.ducafrica.com/ducafrica-app/public/script.php
// /usr/bin/php8.2 /home/ducafrica-app/htdocs/app.ducafrica.com/ducafrica-app && php artisan queue:work --queue=default --tries=3 --timeout=60 --sleep=3 --stop-when-empty && php artisan queue:listen 
