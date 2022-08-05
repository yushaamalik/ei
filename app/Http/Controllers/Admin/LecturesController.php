<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LecturesController extends Controller
{
    //

    public function speechToText()
    {
        # code...
        return view('admin.speech-to-text.recordAudio');
    }

}
