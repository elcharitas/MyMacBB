<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RebuildBB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bb:rb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Artisan Command to Rebuild The database. This command works only in development mode!";

    /**
     * The time console started.
     *
     * @var int
     */
    protected $start = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->start = time();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(env('APP_ENV') !== 'production'){
            $this->output('Rebuilding Application...');
            
            $this->output(\Artisan::call('migrate:fresh') == 0 ? 'Database Tables migrated successfully': "Nothing to migrate!");
            
            $this->output(\Artisan::call('db:seed') == 0 ? 'Database Tables were seeded successfully' : 'Nothing to Seed!');
            $this->output("Completed in ".(time()-$this->start)."s");
            return 1;
        } else {
            $this->output('Switch back to Development to use!');
            return 0;
        }
    }
    
    public function output($text){
        $this->comment($text);
    }
}
