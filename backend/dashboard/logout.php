<?php
session_start();
unset($_SESSION);

header('Location: ' . $site_url .'/backend/dashboard/index.php');
