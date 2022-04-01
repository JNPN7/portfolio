@extends('layouts.app')

@section('content')
@if (Session::has('success'))
  <div class="col-md-12 alert alert-success disappear" role="alert" style="margin-top: 0; margin-bottom: 0;">
    <strong>Success: </strong>{{ Session::get('success') }}
  </div>
@endif
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($contacts as $contact)
            <tr>
              <th scope="row">{{ $loop->index }}</th>
              <td>{{ $contact->name }}</td>
              <td>{{ $contact->email }}</td>
              <td>{{ $contact->subject }}</td>
              <td>{{ $contact->message }}</td>
              <td>
                <a href="" onclick="confirm('Are you sure you want to delete this Contact?'); event.preventDefault(); document.getElementById('delete-form{{$contact->id}}').submit();" value="Delete">
                  <button class="btn btn-danger">Delete</button>
                </a>
              </td>

              <form id="delete-form{{$contact->id}}" action="{{ route('deleteContact', array($contact->id)) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')

              </form>
            </tr>
          @endforeach

        </tbody>
    </table>
</div>
@endsection
