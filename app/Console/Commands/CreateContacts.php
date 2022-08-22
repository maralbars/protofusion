<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Illuminate\Console\Command;

class CreateContacts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:contacts {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add 10 new contacts to database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Contact::factory()->count($this->argument('count'))->create();
        $this->info($this->argument('count') . ' new contacts successfully created!');
        return 0;
    }
}
