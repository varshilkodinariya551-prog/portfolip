<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'hero_title', 'hero_subtitle', 'hero_description',
            'about_text', 'about_image',
            'github_url', 'linkedin_url', 'twitter_url', 'email',
            'resume_url', 'location', 'phone',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key, ''));
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully!');
    }
}
