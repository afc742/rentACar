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
        public function store(Request $request)
        {
            $this->validate($request, [
                'bsb' => 'required',
                'account_number' => 'required',
                ]);

            //Create bank
            $bank = new Bank;
            $bank->bsb = Hash::make($request->input('bsb'));
            $bank->account_number = Hash::make($request->input('account_number'));
            $bank->save();

            return redirect('/owner')->with('success', 'Details saved');

        }

    }

