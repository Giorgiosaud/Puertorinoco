<?php
//require "fzaninotto/faker"
use App\FechaEspecial;
use App\TipoDePago;
use App\Variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NuevasFunccionesSeeder extends Seeder {

    public function run()
    {
        Variable::create(['nombre'=>'logo',
                          'valor'=>'uploads/logo100.png']);
        FechaEspecial::create([

        ]);
        TipoDePago::create([
            'nombre'=>'Credito A Favor',
            'descripcion'=>'Credito A Favor de Cliente',
        ]);
    }

}