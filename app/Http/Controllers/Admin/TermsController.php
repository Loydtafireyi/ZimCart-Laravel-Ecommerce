<?php

namespace App\Http\Controllers\Admin;

use App\Terms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = Terms::first();

        return view('admin.terms.show', compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Terms::count() > 0) {
            session()->flash('error', 'You have already added Terms & Conditions. You can only edit the existing terms');

            return redirect(route('terms.index'));
        }

        return view('admin.terms.create');
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
            'terms' => 'required'
        ]);

        if(Terms::count() > 0) {
            session()->flash('error', 'You have already added Terms & Conditions. You can only edit the existing terms');

            return redirect(route('terms.index'));
        }

        Terms::create([
            'heading' => $request->heading,
            'terms' => $request->terms,
        ]);

        session()->flash('success', 'Terms and conditions added successfully');

        return redirect(route('terms.index'));
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
    public function edit(Terms $term)
    {
        return view('admin.terms.create', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terms $term)
    {
        $data = $request->only(['heading', 'terms']);

        $term->update($data);

        session()->flash('success', 'Terms and conditions updated successfully');

        return redirect(route('terms.index'));
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
