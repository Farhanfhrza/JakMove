<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use Carbon\Carbon;

class ExpireOldTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:expire';

    protected $description = 'Update status tickets to expired if travel_date is in the past and not yet used';

    public function handle()
    {
        $today = Carbon::today();

        $expired = Ticket::where('travel_date', '<', $today)
            ->where('status', 'booked')
            ->update(['status' => 'expired']);

        $this->info("Expired $expired tickets.");
    }
}
