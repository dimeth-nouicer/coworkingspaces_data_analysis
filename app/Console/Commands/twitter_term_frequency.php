<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class twitter_term_frequency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:term {json : A JSON array containing user timeline }'; //: json 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this Command will return term frequency';

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
        $json = $this->argument('json');
       // $path = config('twitter.py_scripts_folder');
        $process = new Process("python python/twitter_term_frequency.py python/{$json}");
        $process->run();
        //echo $process->getOutput();
        return $process->getOutput();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
       /* $process->run();
         $process->start();

        foreach ($process as $type => $data) {
            //echo "success";
            if ($process::OUT === $type) {
                echo $data;
               // echo "success";
                
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            } 
    }*/
}
}
