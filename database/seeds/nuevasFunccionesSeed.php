<?php
//require "fzaninotto/faker"
use App\FechaEspecial;
use App\Precio;
use App\TipoDePago;
use App\Variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NuevasFunccionesSeeder extends Seeder {

    public function run()
    {
        Variable::create(['nombre'=>'logo',
                          'valor'=>asset('uploads/logo100.png')]);
        FechaEspecial::create([

        ]);
        TipoDePago::create([
            'nombre'=>'Credito A Favor',
            'descripcion'=>'Credito A Favor de Cliente',
        ]);
        $p=Precio::where('tipo_de_paseo_id',1)->first();
        $p->aplicar_desde=$p->aplicar_desde->subYears(15);
        $p->save();
        $p=Precio::where('tipo_de_paseo_id',2)->first();
        $p->aplicar_desde=$p->aplicar_desde->subYears(15);
        $p->save();

    }

}