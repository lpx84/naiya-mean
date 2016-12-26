<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $data;
    protected $to;
    protected $subject;
    protected $template;
    protected $templates = [
                    'send' => 'mails.send',
                    'active' => 'mails.active'
                ];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $to, $subject, $template = 'mails.send')
    {
        $this -> data = $data;
        $this -> to = $to;
        $this -> subject = $subject;
        $this -> template = $template;
    }

    /**
     * 执行任务
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        if ($this->attempts() > 10) {
            //重复次数
            return false;
        }

        $to = $this -> to;
        $subject = $this -> subject;
        $mailer->send($this -> template, ['data' => $this -> data], function ($message) use($to,$subject){
            $message 
            -> to($to) 
            -> subject($subject);
        });
    }
}
