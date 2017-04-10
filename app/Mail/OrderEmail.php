<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use App\Facades\Presenter;

class OrderEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_mail')
                    // ->subject('This is a test mail')
                    ->with([
                        'order_no' => $this->order->order_no,
                        'deliver' => Presenter::deliver_str($this->order->deliver),
                        'created_at' => Presenter::showDay($this->order->created_at),
                        'amount' => $this->order->amount,
                        'payment_methond' => Presenter::payment_methond_str($this->order->payment_methond),
                    ]);
    }
}
