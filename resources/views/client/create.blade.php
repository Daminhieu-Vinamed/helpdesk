@extends('client.layout.master')
@section('title', 'Create ticket')
@section('content')
<header class="site-header d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-12 mb-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tạo mới ticket</li>
                    </ol>
                </nav>
                <h2 class="text-white effects line-clamp-title-3">Tạo mới Ticket</h2>
            </div>
        </div>
    </div>
</header>
<section class="section-padding section-bg" id="topics-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="mb-4 pb-2">Điền thông tin để được hỗ trợ</h3>
            </div>
            <div class="col-lg-6 col-12">
                <form action="{{ route('client.store') }}" method="post" class="custom-form contact-form" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-floating">
                                <select name="question_id" id="question_id" class="form-control question_id">
                                    <option @selected(true) @disabled(true)>Chọn câu hỏi</option>
                                    @foreach ($questions as $question)
                                        <option value="{{$question['id']}}">{{$question['content']}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingInput">Chọn câu hỏi</label>
                                @error('question_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12"> 
                            <div class="form-floating">
                                <input type="file" name="image" id="image" class="form-control">
                                <label for="floatingInput">Ảnh đính kèm</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="form-floating">
                                <input type="text" name="title" id="title" class="form-control title">
                                <label for="floatingInput">Tiêu đề</label>
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control content" id="content" name="content"></textarea>    
                                <label for="floatingTextarea">Nội dung</label>
                                @error('content')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 image-upload"></div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1907080.1765575353!2d103.39715595624999!3d21.002016300000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad9ee9ff83b3%3A0xd19bfd1007d85730!2sVinamed!5e0!3m2!1svi!2s!4v1690944310106!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h5 class="mt-4 mb-2">Trụ sở chính</h5>
                <p>89 Lương Định Của, Đống Đa, Hà Nội</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script src="{{ asset('js/client/ticket.js') }}" type="text/javascript"></script>
@endpush