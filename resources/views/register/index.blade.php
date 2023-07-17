@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">ini halaman Register</h1>

<div class="row">
    <div class="col-md-2">
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">name</label>
                @error('name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                <input type="text" name="name" id="name">


                <label for="username">username</label>
                @error('username')
                        <p style="color: red">{{ $message }}</p>
                @enderror
                <input type="text" name="username" id="username">


                <label for="email">email</label>
                @error('email')
                        <p style="color: red">{{ $message }}</p>
                @enderror
                <input type="email" name="email" id="email">


                <label for="password">Password</label>
                @error('password')
                        <p style="color: red">{{ $message }}</p>
                @enderror
                <input type="password" name="password" id="password">

                <button type="submit">Register</button>

            </div>
        </form>

        <small>Have account?<a href="/login"> login</a></small>
    </div>
</div>


@endsection
