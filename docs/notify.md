


php artisan make:notification

NotifyAdmin

mail.notify-admin  

INFO  Notification [app/Notifications/NotifyAdmin.php] created successfully.  

INFO  Markdown [resources/views/mail/notify-admin.blade.php] created successfully. 

## Sample

```php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProductOrder extends Notification
{
    use Queueable;

    public $product;
    public $productImagePath;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product, $productImagePath)
    {
        $this->product = $product;
        $this->productImagePath = $productImagePath;
    }

    /**
     * Get the notification's channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Product Order')
            ->greeting('Dear '.$notifiable->name)
            ->line('Your order for '.$this->product->name.' has been processed.')
            ->attach(public_path($this->productImagePath))
            ->line('Thank you for your purchase!');
    }
}

```

## Blade file

```php

@component('mail::message')
# Your Product Order

Dear {{ $notifiable->name }},

Your order for {{ $product->name }} has been processed.

@component('mail::panel')
  Your order details:
  - Product Name: {{ $product->name }}
  - Product Image: <img src="{{ asset($productImagePath) }}">  <!-- Display the image -->
@endcomponent

Thank you for your purchase!
@endcomponent

```



## Send Notification

```php

// In your controller or model
$product = Product::find(1);
$productImagePath = 'path/to/product/image.jpg';

$user = User::find(1);
$user->notify(new ProductOrder($product, $productImagePath));

```



-----------------------------------------



```php


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProductNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Products Available')
            ->view('emails.product-notification', ['products' => $this->products]);
    }
}

```


## The view

```php

<!DOCTYPE html>
<html>
<body>
    <div style="font-family: Arial, sans-serif; line-height: 1.6;">
        <h1 style="color: #333;">New Products</h1>
        <p>Check out our latest products:</p>

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
            @foreach($products as $product)
                <div style="width: 250px; border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <img src="{{ asset($product['image_url']) }}" alt="{{ $product['name'] }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;" />
                    <h3 style="font-size: 18px; margin: 0;">{{ $product['name'] }}</h3>
                    <p style="font-size: 14px; margin: 0;">{{ $product['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>


```
```php

@component('mail::layout')
    # New Products Added

    @foreach($products as $product)
        <div class="card">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="200">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <a href="{{ route('product.show', $product->id) }}">View Product</a>
        </div>
    @endforeach
@endcomponent

```


## Trigger


```php

use App\Notifications\ProductNotification;
use App\Models\User; // Assuming you're sending to a user

// Example product data
$products = [
    ['name' => 'Product 1', 'description' => 'Description 1', 'image_url' => 'images/product1.jpg'],
    ['name' => 'Product 2', 'description' => 'Description 2', 'image_url' => 'images/product2.jpg'],
    // ... more products
];

$user = User::find(1); // Replace with the actual user ID

$user->notify(new ProductNotification($products));


```