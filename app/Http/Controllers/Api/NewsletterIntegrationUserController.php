<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImagesImportZip;
use App\Models\User;
use App\Services\ImagesImportService;
use App\Services\SMSCenterService;

class NewsletterIntegrationUserController extends Controller
{
    public const USERS_COUNT_PER_TIME = 5;

    public function __invoke()
    {
        $users = User::query()
//            ->where('from_integration', true)
            ->whereHas('newsletter_integration', null, '=', 0)
            ->take(self::USERS_COUNT_PER_TIME)
            ->get();

//        SMSCenterService::

        $users->each(function ($user) {
//                $botSendEvent->send(
//                    $notification->imagePath,
//                    [$notification->general, $notification->locale],
//                    $user->telegram_id
//                );
                $user->newsletter_integration()->create([]);
            });
    }
}
