<?php

function setActive($nombreRuta)
{
    return request()->routeIs($nombreRuta) ? 'active' : '';
}
?>
