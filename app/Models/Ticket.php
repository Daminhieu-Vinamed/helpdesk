<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'question_id',
        'title',
        'content',
        'image',
        'status',
        'user_id',
        'problem_handler_user_id',
        'is_send_mail',
    ];

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function userHandler()
    {
        return $this->belongsTo(User::class, 'problem_handler_user_id', 'id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
