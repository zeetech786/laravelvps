<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CompanyExport implements
    FromCollection,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    WithEvents,
    WithDrawings,
    WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Company::all();
    }
    public function map($company): array
    {
        return [
            $company->id,
            $company->name,
            $company->first_name,
            $company->last_name,
            $company->city,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'CompanyName',
            'First Name',
            'Last Name',
            'City',
        ];
    }
    public function registerEvents(): array
    {
        return [

            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getStyle('A8:E8')->applyFromArray([
                    'font'=>[
                        'bold'=> true
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ]


                ]);

            }
        ];
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/mobile-phone-1917737_640.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    public function startCell(): string
    {
        return 'A8';
    }

}
