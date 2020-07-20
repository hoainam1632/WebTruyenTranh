@extends('BootstrapAdmin/index')
@section('content')
<section class="content-header">
@foreach ($data as $dt)
<div class="gallery" style="width: 280px">
          <img src="public/Demo/img/poster/{{$dt->truyen->Poster}}.jpg" alt="Cinque Terre" width="600" height="400">
    <div class="desc">
        <table style="text-align: left;">
            <tr>
                <th>Tên phim:</th>
                <td>{{$dt->truyen->TenTruyen}}</td>
            </tr>
            <tr>
                <th>Tác giả:</th>
                <td>{{$dt->truyen->TacGia}}</td>
            </tr>
            <tr>
                <th>Thể loại:</th>
                <td>{{$dt->truyen->theloai->TenTheLoai}}</td>            
            </tr>
        </table>
    </div>
</div>
<div class="card-body table-responsive p-0" style="height: 300px;width: 350px;">
  <b>Cập nhật lúc:</b> @foreach ($data as $date)
                        {{$date->updated_at}}
                      @endforeach
    <table class="table table-head-fixed text-nowrap">
      <thead>
        <tr>
          <th>Chapter</th>
        <th><a href="read/{{$CTone}}">xem tập đầu</a></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($chapter as $ct)
        <tr>          
          @if ($ct->SoLuongHinh == 0)
          <td>Chapter: {{$ct->Chapter}} | Đang cập nhật</td>
          @else
          <td><a href="read/{{$ct->id}}">Chapter: {{$ct->Chapter}}</a></td>
          @endif           
         </tr>
        @endforeach         
      </tbody>
    </table>
  </div>   
@endforeach
@endsection