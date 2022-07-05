<?php
session_start();
session_destroy();
echo "<sript>alert('Anda Telah Logout');</script>";
echo "<sript>location='../login.php';</script>";
header('Location: ../../index.php');
