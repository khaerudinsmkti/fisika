@extends('template_backend.home')
@section('sub-judul','Kategori')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('sub-judul')</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
            <a href="{{ route('category.create') }}" class="btn btn-success ">Tambah Kategori</a>
            <br>
          <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">
                            No
                        </th>
                        <th style="width: 20%">
                            Category
                        </th>
                        <th style="width: 30%">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $index=>$result)
                    <tr>
                        
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->name }}</td>
                        <td class="project-actions">
                            <form action="{{ route('category.destroy', $result->id) }}" method="POST">
                              @csrf
                              <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('category.edit', $result->id) }}">
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
          {{ $category->links() }}
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('template_backend.footer')
    <script>
      swal("Here's the title!", "...and here's the text!");
    </script>
@endsection