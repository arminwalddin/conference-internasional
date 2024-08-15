<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Speaker;
use App\Schedule;
use App\Venue;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Price;
use App\Amenity;
use App\Commite;
use App\FileTemplate;
use App\Honorary;
use App\InvitedSpeaker;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $speakers = Speaker::all();
        $honorary = Honorary::all();
        $ispeaker = InvitedSpeaker::all();
        $commite_s = Commite::where('description', '=', 'scientific')->get();
        $commite_o = Commite::where('description', '=', 'organizing')->get();
        $commite_a = Commite::all();
        $schedules = Schedule::with('speaker')
            ->orderBy('start_time', 'asc')
            ->get()
            ->groupBy('day_number');
        $venues = Venue::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $filetemplate = FileTemplate::all();
        $prices = Price::with('amenities')->get();
        $amenities = Amenity::with('prices')->get();

        // print($commite_s->name);

        return view('home', compact('settings', 'speakers', 'honorary', 'ispeaker', 'commite_a', 'commite_s', 'commite_o', 'schedules', 'venues', 'hotels', 'galleries', 'sponsors', 'faqs', 'filetemplate', 'prices', 'amenities'));
    }

    public function view(Speaker $speaker)
    {
        $settings = Setting::pluck('value', 'key');

        return view('speaker', compact('settings', 'speaker'));
    }
}
