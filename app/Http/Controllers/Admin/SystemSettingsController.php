<?php

namespace App\Http\Controllers\Admin;

use App\SystemSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SystemSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = SystemSetting::firstOrFail();

        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $setting = SystemSetting::where('slug', $slug)->firstOrFail();
       
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'address' => 'required',
            'email' => 'required',
            'logo' => 'image',
        ]);
        // Find settings to update
        $setting = SystemSetting::where('slug', $slug)->firstOrFail();

        // Allowed params for update
        $data = $request->only([
            'name',
            'email',
            'tel',
            'logo',
            'favicon',
            'address',
            'description',
            'meta_keywords',
            'meta_description',
        ]);

        if($request->hasFile('logo')) {
            Storage::disk('public')->delete($setting->logo);

            $logo = $request->logo->store($logoPath = 'uploads/logos', 'public');

            $setting->save(['logo' => $logoPath]);
        }

        if($request->hasFile('favion')) {
            Storage::disk('public')->delete($setting->favicon);

            $favicon = $request->favicon->store($favPath = 'uploads/logos', 'public');

            $setting->save(['favicon' => $favPath]);
        }

        $setting->update($data);

        session()->flash('success', 'Company info updated successfully');

        return redirect(route('system-settings.index'));
    }

}
