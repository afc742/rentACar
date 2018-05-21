<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use App\Bank;
    
    class BankController extends Controller
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
            return view('pages.bank');
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'bsb' => 'required|digits:6',
                'account_number' => 'required|digits_between:6,10',
                ]);

            //Create bank
            $bank = new Bank;
            $bank->user_id = auth()->user()->id;
            $bank->bsb = Hash::make($request->input('bsb'));
            $bank->account_number = Hash::make($request->input('account_number'));
            $bank->save();

            return redirect('/home')->with('success', 'bank account saved');

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
            $bank = Bank::find($id);
            $bank->delete();
            return redirect('/home')->with('success', 'Bank account Removed');
        }

}

