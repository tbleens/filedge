@extends('layouts.content')

@section('title', __('Users'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">{{ __('Users') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('List users')}} </h4>
                    <div class="d-flex">
                        <a href="{{ route('users.add') }}" class="btn btn-primary me-2">{{ __('Add') }}</a>
                        <form method="GET" action="#">
                            <div class="input-group input-group-sm">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary d-flex ml-2 align-items-center dropdown-toggle dropdown-toggle-split reset-after border-raduis-5" data-bs-enable="tooltip" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="Filters">
                                        <i class='bx bx-filter-alt'></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border-0 shadow width-64 keep-open with-300" id="search-filters">
                                        <div class="dropdown-header py-1 ">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="fw-bold m-0 text-dark text-truncate">{{ __('Filters') }}</div>
                                                </div>
                                                <div class="col-auto">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dropdown-divider"></div>

                                        <div class="mb-2 px-4">
                                            <label for="name" class="small">{{ __('Name') }}</label>
                                            <input title="search by" id="name" name="name" class="themr-sm-2 form-control" value="{{ request()->input('name') }}">
                                        </div>

                                        <div class="mb-2 px-4">
                                            <label for="s_sort" class="small">{{ __('Sort') }}</label>
                                            <select title="sort" id="s_sort" name="sort" class="form-select">
                                                @foreach(['desc' => __('Desc'), 'asc' => __('Asc')] as $key => $value)
                                                <option value="{{ $key }}" @if(request()->input('sort') == $key) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group px-4 mb-2">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block">{{ __('Search') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Update At') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="align-middle fw-bold">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">@if($user->role) {{ __('Admin') }} @else {{ __('User') }} @endif</td>
                                <td class="align-middle">{{ $user->updated_at }}</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">{{ __('Edit') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('layouts.paginator') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection