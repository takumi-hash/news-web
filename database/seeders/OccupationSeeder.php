<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert([
            'code' => 1,
            'category' => 'コンサル・シンクタンク',
        ]);
        DB::table('occupations')->insert([
            'code' => 2,
            'category' => '金融',
        ]);
        DB::table('occupations')->insert([
            'code' => 3,
            'category' => 'メーカー',
        ]);
        DB::table('occupations')->insert([
            'code' => 4,
            'category' => '商社',
        ]);
        DB::table('occupations')->insert([
            'code' => 5,
            'category' => 'IT・通信',
        ]);
        DB::table('occupations')->insert([
            'code' => 6,
            'category' => '広告・マスコミ',
        ]);
        DB::table('occupations')->insert([
            'code' => 7,
            'category' => '人材・教育',
        ]);
        DB::table('occupations')->insert([
            'code' => 8,
            'category' => 'インフラ・交通',
        ]);
        DB::table('occupations')->insert([
            'code' => 9,
            'category' => '不動産・建設',
        ]);
        DB::table('occupations')->insert([
            'code' => 10,
            'category' => '旅行・観光',
        ]);
        DB::table('occupations')->insert([
            'code' => 11,
            'category' => 'ブライダル・美容',
        ]);
        DB::table('occupations')->insert([
            'code' => 12,
            'category' => '医療・福祉',
        ]);
        DB::table('occupations')->insert([
            'code' => 13,
            'category' => '小売・流通',
        ]);
        DB::table('occupations')->insert([
            'code' => 14,
            'category' => '公務員・団体職員',
        ]);
        DB::table('occupations')->insert([
            'code' => 99,
            'category' => 'その他',
        ]);
    }
}
