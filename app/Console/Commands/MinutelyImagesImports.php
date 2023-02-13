<?php

namespace App\Console\Commands;

use App\Models\ImagesImportZip;
use App\Services\ImagesImportService;
use Illuminate\Console\Command;

class MinutelyImagesImports extends Command
{
    protected $signature = 'minute:images-imports';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $import = ImagesImportZip::query()
            ->where('status', ImagesImportZip::IN_PROGRESS)
            ->firstOrFail();

        $imagesImportService = new ImagesImportService($import->id);

        if (! $imagesImportService->checkFolder()) return $this->info(json_encode(['status' => 'error']));

        if (! $imagesImportService->getFilesCount()) {
            $import->update(['status' => ImagesImportZip::COMPLETED]);

            $imagesImportService->deleteFolder();

            return $this->info(json_encode(['status' => 'completed', 'message' => $import->saved_files_count . '/' . $import->files_count]));
        }

        $result = $imagesImportService->handleImage();

        if($result) $import->increment('saved_files_count');

        return $this->info(json_encode(['status' => 'in progress', 'message' => $import->saved_files_count . '/' . $import->files_count]));
    }
}
