<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use App\CC;
    
    class CCController extends Controller
    {
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request, [
                'card_name' => 'required',
                'card_number' => 'required',
                'ccv' => 'required',
                'month' => 'required',
                'year' => 'required',
            ]);

            //Create card
            $cc = new CC;
            $cc->card_name = $request->input('card_name');
            $cc->card_number = Hash::make($request->input('card_number'));
            $cc->ccv = Hash::make($request->input('ccv'));
            $cc->month = $request->input('month');
            $cc->year = $request->input('year');
            $cc->save();

            return redirect('/details')->with('success', 'Details saved');

        }

    }

