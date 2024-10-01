
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('frontend.include.includeheader')

</head>
<body>


    @include('frontend.header.header')
    <section class="ftco-section contact-section">
 <div>
    <h1>Your Cart</h1>
    @if (Rservation::count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>$</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Your cart is empty!</p>
    @endif
 </div>
    </section>
@include('frontend.footer.footer')

@include('frontend.include.includefooter')
</body>
</html>
