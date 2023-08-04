<?php
namespace App\Services\Client;

use App\Mail\TicketMail;
use App\Repositories\Client\TicketRepository as TicketClientRepository;
use App\Repositories\Admin\TicketRepository as TicketAdminRepository;
use App\Repositories\Admin\QuestionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketService 
{
    public $storePath = 'public/images/ticket_images/';
    public $imagePath = 'storage/images/ticket_images/';
    protected TicketClientRepository $TicketClientRepository;
    protected QuestionRepository $questionRepository;
    protected TicketAdminRepository $ticketAdminRepository;
    public function __construct(
        TicketClientRepository $TicketClientRepository, 
        QuestionRepository $questionRepository, 
        TicketAdminRepository $ticketAdminRepository
    ) 
    {
        $this->TicketClientRepository = $TicketClientRepository;
        $this->questionRepository = $questionRepository;
        $this->ticketAdminRepository = $ticketAdminRepository;
    }
    
    public function list() {
        $user = Auth::user();
        return $this->TicketClientRepository->list($user->id);
    }

    public function detail($id) {
        return $this->TicketClientRepository->detail($id);
    }

    public function listQuestionOption() {
        return $this->questionRepository->listQuestionOption();
    }

    public function store($request)
    {
        $dataTicketNew = $request->input();
        $dataTicketNew['status'] = config('constants.status.one');
        $dataTicketNew['is_send_mail'] = config('constants.status.one');
        $dataTicketNew['user_id'] = Auth::user()->id;
        if (empty($request->file('image'))) {
            $dataTicketNew['image'] = config('constants.value.null');
        } else {
            $imageName = $request->file('image')->hashName();
            $dataTicketNew['image'] = $this->imagePath . $imageName;
            $request->image->storeAs($this->storePath, $imageName);
        }
        $mailData = [
            'question' => $request->question,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ];
        Mail::to(Auth::user()->email)->send(new TicketMail($mailData));
        return $this->ticketAdminRepository->store($dataTicketNew);
    }
}