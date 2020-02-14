@extends('template_backend.home')
@section('sub-judul','User')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-purple">
        <div class="card-header">
          <h3 class="card-title">Data @yield('sub-judul')</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <div class="alert alert-info" role="alert"> 
            {{ Session('success') }} </div>
            @endif
            <a onclick="addForm()" class="btn btn-success ">Tambah User</a>
            <br>
          <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">
                            No
                        </th>
                        <th style="width: 20%">
                            Nama
                        </th>
                        <th>
                            Email
                        </th>
                        <th>Status</th>
                        <th>Role</th>
                        <th style="width: 30%">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $index=>$result)
                    <tr>
                        
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->email }}</td>
                        <td>
                            @if($result->role)
                            <span class="badge badge-info">Sudah Mengisi Materi</span> 
                            @else
                            <span class="badge badge-danger">Belum Upload Materi</span> 
                            @endif
                        </td>
                        <td>
                          @if($result->role)
                              <span class="badge badge-info">Administrator</span> 
                              @else
                              <span class="badge badge-warning">Author</span> 
                          @endif
                        </td>
                        <td class="project-actions">
                            <form action="" method="POST">
                              @csrf
                              <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('user.edit', $result->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                              @method('delete')
                              <button class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

            </table>
            <br>
            <br>
          {{ $user->links() }}
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

    @include('admin.user.form')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('footer')
    <script>
      function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset;
        $('.modal-title').text('Add User');
      }

      $(function(){
        $('#modal-form form').validator().on('submit', function (e){
          if(!e.isDefaultPrevented()){
            var id = $('#id').val();
            if (save_method == 'add') url = "{{ url('user') }}";
            else url = "{{ url('user') .'/' }}" + id;

            $.ajax({
              url : url,
              type : "POST",
              data : $('#modal-form form').serialize(),
              success : function($data){
                $('#modal-form').modal('hide');
              },
              error : function(){
                alert('Oops! Something error!')
              }
            });
            return false;
          }
        });
      });


      function editForm(id){
        save_method = 'edit';
        $('input[name = _method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('user') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data){
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit User');

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#password').val(data.password);
          },
          error : function(){
            alert("Nothing Data");
          }
        });
      }

    </script>
@endsection