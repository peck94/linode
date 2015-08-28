<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
?>
<div class="site-about">
    <h1>About me</h1>
    <p>
        This is where I'd write something about me.
        However, that's boring, so I haven't gotten around to this yet.
        Stalkers, stay tuned!
    </p>
    
    <h1>About you</h1>
    <p>
        Let me tell you a few things about yourself.
    </p>
    <p>
        <strong>Your IP:</strong> <?= $ip; ?>
    </p>
</div>
