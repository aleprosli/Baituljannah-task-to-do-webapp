<?php

namespace App\Jobs;

use App\Models\Todolist;
use App\Mail\ReminderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $todolist;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Todolist $todolist)
    {
        $this->todolist = $todolist;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::send('mail.reminder',[
        // 'id' => $this->todolist->id,
        'title' => $this->todolist->title,             
        'description' => $this->todolist->description,
        'date' => $this->todolist->date
        ], function ($message) {
            $message->to('test@mail.com');
            $message->subject('This is your task reminder');
        });
    }
}
