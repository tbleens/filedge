@extends('layouts.content')

@section('title', __('Translations'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white border-bottom-0 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('List translations')}} </h4>
                    <a href="{{ route('translations.add') }}" class="btn btn-primary">{{ __('Add') }}</a>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Locale') }}</th>
                                <th>{{ __('Created at') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($translations as $translation)
                            <tr>
                                <td class="align-middle fw-bold">{{ $translation->name }}</td>
                                <td class="align-middle">{{ $translation->locale }}</td>
                                <td class="align-middle">{{ $translation->created_at }}</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="{{ route('translations.edit', $translation->id) }}">{{ __('Edit') }}</a>
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