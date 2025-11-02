<?php

namespace App\Console\Commands;

use App\Mail\MonthlySalaryDetails;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMonthlyStatementMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-monthly-statement-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sends payment history of current month to the admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Mail::to('admin@gmail.com')->send(new MonthlySalaryDetails());
    }
}
