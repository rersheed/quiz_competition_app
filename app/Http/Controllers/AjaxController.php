<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function handlePost(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        // Process the data (for example, save to the database)
        $name = $request->input('name');
        $email = $request->input('email');

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => "Hello $name, your email $email has been received.",
        ]);
    }
}
