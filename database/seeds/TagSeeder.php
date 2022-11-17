<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['Hardstyle', 'Hardcore', 'Freestyle', 'Oldschool', 'Progressive', 'Techno', 'Trance', 'Frenchcore', 'Pop', 'Rock', 'Blues'];

        foreach ($tags as $model) {
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($model);
            $tag->save();
        }
    }
    }
