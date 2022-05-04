<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::query()->insert([
            'content' => 'about_us',
            'value' => 'chúng tôi khá oke'
        ]);
        Config::query()->insert([
            'content' => 'company_name',
            'value' => 'Công ty A'
        ]);
        Config::query()->insert([
            'content' => 'company_address',
            'value' => 'Quận 7 Hồ Chí Minh'
        ]);
        Config::query()->insert([
            'content' => 'company_mail',
            'value' => 'abc@gmail.com'
        ]);

        Config::query()->insert([
            'content' => 'company_phone1',
            'value' => '0123456963'
        ]);
        Config::query()->insert([
            'content' => 'company_phone2',
            'value' => '0123456789'
        ]);
        Config::query()->insert([
            'content' => 'facebook',
            'value' => 'https://facebook.com'
        ]);
        Config::query()->insert([
            'content' => 'order_note',
            'value' => 'Lời dặn dò khi đặt hàng gì đó'
        ]);
        Config::query()->insert([
            'content' => 'youtube',
            'value' => 'https://youtube.com'
        ]);
        Config::query()->insert([
            'content' => 'logo_max',
            'value' => 'https://drive.google.com/uc?id=1S-IPAUIT_xSwxCrCFhwvH6FzdJoXg_j3'
        ]);
        Config::query()->insert([
            'content' => 'logo_min',
            'value' => 'https://drive.google.com/uc?id=1vnUcvWgIRNjrsdQCs4wB9I3-2WiBTZxE'
        ]);
        Config::query()->insert([
            'content' => 'about_us_youtube',
            'value' => 'https://www.youtube.com/embed/aJgcTeWcNdc'
        ]);
        Config::query()->insert([
            'content' => 'qr_code',
            'value' => 'https://via.placeholder.com/640x480.png/005555?text=error'
        ]);
    }
}
