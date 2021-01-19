<?php

namespace App\Http\Controllers;

use App\Models\PushEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailDemo;

class PushEmailsController extends Controller
{

    public function sendemails(Request $request){
         try{
            $validator = Validator::make($request->all(),[
            'email.*' => 'required|string|email',
            'subject.*' => 'required|string',
            'msgbody.*' => 'required',
            ]);

        if($validator->fails()){
        return response()->json([
            'error' => $validator->messages()
            ], 401);
        }
        
//   'attach' => 'required|image64:jpeg,jpg,png'
for ($i=0; $i < count($request->email) ; $i++) { 
    # code...
    $file = base64_encode(file_get_contents($request->file('attach')[$i]->path()));    
    $name = $request->file('attach')[$i]->getClientOriginalName();
    $extension = $request->file('attach')[$i]->getClientOriginalExtension();

    Mail::to($request->email[$i])->later(now()->addMinutes(2), new SendEmailDemo($request->subject[$i],$request->msgbody[$i],$file,$name,$extension));
        
        
    }
        return response()->json([
            'message' => 'email sent'
        ], 200);

    }catch(\Exception $e){
        return response([
            'errors' => $e->getMessage()
        ], 402);
    }

    }
}
