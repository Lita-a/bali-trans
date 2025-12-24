<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;
use PDF;

class NewOrderAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cart;
    public $totalPrice;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->cart = $order->items;
        $this->totalPrice = $order->total_price;
    }

    public function build()
    {
        $pdf = PDF::loadView('user.carts.invoice', [
            'order' => $this->order,
            'cart'  => $this->cart->map(function ($item) {
                return [
                    'id' => $item->car_id,
                    'name' => $item->car_name,
                    'start_date' => $item->start_date,
                    'end_date' => $item->end_date,
                    'days' => $item->days,
                    'with_driver' => $item->with_driver,
                    'subtotal' => $item->subtotal,
                ];
            }),
            'totalPrice' => $this->totalPrice
        ]);

        return $this->subject("Pesanan Baru #{$this->order->id}")
            ->view('emails.new_order_admin', [
                'order' => $this->order,
                'cart'  => $this->cart,
                'totalPrice' => $this->totalPrice,
            ])
            ->attachData($pdf->output(), 'invoice_' . $this->order->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
