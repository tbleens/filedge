@extends('layouts.content')

@section('title', __('Reports'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center
                  justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">{{ __('Extensions') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('List extensions')}} </h4>
                    <a href="{{ route('extensions.add') }}" class="btn btn-primary">{{ __('Add') }}</a>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('#ID') }}</th>
                                <th>{{ __('Icon') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($extensions as $extension)
                            <tr>
                                <td class="align-middle fw-bold">{{ $extension->id }}</td>
                                <td class="align-middle"><img src="{{ asset('assets/images/icons/'.$extension->file_icon) }}" alt="{{ $extension->name }}" width="40" height="40"></td>
                                <td class="align-middle">{{ $extension->name }}</td>
                                <td class="align-middle">{{ $extension->updated_at }}</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="{{ route('extensions.edit', $extension->id) }}">{{ __('Edit') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection