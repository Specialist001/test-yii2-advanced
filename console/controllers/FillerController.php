<?php

namespace console\controllers;

use yii\helpers\Console;

class FillerController extends \yii\console\Controller
{
    public function actionIndex()
    {
        // fill with fake data `posts` table
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $post = new \common\models\Post();
            $post->title = $faker->sentence(3);
            $post->content = $faker->text(1000);
            $post->status = $faker->numberBetween(0, 1);
            $post->order = $faker->numberBetween(0, 100);
            $post->save();

            // console output for debug
            Console::output($post->title. ' saved');
        }
    }

}
