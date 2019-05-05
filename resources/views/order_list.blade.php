@include('layouts/header')

<div class="container">
 
    <div class="row">
     {{Form::open(['url'=>'view-order','method'=>'post']) }}
        <div class="col-sm-4">
      <div class="form-group">
    <label for="email">Paid By:</label>
   {{ Form::select('selPaidBy', $objPaidByList,0,['class'=>'form-control']) }}
</div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
    <label for="email">Order Date:</label>
   {{ Form::select('selOrderDate', $objOrderDate,'',['class'=>'form-control']) }}
</div>
    </div>
     <div class="col-sm-4">
    <div class="form-group">
  
        <button type="submit" class="btn btn-default" style="margin-top: 22px">Search</button>
</div>
    </div>
        {{Form::close() }}
  </div>
  
</div>

@if($data)
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Day</th>
            <th>Amount</th>
            <th>Paid By</th>
            <th>Friends</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach($data as $rows)
        <tr>
            <td>{{$rows->id }}</td>
            <td>{{$rows->day }}</td>
            <td>{{$rows->amount }}</td>
            <td>{{$rows->paid_by }}</td>
            <td>{{$rows->friends }}</td>

        
        </tr>
        @endforeach
    </tbody>
</table>
@endIf

@include('layouts/footer');
