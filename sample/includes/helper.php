<?php

function response($data){
    header('Content-Type: text/json');
    echo json_encode($data);
    exit;
}

function addToCart($title, $price){
    $data = array("title" => $title, "price" => $price);
    $_SESSION['cart'][] = $data;
}

function getCartDetails(){
    return array('code'=>200, 'items' => count($_SESSION['cart']), 'price' => calculateCartPrice());
}

function calculateCartPrice(){
    $price = 0;
    foreach(getCart() as $item){
        $price += $item['price'];
    }

    return $price;
}

function getCart() {
    return isset($_SESSION['cart'])?$_SESSION['cart']: array();
}

function isLoggedIn(){
    return isset($_SESSION['email']) && !empty($_SESSION['email']);
}

function getUserID(){
    return isLoggedIn() ? $_SESSION['email'] : null;
}

