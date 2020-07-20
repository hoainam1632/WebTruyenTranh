@extends('BootstrapAdmin/index')
@section('content')
    <section class="content-header">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông tin chi tiết</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" name="search" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tên truyện</th>
                      <th>Thể loại</th>
                      <th>Tác giả</th>
                      <th>Chapter mới nhất</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (isset($thongtin))
                    @foreach ($thongtin as $tt)
                    <tr>
                    <td>{{$tt->id}}</td>
                    <td>{{$tt->truyen->TenTruyen}}</td>
                    <td>{{$tt->truyen->theloai->TenTheLoai}}</td>   
                    <td>{{$tt->truyen->TacGia}}</td>
                    <td>{{$tt->NewChapter}}</td>
                    <td><a href="deleteTruyen/{{$tt->truyen->id}}">Xóa</a></td>
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
  @endsection

