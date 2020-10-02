<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PruneBB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bb:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove from the database expired or spammy data';

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
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
