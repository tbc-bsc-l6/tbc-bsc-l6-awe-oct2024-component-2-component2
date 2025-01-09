@extends('frontend.master')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders Details: {{$orders->tracking_no}}</h4>
                </div>
                <div class="card-body">
                    <div class="row" style="text-align: left">
                        <div class="col-md-6">

                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>

                            <label for="">Last Name</label>
                            <div class="border p-2">{{$orders->lname}}</div>

                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>

                            <label for="">Contact Number</label>
                            <div class="border p-2">{{$orders->phone}}</div>

                            <label for="">Delivery Address</label>
                            <div class="border p-2">{{$orders->address}}</div>

                            <label for="">Payment</label>
                            <div class="border p-2">@if($orders->payment == 'cash_on_delivery')
                                <button class="btn btn-sm btn-danger" type="button">COD</button>
                            @elseif($orders->payment == 'paypal')
                                <button class="btn btn-sm btn-primary" type="button">PayPal</button>
                            @endif
</div>
                            
                            
                    
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover ">
                                <thead class="table-success">
                                    <tr>
                                        <th>S.N</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderItems as $index=> $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <th><img src="{{asset('storage/'.$order->product->product_image)}}"  width="50px"  alt="Img"></th>
                                        <td>{{$order->product->name}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>Rs.{{$order->price}}</td>
                                        <td>Rs.{{($order->quantity * $order->price)}}</td>
                                
    



                                        
                                    </tr>
                                    
                                        
                                    @endforeach
                                </tbody>
                                
                            </div>
                
                            </table>
                            <div class="card-footer">
                                <p class="text-right" style="font-weight:700">Grand Total: Rs {{$orders->totalPrice}}</p>
                            </div>
                            
                           
                           
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
    
@endsection