@extends('template_backend.home')
@section('sub-judul','Tambah Tag')
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
        <div class="col-md-6">
        <div class="card-body">           
          <div class="card-body p-0">
            @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session('success') }}
                    </div>
               
            @endif

            <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputName">Nama Tag</label>
                    @error('name') <span style="color:red">{{ $message }}</span> @enderror
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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