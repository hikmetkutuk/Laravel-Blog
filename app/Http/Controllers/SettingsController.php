<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller {
    
    public function index() {
        return view('back.settings.index')->with('settings', Setting::first());    
    }

    public function update() {
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_mail' => 'required',
            'address' => 'required',
        ]);

        $settings = Setting::first();
        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_mail = request()->contact_mail;
        $settings->address = request()->address;
        $settings->save();

        Session::flash('success', 'Settings updated successfully');

        return redirect()->back();
    }
}
