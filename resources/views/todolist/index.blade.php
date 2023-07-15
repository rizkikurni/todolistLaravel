@extends('layouts.main')

@section('container')

{{-- logout --}}
<div class="d-flex flex-row-reverse">
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

{{-- menampilkan nama user --}}
<h4>Selamat Datang {{ auth()->user()->name }}</h4>

{{-- judul --}}
<br>
<h1 class="text-center">Todolist</h1>

{{-- flash message --}}
@if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- form task --}}
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
<br>
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
                {{-- <button><a href="/tasks/{{ $task->tugas }}/edit">edit</a></button> | --}}
                <button><a href="{{ route('tasks.edit', $task->tugas) }}">edit</a></button> |
                {{-- <form action="/tasks/{{ $task->tugas }}" method="post" class="d-inline"> --}}
                <form action="{{ route('tasks.destroy', $task->tugas) }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit">hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection
