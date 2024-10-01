<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cart</title>
    @include('frontend.include.includeheader')
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('frontend.header.header')

    <section class="ftco-section contact-section py-5">
        <div class="container">
            <h1 class="mb-4">Your Cart</h1>
            <div class="row">
                <div class="col-lg-8">
                    @if ($cartCount > 0)
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Days</th>
                                    <th>Price per Day</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>hhh</td>
                                        <td>hhh</td>
                                        <td>$hhh</td>
                                        <td>$250
                                            {{-- {{ number_format($item->total, 2) }} --}}
                                        </td>
                                        <td>
                                            <!-- Modify Button -->
                                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modifyModal{{ $item->id }}">Modify</button>

                                            <!-- Cancel Button -->
                                            <form action="
                                            {{-- {{ route('reservation.cancel', $item->id) }} --}}
                                             " method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>

                                            <!-- Modify Modal -->
                                            <div class="modal fade" id="modifyModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modifyModalLabel{{ $item->id }}">Modify Reservation</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Modify Form -->
                                                            <form action="
                                                            {{-- {{ route('reservation.update', $item->id) }}s --}}
                                                             " method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="days">Days</label>
                                                                    <input type="number" name="days" id="days" class="form-control" value="{{ $item->days }}" required min="1">
                                                                </div>
                                                                <!-- Add any other fields needed for modification -->
                                                                <!-- Example: Price per Day (if editable) -->
                                                                <!-- 
                                                                <div class="form-group">
                                                                    <label for="price_per_day">Price per Day</label>
                                                                    <input type="number" name="price_per_day" id="price_per_day" class="form-control" value="{{ $item->price_per_day }}" required step=".01" min="0">
                                                                </div> 
                                                                -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Your cart is empty!</p>
                    @endif
                </div>

                <!-- Bill Summary Section -->
                <div class="col-lg-4">
                    @if ($cartCount > 0)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bill Summary</h5>
                                <hr>
                                <p><strong>Total Days:</strong>12
                                     {{-- {{ $totalDays }} --}}
                                </p>
                                <p><strong>Subtotal:</strong> $12
                                    {{-- {{ number_format($subtotal, 2) }} --}}
                                </p>
                                <p><strong>Tax (10%):</strong> $150
                                    {{-- {{ number_format($tax, 2) }} --}}
                                </p>
                                <p><strong>Total:</strong> $120
                                    {{-- {{ number_format($total, 2) }} --}}
                                </p>
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Add Another Car Button -->
            @if ($cartCount > 0)
                <div class="row mt-4">
                    <div class="col-lg-12 text-center">
                        <a href="
                        {{-- {{ route('cars.index') }} --}}
                         " class="btn btn-secondary">Add Another Car</a>
                    </div>
                </div>
            @endif

        </div>
    </section>

    @include('frontend.footer.footer')
    @include('frontend.include.includefooter')

    <!-- Include Bootstrap JS and dependencies -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
