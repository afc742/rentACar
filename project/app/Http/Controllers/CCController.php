<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use App\Cc;
    
    class CcController extends Controller
    {
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        public function index()
        {

        }

        public function create()
        {
            return view('pages.cc');
        }

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
            $cc->user_id = auth()->user()->id;
            $cc->card_name = $request->input('card_name');
            $cc->card_number = Hash::make($request->input('card_number'));
            $cc->ccv = Hash::make($request->input('ccv'));
            $cc->month = $request->input('month');
            $cc->year = $request->input('year');
            $cc->save();

            return redirect('/home')->with('success', 'credit card saved');
        }
        public function show($id)
        {
            
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
            $cc = Cc::find($id);
            $cc->delete();
            return redirect('/home')->with('success', 'Credit card Removed');
        }

    }

