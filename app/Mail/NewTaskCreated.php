<?php

namespace App\Mail;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTaskCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {

        $this->task=$task;

        // dd($this->task);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return view('mail.new-task');

        return $this->from('noreply@cplogmein.com', 'noreply_New Task')
        ->markdown('mail.new-task', [
            'task' => $this->task,
        ]);
    }
}
