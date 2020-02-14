@extends('template_backend.home')
@section('sub-judul','Post')
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
            <a href="{{ route('post.create') }}" class="btn btn-success ">Tambah Post</a>
            <br>
          <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="">
                            No
                        </th>
                        <th style="">
                            Judul
                        </th>
                        <th style="">
                            Kategori
                        </th>
                        <th style="">
                            Slug
                        </th>
                        <th>
                          Tag
                        </th>
                        <th style="">
                            Gambar
                        </th>
                        <th>Creator</th>

                        <th style="">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $index=>$result)
                    <tr>
                        
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->judul }}</td>
                        <td>{{ $result->category->name }}</td>
                        <td>{{ $result->slug }}</td>
                        <td>
                          @foreach ($result->tags as $tag)
                            <h6><span class="badge badge-primary">{{ $tag->name }}</span></h6>
                          @endforeach
                        </td>
                        <td><img src="{{ asset($result->gambar) }}" alt="" class="img-fluid" style="width:100px"></td>
                        <td>{{ $result->users->name }}</td>

                        <td class="project-actions">
                            <form action="{{ route('post.destroy', $result->id) }}" method="POST">
                              @csrf
                              @method('delete')
                              <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $result->id) }}">
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
          {{ $post->links() }}
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

@section('footer')

@endsection