<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::featured()->ordered()->take(6)->get();
        $skills = Skill::ordered()->get()->groupBy('category');
        $settings = Setting::pluck('value', 'key');

        return view('home', compact('projects', 'skills', 'settings'));
    }
}
