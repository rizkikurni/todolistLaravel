@extends('layouts.main')

@section('container')
<h1>ini update</h1>

{{-- <form action="/tasks/{{ $task->tugas }}" method="post"> --}}
<form action="{{ route('tasks.update', $task->tugas) }}" method="post">
    @method('PUT')
    @csrf
    {{-- value="{{ old('title', $post->title) }} --}}
    <label for="tugas">Tugas</label>
    <input type="text" id="tugas" name="tugas" value="{{ old('tugas', $task->tugas) }}" required>

    <label for="deskripsi">deskripsi</label>
    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $task->deskripsi) }}" required>

    <label for="eksekusi">Waktu</label>
    <input type="datetime-local" id="eksekusi" name="eksekusi" value="{{ old('eksekusi', $task->eksekusi) }}" required>

    <button type="submit">Update</button>

</form>
@endsection
