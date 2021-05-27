<?php

namespace App\Http\Controllers;
use App\Http\Requests\MakeMessageRequest;
use App\Mail\email_confirm_message;
use App\Mail\email_message_readed;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\email_read_message;

class Main extends Controller
{
    // ===================================================
    public function index()
    {
        return view('message_form');
    }
    // ==================================================
    public function init(MakeMessageRequest $request)
    {
        $validated = $request->validated();
        //create hash code (purl code)
        $purl_code = Str::random(32);


        $message = new Message();
        $message->send_from = $request->text_from;
        $message->send_to = $request->text_to;
        $message->message = $request->text_message;
        $message->purl_confirmation = $purl_code;
        $message->save();

        // send email to confirm message
        Mail::to($request->text_from)->send(new email_confirm_message($purl_code));

        // update with the date and time the confirmation email was sent
        $message = Message::where('purl_confirmation',$purl_code)->first();
        $message->purl_confirmation_sent = now();
        $message->save();
        // present the view indicating that the confirmation email has been sent
        $data =[
               'email_address'=> $request->text_from
        ];
          return view('email_confirmation_sent',$data);
    }
    // ===================================================
    public function confirm($purl)
    {

    //check if purl exists
     if(empty($purl))
     {
         return redirect()->route('main_index');
     }
     // check if purl exists in db
     $message = Message::where('purl_confirmation',$purl)->first();

      //check is there is a message
      if($message === null)
      {
        // display a view indicating that there was an error
         return view('layouts.error');

      }
      //get the recipient email address
      $email_to = $message->send_to;
      // remove purl_confirmation and create purl_read
      $purl_code = Str::random(32);
      $message->purl_confirmation = null;
      $message->purl_read = $purl_code;
      $message->purl_read_sent = now();
      $message->save();

      // send email to the recipient
      Mail::to($email_to)->send(new email_read_message($purl_code));

       // present the view indicating that the confirmation email has been sent
       $data =[
        'email_address'=> $email_to
 ];
   return view('message_sent',$data);

    }
    // ===================================================
    public function read($purl)
    {

         //check if purl exists
     if(empty($purl))
     {
         return redirect()->route('main_index');
     }
     // check if purl exists in db
     $message = Message::where('purl_read',$purl)->first();

      //check is there is a message
      if($message === null)
      {
        // display a view indicating that there was an error
         // to do view
         return view('layouts.error');

      }

      //remove purl_read and store message_Readed
      $message_readed = now();
      $email_recipient = $message->send_to;
      $email_from = $message->send_from;

      $message->purl_read = null;
      $message->message_readed = $message_readed;
      $message->save();

      Mail::to($email_from)->send(new email_message_readed($email_recipient,$message_readed));

      //display the one time message
      $data = [
      'message' => $message->message,
       'emitted' =>$message->send_from
      ];
      return view('read_message',$data);
    }

}
