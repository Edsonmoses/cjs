<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return back();
    }

    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) )
        {
            Newsletter::subscribePending($request->email);
            return back()->with('success', 'Thanks For Subscribe');
        }
        return back()->with('error', 'Sorry! You have already subscribed ');

    }
}
