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

     @if($errors->first('post_titles'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong> {{ $errors->first('post_titles') }}</strong>  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            
        </div>
    @endif 

    @if($errors->first('post_descriptions'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong> {{ $errors->first('post_descriptions') }}</strong>  
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 
                <div class="card-header">{{__('language.posts')}}
                    <button type="button" class="btn btn-success offset-md-7" data-toggle="modal" data-target="#permissionsModel">
                    {{__('language.ANpost')}}
                    </button>
                </div>
                 
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table table-light table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr >
                                    <th>#</th>
                                    <th>{{__('language.Post')}}</th>
                                    <th>{{__('language.Description')}}</th>
                                      
                                    <th  colspan="2" class="text-center ">{{__('language.Action')}}</th>
                                </tr>
                            </thead>
                             <tfoot class="thead-dark">
                                <tr >
                                    <th>#</th>
                                    <th>{{__('language.Post')}}</th>
                                    <th>{{__('language.Description')}}</th>
                                      
                                    <th  colspan="2" class="text-center ">{{__('language.Action')}}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($fetchPost as $key => $show)
                                <tr>

                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$show['post_titles']}}</td>
                                    <td>{{$show['post_descriptions']}}</td>
                                   
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
                <h5 class="modal-title">{{__('language.posts')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                {!! Form::open(['route' =>'posts.store', 'method' => 'post']) !!}
                @csrf
                <div class="form-group row">
                    
                    {!! Form::label('post_title', 'Post Title', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('post_titles', '', ['class' => 'form-control',' placeholder' => 'Enter Post Title Here'])  !!}
                    </div>
                     
                    
                </div>

                <div class="form-group row">
                    
                    {!! Form::label('post_description', 'Post Description', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                    <div class="col-md-8">
                       {!! Form::textarea('post_descriptions',null, array('class'=>'form-control',' placeholder' => 'Enter Post Title Here', 
                    'rows' => 5, 'cols' => 50)) !!}
                    </div>
                    
                    
                </div>
                
                
                
                
            </div>
            <div class="modal-footer">
                {!! Form::submit('Save Post', ['class' => 'btn btn-success ']) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection