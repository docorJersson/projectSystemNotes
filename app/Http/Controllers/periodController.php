<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class periodController extends Controller
{
    public function show($year)
    {
        $period = Period::where('yearPeriod', $year)->get();
        return $period->toJson();
    }
}
