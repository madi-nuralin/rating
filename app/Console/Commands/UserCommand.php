<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Role;
use App\Models\Confirmer;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user:role:add {role} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add role to user by email given';

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
        $user = User::firstWhere('email', $this->argument('email'));

        if ($user && $this->argument('role') == 'confirmer') {
            if ($user->confirmer === null) {
                $user->setConfirmer(new Confirmer());
            }
        }

        return $user->roles()->attach(Role::firstWhere('context', $this->argument('role'))->getId());
    }
}
