<?php
namespace App\Services\Mail;

use App\Mail\TicketMail;
use App\Repositories\Admin\TicketRepository;
use Illuminate\Support\Facades\Mail;
class MailService 
{
    protected TicketRepository $ticketRepository;
    
    public function __construct(TicketRepository $ticketRepository) {
        $this->ticketRepository = $ticketRepository;
    }

    public function sendOnlyAdmin($id)
    {
        $ticket = $this->ticketRepository->ticketSendMail($id);
        $mailData = [
            'question' => $ticket->question,
            'title' => $ticket->title,
            'content' => $ticket->content,
            'image' => $ticket->image,
        ];
        $this->ticketRepository->updateTicket($id, ['is_send_mail' => config('constants.status.two')]);
        return Mail::to($ticket->email)->send(new TicketMail($mailData));
    }
}