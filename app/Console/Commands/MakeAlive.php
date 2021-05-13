<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\AmAlive;
use App\Models\User;

class MakeAlive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rise:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make user come to life';

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
        $user = User::first();
        AmAlive::dispatch($user);
        //event(new AmAlive($user));
    }
}
