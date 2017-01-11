<?php

use Illuminate\Database\Seeder;
use App\IndexMenu;

class IndexMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataType = IndexMenu::firstOrNew([
            'title' => '書店',
            'url'   => '/bookstore',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 1,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => '新聞',
            'url'   => '/news',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 2,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => '運動',
            'url'   => '/sport',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 3,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => '籃球',
            'url'   => '/sport/basketball',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 3,
                'order'     => 4,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => '電影',
            'url'   => '/movie',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 5,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => '音樂',
            'url'   => '/music',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 6,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Dropdown',
            'url'   => '/dropdown',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => null,
                'order'     => 7,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'One',
            'url'   => '/dropdown/one',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 7,
                'order'     => 8,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Two',
            'url'   => '/dropdown/two',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 7,
                'order'     => 9,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Three',
            'url'   => '/dropdown/three',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 7,
                'order'     => 10,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Four',
            'url'   => '/dropdown/four',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 7,
                'order'     => 11,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Five',
            'url'   => '/dropdown/five',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 7,
                'order'     => 12,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'One',
            'url'   => '/dropdown/two/one',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 9,
                'order'     => 13,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Two',
            'url'   => '/dropdown/two/two',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 9,
                'order'     => 14,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Three',
            'url'   => '/dropdown/two/three',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 9,
                'order'     => 15,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Four',
            'url'   => '/dropdown/two/four',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 9,
                'order'     => 16,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Five',
            'url'   => '/dropdown/two/five',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 9,
                'order'     => 17,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'One',
            'url'   => '/dropdown/five/one',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 12,
                'order'     => 18,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Two',
            'url'   => '/dropdown/five/two',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 12,
                'order'     => 19,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'One',
            'url'   => '/dropdown/five/one/one',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 18,
                'order'     => 20,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'One',
            'url'   => '/dropdown/two/three/one',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 15,
                'order'     => 21,
                'active'    => 1,
            ])->save();
        }
        
        $dataType = IndexMenu::firstOrNew([
            'title' => 'Two',
            'url'   => '/dropdown/two/three/two',
        ]);
        if (!$dataType->exists) {
            $dataType->fill([
                'parent_id' => 15,
                'order'     => 22,
                'active'    => 1,
            ])->save();
        }
    }
}
