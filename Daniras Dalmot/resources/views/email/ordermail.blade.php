<p><strong> Name:</strong>{{$data->username}}</p>
<p><strong>Address :</strong> {{$data->address}}</p>
<p><strong>Phone Number: </strong>{{$data->phone}}</p>
<p><strong>Email : </strong>{{$data->email}}</p>
<p><strong>Product Name:</strong>{{App\Models\Product::find($data->product_id)->name}}</p>
<p><strong> Quantity : </strong>{{$data->quantity}}</p>
<p><strong>Total Price:</strong>{{$data->quantity*$data->price}}</p>

