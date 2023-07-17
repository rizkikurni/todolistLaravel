@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">ini halaman login</h1>

{{-- flash message --}}
@if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-2">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email">email</label>
                <input type="email" name="email">
                <label for="password">Password</label>
                <input type="password" name="password">

                <button type="submit">Login</button>

            </div>
        </form>

        <small>No account?<a href="/register"> register</a></small>
    </div>
</div>


@endsection
