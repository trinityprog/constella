<?php

namespace App\Exports;

use App\Services\CartService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class ProductVendorSlugExport implements FromCollection, ShouldAutoSize, WithEvents, WithHeadingRow, WithHeadings, WithMapping
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection(): \Illuminate\Support\Collection
    {
        return $this->data;
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->vendor_code,
            $product->vendor_slug,
            $product->characteristics->brand,
            $product->images->pluck('name')->flatten()->implode(';'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Артикул',
            'Артикул slug',
            'Бренд',
            'Изображения'
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class=> function(AfterSheet $event) {
                $cellRange = 'A1:Z1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11)->setBold(true);
            },
        ];
    }

}
