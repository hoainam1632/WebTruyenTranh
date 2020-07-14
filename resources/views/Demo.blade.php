@extends('BootstrapAdmin/index')
@section('content')
<section class="content-header">
@foreach ($data as $dt)
<div class="gallery">
<a target="_blank" href="chapter/{{$dt->id}}">
      <img src="public/Demo/img/poster/{{$dt->Poster}}.jpg" alt="Cinque Terre" width="600" height="400">
</a>
<div class="desc">{{$dt->TenTruyen}}</div>
</div>    
@endforeach
@endsection