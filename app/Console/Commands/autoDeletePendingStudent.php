<?php

namespace App\Console\Commands;

use App\Models\RegularStudent;
use App\Models\RplStudent;
use Illuminate\Console\Command;

class autoDeletePendingStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-delete-pending-student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // get all pending students who are in pending mode for more than 7 days
        $pendingStudents = RegularStudent::where('status','pending')->where('created_at','<',now()->subDays(7))->get();

        foreach ($pendingStudents as $pendingStudent) {
            $pendingStudent->delete();
        }
        $pendingStudents = RplStudent::where('status','pending')->where('created_at','<',now()->subDays(7))->get();
        foreach ($pendingStudents as $pendingStudent) {
            $pendingStudent->delete();
        }
    }
}
