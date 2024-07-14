<?php

namespace App\Jobs;

use App\Models\Track;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClearPlayCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private string $argument,
    )
    {
        $this->onQueue('mails');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->argument;
        Track::where('play_count', '>', 0)->update(['play_count' => 0]);
    }
}
