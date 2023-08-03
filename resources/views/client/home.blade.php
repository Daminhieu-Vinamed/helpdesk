@extends('client.layout.master')
@section('title', 'Home')
@section('content')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Chào mừng bạn đến với hệ thống Helpdesk</h1>
                    <h6 class="text-center">Hệ thống này thuộc tổng công ty thiết bị y tế Việt Nam VINAMED - CTCP</h6>
                    <form method="get" action="{{ route('search') }}" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Tìm kiếm ticket..." aria-label="Search">
                            <button type="submit" class="form-control">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if (isset($tickets))
        @if (sizeof($tickets) > 0)
            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach ($tickets as $ticket)
                            <div class="col-lg-4 col-12 mt-4 mb-4 mb-lg-0">
                                <div class="custom-block bg-white shadow-lg">
                                    <a href="topics-detail.html">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="mb-2">{{$ticket->title}}</h5>
                                                <p class="mb-0 effects line-clamp">{{$ticket->content}}</p>
                                            </div>
                                        </div>
                                        @if (!empty($ticket->image))
                                            <img src="{{ asset($ticket->image) }}" class="custom-block-image img-fluid" alt="">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-12 mt-4 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <h5>Không tìm thấy ticket có từ khóa "{{request()->keyword}}". Bạn hãy tìm kiếm lại bằng từ khóa khác</h5>
                            <img src="{{ asset('dist/img/search-empty.gif') }}" class="custom-block-image img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endif
    <section class="timeline-section section-padding" id="section_2">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">GIỚI THIỆU</h1>
                </div>
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>
                            <li>
                                <h4 class="text-white mb-3">Giai đoạn đầu</h4>
                                <p class="text-white">Thành lập từ năm 1985, Tổng Công ty Thiết bị Y tế Việt Nam - CTCP (Vinamed) được biết đến là Công ty có kinh nghiệm sản xuất trang thiết bị y tế lâu đời nhất tại Việt Nam. Tiền thân là Tổng Công ty Nhà nước, Vinamed là đại diện sở hữu và quản lý các Công ty sản xuất, kinh doanh thiết bị y tế thuộc Bộ Y tế Việt Nam.</p>
                                <div class="icon-holder">
                                <i class="bi-search"></i>
                                </div>
                            </li>
                            <li>
                                <h4 class="text-white mb-3">Hiện nay</h4>
                                <p class="text-white">Vinamed đang vận hành các cơ sở sản xuất trang thiết bị y tế hiện đại, đáp ứng tất cả các tiêu chuẩn và yêu cầu khắt khe trong lĩnh vực y tế như ISO 9001; ISO 13485; cGMPs of FDA , hệ thống phòng sạch Class 7,...</p>
                                <div class="icon-holder">
                                <i class="bi-bookmark"></i>
                                </div>
                            </li>
                            <li>
                                <h4 class="text-white mb-3">Sản phẩm</h4>
                                <p class="text-white">Các sản phẩm chính bao gồm Bơm tiêm tự khoá, Bơm tiêm nhựa và bơm cho ăn dùng 1 lần, Dây truyền dịch, dây truyền cánh bướm, túi tiệt trùng, các sản phẩm silicon, cao su trong y tế.</p>
                                <div class="icon-holder">
                                <i class="bi-book"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 text-center mt-5">
                    <a href="http://vinamed.com.vn/" class="btn custom-btn custom-border-btn ms-3">Di chuyển đến website Vinamed</a>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section section-padding section-bg" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5">LIÊN HỆ</h2>
                </div>
                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1907080.1765575353!2d103.39715595624999!3d21.002016300000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad9ee9ff83b3%3A0xd19bfd1007d85730!2sVinamed!5e0!3m2!1svi!2s!4v1690944310106!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-5 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                    <h4 class="mb-3">Trụ sở chính</h4>
                    <p>Trụ sở chính: 89 Lương Định Của, Đống Đa, Hà Nội</p>
                    <hr>
                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Số điện thoại</span>
                        <a href="tel: 305-240-9671" class="site-footer-link">
                            (+84) 24 3823 5679
                        </a>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>
                        <a href="mailto:info@company.com" class="site-footer-link">
                            info@vinamed.com.vn
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection