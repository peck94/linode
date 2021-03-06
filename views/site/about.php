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
        <strong>Name:</strong> Peck
        <br>
        <strong>First name:</strong> Jonathan
        <br>
        <strong>Occupation:</strong> Student at <a href="http://www.ugent.be/">Ghent University</a>
        <br>
        <strong>Degrees:</strong>
        <ol>
            <li>Bachelor of Science in Computer Science (2015)</li>
        </ol>
        <br>
        <strong>Fields of interest:</strong>
        <ul>
            <li>Cryptography</li>
            <li>Machine learning</li>
            <li>Formal language theory</li>
            <li>Computability and complexity theory</li>
            <li>Numerical analysis</li>
        </ul>
    </p>
    
    <h1>About you</h1>
    <p>
        Let me tell you a few things about yourself.
    </p>
    <p>
        <strong>Your IP:</strong> <?= $ip; ?>
        <?php
            foreach(getallheaders() as $name => $value):
        ?>
        <br>
        <strong><?= htmlspecialchars($name) ?>:</strong> <kbd><?= htmlspecialchars($value) ?></kbd>
        <?php endforeach; ?>
        <pre><?= $whois ?></pre>
    </p>
</div>
