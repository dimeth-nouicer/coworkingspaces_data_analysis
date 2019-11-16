<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class twitter_engagement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:engagement {text1} {text2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this Command returns a user engagement vs competitor engagement';

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
        $text1 = $this->argument('text1');
        $text2 = $this->argument('text2');
        // $path = config('twitter.py_scripts_folder');
         $process = new Process("python python/twitter_influence.py {$text1} {$text2}");
         $process->run();
         echo $process->getOutput();
         //return $process->getOutput();
         // executes after the command finishes
         if (!$process->isSuccessful()) {
             throw new ProcessFailedException($process);
         }
    }
}
