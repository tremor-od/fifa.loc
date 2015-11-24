<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.08.15
 * Time: 12:01
 */

class PackStatistic extends Eloquent {


    protected $table = 'packStatistic';
    protected $primaryKey = 'id';
    protected $guarded = array();


    public function pack(){
        return $this->belongsTo('Pack', 'pack_id', 'id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }
}