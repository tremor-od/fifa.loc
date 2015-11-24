<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.08.15
 * Time: 11:34
 */

class Card extends Eloquent {

    protected $table = 'card';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function subType(){
        return $this->belongsTo('CardType', 'type_id', 'id');
    }

    public function role(){
        return $this->belongsTo('CardRole', 'role_id', 'id');
    }

    public function player(){
        return $this->hasMany('CardPlayer', 'type_id', 'id');
    }
}