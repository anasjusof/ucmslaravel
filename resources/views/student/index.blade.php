@extends('layouts.master')

@section('title')
    Students
@stop

@section('content')

<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Students
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th> # </th>
                        <th> Franchisee </th>
                        <th> Code </th>
                        <th> Name </th>
                        <th> Course </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    <?php $currentPageTotalNumber = ($students->currentPage() - 1) * $students->perPage(); ?>
                    @foreach($students as $student)
                    <tr>
                        <td><input type="checkbox" class="dafaq" name="checkBoxDeleteArray[]" form="bulk_delete" value="{{$student->id}}"></td>
                        <td> {{ $count + $currentPageTotalNumber}} </td>
                        <td> {{$student->user->name }} </td>
                        <td> {{$student->code }} </td>
                        <td> {{$student->name }} </td>
                        <td> {{$student->course->name }} </td>
                        <td> {{$student->status == 0 ? 'Not Active' : 'Active' }} </td>
                        <td> 
                            <button class="btn purple btn-sm editStudentModal btn-block" data-toggle="modal" data-f_id="<?php echo $student->user->id; ?>" data-student_id="{{$student->id}}"><font style="color:#fff;">Assign/Change Franchisee</font></button>
                        </td>
                        <td class="text-center">
                            <a href="{{route('student.edit', $student->id)}}" class="btn blue" style="min-width: 70.25px">    Edit 
                            </a>
                        </td>
                        <td class="text-center"> 
                            {!! Form::open(['method'=>'DELETE', 'action'=>['StudentController@destroy', $student->id]]) !!}
                                 {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {{Form::close()}}
                        </td>
                        <td class="text-center"> 
                            {!! Form::open(['method'=>'POST', 'action'=>['StudentController@spamStudent']]) !!}
                                 {!! Form::submit('SPAM!', ['class'=>'btn btn-danger']) !!}
                            {{Form::close()}}
                        </td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6 pull-left" style="margin-top: 15px;">
        <form id="bulk_delete" action="/bulkDelete" method="POST">
            {{ csrf_field() }}
            <input type="submit" value="Bulk Delete" class="btn btn-danger">
            <input type="hidden" name="_method" value="DELETE">
        </form>     
    </div>

    <div class="col-sm-6 pull-right">
        <div class="pull-right"> 
            {{$students->render()}}
        </div>
    </div>
</div>

<!-- Modal Start -->

<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Assign / Change Student Franchisee</h4>
                
            </div>
            {!! Form::open(['method'=>'POST', 'action'=>['StudentController@changeFranchisee']]) !!}
                <div class="modal-body">
                     <div class='form-group'>
                        {!! Form::label('user_id', 'Select Franchisee : ') !!}
                        {!! Form::select('user_id', $users, null, ['class'=>'form-control']) !!}
                    </div>   
                </div>
                <div class="modal-footer">
                    <!-- <input name="_method" type="hidden" value="PUT"> -->                      
                    <input type="hidden" id="student_id" name="student_id"> 
                    <button type="submit" id="update" name="update" class="btn btn-success">Update Student Franchisee</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- Modal End -->

@stop

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
       $('.editStudentModal').click(function(){
         $("#student_id").val($(this).data('student_id'));
         $('#editStudentModal').modal('show');
       });
    });

    $(document).ready(function(){
       $('#options').click(function(){
            if(this.checked){
                $('.checker').find('span').addClass('checked');
                $("input.dafaq").prop('checked', true).show();
            }
            else{
                $('.checker').find('span').removeClass('checked');
                $("input.dafaq").prop('checked', false);
            }
       });
    });

    </script>
@stop