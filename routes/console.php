<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('backup:clean')->daily();
Schedule::command('backup:run')->everyThirtyMinutes();
