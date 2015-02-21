<?php /**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 20/2/15
 * Time: 11:23
 */
namespace App;


class Consulta {
    static function Migrar($baseDeDatosAntigua, $prefijoAntiguo,$tablaAMigrarAntigua,$tablaAMigrarNueva,$prefijoNuevo){
        return "INSERT INTO ".env('DB_DATABASE', 'puertorinoco').".".$prefijoNuevo.$tablaAMigrarNueva." SELECT * FROM
         ".$baseDeDatosAntigua
            .".".$prefijoAntiguo.$tablaAMigrarAntigua;
    }
}