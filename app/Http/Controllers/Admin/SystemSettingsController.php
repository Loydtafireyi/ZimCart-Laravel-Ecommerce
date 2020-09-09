<?php

namespace App\Http\Controllers\Admin;

use App\SystemSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SystemSettingsController extends Controller
{
     public function __construct()
    {
        return $this->middleware('password.confirm');
    }
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
            'facebook_pixel',
            'meta_description',
            'google_analytics',

        ]);

        if($request->hasFile('logo')) {

            Storage::disk('public')->delete($setting->logo);

            $logoPath = $request->logo->store('uploads/logos', 'public');

            $logo = Image::make(public_path("storage/{$logoPath}"))->fit(162, 55);

            $logo->save();
        }

        if($request->hasFile('favicon')) {
             Storage::disk('public')->delete($setting->favicon);

            $faviconPath = $request->favicon->store('uploads/logos', 'public');

            $favicon = Image::make(public_path("storage/{$faviconPath}"))->fit(256, 256);

            $favicon->save();
        }

        if(request('logo')) {
            $setting->update(array_merge(
                $data,
                ['logo' => $logoPath],
                ['favicon' => isset($faviconPath) ? $faviconPath : '']
            ));
        } elseif (request('favicon')) {
            $setting->update(array_merge(
                $data,
                ['favicon' => $faviconPath]
            ));
        } else {
            $setting->update($data);
        }
        

        // $setting->update($data);

        session()->flash('success', 'Company info updated successfully');

        return redirect(route('system-settings.index'));
    }

}
