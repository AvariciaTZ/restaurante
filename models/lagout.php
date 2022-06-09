<?php
session_start();

session_destroy();

//redireccionamiento
header("Location: /views/iniciarsesion.php");
