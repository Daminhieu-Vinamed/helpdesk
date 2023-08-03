@extends('admin.layout.master')
@section('title', 'Create ticket')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm mới ticket</h1>
                            </div>
                            <form class="user" action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleRole">Câu hỏi</label>
                                        <select class="form-control" id="exampleRole" name="question_id">
                                            <option @disabled(true) @selected(true)>Chọn câu hỏi</option>
                                            @foreach ($questions as $question)
                                                <option value="{{$question['id']}}">{{$question['content']}}</option>
                                            @endforeach
                                        </select>
                                        @error('question_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleInputTitle">Tiêu đề</label>
                                        <input type="text" class="form-control" id="exampleInputTitle" name="title">
                                        @error('title')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleStatus">Trạng thái</label>
                                        <select class="form-control" id="exampleStatus" name="status">
                                            <option @selected(true) @disabled(true)>Chọn trạng thái</option>
                                            <option value="{{config('constants.status.one')}}">Chưa xử lý</option>
                                            <option value="{{config('constants.status.two')}}">Đang xử lý</option>
                                            <option value="{{config('constants.status.three')}}">Đã xử lý</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleUserId">Người tạo</label>
                                        <select class="form-control" id="exampleUserId" name="user_id">
                                            <option @disabled(true) @selected(true)>Chọn người tạo</option>
                                            @foreach ($userSend as $user)
                                                <option value="{{$user['id']}}">{{empty($user['username']) ? $user['email'] : $user['username']}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleUserId">Người xử lý</label>
                                        <select class="form-control" id="exampleUserId" name="problem_handler_user_id">
                                            <option @disabled(true) @selected(true)>Chọn người xử lý</option>
                                            @foreach ($userHandler as $user)
                                                <option value="{{$user['id']}}">{{empty($user['username']) ? $user['email'] : $user['username']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleAvatar">Hình ảnh đính kèm</label>
                                        <input type="file" class="form-control" id="exampleAvatar" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="exampleInputContent">Nội dung</label>
                                        <textarea name="content" class="form-control" id="exampleInputContent" cols="30" rows="10"></textarea>
                                        @error('content')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/admin/ticket.js') }}" type="text/javascript"></script>
@endpush
