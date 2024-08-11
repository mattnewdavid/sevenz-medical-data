<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'xray' => ['Chest', 'Cervical Vertebrae', 'Thoracic Vertebrae'],
            'ultrasound' => ['Obstetric', 'Abdominal', 'Pelvic']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_request = $request->validate([
            'username' => 'required',
            'tests' => 'required'
        ]);

        $emailContent = "Username: {$form_request['username']}\nTests: " . implode(', ', $form_request['tests']) . "\n\n\nBest regards,\nMatthew";

        Mail::raw($emailContent, function ($message) use ($form_request) {
            $message->to('peopleoperations@kompletecare.com')
                ->subject("{$form_request['username']} medical data");
        });

        return response()->json(['message' => 'Medical data submitted successfully.']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
