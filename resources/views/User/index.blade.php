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
                            <a id="btn-edit" href="{{route('user.edit', $user->id)}}" class="btn-edit btn blue" style="min-width: 70.25px">    Edit 
                            </a>
                        </td>
                        <td class="text-center"> 
                            {!! Form::open(['id'=>'form-delete' . $count, 'method'=>'DELETE', 'action'=>['UserController@destroy', $user->id]]) !!}
                                 {!! Form::submit('Delete', ['id'=>$count, 'class'=>'btn btn-danger btn-delete']) !!}
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

@section('script')
<script>
    $(document).ready(function(){
        /* Alertrify style */
        // $(".btn-delete").on("click", function(event){
        //     //Prevent button from submit
        //     event.preventDefault();
        //     //Get id from clicked class btn-delete
        //     var id = this.id;
        //     alertify.confirm('Delete User', 'Are you sure you want to delete user?', 
        //         function(){
        //             //Set form-delete on id clicked
        //             $("#form-delete"+id).submit();
        //             return true;
        //         },
        //         function(){
        //             return true;
        //         }
        //     );
        // });


        /* Sweet alert style */
        $(".btn-delete").on("click", function(event){
                //Prevent button from submit
                event.preventDefault();
                //Get id from clicked class btn-delete
                var id = this.id;

                swal({

                    title: 'Delete user?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'

                }).then(function () {

                    swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )

                    //Delay for 1.3 sec before submit form
                    setTimeout( function () {
                        $("#form-delete"+id).submit();
                    }, 1300);

                })

        });
    });

</script>
@stop