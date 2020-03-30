  <form method="POST" action="/">
      @csrf
      <div class="form-group">
        <label for="title">Todo Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Input your Todo Title"
        value="{{ old('title')}}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="todo">Todo</label>
        <input type="text" class="form-control @error('todo') is-invalid @enderror" id="title" name="todo" placeholder="Input your Todo"
        value="{{ old('todo')}}">
        @error('todo')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
    </form>
    @if (session('status'))
      <div class="alert alert-success my-3">
          {{ session('status') }}
      </div>
    @endif