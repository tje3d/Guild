<?php

use Illuminate\Database\Seeder;

class DefaultQuestions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['textarea', 'Introduce yourself with your Name, Age and Nationality. We want to get to know YOU as a person. Do include your hobbies and such.'],
            ['textarea', 'Why do you want to join KTD?'],
            ['textarea', 'Are you available to raid from 10:30am until 13:30 server time? Is there any day on which you cannot raid with us?'],
            ['textarea', 'Do you have any alts you\'d like to join the guild with? If so, state the class and gearscore.'],
            ['radio', 'Do you have TeamSpeak3?'],
            ['textarea', 'The DPS\'ers are dps whoring for their recount, and they have failed to nuke down the adds, now one of them is casting Dark Martyrdom. How do you proceed?'],
            ['textarea', 'Proffesor Putricide will spawn a Green and an Orange ooze periodically throughout the encounter. If you get target by the Orange ooze, what is your course of action? If you get targeted by the Green oze, where is the ideal position to be rooted by it?'],
            ['textarea', 'Professor Putricide is casting Unstable Experiment, both Red and Green ooze are about to spawn, what action do you take?'],
            ['textarea', 'Valanar casts Empowered Shock Vortex, how do you avoid unnecessary damage? Taldaram casts Conjure Flame Orb, do you have any cooldown to mitigate the damage? Lastly, how do you proceed when target is on Keleseth?'],
            ['textarea', 'Sindragosa casts Unchained Magic/Chilled to the Bone on you, how does this affect you? In the last phase, only you get the Frost Beacon on you, where do you go and why?'],
            ['textarea', 'What is Necrotic Plague, and how do you proceed if its casted on you? What are Shadow Traps and how do you deal with them?'],
            ['textarea', 'What do you do during the Transition phases?'],
            ['textarea', 'Describe what needs to be done INSIDE Frostmourne Chamber, and what can you do to help the raid survive when you get out?'],
            ['textarea', 'During the entire length of Phase 3, where is your ideal placement on the Frozen Throne and why?'],
            ['textarea', 'Halion is about to cast Meteor Strike. What is your ideal position before the Meteor Strike, and what do you do when it lands?'],
            ['textarea', 'You get Fiery Combustion debuff on you, where do you go? You get Soul Consumption casted on you. Where do you go to get dispelled?'],
        ];

        foreach ($data as $row) {
            \App\Question::create([
                'type' => $row[0],
                'ask'  => $row[1],
                'data' => [],
            ]);
        }
    }
}
