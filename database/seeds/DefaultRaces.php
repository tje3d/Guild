<?php

use Illuminate\Database\Seeder;

class DefaultRaces extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Human', 'http://armory.warmane.com/images/icons/races/1-%s.gif'],
            ['Orc', 'http://armory.warmane.com/images/icons/races/2-%s.gif'],
            ['Dwarf', 'http://armory.warmane.com/images/icons/races/3-%s.gif'],
            ['Night Elf', 'http://armory.warmane.com/images/icons/races/4-%s.gif'],
            ['Undead', 'http://armory.warmane.com/images/icons/races/5-%s.gif'],
            ['Tauren', 'http://armory.warmane.com/images/icons/races/6-%s.gif'],
            ['Gnome', 'http://armory.warmane.com/images/icons/races/7-%s.gif'],
            ['Troll', 'http://armory.warmane.com/images/icons/races/8-%s.gif'],
            ['Blood Elf', 'http://armory.warmane.com/images/icons/races/10-%s.gif'],
            ['Draenei', 'http://armory.warmane.com/images/icons/races/11-%s.gif'],
        ];

        foreach ($data as $row) {
            \App\Race::create([
                'name' => $row[0],
                'icon' => $row[1],
            ]);
        }
    }
}
