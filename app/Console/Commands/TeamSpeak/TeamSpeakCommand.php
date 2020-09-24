<?php

namespace App\Console\Commands\TeamSpeak;

use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TeamSpeak3_Adapter_ServerQuery_Exception;

abstract class TeamSpeakCommand extends Command {
    /**
     * @var TeamSpeakDaemon|TeamSpeakManager The console command object, used by static event-driven functions.
     */
    protected static $command;

    /**
     * @var int The TeamSpeak DBID of the current member being processed.
     */
    protected $currentMember = null;

    /**
     * Run the console command.
     *
     * In order to avoid self::$command being overwritten when each inherited class is constructed, the assignment
     * must be made here, when it is known that this is the command to be run.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function run(InputInterface $input, OutputInterface $output) {
        self::$command = $this;

        return parent::run($input, $output);
    }

    /**
     * Handling for a serverquery exception thrown by the TeamSpeak framework.
     *
     * @param TeamSpeak3_Adapter_ServerQuery_Exception $e
     * @param Account $account
     */


    /**
     * Handling for all exceptions.
     *
     * @param Exception $e
     */

}