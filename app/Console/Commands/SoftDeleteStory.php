<?php

namespace App\Console\Commands;

use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SoftDeleteStory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SoftDeleteStory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete stories after 2 minute';

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
     * @return int
     */
    public function handle()
    {
        DB::table('stories')->where('created_at', '<=', Carbon::now()->addMinutes(2))->update(['deleted_at' => Carbon::now()]);;
    }
}
