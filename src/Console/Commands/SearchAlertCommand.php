<?php

namespace Fevrok\SearchAlert\Console\Commands;

use Illuminate\Console\Command;
use Fevrok\SearchAlert\Models\SearchAlert;

class SearchAlertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $jobs = [];
        foreach (config('searchalert.pools', []) as $key => $pool) {
            foreach ($pool['duration'] as $key => $duration) {
                $pastDT = now()->subHours($duration);

                $alerts = SearchAlert::where('duration', $duration)
                    ->where('last_alert', '<=', $pastDT)
                    ->get();

                foreach ($alerts as $alert) {
                    if (!class_exists($alert->model)) {
                        throw new Exception($alert->model . " Model doesn't exist!");
                    }

                    foreach ($pool['query'] as $key => $method) {
                        $jobs = $alert->model::$method($alert->query->$key);
                    }
                    $jobs = $jobs->get();
                }
            }
        }

        $this->info(count($jobs) . ' jobs found!');
    }
}
