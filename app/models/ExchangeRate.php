<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.09.15
 * Time: 15:13
 */

class ExchangeRate extends Eloquent {

    protected $table = 'exchange_rate';
    protected $primaryKey = 'id';
    protected $guarded = array();


}