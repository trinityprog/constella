<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductVendorSlugExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImagesImportStoreExcelRequest;
use App\Http\Requests\Admin\ImagesImportStoreZipRequest;
use App\Imports\ImagesImport;
use App\Models\ImagesImportZip;
use App\Models\Product;
use App\Services\ImagesImportService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ImagesImportsController extends Controller
{
    public function index()
    {
        $images_imports = ImagesImportZip::all();

        return view('admin.images-imports.index', compact('images_imports'));
    }

    public function createZip()
    {
        return view('admin.images-imports.create_zip');
    }

    public function storeZip(ImagesImportStoreZipRequest $request)
    {
        if($request->hasFile('zip_file')) {
            $import = ImagesImportZip::create([
                'comment' => $request->comment
            ]);

            $imagesImportService = new ImagesImportService($import->id);

            if(! $imagesImportService->extract($request->file('zip_file'))) {
                $import->update(['status' => ImagesImportZip::ZIP_ERROR]);
                return back()->with('flash_message', 'Не удается распаковать архив!');
            }

            if(! $imagesImportService->checkImages()) {
                $imagesImportService->deleteFolder();
                $import->update(['status' => ImagesImportZip::NOT_FOUND_IMAGES]);
                return back()->with('flash_message', 'Не удается найти изображения!');
            }

            $import->update([
                'status' => ImagesImportZip::IN_PROGRESS,
                'files_count' => $imagesImportService->getFilesCount()
            ]);

            return redirect()->route('admin.images-imports.index')->with('flash_message', 'Импорт создан!');
        }
        return redirect()->route('admin.images-imports.index');
    }

    public function createExcel()
    {
        return view('admin.images-imports.create_excel');
    }

    public function storeExcel(ImagesImportStoreExcelRequest $request)
    {
        if($request->hasFile('excel_file')) {
            $importFile = $request->file('excel_file');
            $importFileName = Str::uuid() . '.' . $importFile->getClientOriginalExtension();

            $file = $importFile->move(public_path('imports'), $importFileName);

            Excel::import(new ImagesImport, $file->getRealPath());

        }
        return redirect()->route('admin.images-imports.index');
    }

    public function excelVendorSlug()
    {
        $products = Product::query()
            ->with(['images', 'characteristics'])
            ->latest()
            ->get();

        return Excel::download(new ProductVendorSlugExport($products), 'ProductVendorSlugExport-from-'.now().'.xlsx');
    }
}
