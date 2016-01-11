@extends('layouts.erp')
@section('content')

<br><div class="row">
	<div class="col-lg-12">
  <h3>New Payment</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-5">

    
		
		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

		 <form method="POST" action="{{{ URL::to('payments') }}}" accept-charset="UTF-8">
   
    <fieldset>
        
        <div class="form-group">
            <label for="username">Order</label><span style="color:red">*</span> :
           <select name="order" class="form-control">
                           <option></option>
                           @foreach($erporderitems as $erporderitem)
                            <option value="{{$erporderitem->erporder_id}}">{{$erporderitem->item->name}}</option>
                           @endforeach
                        </select>
        </div>

        <div class="form-group">
            <label for="username">Amount Paid<span style="color:red">*</span> :</label>
            <input class="form-control" placeholder="" type="text" name="amount" id="amount" value="{{{ Input::old('amount') }}}">
        </div>

        <div class="form-group">
            <label for="username">Receipt Number :</label>
            <input class="form-control" placeholder="" type="text" name="receipt" id="receipt" value="{{{ Input::old('receipt') }}}">
        </div>

        <div class="form-group">
            <label for="username">Received By :</label>
            <input class="form-control" placeholder="" type="text" name="received_by" id="received_by" value="{{{ Input::old('received_by') }}}">
        </div>

         <div class="form-group">
                        <label for="username">Date</label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker"  readonly="readonly" placeholder="" type="text" name="pay_date" id="pay_date" value="{{{ Input::old('date') }}}">
                        </div>
          </div>

        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Create Payment</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>

@stop