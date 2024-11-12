@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{route('dashboard')}}">Dashboard</a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Order Details</a></li>
</ul>
<div class="row-fluid sortable">		
    <div class="box span6">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Mobile</th>
                  </tr>
              </thead>   
              <tbody>
                  
                @foreach ($data as $datas)
                <tr>
                    <td class="center">{{ $datas->customer->name }}</td>
                    <td class="center">{{ $datas->customer->number }}</td>
                </tr>
                @endforeach  
                
              </tbody>
          </table>            
        </div>
    </div><!--/span-->
    <div class="box span6">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Mobile</th>
                  </tr>
              </thead>   
              <tbody>
                    @foreach ($data as $datas)
                    <tr>
                        <td class="center">{{ $datas->shipping->first_name }}{{ $datas->shipping->last_name }}</td>
                        <td class="center">{{ $datas->shipping->address }}</td>
                        <td class="center">{{ $datas->shipping->phone }}</td>
                    </tr>
                    @endforeach
              </tbody>
          </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th>Serial No.</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Quantity</th>
                      <th>Sub Total</th>
                  </tr>
              </thead>   
              <tbody>
                @php($i=1)
                @foreach ($details as $detail)
                <tr>
                    <td>{{ $i }}</td>
                    <td class="center">{{ $detail->product_name }}</td>
                    <td class="center">{{ $detail->product_price }}</td>
                    <td class="center">{{ $detail->product_quantity }}</td>
                    <td class="center">{{ $detail->product_quantity * $datas->order_details->product_price }}</td>
                </tr>
                @php($i++)
                @endforeach 
                
              </tbody>
          </table>            
        </div>
    </div><!--/span-->
    

</div><!--/row-->
@endsection