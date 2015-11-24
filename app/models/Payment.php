<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.09.15
 * Time: 11:08
 */

class Payment extends Eloquent {

    protected $table = 'payment';
    protected $primaryKey = 'id';
    protected $guarded = array();

}