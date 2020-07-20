@extends('BootstrapAdmin/index')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cập nhật link truyện</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    @if (isset($add))
                      @foreach ($add as $ct)
                    <label>Tên truyện:</label>
                  <input type="text" disabled="true" name="name" value="{{$ct->truyen->TenTruyen}}" class="form-control">
                  <div class="form-group">
                    <div class="form-group">
                      <label>Chapter:</label>
                    <input type="text" disabled="true" value="{{$ct->Chapter}}"  name="chapter" class="form-control">                                                                  
                      @endforeach
                      @endif
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
  <!-- /.card-header -->
        </section>
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
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên truyện</th>
                  <th>Thể loại</th>
                  <th>Chapter</th>
                  <th>Số lượng hình</th>
                </tr>
              </thead>
              <tbody>
                @if (isset($chapter))
                  <?php $i=0; ?>
                  @foreach ($chapter as $ct)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ct->truyen->TenTruyen}}</td>
                    <td>{{$ct->truyen->theloai->TenTheLoai}}</td>  
                    <td>{{$ct->Chapter}}</td>
                    @if ($ct->SoLuongHinh == 0)
                    <td><a href="updateLink/{{$ct->id}}">Cập nhật hình</a></td> 
                    @else
                    <td>{{$ct->SoLuongHinh}}</td>
                    @endif      
                    <td><a href="deleteChapter/{{$ct->id}}">Xóa</a></td>                                 
                    </tr>  
                  @endforeach 
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
  <!-- /.card-body -->
@endsection