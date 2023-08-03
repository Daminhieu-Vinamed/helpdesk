@extends('admin.layout.master')
@section('title', 'Create question')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa câu hỏi</h1>
                            </div>
                            <form class="user" action="{{ route('admin.questions.update', ['id' => $question->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="exampleInputTitle">Nội dung</label>
                                        <input type="text" class="form-control" id="exampleInputTitle" name="content" value="{{$question->content}}">
                                        @error('content')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
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
