<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function indexParticipant()
    {
        return view('home.participant');
    }

    public function indexOrganizer()
    {
        return view('home.organizer');
    }
}
