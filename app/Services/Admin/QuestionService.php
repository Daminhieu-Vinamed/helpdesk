<?php
namespace App\Services\Admin;

use App\Repositories\Admin\QuestionRepository;

class QuestionService 
{
    protected QuestionRepository $questionRepository;
    
    public function __construct(QuestionRepository $questionRepository) {
        $this->questionRepository = $questionRepository;
    }

    public function list() {
        return $this->questionRepository->list(); 
    }

    public function store($request) {
        $question = $request->input();
        return $this->questionRepository->store($question); 
    }

    public function edit($request) {
        
        return $this->questionRepository->edit($request->id); 
    }

    public function update($request) {
        $question = $request->input();
        return $this->questionRepository->updateQuestion($request->id, $question); 
    }

    public function delete($request)
    {
        return $this->questionRepository->destroy($request);
    }
}