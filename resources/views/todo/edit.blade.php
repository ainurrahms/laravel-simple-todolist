@extends('layout.index')
@section('content')
<form method="POST" action="/{{ $todolist->id }}">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="title">Todo Title</label>
        <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Input your Todo Title"
        value="{{ $todolist->title }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="todo">Todo</label>
        <input type="text" class="form-control @error('todo') is-invalid @enderror" id="todo" name="todo" placeholder="Input your Todo"
        value="{{ $todolist->todo }}" >
        @error('todo')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select id="status" class="form-control" name="status">
          <option value="Belum Selesai">{{ $todolist->status }}</option>
          <option value="Selesai">Selesai</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
      <div style="width:100%; text-align:center;">
        <a href="/">Kembali</a>
      </div>
    </form>
    @if (session('status'))
      <div class="alert alert-success my-3">
          {{ session('status') }}
      </div>
    @endif
@endsection