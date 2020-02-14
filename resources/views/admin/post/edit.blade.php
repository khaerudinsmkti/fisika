@section('customheader')
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">  
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">  
@endsection

@extends('template_backend.home')
@section('sub-judul','Edit Post')
@section('content')
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box --> 
      <div class="card card-purple">
        <div class="card-header">
          <h3 class="card-title">@yield('sub-judul')</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="col-md-8">
        <div class="card-body">           
          <div class="card-body p-0">
            @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session('success') }}
                    </div>
            @endif

            <form action="{{ route('post.update', $post->id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputName">Judul</label>
                    @error('judul') <span style="color:red">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
                </div>
                <div class="form-group">
                  <label for="inputName">Kategori</label>
                  @error('categories_id') <span style="color:red">{{ $message }}</span> @enderror
                  <select class="form-control select" style="width: 30%;" name="category_id">
                    <option value="" holder>Pilih Kategori</option>
                    @foreach($category as $result)
                    <option value="{{ $result->id }}"
                        @if($result->id == $post->category_id)
                            selected
                        @endif
                    >{{ $result->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Tag</label>
                  <div class="select2-purple">
                    <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Pilih tag" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}"
                        @foreach ($post->tags as $value)
                            @if($tag->id == $value->id)
                            selected
                            @endif
                        @endforeach >{{ $tag->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Content</label>
                  @error('content') <span style="color:red">{{ $message }}</span> @enderror
                <textarea class="form-control" rows="4" placeholder="Isikan deskripsi di sini ..." name="content" >{{ $post->content}}</textarea>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  @error('gambar') <span style="color:red">{{ $message }}</span> @enderror
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="">Upload</span>
                    </div>
                  </div>
                </div>
                <br>
                <br>
                <button class="btn btn-primary">Simpan</button>
            </form>
          </div>
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
    <script src="../../plugins/select2/js/select2.full.min.js"></script>

    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
    
      })
    </script>
@endsection

