@extends('layouts.app')
@section('title','Orders')
@section('css')
<!-- CSS -->
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}" />
@endsection
@section('content')


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {!! Session::get('success') !!}
</div>
@endif
<div class="back-btn">
    <a href="{{route('dashboard')}}" class="btn ml-4 mb-3">Back</a>
</div>

<!-- TEAMS -->
<section class="teamss member" id="tm">

    <div class="add-member my-3">
        <button class="add-member-btn" data-toggle="modal" data-target="#add"><i class="fa fa-plus plus"></i> Add Member
        </button>
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
                                <input type="text" class="form-control" id="usr" name="name" value="{{ old('name')}}"
                                    required />
                                @error('name')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Address">Position:</label>
                                <input type="text" class="form-control" id="Address" name="position"
                                    value="{{ old('position')}}" required />
                                @error('position')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Phone:</label>
                                        <input type="text" class="form-control" id="Phone" name="phone"
                                            value="{{ old('phone')}}" required />
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Address:</label>
                                        <input type="text" class="form-control" id="Phone" name="address"
                                            value="{{ old('address')}}" required />
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
                                        <input type="url" class="form-control" id="Phone" name="facebook"
                                            value="{{ old('facebook')}}" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Phone">Instagram:</label>
                                        <input type="url" class="form-control" id="Phone" name="instagram"
                                            value="{{ old('instagram')}}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <select name="team" class="custom-select" required>
                                        <option selected disabled hidden>Select Team</option>
                                        <option value="0">Daniras</option>
                                        <option value="1">Brand Bird</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label for="inputfile" class="">Photo : </label>
                                        <div class="upload">
                                            <input type="file" id="real-file1" hidden="hidden" name="photo"
                                                value="{{ old('photo')}}" accept="image/*" enctype="multipart/form-data"
                                                required />
                                            <button type="button" id="custom-button1" class="btn">
                                                Choose an image
                                            </button>
                                            <p id="custom-text1">No file chosen, yet.</p>
                                        </div>
                                        @error('photo') {{$message}} @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="sub text-right">
                                <button type="submit" class="member-submit-btn">Add</button>
                            </div>
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
                        <img src="{{$team->photo}}" alt="team" class="img-fluid" />
                    </div>
                    <div class="details">
                        <div class="del-edit-button">
                            <button class="deletes" data-toggle="modal" data-target="#dlt{{$team->id}}"><i
                                    class="fas fa-trash"></i></button>
                            <!-- DELETE-model  -->
                            <div class="modal fade" id="dlt{{$team->id}}" aria-labelledby="models">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger" id="models">Do you want to delete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{route('deleterecord', $team->id)}}"><button type="button"
                                                    class="btn">Yes</button></a>
                                            <button type="button" class="btn" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete-model-ends  -->

                            <button class="edits" data-toggle="modal" data-target="#edts{{$team->id}}"><i
                                    class="fas fa-edit"></i></button>
                            <!-- edit-model-->
                            <div class="modal fade" id="edts{{$team->id}}" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-danger  text-center" id="Title">Edit Member</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="cross" aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body team-model-body">
                                            <form method="POST" action="{{route('editrecord', $team->id)}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nme">Full Name:</label>
                                                    <input type="text" class="form-control" id="nme" name="name"
                                                        value="{{$team->name}}" required />
                                                    @error('name') {{$message}} @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="pst">Position:</label>
                                                    <input type="text" class="form-control" id="pst" name="pos"
                                                        value="{{$team->position}}" required />
                                                    @error('pos') {{$message}} @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="phn">Phone:</label>
                                                            <input type="text" class="form-control" id="phn" name="phn"
                                                                value="{{$team->phone}}" required />
                                                            @error('phn') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="add">Address:</label>
                                                            <input type="text" class="form-control" id="add" name="add"
                                                                value="{{$team->address}}" required />
                                                            @error('add') {{$message}} @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="fburl">Facebook:</label>
                                                            <input type="text" class="form-control" id="fburl" name="fb"
                                                                value="{{$team->facebook}}" required />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="instaurl">Instagram:</label>
                                                            <input type="text" class="form-control" id="instaurl"
                                                                name="insta" value="{{$team->instagram}}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <select name="team" class="custom-select" required>
                                                            <option selected value="0">Daniras</option>
                                                            <option value="1">Brand Bird</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="pic" class="">Photo: </label>
                                                            <div class="upload">
                                                                <input type="file" id="real-file0" name="pic"
                                                                    hidden="hidden" accept="image/*" required />
                                                                <button type="button" id="custom-button0" class="btn">
                                                                    Choose an image
                                                                </button>
                                                                <p id="custom-text0">No file chosen, yet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="sub text-right">
                                                    <button type="submit" class="member-submit-btn">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- edit-modal ends  -->
                        </div>
                        <p class="name">{{$team->name}}</p>
                        <p class="post">{{$team->position}}</p>
                        <p class="post text-muted">{{$team->team_id ? 'Brand Bird' : 'Daniras'}}</p>
                    </div>
                </div>
                <hr />
            </div>
            @empty
            <div class="no-content">
                <h4>No Team</h4>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- END TEAMS -->
</div>
<!-- END TEAM  ENDSS-->

<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Handle Add Member form (real-file1)
        const realFileBtn1 = document.getElementById("real-file1");
        const customBtn1 = document.getElementById("custom-button1");
        const customTxt1 = document.getElementById("custom-text1");

        if (customBtn1 && realFileBtn1) {
            customBtn1.addEventListener("click", function () {
                realFileBtn1.click();
            });

            realFileBtn1.addEventListener("change", function () {
                if (realFileBtn1.value) {
                    customTxt1.innerHTML = realFileBtn1.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else {
                    customTxt1.innerHTML = "No file chosen, yet.";
                }
            });
        }

        // Handle Edit Member forms (real-file0) - need to attach after modal opens
        // Use event delegation for dynamically created modals
        document.body.addEventListener('click', function(e) {
            // Check if clicked element is a custom button for file upload
            if (e.target && e.target.id === 'custom-button0') {
                const realFileBtn0 = document.getElementById("real-file0");
                if (realFileBtn0) {
                    realFileBtn0.click();
                }
            }
        });

        // Handle file input change for edit modals
        document.body.addEventListener('change', function(e) {
            if (e.target && e.target.id === 'real-file0') {
                const customTxt0 = document.getElementById("custom-text0");
                if (e.target.value && customTxt0) {
                    customTxt0.innerHTML = e.target.value.match(
                        /[\/\\]([\w\d\s\.\-\(\)]+)$/
                    )[1];
                } else if (customTxt0) {
                    customTxt0.innerHTML = "No file chosen, yet.";
                }
            }
        });
    });
</script>

@endsection