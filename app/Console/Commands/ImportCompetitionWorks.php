<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CompetitionWork;
use Maatwebsite\Excel\Facades\Excel;

class ImportCompetitionWorks extends Command
{
    protected $signature = 'import:competition-works {file}';
    protected $description = 'Import competition works from Excel file';

    public function handle()
    {
        $file = $this->argument('file');

        $data = Excel::toArray([], $file)[0];

        // Пропускаем заголовок (первую строку)
        array_shift($data);

        $typesMap = [
            'рисунок' => 'painting',
            'Рисунок' => 'painting',
            'исследование' => 'research',
            'Исследование' => 'research',
            'эссе' => 'essay',
            'Эссе' => 'essay',
            'эссе + исследование' => 'essay_research',
            'с' => 'c'
        ];

        $count = 0;
        $skipped = 0;

        foreach ($data as $row) {
            // Пропускаем пустые строки
            if (empty(array_filter($row))) {
                $skipped++;
                continue;
            }

            // Проверяем, что номер (ID) существует
            if (!isset($row[0]) || $row[0] === null || $row[0] === '') {
                $this->error("Missing ID in row: ".json_encode($row));
                continue;
            }

            $type = strtolower(trim($row[3] ?? ''));
            $type = $typesMap[$type] ?? null;

            if (!$type) {
                $this->error("Unknown type: {$row[3]}");
                continue;
            }

            try {
                CompetitionWork::updateOrCreate(
                    ['id' => $row[0]], // Ищем запись с этим ID
                    [
                        'title' => $row[4] ?? '',
                        'type' => $type,
                        'fio_participant' => $row[1] ?? '',
                        'age' => $row[6] ?? '',
                        'city' => $row[7] ?? '',
                        'district_id' => null,
                        'educational_institution' => $row[8] ?? null,
                        'fio_curator' => $row[2] ?? null,
                        'file' => $row[0] . '.jpg', // Формируем имя файла как id.jpg
                    ]
                );

                $count++;
            } catch (\Exception $e) {
                $this->error("Error importing row {$row[0]}: ".$e->getMessage());
            }
        }

        $this->info("Successfully processed {$count} works");
        $this->info("Skipped {$skipped} empty rows");
    }
}
