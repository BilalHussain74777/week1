@extends('layouts.app')
@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> {{session('message')}}</strong>  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('language.Registered')}}{{__('language.User')}}
                     
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-light table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr >
                                    <th>#</th>
                                   <th>{{__('language.Name')}}</th>
                                   <th>{{__('language.Email')}}</th>                               
                                   <th  colspan="2" class="text-center ">{{__('language.Action')}}</th>
                                </tr>
                            </thead>
                             <tfoot class="thead-dark">
                                 <tr >
                                    <th>#</th>
                                   <th>{{__('language.Name')}}</th>
                                   <th>{{__('language.Email')}}</th>                               
                                   <th  colspan="2" class="text-center ">{{__('language.Action')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($fetchUsers as $key => $show)
                                <tr>

                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$show['name']}}</td>
                                    <td>{{$show['email']}}</td>
                                     
                                    <td >
                                       <form action="{{ route('roles.destroy', $show->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="btn btn-danger btn-sm " title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                                <i class="bi bi-trash-fill" style="color:white">{{__('language.Delete')}}</i>
                                            </a>
                                        </form>

                                        
                                    </td>
                                     <td>
                                            <a href="assignRoles/{{$show->id}}" class="btn btn-primary btn-sm">
                                               {{__('language.Assign Role')}}
                                            
                                             </a>
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
 
@endsection