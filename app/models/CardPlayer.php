<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.09.15
 * Time: 14:47
 */

class CardPlayer extends Eloquent {

    protected $table = 'cardPlayers';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function role(){
        return $this->belongsTo('CardRole', 'role_id', 'id');
    }

    public function card(){
        return $this->belongsTo('Card', 'type_id', 'id');
    }
}