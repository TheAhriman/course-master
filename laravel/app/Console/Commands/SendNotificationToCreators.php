<?php

namespace App\Console\Commands;

use App\Http\Services\UserProgressService;
use App\Http\Services\UserService;
use App\Jobs\StoreMediaForLessonContent;
use App\Mail\ConfirmLessonsNotification;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Support\Facades\Mail;

class SendNotificationToCreators extends Command implements Isolatable
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification-to-creators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to creators that now approved pupils finished lessons';

    /**
     * Execute the console command.
     */
    public function handle(UserService $userService, UserProgressService $progressService)
    {
        foreach($userService->getAllCreators() as $creator) {
            if ($progressService->checkFinishedLessons($creator))
                Mail::to($creator)->send(new ConfirmLessonsNotification($creator));
        }
    }
}
