<?php
//require "fzaninotto/faker"
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
            'pasajeros',
            'paseos',
            'precios',
            'reservaciones',
            'tipos_de_pagos',
            'users',
            'variables'];
        foreach ($tablas as $tabla)
        {
            DB::statement("TRUNCATE " . $tabla);
        }
        DB::statement('INSERT INTO clientes  (nombre,apellido,identificacion,email,telefono,visitas,
      esAgencia,credito) SELECT name,lastname,identification,email,phone,visitas,esAgencia,credit FROM ptori_lar
      .clients');
        DB::statement('
INSERT INTO elementos_de_menu
(nombre,nivel,id_padre,url,descripcion,publico,created_at,updated_at)
SELECT
name,level,parent_id,url,description,0,created_at,updated_at FROM ptori_lar.menuitems');
        DB::statement('
        INSERT INTO embarcaciones
        (nombre,orden,publico,abordajeMinimo,abordajeMaximo,abordajeNormal,created_at,updated_at)
        SELECT
        `name`,`order`,`public`,`abordajeminimo`,`abordajemaximo`,`abordajenormal`,`created_at`,`updated_at`
        FROM ptori_lar.boats
        ');
        DB::statement('
        INSERT INTO fechas_especiales
        (fecha,clase,activa,descripcion,created_at,updated_at)
        SELECT
        date,class,active,description,created_at,updated_at
        FROM
        ptori_lar.specialdates
        ');
        DB::statement('INSERT INTO mercadopagos SELECT * FROM `ptori_lar`.`mercadopagos`');
        DB::statement('
INSERT INTO
niveles_de_acceso
(nombre,descripcion,created_at,updated_at)
SELECT
name,description,created_at,updated_at
FROM
ptori_lar.accesslevels

');
        DB::statement('
        INSERT INTO
        pagos
        (fecha,monto,descripcion,created_at,updated_at)
        SELECT
        date,ammount,description,created_at,updated_at
        FROM
        ptori_lar.payments
        ');
        DB::statement('
        INSERT INTO
        pasajeros
        (nombre,apellido,identificacion,email,telefono,created_at,updated_at)
        SELECT
        name,lastname,identification,email,phone,created_at,updated_at
        FROM
        ptori_lar.passengers

        ');
        DB::statement('
        INSERT INTO
        paseos
        (horaDeSalida,nombre,orden,publico,lunes,martes,miercoles,jueves,viernes,sabado,domingo,descripcion,
        created_at,updated_at)
        SELECT
        `departure`,`name`,`order`,`public`,`lunes`,`martes`,`miercoles`,`jueves`,`viernes`,`sabado`,`domingo`,`descripcion`,`created_at`,
        `updated_at`
        FROM
        ptori_lar.tours
        ');
        DB::statement('
        INSERT INTO
        precios
        (descripcion,adulto,mayor,nino,created_at,updated_at)
        SELECT
        description,adult, older, child,created_at,updated_at
        FROM
        ptori_lar.prices
            ');

        DB::statement('
        INSERT INTO
        reservaciones
        (fecha,adultos, mayores, ninos,montoTotal,confirmado,hechoPor,modificadoPor, notas,deleted_at, created_at,
        updated_at)
        SELECT
        `date`,`adults`,`olders`,`childs`,`totalAmmount`,`confirmed`,`madeBy`,`modifiedBy`,`references`,`deleted_at`,`created_at`,`updated_at`
        FROM
        ptori_lar.reservations
        ');
        DB::statement('
        INSERT INTO
        tipos_de_pagos
        (nombre,descripcion)
        SELECT
        name,description
        FROM
        ptori_lar.paymenttypes
        ');
        DB::statement('
        INSERT INTO
        users
        (name,email,password)
        SELECT
        name,email,password
        FROM
        ptori_lar.users
        ');
        DB::statement('
        INSERT INTO
        variables
        (nombre,valor)
        SELECT
        `name`,`value`
        FROM
        ptori_lar.variables
        ');
    }
}