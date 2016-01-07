<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('start_end_week'))
{
    function start_end_week($year, $week)
    {
        $dto = new DateTime();
        $date['start'] = $dto->setISODate($year, $week)->format('Y-m-d');
        $date['end'] = $dto->modify('+6 days')->format('Y-m-d');

        return $date;
    }
}
