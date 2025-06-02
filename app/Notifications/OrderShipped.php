<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderShipped extends Notification
{
    use Queueable;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Order #' . $this->order->id . ' Has Been Shipped')
            ->line('Your order has been shipped and is on its way to you.')
            ->action('View Order', route('orders.show', $this->order))
            ->line('Thank you for shopping with us!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your order #' . $this->order->id . ' has been shipped',
            'url' => route('orders.show', $this->order),
        ];
    }
}
