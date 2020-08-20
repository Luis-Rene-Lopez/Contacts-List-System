@extends('layouts.app')

@section('content')

<div class='container'>

    <h2>Update contact</h2>


    @if (session('message'))

    <div class='alert alert-success'>{{ session('message') }}</div>
  
    @endif

<form method='post' action='{{ route("update.contact", $contact->id) }}'>
    @method('put')
    @csrf

  <div class="form-group">
    <label for="exampleInputPassword1" >Name</label>
    <input value='{{ $contact->firstName }}' type="text" class="form-control" name='firstName' id="exampleInputPassword1" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input value='{{ $contact->lastName }}' type="text" class="form-control"   name='lastName' id="exampleInputPassword1" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input value='{{ $contact->email }}' type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" >Contact Number</label>
    <input value='{{ $contact->contactNumber }}' type="number" class="form-control" name='contactNumber' id="exampleInputPassword1" required>
  </div>

  <button type="submit" class="btn btn-primary">update</button>

  </form>
</div>


@endsection