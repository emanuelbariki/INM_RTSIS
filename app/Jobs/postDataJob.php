<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\baseController;

class postDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $informationId;
    protected $reportName;
    protected $endpoint;

    /**
     * Create a new job instance.
     *
     * @param  array  $endpoint
     * @param  array  $data
     * @param  string  $informationId
     * @param  string  $reportName
     * @return void
     */

    public function __construct(array $endpoint, array $data, string $informationId, string $reportName)
    {
        //
        $this->endpoint = $endpoint;
        $this->data = $data;
        $this->informationId = $informationId;
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
        $response = BaseController::postEndPointResponse($this->endpoint, $this->data, $this->informationId, $this->reportName);
    }
    /**
     * Get the unique ID of the job.
     *
     * @return string
     */
    public function uniqueId()
    {
        return $this->informationId . '-' . $this->queue;
    }
}
