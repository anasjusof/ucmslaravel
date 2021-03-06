@extends('layouts.master')

@section('title')
    Create User
@stop

@section('content')

<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>User Information
        </div>
    </div>
    <div class="portlet-body">
    	{!! Form::open(['id'=>'form-create', 'method'=>'POST', 'action'=>'UserController@store']) !!}
    	<div class="form-body">
    		<div class='form-group'>
		        {!! Form::label('name', 'Name : ') !!}
		        {!! Form::text('name', null, ['class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('email', 'Email : ') !!}
		        {!! Form::email('email', null, ['class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('password', 'Password : ') !!}
		        {!! Form::password('password', ['class'=>'form-control']) !!}
		    </div>
		    <div class='form-group'>
		        {!! Form::label('roles', 'Role : ') !!}
		        {!! Form::select('roles_id', $roles, null, ['class'=>'form-control']) !!}
		    </div>
		     <div class="form-group text-center">
		        {!! Form::submit('Create User', ['id'=>'btn-create', 'class'=>'btn red']) !!}
		    </div>
    	</div>
    	{{Form::close()}}

    </div>
</div>


@stop

@section('script')

	@include('errors.validation-error')
	
	<script>
		$(document).ready(function(){
		    $("#btn-create").on("click", function(event){
			    event.preventDefault();
			    alertify.confirm('Create User', 'Are you sure you want to create user?', 
			    	function(){
			            $("#form-create").submit();
			            return true;
			        },
			        function(){
			        	return true;
			        }
			    );
			});
		});
	</script>

@stop