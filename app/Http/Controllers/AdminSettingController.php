<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSettingController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $settings = $request->except('_token');

        foreach ($settings as $key => $value) {
            $exists = DB::table('settings')->where('key', $key)->first();
            if ($exists) {
                DB::table('settings')->where('key', $key)->update(['value' => $value, 'updated_at' => now()]);
            } else {
                DB::table('settings')->insert(['key' => $key, 'value' => $value, 'created_at' => now(), 'updated_at' => now()]);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
