<?php

use Illuminate\Database\Seeder;

class DefaultKlasses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Warrior', 'http://armory.warmane.com/images/icons/classes/1.gif'],
            ['Paladin', 'http://armory.warmane.com/images/icons/classes/2.gif'],
            ['Hunter', 'http://armory.warmane.com/images/icons/classes/3.gif'],
            ['Rogue', 'http://armory.warmane.com/images/icons/classes/4.gif'],
            ['Priest', 'http://armory.warmane.com/images/icons/classes/5.gif'],
            ['Death knight', 'http://armory.warmane.com/images/icons/classes/6.gif'],
            ['Shaman', 'http://armory.warmane.com/images/icons/classes/7.gif'],
            ['Mage', 'http://armory.warmane.com/images/icons/classes/8.gif'],
            ['Warlock', 'http://armory.warmane.com/images/icons/classes/9.gif'],
            ['Druid', 'http://armory.warmane.com/images/icons/classes/11.gif'],
        ];

        foreach ($data as $row) {
            \App\Klass::create([
                'name' => $row[0],
                'image' => $row[1],
            ]);
        }
    }
}
