<?php

namespace Samandaruzbekistan\UzRegionsPackage\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegionsSeeder extends Seeder
{
    public function run()
    {
        // Regions
        $regions = $this->getJsonData('regions.json');
        DB::table('regions')->insert($regions);

        // Districts
        $districts = $this->getJsonData('districts.json');
        DB::table('districts')->insert($districts);

        // Villages
        $villages = $this->getJsonData('villages.json');
        DB::table('villages')->insert($villages);
    }

    /**
     * Helper function to read JSON data and prepare it for insertion
     */
    private function getJsonData($filename)
    {
        $filePath = __DIR__ . '/../data/' . $filename;
        $jsonData = File::get($filePath);
        $data = json_decode($jsonData, true);

        // Prepare data for insertion
        $preparedData = [];
        foreach ($data as $item) {
            $preparedData1 = [
                'id' => $item['id'],
                'name_uz' => $item['name_uz'],
                'name_oz' => $item['name_oz'],
                'name_ru' => $item['name_ru'],
            ];

            if (isset($item['region_id'])) {
                $preparedData1['region_id'] = $item['region_id'];
            } elseif (isset($item['district_id'])) {
                $preparedData1['district_id'] = $item['district_id'];
            }

            // Add the prepared data to the main array
            $preparedData[] = $preparedData1;
        }

        return $preparedData;
    }
}