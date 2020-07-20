@extends('BootstrapAdmin/index')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm Chapter mới</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm chapter</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên truyện</label>
                      @if (isset($data))                     
                       @foreach ($data as $dt)
                       <input type="text" name="name" value="{{$dt->TenTruyen}}" disabled="true" class="form-control">
                        @endforeach
                      @endif
                  </div>
                  <div class="form-group">
                    <label >Chapter</label>
                    <input type="text" name="chapter" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Số lượng hình:</label>
                    <input type="text" name="number" class="form-control">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Cập nhật" name="submit"/>
                @if (isset($mess))
                    {{$mess}}
                @endif
                </div>
            </div>
          </section>
  <!-- /.card-header -->

   {{-- //========Bang thong tin===================// --}}
   <section class="content-header">
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Thông tin chi tiết</h3>
            <form method="GET">
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            </form>
          </div>
  <div class="card-body table-responsive p-0" style="height: 300px;">
    <table class="table table-head-fixed text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên truyện</th>
          <th>Tác giả</th>
          <th>Thể loại</th>
          <th>Chapter mới nhất</th>
          <th>Ngày cập nhật</th>
          {{-- <th>Link truyen</th> --}}
        </tr>
      </thead>
      <tbody>
        @if (isset($thongtin))
        <?php $i=0;?>
        @foreach ($thongtin as $tt)  
            <tr>
            <td>{{$i++}}</td>
            <td>{{$tt->truyen->TenTruyen}}</td>   
            <td>{{$tt->truyen->TacGia}}</td>
            <td>{{$tt->truyen->theloai->TenTheLoai}}</td>    
            <td>Chapter: {{$tt->NewChapter}}</td>   
            <td>{{$tt->updated_at}}</td> 
            <td><a href="update/{{$tt->truyen->id}}">Thêm tập</a></td>  
            </tr>  
        @endforeach 
        @endif
      </tbody>
    </table>
  </div>
</section>
  <!-- /.card-body -->
@endsection