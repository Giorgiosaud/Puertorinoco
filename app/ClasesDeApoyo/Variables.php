<?php /**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 12/3/15
 * Time: 18:35
 */
namespace App\ClasesDeApoyo;


use App\Variable;

class Variables {

    /**
     * @var Variable
     */
    private $variable;

    function __construct()
    {
        $this->variable = Variable::all();
    }
    public function get($nombre){
        return get_class($this->variable->where('nombre',$nombre)->first()->valor);
    }

}