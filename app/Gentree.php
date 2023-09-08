<?php

namespace App;

use App\Factories\ReaderFactory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class Gentree
{
    /**
     * Handle generation
     * @param string $input_path
     * @param string $output_path
     * @throws \Exception
     */
    public function generate(string $input_path, string $output_path) : void
    {
        //obtain file extension
        $extension = File::extension($input_path);

        /*
         * Dlya dalneyshego razvitia ispolzovalos Factory & Strategy patterny
         */
        $reader = ReaderFactory::getReader($extension);

        $data = $reader->readFile($input_path);

        $tree = $this->build_tree($data);

        $json = json_encode($tree,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );

        $fp = fopen($output_path, 'w');
        fwrite($fp, $json);
        fclose($fp);

    }

    /**
     * Build tree
     *
     * @param $items
     * @param null $parentId
     * @return array
     */
    private function build_tree(&$items, $parentId = null) : array
    {
        $treeItems = [];

        foreach ($items as $idx => $item)
        {
            if(
                (empty($parentId) && empty($item['parent'])) ||
                (!empty($item['parent']) && !empty($parentId) && $item['parent'] == $parentId)
            )
            {
                if($item['type'] === 'Прямые компоненты' && isset($item['relation']))
                {
                    //возможное продолжение через связь с элементом типа 'Изделия и компоненты'
                    $items[$idx]['children'] = $this->build_tree($items, $item['relation']);
                }
                else{
                    $items[$idx]['children'] = $this->build_tree($items, $items[$idx]['itemName']);
                }

                $treeItems []= Arr::only($items[$idx],['itemName','children','parent']);//filter
            }
        }

        return $treeItems;
    }

}
