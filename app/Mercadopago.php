<?php namespace App;

use App\Interfaces\atributosDePago;
use App\Traits\RegistrarPago;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Mercadopago
 *
 * @property integer $id
 * @property integer $idMercadoPago
 * @property string $site_id
 * @property string $operation_type
 * @property string $order_id
 * @property integer $external_reference
 * @property string $status
 * @property string $status_detail
 * @property string $payment_type
 * @property \Carbon\Carbon $date_created
 * @property string $last_modified
 * @property string $date_approved
 * @property string $money_release_date
 * @property string $currency_id
 * @property float $transaction_amount
 * @property string $shipping_cost
 * @property float $finance_charge
 * @property float $total_paid_amount
 * @property float $net_received_amount
 * @property string $reason
 * @property string $payerId
 * @property string $payerfirst_name
 * @property string $payerlast_name
 * @property string $payeremail
 * @property string $payernickname
 * @property string $phonearea_code
 * @property string $phonenumber
 * @property string $phoneextension
 * @property string $collectorid
 * @property string $collectorfirst_name
 * @property string $collectorlast_name
 * @property string $collectoremail
 * @property string $collectornickname
 * @property string $collectorphonearea_code
 * @property string $collectorphonenumber
 * @property string $collectorphoneextension
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Pago[] $pagos
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereIdMercadoPago($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereSiteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereOperationType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereOrderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereExternalReference($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereStatusDetail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePaymentType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereDateCreated($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereLastModified($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereDateApproved($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereMoneyReleaseDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCurrencyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereTransactionAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereShippingCost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereFinanceCharge($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereTotalPaidAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereNetReceivedAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePayerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePayerfirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePayerlastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePayeremail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePayernickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePhoneareaCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePhonenumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago wherePhoneextension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorfirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorlastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectoremail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectornickname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorphoneareaCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorphonenumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCollectorphoneextension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mercadopago whereUpdatedAt($value)
 */
class Mercadopago extends Model implements atributosDePago {

    use RegistrarPago;
    protected $fillable = ['idMercadoPago',
        'site_id',
        'operation_type',
        'order_id',
        'external_reference',
        'status',
        'status_detail',
        'payment_type',
        'date_created',
        'last_modified',
        'date_approved',
        'money_release_date',
        'currency_id',
        'transaction_amount',
        'shipping_cost',
        'finance_charge',
        'total_paid_amount',
        'net_received_amount',
        'reason',
        'payerId',
        'payerfirst_name',
        'payerlast_name',
        'payeremail',
        'payernickname',
        'phonearea_code',
        'phonenumber',
        'phoneextension',
        'collectorid',
        'collectorfirst_name',
        'collectorlast_name',
        'collectoremail',
        'collectornickname',
        'collectorphonearea_code',
        'collectorphonenumber',
        'collectorphoneextension',
    ];
    //protected $dates = [
    //    'date_created'
    //];

    public function pagos()
    {
        return $this->morphMany('App\Pago', 'pago');
    }

    public function getNumeroDeReservacionAttribute()
    {
        return $this->attributes['external_reference'];

    }

    public function getmontoPagadoAttribute()
    {
        return $this->attributes['transaction_amount'];

    }

    public function reserva()
    {
        // TODO: Implement reserva() method.
    }
}
