<?php

namespace App\Jobs;

use App\Http\Controllers\baseController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class sendDataToEndpointJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model;
    protected $endpoint;
    protected $reportName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($model, $endpoint, $reportName)
    {
        //
        $this->model = $model;
        $this->endpoint = $endpoint;
        $this->reportName = $reportName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Log::alert("Background");
        $base = new baseController;
        $base->sendDataToEndpoint($this->model, $this->endpoint, $this->reportName);
    }
}
