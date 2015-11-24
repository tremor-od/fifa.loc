<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 13.08.15
 * Time: 12:33
 */

class Transaction extends Eloquent {

    protected $table = 'userTransactions';
    protected $primaryKey = 'id';
    protected $guarded = array();



    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function type(){
        return $this->hasOne('TransactionType', 'id', 'type_id');
    }

}