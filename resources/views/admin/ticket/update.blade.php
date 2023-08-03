@extends('admin.layout.master')
@section('title', 'Edit ticket')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa ticket</h1>
                            </div>
                            <form class="user" action="{{ route('admin.tickets.update', ['id' => $ticket->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleRole">Câu hỏi</label>
                                        <select class="form-control" id="exampleRole" name="question_id">
                                            <option @disabled(true) @selected(true)>Chọn câu hỏi</option>
                                            @foreach ($questions as $question)
                                                <option value="{{$question['id']}}" {{ $ticket->question_id === $question['id'] ? 'selected' : '' }}>{{$question['content']}}</option>
                                            @endforeach
                                        </select>
                                        @error('question_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleInputTitle">Tiêu đề</label>
                                        <input type="text" class="form-control" id="exampleInputTitle" name="title" value="{{ $ticket->title }}">
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
                                            <option value="{{config('constants.status.one')}}" {{ $ticket->status === config('constants.status.one') ? 'selected' : '' }}>Chưa xử lý</option>
                                            <option value="{{config('constants.status.one')}}" {{ $ticket->status === config('constants.status.two') ? 'selected' : '' }}>Đang xử lý</option>
                                            <option value="{{config('constants.status.two')}}" {{ $ticket->status === config('constants.status.three') ? 'selected' : '' }}>Đã xử lý</option>
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
                                                <option value="{{$user['id']}}" {{ $ticket->user_id === $user['id'] ? 'selected' : '' }}>{{empty($user['username']) ? $user['email'] : $user['username']}}</option>
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
                                                <option value="{{$user['id']}}" {{ $ticket->problem_handler_user_id === $user['id'] ? 'selected' : '' }}>{{empty($user['username']) ? $user['email'] : $user['username']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleAvatar">Hình ảnh đính kèm</label>
                                        <input type="file" class="form-control" id="exampleAvatar" name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" name="is_send_mail" value="{{$ticket->is_send_mail}}">
                                    <input type="hidden" name="imageBefore" value="{{$ticket->image}}">
                                    @if (empty($ticket->image))
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="exampleInputContent">Nội dung</label>
                                            <textarea name="content" class="form-control" id="exampleInputContent" cols="30" rows="10">{{$ticket->content}}</textarea>
                                            @error('content')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="exampleInputContent">Nội dung</label>
                                            <textarea name="content" class="form-control" id="exampleInputContent" cols="30" rows="10">{{$ticket->content}}</textarea>
                                            @error('content')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0 image-upload">
                                            <button type="button" class="btn btn-danger delete-image"><i class="fas fa-trash-alt"></i></button>
                                            <img class="img-thumbnail image-display" src="{{ asset($ticket->image) }}">
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Chỉnh sửa</button>
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
