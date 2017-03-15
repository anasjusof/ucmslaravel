@extends('layouts.master')

@section('title')
    Users
@stop

@section('content')

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Users
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Hierarchy </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @foreach($users as $user)
                    <tr>
                        <td> {{ $count }} </td>
                        <td> {{$user->name }} </td>
                        <td> {{$user->email }} </td>
                        <td> {{$user->roles_id == 0 ? 'No Role' : $user->roles->name }} </td>
                        <td class="text-center">
                            <a href="{{route('user.edit', $user->id)}}" class="btn blue" style="min-width: 70.25px">    Edit 
                            </a>
                        </td>
                        <td class="text-center"> 
                            {!! Form::open(['method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]) !!}
                                 {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {{Form::close()}}
                        </td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12 pull-right">
        <div class="pull-right"> 
            {{$users->render()}}
        </div>
    </div>
</div>

@stop