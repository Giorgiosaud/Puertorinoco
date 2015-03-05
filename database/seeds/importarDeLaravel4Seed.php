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

        DB::statement('INSERT INTO clientes  (nombre,apellido,identificacion,email,telefono,visitas,
      esAgencia,credito) SELECT name,lastname,identification,email,phone,visitas,esAgencia,credit FROM ptori_lar
      .clients');
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
        $this->command->info('Migrando Tabla mercadopagos...');
        DB::statement('INSERT INTO mercadopagos
(
idMercadoPago,
site_id,
operation_type,
order_id,
external_reference,
status,
status_detail,
payment_type,
date_created,
last_modified,
date_approved,
money_release_date,
currency_id,
transaction_amount,
shipping_cost,
finance_charge,
total_paid_amount,
net_received_amount,
reason,
payerId,
payerfirst_name,
payerlast_name,
payeremail,
payernickname,
phonearea_code,
phonenumber,
phoneextension,
collectorid,
collectorfirst_name,
collectorlast_name,
collectoremail,
collectornickname,
collectorphonearea_code,
collectorphonenumber,
collectorphoneextension,
deleted_at,
created_at,
updated_at)
 SELECT
idMercadoPago,
site_id,
operation_type,
order_id,
external_reference,
status,
status_detail,
payment_type,
concat(LEFT(`date_created` , 10)," ",SUBSTRING(`date_created`, 12, 8)) AS date_created,
concat(LEFT(`last_modified` , 10)," ",SUBSTRING(`last_modified`, 12, 8)) As last_modified,
concat(LEFT(`date_approved` , 10)," ",SUBSTRING(`date_approved`, 12, 8)) As date_approved,
concat(LEFT(`money_release_date` , 10)," ",SUBSTRING(`money_release_date`, 12, 8)) As money_release_date ,
currency_id,
transaction_amount,
shipping_cost,
finance_charge,
total_paid_amount,
net_received_amount,
reason,
payerId,
payerfirst_name,
payerlast_name,
payeremail,
payernickname,
phonearea_code,
phonenumber,
phoneextension,
collectorid,
collectorfirst_name,
collectorlast_name,
collectoremail,
collectornickname,
collectorphonearea_code,
collectorphonenumber,
collectorphoneextension,
deleted_at,
concat(LEFT(`date_created` , 10)," ",SUBSTRING(`date_created`, 12, 8)) AS created_at,
concat(LEFT(`last_modified` , 10)," ",SUBSTRING(`last_modified`, 12, 8)) As updated_at
FROM `ptori_lar`.`mercadopagos`');
        $this->command->info('Creando Permisos Completos...');
        Permiso::create([
        'esAgencia'=>true,
            'cuposExtra'=>true,
            'accesoEdicionDePagina'=>true
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
        $this->command->info('Migrando Tabla pagos_directos...');
        DB::statement('
        INSERT INTO
        pagos_directos
        (fecha,monto,descripcion,reservacion_id,tipo_de_pago_id,created_at,updated_at)
        SELECT
        date,ammount,description,reservation_id,paymenttype_id,created_at,updated_at
        FROM
        ptori_lar.payments
        ');
        $this->command->info('Migrando Tabla pasajeros...');
        DB::statement('
        INSERT INTO
        pasajeros
        (nombre,apellido,identificacion,email,telefono,created_at,updated_at)
        SELECT
        name,lastname,identification,email,phone,created_at,updated_at
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
        (adulto,mayor,nino,tipo_de_paseo_id,created_at,updated_at)
        SELECT
        adult, older, child,IF(description="1 hora", 2, 1) as tipo_de_paseo_id,created_at,updated_at
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
        (name,email,password,nivel_de_acceso_id)
        SELECT
        name,email,password,1
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
        DB::statement('
        INSERT INTO
        reservaciones
        (id,fecha,cliente_id,embarcacion_id,paseo_id,adultos, mayores, ninos,montoTotal,estado_del_pago_id,confirmado,
        hechoPor,modificadoPor,
        notas,
        deleted_at,
        created_at,
        updated_at)
        SELECT
        `id`,`date`,`client_id`,`boat_id`,`tour_id`,`adults`,`olders`,`childs`,`totalAmmount`,`paymentStatus_id`,
        `confirmed`,`madeBy`,
        `modifiedBy`,
        `references`,
        `deleted_at`,`created_at`,`updated_at`
        FROM
        ptori_lar.reservations
        ');
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
        $this->command->info('Agregando Pagos Directos como Pagos...');
        $pagosDirectos = App\PagoDirecto::all();
        foreach ($pagosDirectos as $pagoDirecto)
        {
            $pago = $pagoDirecto->pagos()->create(array('monto'          => $pagoDirecto->monto,
                                                        'created_at'     => $pagoDirecto->created_at,
                                                        'updated_at'     => $pagoDirecto->updated_at,
                                                        'reservacion_id' => $pagoDirecto->reservacion_id));
        }
        $this->command->info('Agregando Mercadopagos como Pagos...');
        $pagosMercadopagos = App\Mercadopago::all();
        foreach ($pagosMercadopagos as $pagoMercadoPago)
        {
            $pago = $pagoMercadoPago->pagos()->create(array('monto'          => $pagoMercadoPago->transaction_amount, 'created_at' => $pagoMercadoPago->created_at,
                                                            'updated_at'     => $pagoMercadoPago->updated_at,
                                                            'reservacion_id' => $pagoMercadoPago->order_id));
        }


        //DB::statement('
        //INSERT INTO
        //pagos
        //(monto,pago_id,pago_type,created_at,updated_at)
        //SELECT
        //monto,id,"App\\PagoDirecto",created_at,updated_at
        //FROM
        //pagos_directos
        //');
        //DB::statement('
        //INSERT INTO
        //pagos
        //(monto,pago_id,pago_type,created_at,updated_at)
        //SELECT
        //transaction_amount,id,"App\\Mercadopago",date_created,last_modified
        //FROM
        //mercadopagos
        //');
    }
}