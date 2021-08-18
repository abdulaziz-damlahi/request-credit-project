<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs=$request;
        // Form validation
        $request->validate([
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'message'   =>  'required|max:1000',
            'TC'   =>  'required',
            'date'   =>  'required',
            'number'   =>  'required',
            'job'   =>  'required',
            'salary'   =>  'required',
            'kredi'   =>  'required',
            'iban'   =>  'required',
            'aytaksit'   =>  'required',
            'CreditType'   =>  'required',
            'address'   =>  'required',
        ]);
        if ($inputs->OK=='on'){
            // Get All Request
            $input = $inputs->all();
            $compine = "      - TC:".$inputs->TC ."      - Doğum Tarihi: ". $inputs->date ."      -İletişim Numarası: ". $inputs->number  ."      - Meslek: ". $inputs->job ."      - Aylık Net Gelir: ". $inputs->salary ."      - Kullandığınız Banka: ". $inputs->bank
                ."      - Kredi Miktarı: ".$inputs->kredi ."      - Kredinin Aktarılacağı Iban: ". $inputs->iban ."      - Vade: ".$inputs->aytaksit  ."      - Kredi Türü: ". $inputs->CreditType  ;
            $address = "      - adres: ". $inputs->address   ;
                Message::firstOrCreate([
                'name' => $input['name'],
                'email' => $input['email'],
                'subject' => $address,
                'message' => $compine,
            ]);
            return redirect()->to('/'.'#contact')
                ->with('success', 'frontend.your_message_has_been_delivered');
        }else  return redirect()->to('/'.'#contact')
            ->with('success', 'lütfen şartları kabul edin');

    }

}
