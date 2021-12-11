@extends('layouts.app')
@section('title', 'Company Profile')
@section('css')

    <!-- CSS -->
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href={{ asset('assets/css/admin.css') }} />
@endsection
@section('content')

    <div class="back-btn">
        <a href="{{ route('dashboard') }}" class="btn ml-4 mb-3">Back</a>
    </div>

    <section id="orders">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="mb-4">Company Profile</h3>
            </div>
            <div class="mb-4">
                <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $abt->name }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="col form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                value="{{ $abt->email }}">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $abt->phone }}">
                            @error('phone') {{ $message }} @enderror
                        </div>
                        <div class=" col form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $abt->address }}">
                            @error('address') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website" name="website"
                                value="{{ $abt->website }}">
                            @error('website') {{ $message }} @enderror
                        </div>
                        <div class="col form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="fb">Facebook</label>
                            <input type="url" class="form-control" id="fb" name="fb" value="{{ $abt->facebook }}">
                        </div>


                        <div class="col form-group">
                            <label for="insta">Instagram</label>
                            <input type="url" class="form-control" id="insta" name="insta"
                                value="{{ $abt->instagram }}">
                        </div>
                        <div class="col form-group">
                            <label for="tw">Twitter</label>
                            <input type="url" class="form-control" id="tw" name="tw" value="{{ $abt->twitter }}">
                        </div>
                    </div>

                    <button type="submit" class="btn mt-3" style="margin-left: 45%;">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection
