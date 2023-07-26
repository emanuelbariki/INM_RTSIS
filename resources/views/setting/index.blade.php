@extends('layouts.vertical')

@section('content')
<div class="d-lg-flex align-items-lg-start">

    <div class="sidebar sidebar-component sidebar-expand-lg bg-transparent shadow-none me-lg-3">

        <div class="sidebar-content">
            <div class="card">
                <div class="sidebar-section-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{ asset($setting->image) }}" width="150" height="150" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="#" class="btn btn-outline-white btn-icon rounded-pill">
                                <i class="ph-pencil"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $setting->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $setting->email }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $setting->address }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-bs-toggle="tab">
                            <i class="ph-buildings me-2"></i>
                            {{ $setting->brand_color }}
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

                    <form action="{{ route('company.update', $setting->id)  }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Company Name</label>
                                    <input type="text" name="name" id="name" value="{{ $setting->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Company Address</label>
                                    <input type="text" name="address" value="{{ $setting->address }}" id="address" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="email">Company Email</label>
                                    <input type="email" name="email" id="email" value="{{ $setting->email }}" class="form-control">
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

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <input type="color" name="brand" id="brand" value="{{ $setting->brand_color }}" class="form-control-color">
                                    <div class="form-text text-muted">The color brand is: <code>{{ $setting->brand_color }}</code> </div>
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
