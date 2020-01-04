{!! Form::model(['route' => ['users.destroy', 'id' => Auth::id()], 'method' => 'delete']) !!}
    {!! Form::submit('Acount delete', ['class' => 'btn btn-danger btn-block']) !!}
{!! Form::close() !!}