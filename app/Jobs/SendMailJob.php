<?php

namespace App\Jobs;

use App\Mail\SendMailUsers;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   private $data;
  
    public function __construct($data)
    {
        $this->data =$data;
    }

  
    public function handle()
    {
        $data =$this->data;
   foreach($data as $email){
    Mail::to($email)->send(new SendMailUsers());
   }
 
    }
}
