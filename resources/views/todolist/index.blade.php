@extends('layouts.main')

@section('container')
<h1>ini todolist</h1>

@if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="/tasks" method="post">
    @csrf
    <label for="tugas">Tugas</label>
    <input type="text" id="tugas" name="tugas" required>

    <label for="deskripsi">deskripsi</label>
    <input type="text" id="deskripsi" name="deskripsi" required>

    <label for="eksekusi">Waktu</label>
    <input type="datetime-local" id="eksekusi" name="eksekusi" required>

    <button type="submit">kirim</button>

</form>

{{-- tampilkan semua task --}}
<h2>tugas saat ini</h2>

<table class="table table-striped table-sm ">

        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Deskripsi</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $task->tugas }}</td>
            <td>{{ $task->deskripsi }}</td>
            <td>{{ $task->eksekusi }}</td>
            <td >
                <button><a href="/tasks/{{ $task->id }}/edit">edit</a></button> |
                <form action="/tasks/{{ $task->id }}" method="post" class="d-inline">
                {{-- <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="d-inline"> --}}
                    @method('DELETE')
                    @csrf
                    <button type="submit">hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
