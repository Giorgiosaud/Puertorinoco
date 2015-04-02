<?php
use App\Permiso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportarDeLaravel4Seeder extends Seeder {

    public function run()
    {
        $tablas = ['clientes',
            'elementos_de_menu',
            'embarcaciones',
            'fechas_especiales',
            'mercadopagos',
            'niveles_de_acceso',
            'pagos',
            'pagos_directos',
            'pasajeros',
            'paseos',
            'tipos_de_paseos',
            'precios',
            'reservaciones',
            'tipos_de_pagos',
            'users',
            'variables',
            'permisos',];
        $this->command->info('Deshabilitando foreign_key_checks...');
        DB::statement("SET foreign_key_checks = 0");
        foreach ($tablas as $tabla)
        {
            $this->command->info('Borrando Datos de tabla ' . $tabla . '...');
            DB::statement("TRUNCATE " . $tabla);
        }
        $this->command->info('Habilitando foreign_key_checks.....');
        DB::statement("SET foreign_key_checks = 1");

        $this->command->info('Migrando Tabla clientes...');

        DB::statement('INSERT INTO clientes
(id,nombre,apellido,identificacion,email,telefono,visitas, esAgencia,credito)
SELECT
id,name,lastname,identification, email,phone,visitas,esAgencia,credit
FROM ptori_lar.clients');
        $this->command->info('Migrando Tabla elementos_de_menu...');
        DB::statement('
INSERT INTO elementos_de_menu
(nombre,nivel,id_padre,url,descripcion,publico,created_at,updated_at)
SELECT
name,level,parent_id,url,description,0,created_at,updated_at FROM ptori_lar.menuitems');
        $this->command->info('Migrando Tabla embarcaciones...');
        DB::statement('
        INSERT INTO embarcaciones
        (nombre,orden,publico,abordajeMinimo,abordajeMaximo,abordajeNormal,created_at,updated_at)
        SELECT
        `name`,`order`,`public`,`abordajeminimo`,`abordajemaximo`,`abordajenormal`,`created_at`,`updated_at`
        FROM ptori_lar.boats
        ');
        $this->command->info('Migrando Tabla fechas_especiales...');
        DB::statement('
        INSERT INTO fechas_especiales
        (fecha,clase,activa,descripcion,created_at,updated_at)
        SELECT
        date,class,active,description,created_at,updated_at
        FROM
        ptori_lar.specialdates
        ');
        $this->command->info('Creando Permisos Completos...');
        Permiso::create([
            'esAgencia'             => true,
            'cuposExtra'            => true,
            'accesoEdicionDePagina' => true,
            'editarEmbarcaciones'   => true,
            'editarPaseos'          => true,
            'consultarReservas'     => true,
            'editarPrecios'         => true,
        ]);
        $this->command->info('Migrando Tabla niveles_de_acceso...');
        DB::statement('
INSERT INTO
niveles_de_acceso
(nombre,descripcion,permiso_id, created_at,updated_at)
SELECT
name,description,1,created_at,updated_at
FROM
ptori_lar.accesslevels

');


        $this->command->info('Migrando Tabla pasajeros...');
        DB::statement('
        INSERT INTO
        pasajeros
        (id,nombre,apellido,identificacion,email,telefono,created_at,updated_at)
        SELECT
        id,name,lastname,identification,email,phone,created_at,updated_at
        FROM
        ptori_lar.passengers

        ');
        $this->command->info('Migrando Tabla paseos...');
        $this->command->info('Migrando Tabla tipos_de_paseos...');
        DB::statement('INSERT INTO
        tipos_de_paseos
        (nombre)
        Select DISTINCT
        description
         FROM
         ptori_lar.prices');
        DB::statement('
        INSERT INTO
        paseos
        (horaDeSalida,nombre,orden,publico,lunes,martes,miercoles,jueves,viernes,sabado,domingo,descripcion,
        tipo_de_paseo_id,created_at,updated_at)
        SELECT
        `departure`,`name`,`order`,`public`,`lunes`,`martes`,`miercoles`,`jueves`,`viernes`,`sabado`,`domingo`,
        `descripcion`,IF(`name`="Playa", 1, 2) as tipo_de_paseo_id,`created_at`,`updated_at`
        FROM
        ptori_lar.tours
        ');
        $this->command->info('Migrando Tabla precios...');
        DB::statement('
        INSERT INTO
        precios
        (adulto,mayor,nino,tipo_de_paseo_id,aplicar_desde,created_at,updated_at)
        SELECT
        adult, older, child,IF(description="1 hora", 2, 1) as tipo_de_paseo_id,created_at,created_at,updated_at
        FROM
        ptori_lar.prices
            ');

        $this->command->info('Migrando Tabla tipos_de_pagos...');
        DB::statement('
        INSERT INTO
        tipos_de_pagos
        (nombre,descripcion)
        SELECT
        name,description
        FROM
        ptori_lar.paymenttypes
        ');
        $this->command->info('Migrando Tabla users...');
        DB::statement('
        INSERT INTO
        users
        (id,nombre,usuario,email,password,nivel_de_acceso_id)
        SELECT
        id,name,name,email,password,1
        FROM
        ptori_lar.users
        ');
        $this->command->info('Migrando Tabla variables...');
        DB::statement('
        INSERT INTO
        variables
        (nombre,valor)
        SELECT
        `name`,`value`
        FROM
        ptori_lar.variables
        ');
        $this->command->info('Migrando Tabla estados_de_los_pagos...');
        DB::statement('
        INSERT INTO
        estados_de_los_pagos
        (nombre,descripcion,created_at,updated_at)
        SELECT
        name,description,created_at,updated_at
        FROM
        ptori_lar.paymentstatus
        ');
        $this->command->info('Migrando Tabla reservaciones...');
        $reservaciones = DB::table('ptori_lar.reservations')->get();
        $reservacionesCantidad = DB::table('ptori_lar.reservations')->count();
        $i = 0;
        foreach ($reservaciones as $reservacion)
        {
            $i++;
            $this->command->info('Migrando Tabla Reservaciones...' . $i / $reservacionesCantidad . ' % id '
                . $reservacion->id);

            App\Reservacion::create([
                'id'             => $reservacion->id,
                'fecha'          => $reservacion->date,
                'cliente_id'     => $reservacion->client_id,
                'embarcacion_id' => $reservacion->boat_id,
                'paseo_id'       => $reservacion->tour_id,
                'adultos'        => $reservacion->adults,
                'mayores'        => $reservacion->olders,
                'ninos'          => $reservacion->childs,
                'modificadoPor'  => 'migracion',
                'hechoPor'       => $reservacion->madeBy,
            ]);
        }

        $this->command->info('Migrando Tabla embarcacion_paseo...');
        DB::statement('
        INSERT INTO
        embarcacion_paseo
        (embarcacion_id,paseo_id,created_at,updated_at)
        SELECT
        boat_id,tour_id,created_at,updated_at
        FROM
        ptori_lar.boat_tour
        ');

        $this->command->info('Agregando Fechas Especiales a Tabla Pivote...');

        $fechasEspeciales = App\FechaEspecial::all();
        $embarcaciones = App\Embarcacion::lists('id');
        foreach ($embarcaciones as $embarcacion)
        {
            foreach ($fechasEspeciales as $fecha)
            {
                $fecha->embarcaciones()->attach([$embarcacion => ['activa' => $fecha->activa]]);
            }
        }
        $this->command->info('Migrando Tabla mercadopago...');

        $mercadopagos = DB::table('ptori_lar.mercadopagos')->get();
        $mercadopagosCantidad = DB::table('ptori_lar.mercadopagos')->count();
        $i = 0;
        foreach ($mercadopagos as $mercadopago)
        {
            $i++;
            $this->command->info('Migrando Tabla mercadopago...' . $i / $mercadopagosCantidad . ' %');
            //$this->command->info('Migrando Tabla pagos_directos...' . $mercadopago->id);
            if ($mercadopago->status == 'approved')
            {
                App\Mercadopago::create([
                    'idMercadoPago'           => $mercadopago->idMercadoPago,
                    'site_id'                 => $mercadopago->site_id,
                    'operation_type'          => $mercadopago->operation_type,
                    'order_id'                => $mercadopago->order_id,
                    'external_reference'      => $mercadopago->external_reference,
                    'status'                  => $mercadopago->status,
                    'status_detail'           => $mercadopago->status_detail,
                    'payment_type'            => $mercadopago->payment_type,
                    'date_created'            => $mercadopago->date_created,
                    'last_modified'           => $mercadopago->last_modified,
                    'date_approved'           => $mercadopago->date_approved,
                    'money_release_date'      => $mercadopago->money_release_date,
                    'currency_id'             => $mercadopago->currency_id,
                    'transaction_amount'      => $mercadopago->transaction_amount,
                    'shipping_cost'           => $mercadopago->shipping_cost,
                    'finance_charge'          => $mercadopago->finance_charge,
                    'total_paid_amount'       => $mercadopago->total_paid_amount,
                    'net_received_amount'     => $mercadopago->net_received_amount,
                    'reason'                  => $mercadopago->reason,
                    'payerId'                 => $mercadopago->payerId,
                    'payerfirst_name'         => $mercadopago->payerfirst_name,
                    'payerlast_name'          => $mercadopago->payerlast_name,
                    'payeremail'              => $mercadopago->payeremail,
                    'payernickname'           => $mercadopago->payernickname,
                    'phonearea_code'          => $mercadopago->phonearea_code,
                    'phonenumber'             => $mercadopago->phonenumber,
                    'phoneextension'          => $mercadopago->phoneextension,
                    'collectorid'             => $mercadopago->collectorid,
                    'collectorfirst_name'     => $mercadopago->collectorfirst_name,
                    'collectorlast_name'      => $mercadopago->collectorlast_name,
                    'collectoremail'          => $mercadopago->collectoremail,
                    'collectornickname'       => $mercadopago->collectornickname,
                    'collectorphonearea_code' => $mercadopago->collectorphonearea_code,
                    'collectorphonenumber'    => $mercadopago->collectorphonenumber,
                    'collectorphoneextension' => $mercadopago->collectorphoneextension,
                ]);
            }
        }
        $this->command->info('Migrando Tabla pagos_directos...');

        $pagosDirectos = DB::table('ptori_lar.payments')->get();
        $pagosDirectosCantidad = DB::table('ptori_lar.payments')->count();
        $i = 0;


        foreach ($pagosDirectos as $pagoDirecto)
        {
            $i++;
            $this->command->info('Migrando Tabla pagos_directos...' . $i / $pagosDirectosCantidad);
            if (is_null($pagoDirecto->paymenttype_id))
            {
                $pagoDirecto->paymenttype_id = 1;
            }
            App\PagoDirecto::create([
                'fecha'           => $pagoDirecto->date,
                'monto'           => $pagoDirecto->ammount,
                'descripcion'     => $pagoDirecto->description,
                'reservacion_id'  => $pagoDirecto->reservation_id,
                'tipo_de_pago_id' => $pagoDirecto->paymenttype_id,
            ]);
        }


        DB::statement('UPDATE clientes SET credito =0');
        DB::statement('update pagos set monto=0 where monto<0');
        $pagosConmontocero = \App\Pago::whereMonto(0)->delete();
    }
}