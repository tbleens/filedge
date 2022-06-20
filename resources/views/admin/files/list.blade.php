@extends('layouts.content')

@section('title', __('Files'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Uploads') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 py-4 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('List Files')}} </h4>
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
                                        <label for="file_name" class="small">{{ __('File Name') }}</label>
                                        <input title="search by" id="file_name" name="file_name" class="themr-sm-2 form-control" value="{{ request()->input('file_name') }}">
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
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('FILE ID') }}</th>
                                <th>{{ __('USERNAME') }}</th>
                                <th>{{ __('FILE NAME') }}</th>
                                <th>{{ __('FILE SIZE') }}</th>
                                <th>{{ __('UPLOADED AT') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uploads as $upload)
                            <tr>
                                <td class="align-middle fw-bold">{{ $upload->file_id }}</td>
                                <td class="align-middle">@if($upload->user) {{ $upload->user->name }} @else {{ __('Anonymous') }} @endif</td>
                                <td class="align-middle">{{ getLimitContent($upload->original_filename, 20) }}</td>
                                <td class="align-middle">{{ formatBytes($upload->file_size) }}</td>
                                <td class="align-middle">{{ $upload->updated_at }}</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="{{ route('files.view', $upload->id) }}">{{ __('View') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $uploads->links('layouts.paginator') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection