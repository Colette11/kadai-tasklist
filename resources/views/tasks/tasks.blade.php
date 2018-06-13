<ul class="media-list">
@foreach ($tasks as $task)
    <?php $user = $task->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
            </div>
            <div>
                <p>
                    id: {{ $task->id }}<br>
                    ステータス:{!! nl2br(e($task->status)) !!}<br>
                    タスク:{!! nl2br(e($task->content)) !!}
                </p>
            </div>
            <div class='col-xs-1'>
                @if (Auth::user()->id == $task->user_id)
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
             </div>
             <div class='col-xs-11'>
                 @if (Auth::user()->id == $task->user_id)
                     {!! Form::open(['route' => ['users.edit', $task->id], 'method' => 'put']) !!}
                        {!! Form::submit('Edit', ['class' => 'btn btn-warning btn-xs']) !!}
                    {!! Form::close() !!}
                                
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $tasks->render() !!}