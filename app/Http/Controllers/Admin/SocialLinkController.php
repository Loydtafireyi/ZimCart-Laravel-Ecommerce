<?php

namespace App\Http\Controllers\Admin;

use App\SocialLink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialLinks = SocialLink::first();

        return view('admin.social-links.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(SocialLink::count() > 0) {
            session()->flash('error', 'Sorry, social links already exist, you can edit the current one!');

            return redirect(route('social-links.index'));
        }

        return view('admin.social-links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SocialLink::create([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'pinterest' => $request->pinterest,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'tiktok' => $request->tiktok,
        ]);

        session()->flash('success', 'Social links added successfully');

        return redirect(route('social-links.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialLinks = SocialLink::findOrFail($id);
    
        return view('admin.social-links.create', compact('socialLinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $socialLinks = SocialLink::findOrFail($id);

        $data = $request->all();

        $socialLinks->update($data);

        session()->flash('success', 'Social links updated successfully');

        return redirect(route('social-links.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
