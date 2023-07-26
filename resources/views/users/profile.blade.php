@extends('layouts.vertical')

@push('head-script')
	<script src="{{ asset('assets/js/pages/user_pages_profile_tabbed.js') }}"></script>
@endpush

@section('content')
<div class="d-lg-flex align-items-lg-start">

    <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

        <div class="sidebar-content">
            <div class="card">
                <div class="sidebar-section-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="" width="150" height="150" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                <i class="ph-pencil"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link active" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            @if ($user->middlename)
                            {{ $user->firstname. ' '. $user->middlename .' '. $user->lastname }}
                            @else
                            {{ $user->firstname. ' '. $user->middlename .' '. $user->lastname }}
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $user->email }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $user->role->name }}
                        </a>
                    </li>

					<li class="nav-item-divider"></li>


                    <li class="nav-item">
                        <a href="#password" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            Change password
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>


    <div class="tab-content flex-fill">
        <div class="tab-pane fade active show" id="profile">

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Profile information</h5>
                </div>

                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="firstname">First Name</label>
                                    <input type="text" name="name" id="name" value="{{ $user->firstname }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="middlename">Middle Name</label>
                                    <input type="text" name="address" value="{{ $user->middlename }}" id="address" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="lastname">Last Name</label>
                                    <input type="text" name="address" value="{{ $user->lastname }}" id="address" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="image">Company Image</label>
                                    <input type="file" class="form-control" name="image">
                                    <div class="form-text text-muted">Accepted formats: png, jpg. Max file size 2Mb</div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        {{-- password update --}}
        <div class="tab-pane fade" id="password">

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Password information</h5>
                </div>

                <div class="card-body">

                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="current_password">Current Passsword</label>
                                    <input name="current_passowrd" id="current_password" class="form-control">
                                    {{-- <div class="form-text text-muted">{{ $errors->updatePassword->get('current_password') }}</div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="password">New Password</label>
                                    <input name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
