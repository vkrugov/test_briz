<?php

namespace App\Console\Commands;

use App\Models\Profile;
use Illuminate\Console\Command;

class UpdateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $profile =  Profile::first();

        $random = rand(100, 400);
        $name = "Random Name: {$random}";
        $profile->update([
            'name' => $name
        ]);

        return Command::SUCCESS;
    }
}
