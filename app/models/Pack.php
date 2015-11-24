<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 14.08.15
 * Time: 13:03
 */

class Pack extends Eloquent {

    protected $table = 'pack';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function more(){

        return $this->hasMany('PackCardType', 'pack_id', 'id');
    }

    public function statisticList(){

        return $this->hasMany('PackStatistic', 'pack_id', 'id');
    }

}