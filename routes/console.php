<?php

use App\Console\Commands\ClearPlayCount;
use App\Models\Track;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(ClearPlayCount::class)->weeklyOn('sunday', '23:00');


