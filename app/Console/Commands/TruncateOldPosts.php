<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TruncateOldPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for delete old data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = Carbon::now()->subDays(30)->toDateString();

        $current = Carbon::now()->toDateString();
        Post::where('created_at', '<', array($from, $current))->each(function ($post) {
            $post->delete();
        });
        return Command::SUCCESS;
    }
}
