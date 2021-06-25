@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header">{{ __('language.Permissions') }}
                    <button type="button" class="btn btn-success offset-md-7" data-toggle="modal" data-target="#permissionsModel">
                    {{__('language.ANP')}}
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-light table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr >
                                    <th>#</th>
                                    <th>{{__('language.Permissions')}}</th>
                                    <th colspan="2">{{__('language.Action')}}</th>
                                    
                                </tr>
                            </thead>
                            <tfoot class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>{{__('language.Permissions')}}</th>
                                <th colspan="2">{{__('language.Action')}}</th>
                                    
                                
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($fetchPermission as $key => $show)
                               <tr>

                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$show['name']}}</td>
                                    <td >
                                       <form action="{{ route('permissions.destroy', $show->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-danger btn-sm offset-md-8" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                                <i class="bi bi-trash-fill" style="color:white">{{__('language.Delete')}}</i>
                                            </a>
                                        </form>
                                        
                                    </td>
                                     <td>
                                         <button class="btn btn-primary btn-sm">{{__('language.Edit')}}</button>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- model code ////////////////////////////////////////////////// -->
<!-- model code ////////////////////////////////////////////////// -->
<div class="modal fade" id="permissionsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                {!! Form::open(['route' =>'permissions.store', 'method' => 'post']) !!}
                @csrf
                <div class="form-group row">
                    
                    {!! Form::label('permission', 'Permission Name', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', 'Jake Fisbach', ['class' => 'form-control']); !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::hidden('guard_name', 'web', ['class' => 'form-control']); !!}
                    </div>
                    
                </div>
                
                
                
                
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save Permission', ['class' => 'btn btn-success ']) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection