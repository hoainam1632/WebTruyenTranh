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
                <h3 class="card-title">Cập nhật truyện mới</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên truyện:</label>
                  <input type="text" name="name"  class="form-control">
                  </div>
                    <div class="form-group">
                      <label>Thể loại:</label>
                    <Select name="theloai">
                        @foreach ($theloai as $lt)
                    <option value="{{$lt->id}}">{{$lt->TenTheLoai}}</option>                                                  
                        @endforeach
                    </Select>                                                                 
                    </div>  
                    <div class="form-group">
                    <label>Tác giả:</label>
                    <input type="text" name="tacgia" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Poster:</label>
                    <input type="text" name="poster" class="form-control">
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Thêm" name="submit"/>
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