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
    	{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserController@update', $user->id]]) !!}

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
		        {!! Form::submit('Update', ['class'=>'btn green-turquoise']) !!}
		    </div>
    	</div>
    	{{Form::close()}}
    </div>
</div>


@stop