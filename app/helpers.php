<?php

function totalCart()
{
    return \App\Models\Cart::count();
}