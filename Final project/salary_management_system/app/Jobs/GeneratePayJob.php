<?php

namespace App\Jobs;

use App\Mail\SalaryStatement;
use App\Models\Salary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GeneratePayJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Salary $salary;

    /**
     * Create a new job instance.
     */
    public function __construct(Salary $salary)
    {
        $this->salary = $salary;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->salary->employee->user->email)
                ->send(new SalaryStatement($this->salary));

            $this->salary->update([
                'payment_status' => 'success'
            ]);
        } catch (\Throwable $e) {
            Log::error('Error processing GeneratePayJob: ' . $e->getMessage());

            $this->salary->update([
                'payment_status' => 'failed'
            ]);
        }
    }
}

