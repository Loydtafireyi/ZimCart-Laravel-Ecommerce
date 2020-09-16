<?php

namespace App\Http\Controllers\Admin;

use App\PrivacyPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policy = PrivacyPolicy::first();

        return view('admin.privacy.show', compact('policy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(PrivacyPolicy::count() > 0) {
            session()->flash('error', 'You have already added Privacy Policy. You can only edit the existing policy!');

            return redirect(route('privacy.index'));
        }
        
        return view('admin.privacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'policy' => 'required'
        ]);

        if(PrivacyPolicy::count() > 0) {
            session()->flash('error', 'You have already added Privacy Policy. You can only edit the existing policy');

            return redirect(route('privacy.index'));
        }

        PrivacyPolicy::create([
            'heading' => $request->heading,
            'policy' => $request->policy,
        ]);

        session()->flash('success', 'Privacy Policy added successfully');

        return redirect(route('privacy.index'));
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
    public function edit(PrivacyPolicy $policy)
    {
        return view('admin.privacy.create', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivacyPolicy $policy)
    {
        $data = $request->only(['heading', 'policy']);

        $policy->update($data);

        session()->flash('success', 'Privacy Policy updated successfully');

        return redirect(route('privacy.index'));
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
