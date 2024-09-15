<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class AccountCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $password;
    public $name;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $post)
    {
        $this->password = $password;
        $this->name = $post['name'];
        $this->email = $post['email'];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('backend.emails.account-created-mail');
        //C:\xampp\htdocs\auth\resources\views\backend\emails\account-created-mail.blade.php
    }
}