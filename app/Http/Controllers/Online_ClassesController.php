<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\online_clasess;
class Online_ClassesController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // Construct the Google Meet link with the unique identifier
        $meetingLink = 'https://meet.google.com/?authuser=0' ;

        // Return the link as a JSON response
        return response()->json([
            'status'  => '200',
            'link'    => $meetingLink
        ]);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
