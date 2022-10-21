<?php
 
namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendmailform() {
        return view('emails.sendmailform');
    }
    public function sendmailform2() {
        return view('emails.sendmailform2');
    }
    public function sendMail(Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $email = $data['email'];
 
        $body = [
            'name'=>$data['name'],
        ];
 
        Mail::to($email)->send(new SendMail($body));
        return back()->with('status','Mail sent successfully');
    }

    public function uploadDocument(Request $request) {
        $title = $request->file('title');
        
        // Get the uploades file with name document
        $document = $request->file('document');
    
        // Required validation
        $requestdata = $request->validate([
            'email'=>'required|email',
            'title' => 'required|max:255',
            'document' => 'required'
        ]);
        $email = $requestdata['email'];
    
        // Check if uploaded file size was greater than 
        // maximum allowed file size
        if ($document->getError() == 1) {
            $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
            $error = 'The document size must be less than ' . $max_size . 'Mb.';
            return redirect()->back()->with('flash_danger', $error);
        }
        
        $data = [
            'document' => $document
        ];
        
        // If upload was successful
        // send the email
       
        Mail::to($email)->send(new \App\Mail\Upload($data));
        return back()->with('status','Mail sent successfully');
    }
}