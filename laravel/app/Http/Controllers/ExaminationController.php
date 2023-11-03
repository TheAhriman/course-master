<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function show(Examination $examination)
    {
        return view('examinations.show',compact('examination'));
    }
}
