<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::ordered()->get();
        return view('projects.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $related = Project::where('id', '!=', $project->id)->take(3)->get();
        return view('projects.show', compact('project', 'related'));
    }
}
