<?php

namespace App\Console\Commands;

use Artisan;
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
            $this->comment('Rebuilding Application...');
            
            Artisan::call('migrate:fresh') == 0 ? $this->info('Database Tables migrated successfully'): $this->comment("Nothing to migrate!");
            
            Artisan::call('db:seed') == 0 ? $this->info('Database Tables were seeded successfully') : $this->comment('Nothing to Seed!');
            $this->comment("Completed in ".(time()-$this->start)."s");
            return 1;
        } else {
            $this->error('Switch back to Development to use!');
            return 0;
        }
    }
}
