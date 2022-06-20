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
                        <h3 class="mb-0 fw-bold">{{ __('Faqs') }}</h3>
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
                    <h4 class="mb-0">{{ __('List faqs')}} </h4>
                    <a href="{{ route('faqs.add') }}" class="btn btn-primary">{{ __('Add') }}</a>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('#ID') }}</th>
                                <th>{{ __('Question') }}</th>
                                <th>{{ __('Visibility') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td class="align-middle fw-bold">{{ $faq->id }}</td>
                                <td class="align-middle">{{ getLimitContent($faq->question, 50) }}</td>
                                <td class="align-middle">@if($faq->visibility) <span class="badge bg-success">{{ __('Active') }}</span> @else <span class="badge bg-danger">{{ __('Deactived') }}</span> @endif</td>
                                <td class="align-middle">{{ $faq->updated_at }}</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="{{ route('faqs.edit', $faq->id) }}">{{ __('Edit') }}</a>
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