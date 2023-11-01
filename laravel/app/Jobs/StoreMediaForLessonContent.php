<?php

namespace App\Jobs;

use App\Http\Requests\StoreLessonContentRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreMediaForLessonContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    protected StoreLessonContentRequest $request;

    protected string $path;

    /**
     * Create a new job instance.
     */
    public function __construct(StoreLessonContentRequest $request,string $path)
    {
        $this->request = $request;
        $this->path = $path;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->request->file($this->request->media_type)->storeAs($this->path);
    }
}
