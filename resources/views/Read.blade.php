@extends('BootstrapAdmin/index')
@section('content')
<section class="content-header">
<div>
  @if (isset($links))
  <div> <h1><a href="chapter/{{$id_tentruyen}}">Xem tập khác</a></h1></div>
  <div>
    @for ($i = 0; $i<=$links; $i++)
      <img src="public/Demo/truyen/{{$name}}/Chapter/{{$chapter}}/{{$i}}.jpg"  width="100%">   
    @endfor
  </div>
  @endif
</div>
@endsection
