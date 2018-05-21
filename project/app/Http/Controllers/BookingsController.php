<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $result = Booking::where('start_date', '>=', $request->start_date)
                                ->where('end_date', '<=', $request->end_date)
                                ->where('post_id',$request->post_id)->first();
        if(!$result){
            $booking = new Booking;
            $booking->user_id = auth()->user()->id;
            $booking->post_id = $request->input('post_id');
            $booking->start_date = $request->input('start_date');
            $booking->end_date = $request->input('end_date');
            $booking->save();
            
            $days = \Carbon\Carbon::parse($request->start_date)->diffInDays(\Carbon\Carbon::parse($request->end_date));
            $price = $request->input('post_price') * $days; 

            return redirect()->route('payment.show', $price)->with('success', 'Booking added');
        }
        
        return redirect()->route('posts.show', $request->input('post_id'))->with('error', 'Date unavailable, please check unavailabilities');
                                    
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
        $bookings = Booking::where('post_id',$id)->orderBy('start_date', 'asc')->paginate(8);
                                                 
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
