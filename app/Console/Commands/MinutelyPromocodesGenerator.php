<?php

namespace App\Console\Commands;

use App\Models\PackPromocode;
use App\Services\PromocodeService;
use Illuminate\Console\Command;

class MinutelyPromocodesGenerator extends Command
{
    protected $signature = 'minute:promocodes-generator';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public const PROMOCODES_COUNT_PER_TIME = 10;

    public function handle(PromocodeService $promocodeService)
    {
        foreach (range(1, self::PROMOCODES_COUNT_PER_TIME) as $i) {
            $pack_promocodes = PackPromocode::query()
                ->withCount('promocodes')
                ->latest()
                ->get()
                ->filter(function ($item) {
                    return $item->quantity > $item->promocodes_count;
                })
                ->first();
            if($pack_promocodes) {
                $pack_promocodes->promocodes()
                    ->create([
                        'code' => $promocodeService->generate()
                    ]);
            }
        }
        return ['status' => 'success', 'message' => 'ok'];
    }
}
