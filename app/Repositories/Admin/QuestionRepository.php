<?php

namespace App\Repositories\Admin;

use App\Models\Question;
use App\Repositories\AbstractRepository;
use Yajra\DataTables\Facades\DataTables;

class QuestionRepository extends AbstractRepository
{
    protected function model(): string
    {
        return Question::class;
    }

    public function list() {
        $questions = $this->all();
        return DataTables::of($questions)
        ->addColumn('action', function($arrQuestion){
           return ' <a href="'.route('admin.questions.edit', ['id' => $arrQuestion['id']]).'" class="btn btn-success"><i class="fas fa-edit"></i></a> ' . ' <button id="'.$arrQuestion['id'].'" class="btn btn-danger delete-question"><i class="fas fa-trash-alt"></i></button> ';
        })->make(true);
    }

    public function listQuestionOption()
    {
        $questionAll = $this->all();
        $questions = $questionAll->map(function ($question) {
            return collect($question->toArray())->only(['id', 'content'])->all();
        });
        return $questions;
    }

    public function store($dataQuestionNew)
    {
        return $this->create($dataQuestionNew);
    }

    public function edit($id)
    {
        return $this->find($id);
    }
 
    public function updateQuestion($id, $dataQuestionUpdate)
    {
        return $this->update($id, $dataQuestionUpdate);
    }

    public function destroy($request) 
    {
        $this->delete($request->id);
        return response()->json(['error' => 'Xóa thành công !']);
    }
}