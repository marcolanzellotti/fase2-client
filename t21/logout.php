<?php
session_start();
session_destroy();

unset($_SESSION);
die(header("location: /login"));
