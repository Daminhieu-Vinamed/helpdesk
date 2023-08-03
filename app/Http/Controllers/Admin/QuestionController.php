<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\QuestionRequest;
use App\Services\Admin\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected QuestionService $questionService;

    public function __construct(QuestionService $questionService) {
        $this->questionService = $questionService;
    }

    public function layout()
    {
        return view('admin.question.list');
    }

    public function list() {
        return $this->questionService->list();
    }

    public function create()
    {
        return view('admin.question.create');
    }

    public function store(QuestionRequest $request)
    {
        $this->questionService->store($request);
        return view('admin.question.list');
    }

    public function edit(Request $request)
    {
        $question = $this->questionService->edit($request);
        return view('admin.question.update', ['question' => $question]);
    }

    public function update(QuestionRequest $request)
    {
        $this->questionService->update($request);
        return view('admin.question.list');
    }

    public function delete(Request $request)
    {
        return $this->questionService->delete($request);
    }
}
