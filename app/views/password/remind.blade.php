<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 10.09.15
 * Time: 15:36
 */ ?>

<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Send Reminder">
</form>

