<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 15:50
 */

class Page extends Eloquent {

    protected $table = 'pages';
    protected $primaryKey = 'pag_id';
    protected $guarded = array();
    public $timestamps = false;

}