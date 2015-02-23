<?php /**
 * Created by jorgelsaud.
 * User: jorgelsaud
 * Date: 23/2/15
 * Time: 11:47
 */
namespace App;


use Bootstrapper\Facades\Navbar;

class NavPto extends Navbar{
    const NAVBAR_PUERTORINOCO= 'navbar-puertorinoco';
    public function puertorinoco()
    {
        $this->setType(self::NAVBAR_PUERTORINOCO);

        return $this;
    }
}