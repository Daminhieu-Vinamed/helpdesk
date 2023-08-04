@extends('client.layout.master')
@section('title', 'List ticket')
@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Danh sách ticket</li>
                    </ol>
                </nav>

                <h2 class="text-white">Danh sách ticket</h2>
            </div>

        </div>
    </div>
</header>


<section class="section-padding section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Danh sách ticket bạn đã tạo</h3>
            </div>
            @foreach ($tickets as $ticket)
                <div class="col-lg-8 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2 line-clamp-title-1">{{$ticket->title}}</h5>
                                    <p class="mb-0">Người xử lý: {{ !empty($ticket->username) ? $ticket->username : $ticket->email }}</p>
                                    <p class="mb-0">Trạng thái: @if ($ticket->status === config('constants.status.one')) Chưa xử lý @elseif ($ticket->status === config('constants.status.two')) Đang xử lý @else Đã xử lý @endif</p>
                                    <a href="{{ route('client.detail', ['id' => $ticket->id]) }}" class="btn custom-btn mt-3 mt-lg-4">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 col-12">
                {{$tickets->links('client.layout.paginate')}}
            </div>
        </div>
    </div>
</section>
@endsection