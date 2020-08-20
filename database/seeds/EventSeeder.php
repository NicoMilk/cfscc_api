<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert
        ([
            'type'=>'PSC1',
            'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'date_start'=>'2020-09-05',
            'date_end'=>'2020-09-06',
            'price'=>'49',
            'slots'=>'10',
            'slots_left'=>'10',
        ]);

        DB::table('events')->insert
        ([
            'type'=>'PSE2',
            'description'=>'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium.',
            'date_start'=>'2020-10-24',
            'date_end'=>'2020-10-25',
            'price'=>'99',
            'slots'=>'10',
            'slots_left'=>'10',

        ]);

        DB::table('events')->insert
        ([
            'type'=>'DPS',
            'description'=>'Lorem ipsum dolor amet mustache knausgaard +1, blue bottle waistcoat tbh semiotics artisan synth stumptown gastropub cornhole celiac swag. Brunch raclette vexillologist post-ironic glossier ennui XOXO mlkshk godard pour-over blog tumblr humblebrag. Blue bottle put a bird on it twee prism biodiesel brooklyn. Blue bottle ennui tbh succulents.',
            'date_start'=>'2020-11-14',
            'date_end'=>'2020-11-15',
            'slots'=>'15',
            'slots_left'=>'15',
        ]);
    }
}
