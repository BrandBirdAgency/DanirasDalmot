@extends('layouts.app')
@section('title','Orders')
@section('css')
    <!-- CSS -->
    <!-- Add icon library -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('/assets/css/admin.css')}}"
    />
@endsection
@section('content')


    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! Session::get('success') !!}
        </div>
    @endif

   <!-- TEAMS -->
   <section class="teamss member" id="tm">

    <div class="add-member my-3">
        <button class="add-member-btn"  data-toggle="modal" data-target="#add"><strong> Add Member</button>
        <!-- Modal for adding team members -->
        <div class="modal fade" id="add" aria-labelledby="Title">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h2 class="modal-title text-danger  text-center" id="Title">Add Member</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="cross" aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body team-model-body">
                        <form action={{route('addrecord')}} method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="form-group">
                            <label for="usr">Full Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="usr"
                                name="name"
                            />
                            @error('name')
                                {{$message}}
                            @enderror
                            </div>
                            <div class="form-group">
                            <label for="Address">Position:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="Address"
                                name="position"
                            />
                                @error('position')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Phone:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="Phone"
                                            name="phone"
                                        />
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Address:</label>
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="Phone"
                                        name="address"
                                        />
                                        @error('address')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Facebook:</label>
                                        <input
                                        type="url"
                                        class="form-control"
                                        id="Phone"
                                        name="facebook"
                                        />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Instagram:</label>
                                        <input
                                        type="url"
                                        class="form-control"
                                        id="Phone"
                                        name="instagram"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Phone">Photo:</label>
                                <input
                                type="file"
                                class="form-control"
                                id="Phone"
                                name="photo"
                                accept="image/*"
                                enctype="multipart/form-data"
                                />
                                @error('photo') {{$message}} @enderror
                            </div>

                            <button type="submit" class="member-submit-btn">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contains">
        <div class="row mx-0 px-0">
            @forelse ($teams as $team)
                <div class="col-lg-4 col-md-6 col-12 member">
                    <div class="infoo">
                        <div class="images">
                            <img
                                src="{{$team->photo}}"
                                alt="team"
                                class="img-fluid"
                            />
                        </div>
                        <div class="details">
                            <div class="del-edit-button">
                                <button class="deletes" data-toggle="modal" data-target="#dlt{{$team->id}}"><i class="fas fa-trash"></i></button>
                                <!-- DELETE-model  -->
                                <div class="modal fade" id="dlt{{$team->id}}" aria-labelledby="models" >
                                    <div class="modal-dialog" >
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="models">Do you want to delete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{route('deleterecord', $team->id)}}"><button type="button" class="btn btn-secondary">Yes</button></a>
                                                <button type="button" class="btn btn-danger"data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete-model-ends  -->

                                <button class="edits" data-toggle="modal" data-target="#edts{{$team->id}}"><i class="fas fa-edit"></i></button>
                                <!-- edit-model-->
                                <div class="modal fade" id="edts{{$team->id}}" aria-labelledby="Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title text-danger  text-center" id="Title">Edit Member</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="cross" aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body team-model-body">
                                            <form method="POST" action="{{route('editrecord', $team->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nme">Full Name:</label>
                                                    <input type="text" class="form-control" id="nme" name="name" value="{{$team->name}}"/>
                                                    @error('name') {{$message}} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="pst">Position:</label>
                                                    <input type="text"class="form-control" id="pst" name="pos" value="{{$team->position}}"/>
                                                    @error('pos') {{$message}} @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="phn">Phone:</label>
                                                            <input type="text" class="form-control" id="phn" name="phn" value="{{$team->phone}}"/>
                                                            @error('phn') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="add">Address:</label>
                                                            <input type="text"class="form-control" id="add" name="add" value="{{$team->address}}"/>
                                                            @error('add') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pic">Photo:</label>
                                                    <input
                                                    type="file"
                                                    class="form-control"
                                                    id="pic"
                                                    name="pic"
                                                    accept="image/*"
                                                    />
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fburl">Facebook:</label>
                                                            <input type="text" class="form-control" id="fburl" name="fb" value="{{$team->facebook}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="instaurl">Instagram:</label>
                                                            <input type="text" class="form-control" id="instaurl" name="insta" value="{{$team->instagram}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="member-submit-btn">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- edit-modal ends  -->
                            </div>
                            <p class="name">{{$team->name}}</p>
                            <p class="post">{{$team->position}}</p>
                        </div>
                    </div>
                    <hr/>
                </div>
            @empty
                <div class="container">
                    <h1>No Team</h1>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- END TEAMS -->
</div>
<!-- END TEAM  ENDSS-->

@endsection
