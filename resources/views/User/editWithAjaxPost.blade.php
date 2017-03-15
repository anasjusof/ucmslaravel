@extends('layouts.master')

@section('title')
    Edit User
@stop

@section('content')

<div class="portlet box green-turquoise">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>User Information
        </div>
    </div>
    <div class="portlet-body">
    	
    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
    <input type="hidden" id="user_id" value="{{ $user->id }}">

    	<div class="form-body">
    		<div class='form-group'>
		        {!! Form::label('name', 'Name : ') !!}
		        {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('email', 'Email : ') !!}
		        {!! Form::email('email', null, ['id'=>'email', 'class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('password', 'Password : ') !!}
		        {!! Form::password('password', ['id'=>'password', 'class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('roles', 'Role : ') !!}
		        {!! Form::select('roles_id', $roles, null, ['id'=>'roles_id', 'class'=>'form-control']) !!}
		    </div>
		     <div class="form-group text-center">
		        {!! Form::submit('Update', ['id'=>'btn-update', 'class'=>'btn green-turquoise']) !!}
		    </div>
    	</div>

    	@include('errors.validation-error')
    </div>
</div>

@stop

@section('script')
<script>
	$(document).ready(function(){
	    $("#btn-update").click(function(){

	    	var CSRF_TOKEN = $('#csrf-token').val();

	        $.ajax({
			    url: '/updateAjax',
			    type: 'POST',
			    data: { 
			    	_token: CSRF_TOKEN, 
			    	name: $('#name').val(),
			    	user_id: $('#user_id').val()
			    },
			    dataType: 'JSON',
			    success: function (data) {
			        console.log(data);
			        window.location.replace('/user');
			    }
			});
			
	    });
	});
</script>
@stop