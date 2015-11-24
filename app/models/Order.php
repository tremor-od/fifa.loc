<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.09.15
 * Time: 15:04
 */

class Order extends Eloquent {

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function pack(){
        return $this->belongsTo('Pack', 'pack_id', 'id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }

}