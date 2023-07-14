@extends('layouts.main')

@section('container')
    <h1 class="text-center mb-4">ini halaman login</h1>

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

                {{-- <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"> --}}
            </div>
        </form>
    </div>
</div>


@endsection
