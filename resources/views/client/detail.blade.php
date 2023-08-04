@extends('client.layout.master')
@section('title', 'Detail ticket')
@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="{{ empty($ticket->image) ? 'col-lg-12' : 'col-lg-5' }} col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.list') }}">Danh sách ticket</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết ticket</li>
                    </ol>
                </nav>
                <h2 class="text-white effects line-clamp-title-3">{{ $ticket->question->content }}</h2>
            </div>
            @if (!empty($ticket->image))
                <div class="col-lg-5 col-12">
                    <div class="topics-detail-block bg-white shadow-lg">
                        <img src="{{ asset($ticket->image) }}" class="topics-detail-block-image img-fluid">
                    </div>
                </div>
            @endif
        </div>
    </div>
</header>


<section class="topics-detail-section section-padding section-bg" id="topics-detail">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 m-auto">
                <h3 class="mb-4">{{ $ticket->title }}</h3>
                <p>{{$ticket->content}}</p>
                @if (!empty($ticket->image))
                    <div class="col-lg-12 col-md-12 col-12">
                        <img src="{{ asset($ticket->image) }}" class="topics-detail-block-image img-fluid rounded mx-auto d-block">
                    </div>
                @endif
                    {{-- <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                        <img src="{{ asset($ticket->image) }}" class="topics-detail-block-image img-fluid">
                    </div> --}}
            </div>

        </div>
    </div>
</section>
@endsection