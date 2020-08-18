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
            'date_start'=>'2020-09-05',
            'date_end'=>'2020-09-06',
            'price'=>'49',
        ]);

        DB::table('events')->insert
        ([
            'type'=>'PSE2',
            'date_start'=>'2020-10-24',
            'date_end'=>'2020-10-25',
            'price'=>'99',
        ]);

        DB::table('events')->insert
        ([
            'type'=>'DPS',
            'description'=>'Lorem ipsum dolor amet mustache knausgaard +1, blue bottle waistcoat tbh semiotics artisan synth stumptown gastropub cornhole celiac swag. Brunch raclette vexillologist post-ironic glossier ennui XOXO mlkshk godard pour-over blog tumblr humblebrag. Blue bottle put a bird on it twee prism biodiesel brooklyn. Blue bottle ennui tbh succulents.',
            'date_start'=>'2020-11-14',
            'date_end'=>'2020-11-15',
            'slots_left'=>'5',
        ]);
    }
}
