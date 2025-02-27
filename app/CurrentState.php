<?php

namespace App;

enum CurrentState: string
{
    case TO_DO = 'TO_DO';
    case DOING = 'DOING';
    case DONE = 'DONE';
}
