<?php
//require "fzaninotto/faker"
use App\Variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NuevasFunccionesSeeder extends Seeder {

    public function run()
    {
        Variable::create('nombre'=>'logo','valor'=>'uploads/logo100.png');
    }

}