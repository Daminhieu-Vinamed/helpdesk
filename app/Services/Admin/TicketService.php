<?php
namespace App\Services\Admin;

use App\Repositories\Admin\ClientRepository;
use App\Repositories\Admin\QuestionRepository;
use App\Repositories\Admin\TicketRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketService 
{
    public $storePath = 'public/images/ticket_images/';
    public $imagePath = 'storage/images/ticket_images/';

    protected TicketRepository $ticketRepository;
    protected ClientRepository $clientRepository;
    protected QuestionRepository $questionRepository;

    public function __construct(
        TicketRepository $ticketRepository, 
        ClientRepository $clientRepository,
        QuestionRepository $questionRepository
    ){
        $this->ticketRepository = $ticketRepository;
        $this->clientRepository = $clientRepository;
        $this->questionRepository = $questionRepository;
    }

    public function list()
    {
        return $this->ticketRepository->list();
    }

    public function arrOption()
    {
        $user = Auth::user();
        $users = $this->clientRepository->listUserOption($user);
        $questions = $this->questionRepository->listQuestionOption();
        return [
            'questions' => $questions,
            'userHandler' => $users['userHandler'],
            'userSend' => $users['userSend'],
        ];
    }

    public function store($request)
    {
        $dataTicketNew = $request->input();
        $dataTicketNew['is_send_mail'] = config('constants.status.one');
        if (empty($request->file('image'))) {
            $dataTicketNew['image'] = config('constants.value.null');
        } else {
            $imageName = $request->file('image')->hashName();
            $dataTicketNew['image'] = $this->imagePath . $imageName;
            $request->image->storeAs($this->storePath, $imageName);
        }
        return $this->ticketRepository->store($dataTicketNew);
    }

    public function edit($id)
    {
        $ticket = $this->ticketRepository->edit($id);
        return $ticket;
    }

    public function update($request)
    {
        $dataTicketUpdate = $request->input();
        $ticket = $this->ticketRepository->edit($dataTicketUpdate['id']);
        if (empty($request->file('image'))) {
            if (empty($dataTicketUpdate['imageBefore'])) {
                if (!empty($ticket->image)) {
                    Storage::delete(str_replace("storage", "public", $ticket->image));
                }
                $dataTicketUpdate['image'] = config('constants.value.null');
            }else{
                $dataTicketUpdate['image'] = $dataTicketUpdate['imageBefore'];
            }
        }else{
            $imageName = $request->file('image')->hashName();
            $dataTicketUpdate['image'] = $this->imagePath . $imageName;
            $request->image->storeAs($this->storePath, $imageName);
            if (!empty($ticket->image)) {
                Storage::delete(str_replace("storage", "public", $ticket->image));
            }
        }
        return $this->ticketRepository->update($dataTicketUpdate['id'], $dataTicketUpdate);
    }

    public function delete($request)
    {
        $ticket = $this->ticketRepository->edit($request->id);
        Storage::delete(str_replace("storage", "public", $ticket->image));
        return $this->ticketRepository->destroy($request);
    }
}