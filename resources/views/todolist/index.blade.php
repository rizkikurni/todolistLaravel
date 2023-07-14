@extends('layouts.main')

@section('container')
<h1>ini todolist</h1>

@if (session()->has('sukses'))
    <h6 style="color: rgba(102, 255, 0, 0.766)">{{ session('sukses') }}</h3>
@endif

<form action="/todolist" method="post">
    @csrf
    <label for="tugas">Tugas</label>
    <input type="text" id="tugas" name="tugas">

    <label for="deskripsi">deskripsi</label>
    <input type="text" id="deskripsi" name="deskripsi">

    <label for="eksekusi">eksekusi</label>
    <input type="datetime-local" id="eksekusi" name="eksekusi">

    <button type="submit">kirim</button>

</form>

{{-- tampilkan semua task --}}
<h2>tugas saat ini</h2>

<table class="table table-striped table-sm ">

        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Deskripsi</th>
            <th>Eksekusi</th>
        </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $task->tugas }}</td>
            <td>{{ $task->deskripsi }}</td>
            <td>{{ $task->eksekusi }}</td>
        </tr>
    @endforeach
</table>

@endsection
