{{ $page }}
@foreach ($list as $v)
    {{$v->id}} : {{$v->user_name}} : {{$v->email}} <br>
@endforeach