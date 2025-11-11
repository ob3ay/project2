<?php


function vat($price,$vat=0.42){
    return $price+($price*$vat);
}
