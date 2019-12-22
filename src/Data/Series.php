<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 19/12/2019
 * Time: 08:39
 */

namespace devfym\IntelliPHP\Data;


class Series
{
    private $data;

    public function __construct()
    {
        //
    }

    public function setList($l = []) : void
    {
        $this->data = $l;
    }

    public function getList() : array
    {
        return $this->data;
    }

    public function mean() : float
    {
        return round(array_sum($this->data) / count($this->data), 2);
    }
}