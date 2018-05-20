<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Calendar;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $booking = new Booking;
        $booking->user_id = auth()->user()->id;
        $booking->post_id = $request->input('post_id');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->save();
        
        return redirect('/bookings')->with('success', 'Reservation added');
                                    
        //return view('posts.showBookings')->with('success', 'Booking Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookings = Booking::where('post_id',$id)->orderBy('start_date', 'asc')
                                                 ->get();
        $post_id = $id;
        return view('posts.showBookings')->with('bookings', $bookings)
                                         ->with('post_id', $post_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
