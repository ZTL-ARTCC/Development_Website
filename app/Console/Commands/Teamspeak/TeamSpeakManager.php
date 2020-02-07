<?php

namespace App\Console\Commands\TeamSpeak;

use App\Libraries\TeamSpeak;
use Exception;
use TeamSpeak3_Adapter_ServerQuery_Exception;

class TeamSpeakManager extends TeamSpeakCommand
{
   /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'teaman:runner';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TeamSpeak Management script.';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       
            $tscon = TeamSpeak::run('VATSIM UK Management Bot');

            // get all clients and initiate loop
         
          
     
    }
}