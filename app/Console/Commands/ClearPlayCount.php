<?php

namespace App\Console\Commands;

use App\Jobs\ClearPlayCount as JobsClearPlayCount;
use App\Models\Track;
use Exception;
use Illuminate\Console\Command;

class ClearPlayCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-play-count {my-argument} {--my-option} {--my-option2=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all tracks play count to 0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info($this->argument('my-argument'));
        $this->info($this->option('my-option') ? 'Vrai' : 'Faux');
        $this->info($this->option('my-option2') ?? 'No option');

        // try {
        //     Track::where('play_count', '>', 0)->update(['play_count' => 0]);
        // } catch (Exception $e) {
        //     return $this->fail('An error occured');
        // }
        JobsClearPlayCount::dispatch('my argument');

        $this->info('Tracks updated');
        return 0;
    }
}
