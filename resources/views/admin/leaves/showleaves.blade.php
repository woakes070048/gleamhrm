@extends('layouts.admin') @section('title') {{ config('app.name', 'HRM') }}|{{$title}} @endsection @section('content')

<div class="panel panel-default">
    <div class="panel-heading text-center">
        <div>
            <b style="text-align: center;">All Leaves</b>
        </div>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <th>Leave Type</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Reason</th>
                <th>Status</th>                
                @if(Auth::user()->admin)
                <th>Manage Leaves</th>
                @endif
            </thead>
            <tbody class="table-bordered table-hover table-striped">
                @if(count($leaves) > 0) @foreach($leaves as $leave)
                <tr>
                    <td>{{$leave->leave_type}}</td>
                    <td>{{$leave->datefrom}}</td>
                    <td>{{$leave->dateto}}</td>
                    <td>{{$leave->reason}}</td>
                    <td>{{$leave->statu}}</td>
                    
                    <td>
                        @if(Auth::user()->admin)
                        <form action="{{ route('leave.destroy' , $leave->id )}}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <br>
                        <a class="btn btn-info btn-sm" href="{{route('leave.edit',['id'=>$leave->id])}}">Edit</a>

                        @endif
                    </td>
                </tr>
                @endforeach @else No leave found. @endif

            </tbody>
        </table>
    </div>

</div>



@stop