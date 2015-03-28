<?php
use Illuminate\Database\Seeder;

class eliminarColumnasSeed extends Seeder {

    public function run()
    {
        //$this->command->info('Eliminando columnas no necesarias de Pagos Directos ...');
        //Schema::table('pagos_directos', function($table)
        //{
        //    $table->dropColumn('reservacion_id');
        //    $table->dropColumn('monto');
        //});
        $this->command->info('Eliminando columnas no necesarias de Fechas Especiales...');
        Schema::table('fechas_especiales', function($table)
        {
            $table->dropColumn('activa');
        });

    }

}