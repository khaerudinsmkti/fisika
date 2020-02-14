<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <form method="POST" class="form-horizontal" data-toggle="validator">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="inputName">Nama</label>
                        @error('name') <span style="color:red">{{ $message }}</span> @enderror
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required id="nama">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        @error('email') <span style="color:red">{{ $message }}</span> @enderror
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required id="email">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Password</label>
                        @error('password') <span style="color:red">{{ $message }}</span> @enderror
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" required id="password">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Hak Akses</label>
                        <select name="role" id="" class="form-control select">
                            <option value="" holder>Pilih Hak Akses</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
        
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
      </div>
    </div>
  </div>