<table class="table mt-3">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Todo Title</th>
          <th scope="col">Todo</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($todo as $todos)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $todos->title }}</td>
            <td>{{ $todos->todo }}</td>
            <td>
              <span class="badge badge-info">{{ $todos->status }}</span>
            </td>
            <td>
              <a href="{{ $todos->id }}/edit" class="btn btn-warning">Edit</a>
              <form action="{{ $todos->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>