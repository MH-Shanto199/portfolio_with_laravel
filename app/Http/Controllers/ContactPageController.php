<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function store(Request $request)
    {
        Mail::send('contact.email', ['phone' => $request->phone, 'text' => $request->message], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('admin@portfolio.com', 'MH Shanto');
            $message->subject('Contact Message From ' . $request->email);
        });
        return 'ok';
    }
}
