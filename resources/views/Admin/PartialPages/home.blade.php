@extends('Admin.Layout.dashboard')
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('Mode/Practice')}}">Practice</a></h3>
                        <!-- <h5 class="text-muted mb-0">Total Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                        <i class="fas fa-arrows-alt-h"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('Mode/Challenge')}}">Challenge</a></h3>
                        <!-- <h5 class="text-muted mb-0">Publish Quizzes</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('Mode/Group')}}">Team</a></h3>
                        <!-- <h5 class="text-muted mb-0">Participants</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light"><a href="{{url('Mode/Moderator')}}">Moderator</a></h3>
                        <!-- <h5 class="text-muted mb-0">Active Participants</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                        <i class="ti-wallet"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">123</h3>
                        <h5 class="text-muted mb-0">Total Quizzes</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                        <i class="mdi mdi-cellphone-link"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">2376</h3>
                        <h5 class="text-muted mb-0">Publish Quizzes</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                        <i class="mdi mdi-cart-outline"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">1795</h3>
                        <h5 class="text-muted mb-0">Participants</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                        <i class="mdi mdi-bullseye"></i>
                    </div>
                    <div class="ml-2 align-self-center">
                        <h3 class="mb-0 font-weight-light">687</h3>
                        <h5 class="text-muted mb-0">Active Participants</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-lg-3 border-right pr-0">
                        <div class="card-body border-bottom">
                            <h4 class="card-title mt-2">Drag & Drop Event</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar-events" class="">
                                        <div class="calendar-events mb-3" data-class="bg-info"><i class="fa fa-circle text-info mr-2"></i>Event One</div>
                                        <div class="calendar-events mb-3" data-class="bg-success"><i class="fa fa-circle text-success mr-2"></i> Event Two
                                        </div>
                                        <div class="calendar-events mb-3" data-class="bg-danger"><i class="fa fa-circle text-danger mr-2"></i>Event Three
                                        </div>
                                        <div class="calendar-events mb-3" data-class="bg-warning"><i class="fa fa-circle text-warning mr-2"></i>Event Four
                                        </div>
                                    </div>
                                    <div class="checkbox checkbox-info">
                                        <input type="checkbox" id="drop-remove" class="material-inputs">
                                        <label for="drop-remove"> <span>Remove after drop</span> </label>
                                    </div>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn mt-3 btn-info btn-block waves-effect waves-light">
                                        <i class="ti-plus"></i> Add New Event
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- BEGIN MODAL -->
<!-- <div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Event</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                    event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div> -->
<!-- Modal Add Category -->
<!-- <div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                                <option value="inverse">Inverse</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- END MODAL -->
<!-- Row -->
@endsection