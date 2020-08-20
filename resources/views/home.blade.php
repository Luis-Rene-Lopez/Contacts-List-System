@extends('layouts.app')

@section('content')

  <div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
      Create new contact +
    </button>
  </div> <br>

  
  <div class="container">

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">



    <div class='container'>

  <form method='post' action='newContact'>
    @csrf

  <div class="form-group">
    <label for="exampleInputPassword1" >Name</label>
    <input type="text" class="form-control" name='firstName' id="exampleInputPassword1" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control"   name='lastName' id="exampleInputPassword1" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" >Contact Number</label>
    <input type="number" class="form-control" name='contactNumber' id="exampleInputPassword1" required>
  </div>

  <center><button type="submit" class="btn btn-primary">Submit</button></center>

  </form>

    </div>


      </div>
    </div>
  </div>

  <!----          -->

  @if (session('message'))

    <div class='alert alert-success'>{{ session('message') }}</div>
  
  @endif

  <table class="table">
    <thead class="thead-dark">
        
      <tr>
        <th scope="col">id</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Contact number</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($contacts as $item)
            
      <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->firstName }}</td>
        <td>{{ $item->lastName }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->contactNumber }}</td>
        <td>
            <a href='edit/{{$item->id}}'>
              <button class='btn btn-warning'>Edit</button>
            </a>
        </td>
        <td>
            <form method="post" action='{{ route("delete.contact", $item->id) }}'>
                @method('delete')
                @csrf
                <button class='btn btn-danger'>Delete</button>
            </form>
        </td>
        
      </tr>

      @endforeach

    </tbody>
  </table>
  
  {{ $contacts->links() }}
  
</div>
@endsection
