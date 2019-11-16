<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class twitter_get_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:user {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this Command returns a user profile friends and followers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $text = $this->argument('text');
        // $path = config('twitter.py_scripts_folder');
         $process = new Process("python python/twitter_get_user.py {$text}");
         $process->run();
         //echo $process->getOutput();
         echo "created user successfully";
         //return $process->getOutput();
         // executes after the command finishes
         if (!$process->isSuccessful()) {
             throw new ProcessFailedException($process);
         }
    }
}
