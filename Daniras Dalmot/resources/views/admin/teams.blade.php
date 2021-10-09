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

    <div class="alert alert-success alert-dismissible in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Product edited !!
    </div>
    <!-- Modal for add-team  -->
    <!-- add-member-model-->

    <div class="modal fade " id="add"  aria-labelledby="Title">
    <div class="modal-dialog modal-dialog-centered" >
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-danger  text-center" id="Title">Add Member</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="cross" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body team-model-body">
            <form action="">
              <div class="form-group">
                <label for="nme">Full Name:</label>
                <input  type="text"class="form-control"id="nme" name="name"
                />
              </div>
              <div class="form-group">
                <label for="pst">Post:</label>
                <input  type="text"class="form-control"id="pst" name="name"
                />
              </div>
              <div class="form-group frm">
                <label for="inputfile" class=""
                  >Add Image:
                </label>
                <div class="upload">
                  <input type="file" id="real-file" hidden="hidden" />
                  <button type="button" id="custom-button" class="btnss">
                  Choose File
                  </button>
                  <p id="custom-text">No file chosen, yet.</p>
                </div>
              </div>
               <div class="form-group">
                <label for="fburl">Facbook Url:</label>
                <input type="text" class="form-control" id="fburl" name="Address" />
              </div>
              <div class="form-group">
                <label for="instaurl">Instagram Url:</label>
                <input type="text" class="form-control" id="instaurl" name="Phone" />
              </div>
              <button type="submit" class="member-submit-btn ">Add</button>
            </form>
          </div>

      </div>
    </div>
  </div>
  <!--  add-member-modal ends  -->
   <!-- edit-model-->

<div class="modal fade " id="edts"  aria-labelledby="Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-danger  text-center" id="Title">Edit Member</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="cross" aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body team-model-body">
          <form action="">
            <div class="form-group">
              <label for="nme">Full Name:</label>
              <input  type="text"class="form-control"id="nme" name="name"
              />
            </div>
            <div class="form-group">
              <label for="pst">Post:</label>
              <input  type="text"class="form-control"id="pst" name="name"
              />
            </div>
            <div class="form-group frm">
              <label for="inputfile" class=""
                >Add Image:
              </label>
              <div class="upload">
                <input type="file" id="real-file" hidden="hidden" />
                <button type="button" id="custom-button" class="btnss">
                  Choose File
                </button>
                <p id="custom-text">No file chosen, yet.</p>
              </div>
            </div>
             <div class="form-group">
              <label for="fburl">Facbook Url:</label>
              <input type="text" class="form-control" id="fburl" name="Address" />
            </div>
            <div class="form-group">
              <label for="instaurl">Instagram Url:</label>
              <input type="text" class="form-control" id="instaurl" name="Phone" />
            </div>
            <button type="submit" class="member-submit-btn">Edit</button>
          </form>
        </div>

    </div>
  </div>
</div>
<!-- edit-modal ends  -->

<!-- DELETE-model  -->
<div class="modal fade" id="dlt"aria-labelledby="models" >
  <div class="modal-dialog" >
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="models">Do you want to delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" >Yes</button>
        <button type="button" class="btn btn-danger"data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!-- delete-model-ends  -->

   <!-- TEAMS -->
   <section class="teamss member" id="tm">

    <div class="add-member my-3">
        <button class="add-member-btn"  data-toggle="modal" data-target="#add"><strong> Add Member</button>

    </div>
    <div class="contains">
      <div class="row mx-0 px-0">
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
                <div class="del-edit-button">
                    <button class="deletes"data-toggle="modal" data-target="#dlt" ><i class="fas fa-trash"></i></button>
                    <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
                 </div>
              <p class="name">Nirmal Pd Gupta</p>
              <p class="post">Chairman/Founder</p>
            </div>


          </div>

          <hr/>
        </div>
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
              <div class="del-edit-button">
                <button class="deletes"data-toggle="modal" data-target="#dlt" ><i class="fas fa-trash"></i></button>
                <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
             </div>
              <p class="name">Rahul Kalwar</p>
              <p class="post">Chief Executive Office (CEO)</p>

            </div>
          </div>
          <hr />
        </div>
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
              <div class="del-edit-button">
                <button class="deletes"data-toggle="modal" data-target="#dlt" ><i class="fas fa-trash"></i></button>
                <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
             </div>
              <p class="name">Bhoomi Kalwar</p>
              <p class="post">Chief Operating Officer (COO)</p>

            </div>
          </div>
          <hr />
        </div>
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
              <div class="del-edit-button">
                <button class="deletes"data-toggle="modal" data-target="#dlt" ><i class="fas fa-trash"></i></button>
                <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
             </div>


              <p class="name">Neha Kalwar</p>
              <p class="post">Chief Financial Officer (CFO)</p>

            </div>
          </div>

          <hr />
        </div>
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
              <div class="del-edit-button">
                <button class="deletes"data-toggle="modal" data-target="#dlt" ><i class="fas fa-trash"></i></button>

                <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
             </div>
              <p class="name">Aditya Martin</p>
              <p class="post">Chief Marketing Officer (CMO)</p>

            </div>
          </div>

          <hr />
        </div>
        <div class="col-lg-4 col-md-6 col-12 member">
          <div class="infoo">
            <div class="images">
              <img
                src="{{asset('/assets/images/team1.jpg')}}"
                alt=""
                class="img-fluid"
              />
            </div>
            <div class="details">
              <div class="del-edit-button">
                <button class="deletes"data-toggle="modal" data-target="#dlt"><i class="fas fa-trash"></i></button>

                <button class="edits" data-toggle="modal" data-target="#edts"><i class="fas fa-edit"></i></button>
             </div>
              <p class="name">Bikash Gupta</p>
              <p class="post">Chief Technology Officer (CTO)</p>

            </div>
          </div>

          <hr />
        </div>
      </div>
    </div>
  </section>
  <!-- END TEAMS -->
</div>
<!-- END TEAM  ENDSS-->

@endsection
