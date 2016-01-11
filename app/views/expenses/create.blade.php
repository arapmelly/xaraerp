@extends('layouts.erp')
@section('content')

<br><div class="row">
	<div class="col-lg-12">
  <h3>New Expense</h3>

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

		 <form method="POST" action="{{{ URL::to('expenses') }}}" accept-charset="UTF-8">
   
    <fieldset>
        <div class="form-group">
            <label for="username">Expense Name <span style="color:red">*</span> :</label>
            <input class="form-control" placeholder="" type="text" name="name" id="name" value="{{{ Input::old('name') }}}">
        </div>

       <div class="form-group">
            <label for="username">Type</label><span style="color:red">*</span> :
           <select name="type" class="form-control">
                           <option></option>
                            <option value="Bill"> Bill</option>
                            <option value="Invoice"> Invoice</option>
                        </select>
        </div>

        <div class="form-group">
            <label for="username">Account</label><span style="color:red">*</span> :
           <select name="account" class="form-control">
                           <option></option>
                           @foreach($accounts as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                           @endforeach
                        </select>
        </div>

        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Create Expense</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>

@stop