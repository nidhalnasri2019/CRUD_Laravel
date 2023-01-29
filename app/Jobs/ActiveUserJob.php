<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ActiveUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public function __construct()
    {
        //
    }

   
    public function handle()
    {
        $user_ids = User::where('status',1)->pluck('id');

        foreach($user_ids as $ids){
            User::where('id',$ids)->update([
                'status'=>0
            ]);
        }
      
    }
}
