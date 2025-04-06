<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    /**
     * Display a listing of the occasions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('occasions.index');
    }

    /**
     * Show the form for creating a new occasion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occasions.index');
    }

    /**
     * Store a newly created occasion in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'event_date' => 'required',
            'guest_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // dd($validated);


        
        
        Booking::create($validated);
        
        return redirect()->route('occasions.index')
            ->with('success', 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.');
    }

    /**
     * Display the specified occasion.
     *
     * @param  \App\Models\Booking  $occasion
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $occasion)
    {
        return view('occasions.show', compact('occasion'));
    }

    /**
     * Show the form for editing the specified occasion.
     *
     * @param  \App\Models\Booking  $occasion
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $occasion)
    {
        return view('occasions.edit', compact('occasion'));
    }

    /**
     * Update the specified occasion in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $occasion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $occasion)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'event_date' => 'required|string',
            'guests_count' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);
        
        $occasion->update($validated);
        
        return redirect()->route('occasions.index')
            ->with('success', 'تم تحديث المناسبة بنجاح.');
    }

    /**
     * Remove the specified occasion from storage.
     *
     * @param  \App\Models\Booking  $occasion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $occasion)
    {
        $occasion->delete();
        
        return redirect()->route('occasions.index')
            ->with('success', 'تم حذف المناسبة بنجاح.');
    }
}

