<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlaceOrderMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $order_data;
    public $cartItems;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $order_data,$cartItems)
    {
        $this-> order_data =  $order_data;
        $this-> cartItems =  $cartItems;
    }


    public function build()
    {
        // return $this->view('view.name');

        $from_name = "Medigreen Herbals";
        $from_email = "medigreenherbals3@gmail.com";
        $subject = "Your Order has been Placed";
        return $this->from($from_email, $from_name)
            ->view('emails.order')
            ->subject($subject)
        ;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Place Order Mailable',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     return [];
    // }
}
