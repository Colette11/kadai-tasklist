@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 200) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
             @if (Auth::user()->id == $user->id)
                  {!! Form::open(['route' => 'tasks.store']) !!}
                <div>       
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス:') !!}
                        {!! Form::select('status', array(''=>'','未着手'=>'未着手','作業中'=>'作業中','完了'=>'完了'),old('status'), ['class' => 'form-control', 'rows' => '1']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', 'タスク:') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2'])!!}
                    </div>
                    
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                </div>      
                  {!! Form::close() !!}
            @endif
        </div>
    </div>
      
           
            @if (count($tasks) > 0)
                @include('tasks.tasks', ['tasks' => $tasks])
            @endif
@endsection