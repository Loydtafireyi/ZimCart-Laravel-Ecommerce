<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
    	$messages = Contact::latest()->get();

    	return view('admin.messages.index', compact('messages'));
    }

     public function show($id)
    {
    	$message = Contact::findOrfail($id);

    	return view('admin.messages.show', compact('message'));
    }
}
