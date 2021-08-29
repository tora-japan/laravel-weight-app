<?php

/*
 * WeeklyController.php
 *
 * Copyright (c) 2021 tora-japan (s.noda)
 *
 * Released under the MIT license.
 * see https://opensource.org/licenses/MIT
 *
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeeklyController extends Controller
{
    public function index(Request $request)
    {
        return view('/weekly/index');
    }
}
