<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.08.15
 * Time: 13:03
 */

class PackCardType extends Eloquent {


    protected $table = 'packCardType';
    protected $primaryKey = 'id';
    protected $guarded = array();


    public function card(){
        return $this->belongsTo('Card', 'card_id', 'id');
    }
}