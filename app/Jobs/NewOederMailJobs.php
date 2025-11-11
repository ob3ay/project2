<?php

namespace App\Jobs;

use App\Mail\UserInvoiceMail;
use App\Mail\AdminInvoiceMail;
use App\Mail\VendorInvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOederMailJobs implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $admin, public string $user, public string $vendor)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->admin)->send(new AdminInvoiceMail());
        Mail::to($this->user)->send(new UserInvoiceMail());
        Mail::to($this->vendor)->send(new VendorInvoiceMail());




    }
}
