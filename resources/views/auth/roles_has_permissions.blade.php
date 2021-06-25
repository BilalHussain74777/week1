@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('language.RHP')}} 
                    <button type="button" class="btn btn-success offset-md-5" data-toggle="modal" data-target="#permissionsModel">
                    
                        {{__('language.ANPR')}}
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-light table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                              <tr >
                                    <th>#</th>
                                    <th>{{__('language.Role')}}</th>
                                    <th>{{__('language.Permissions')}}</th>
                                    <th colspan="2" class="text-center">{{__('language.Action')}}</th>
                                    
                                </tr>
                            </thead>
                            <tbody >
                            @foreach($fetchRoleHasPermData as $key => $show)
                               <tr>

                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$show->Roles->name}}</td>
                                    <td>{{$show->Permissions->name}}</td>
                                     
                                    <td >
                                       <!--   -->
                                        
                                    </td>
                                     <td>
                                         <button class="btn btn-primary btn-sm">{{__('language.Edit')}}</button>
                                     </td>
                                </tr>
                            @endforeach    
                            </tbody>
                            <tfoot class="thead-dark"> 
                                <tr >
                                    <th>#</th>
                                    <th>{{__('language.Role')}}</th>
                                    <th>{{__('language.Permissions')}}</th>
                                    <th colspan="2" class="text-center">{{__('language.Action')}}</th>
                                    
                                </tr>
                            </tfoot>
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
                
                {!! Form::open(['route' =>'role-has-permissions.store', 'method' => 'post']) !!}
                @csrf
                

                  <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('language.Role') }}</label>

                            <div class="col-md-6">
                                
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach($fetchRoles as $show)

                                    <option value="{{$show->id}}">{{$show->name}}</option>
                                    @endforeach
                                    <option value="" selected="" hidden="">Assign Role To Admin</option>
                                </select>
                                
                            </div>
                        </div>



                          <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('language.Permissions') }}</label>

                            <div class="col-md-6">
                                
                                <select name="permission_id" id="role_id" class="form-control">
                                    @foreach($fetchPermission as $show)

                                    <option value="{{$show->id}}">{{$show->name}}</option>
                                    @endforeach
                                    <option value="" selected="" hidden="">Assign Role To Admin</option>
                                </select>
                                
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