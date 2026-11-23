<?php

use Illuminate\Support\Facades\Schedule;

if (config('backup.enabled')) {
    Schedule::command('backup:run --only-db')->dailyAt('02:00')->timezone('UTC')->withoutOverlapping(10);
    Schedule::command('backup:clean')->dailyAt('02:05')->timezone('UTC')->withoutOverlapping(10);
    Schedule::command('backup:monitor')->dailyAt('02:10')->timezone('UTC')->withoutOverlapping(10);
}
