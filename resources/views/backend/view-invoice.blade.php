
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Demo - Invoice</title>
  </head>
  <body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                            <div class="invoice-title">
                                <h2 style="text-align:center">Invoice</h2><h3 class="pull-right">Order #{{ $order->id }}</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                    <strong>Product From:</strong><br>
                                        Demo<br>
                                        Dept. CSE, MBSTU<br>
                                        Santosh, Tangail - 1902
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                    <strong>Shipped To:</strong><br>
                                        {{ $order->user->name }}<br>
                                        {{ $order->user->address }}<br>
                                        {{ $order->user->phone }}<br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        Cash On Delivery<br>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ $order->created_at }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td><strong>Item</strong></td>
                                                    <td class="text-center"><strong>Price</strong></td>
                                                    <td class="text-center"><strong>Quantity</strong></td>
                                                    <td class="text-right"><strong>Totals</strong></td>
                                                </tr>
                                            </thead>
                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                @foreach($items as $item)
                                                <tr>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td class="text-center">{{ $item->product->price }}</td>
                                                    <td class="text-center">{{ $item->quantity }}</td>
                                                    <td class="text-right">{{ $item->amount }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                    <td class="thick-line text-right">{{ $order->grandtotal - 50 }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                                    <td class="no-line text-right">50</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Total</strong></td>
                                                    <td class="no-line text-right">{{ $order->grandtotal }} Tk</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>