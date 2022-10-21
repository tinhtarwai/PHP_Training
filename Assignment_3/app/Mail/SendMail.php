<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
 
class SendMail extends Mailable
{
    use Queueable, SerializesModels;
 
    public $body;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }
 
    public function attachments()
    {
        return [
            Attachment::fromPath('C:\Apache24\htdocs\studentsInfo.xlsx')
                ->as('file.xlsx')
                ->withMime('application/pdf'),
        ];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.SendMail')->with('body',$this->body);
    }
}
 