<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 17.09.15
 * Time: 16:24
 */

class DepositController extends HomeController {

    /*
     * Construct
     * @author Tremor
     */
    public function __construct(){

        parent::__construct();

        $this->check();
        $this->data['user'] = User::find(Auth::id());
    }

    /**
     *
     * @param $some
     * @return nothing
     * @author Tremor
     */
    public function index(){

        return View::make('deposit')->with($this->data);
    }
}