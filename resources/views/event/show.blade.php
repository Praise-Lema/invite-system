@extends('layouts.app')
@section('content')
    @include('partials.sidebar')

    <div class="container">
        <h1 class="text-center">Show Event</h1>

        <div class="container">
            <hr style="margin: auto; width: 8%;">
            <div class="container">
                <div class="container d-flex justify-content-between">
                    <a href="/event" class="btn btn-dark bg-gradient mb-3"><i class="fa fa-arrow-left me-1"></i> Go Back</a>
                    <a href="" class="btn btn-dark bg-gradient mb-3" data-bs-toggle="modal" data-bs-target="#guestModal"><i class="fa fa-plus me-1"></i> Add Guest</a>
                </div>
                
                <div class="table-responsive-md container-fluid">
                    <table class="table table-rounded table-secondary table-striped table-hover">
                        <tr>
                            <th>s/n</th>
                            <th>Title</th>
                            <th>Guest Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Invite-link</th>
                            <th>Action</th>
                        </tr>
    
                        <tbody class="table-group-divider">
                            @if(count($guests) > 0)
                                @foreach ($guests as $i => $guest)
                                    <tr>
                                        <td>{{$i + 1}}</td>
                                        <td>{{$guest->title}}</td>
                                        <td>{{$guest->name}}</td>
                                        <td>{{$guest->email}}</td>
                                        <td>{{$guest->phone}}</td>
                                        <td>{{$guest->type}}</td>
                                        <td>{{$guest->invite_link}}</td>
                                        {{-- <td>{{$guest->loc}}</td> --}}
                                            <td class="d-flex align-items-center">
                                                <a href="/guest/{{$event->id}}/edit" class="text-success"><span class="fas fa-edit"></span></a>
                                                <form action="/guest/{{$event->id}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" value="" class="fas fa-trash text-danger border-0 bg-transparent"></button>
                                                    {{-- <input type="text" name="" class="position-absolute bottom-0" style="transform: scale(0);" id="link" value="{{$guest->invite_link}}"> --}}
                                                    <input type="text" name="" class="position-absolute bottom-0" style="transform: scale(0);" id="link" value="http://192.168.43.143:8082/card-template">
                                                </form>
                                                <a href="#" onclick="copyLink()" class="btn btn-success bg-gradient">Invite</a>
                                            </td>

                                            <script>
                                                function copyLink() {
                                                    var link = document.getElementById("link");
                                                    link.select();
                                                    link.setSelectionRange(0, 99999);
                                                    document.execCommand('copy');
                                                    console.log(link);
                                                }
                                            </script>
                                        </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td></td>
                                    <td>No Guests Invited</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>    
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          
          <!-- Modal -->
          <div class="modal fade" id="guestModal" tabindex="-1" aria-labelledby="guestModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="guestModalLabel">Add Guest</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-secondary-subtle">
                  <form action="/guest/{{$event->id}}/create" method="post">
                    @csrf
                    <div class="form-group my-2">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="">
                    </div>

                    <div class="form-group my-2">
                        <label for="Title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="">
                    </div>

                    <div class="form-group my-2">
                        <label for="Email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="">
                    </div>

                    <div class="form-group my-2">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="">
                    </div>

                    <div class="form-group my-2">
                        <label for="Type" class="form-label">Type</label>
                        <select name="type" id="" class="form-select">
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                        </select>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark bg-gradient" data-bs-dismiss="modal">Close</button>
                  <input type="submit" value="Add Guest" class="btn btn-success bg-gradient">
                </form>

                </div>
              </div>
            </div>
          </div>
    </div>
@endsection