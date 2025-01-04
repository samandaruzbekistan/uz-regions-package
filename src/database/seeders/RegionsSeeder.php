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
        $regions = $this->getXmlData('regions.xml', 'regions');
        DB::table('regions')->insert($regions);

        // Districts
        $districts = $this->getXmlData('districts.xml', 'districts');
        DB::table('districts')->insert($districts);

        // Villages
        $villages = $this->getXmlData('villages.xml', 'villages');
        DB::table('villages')->insert($villages);
    }

    /**
     * Helper function to read XML data and prepare it for insertion
     */
    private function getXmlData($filename, $table)
    {
        $filePath = __DIR__ . '/../data/' . $filename;
        $xml = simplexml_load_file($filePath);

        // Convert the XML to array
        $xmlJson = json_encode($xml);
        $data = json_decode($xmlJson, true);

        // Prepare data for insertion
        $preparedData = [];
        $tableKey = 'table_' . $table;

        // Loop through the specific table data (regions, districts, or villages)
        foreach ($data[$tableKey][$table] as $item) {
            $preparedData[] = [
                'id' => $item['@attributes']['id'],
                'name_uz' => (string)$item['@attributes']['name_uz'],
                'name_oz' => (string)$item['@attributes']['name_oz'],
                'name_ru' => (string)$item['@attributes']['name_ru'],
            ];

            // Add additional fields based on the type of data (regions, districts, villages)
            if ($table === 'districts') {
                $preparedData[count($preparedData) - 1]['region_id'] = $item['@attributes']['region_id'];
            } elseif ($table === 'villages') {
                $preparedData[count($preparedData) - 1]['district_id'] = $item['@attributes']['district_id'];
            }
        }

        return $preparedData;
    }
}