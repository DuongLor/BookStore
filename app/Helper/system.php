<?php

function formatNumberPrice($number)
{
	return number_format($number, 0, '.', ',') . " VND";
}
function formatDate($date)
{
	if ($date != null) {
		return date('h:i | d-m-Y', strtotime($date));
	}
}
