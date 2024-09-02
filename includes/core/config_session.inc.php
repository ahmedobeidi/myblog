<?php

// Preparing session parameters;
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
   'lifetime' => 1800,
   'domain' => 'localhost',
   'path' => '/',
   'secure' => true,
   'httponly' => true
]);

session_start();

// Regenerate new session id every 30 minute;
if (!isset($_SESSION['last_regeneration']))
{
   regenerateSessionID();  
}
else
{
   $interval = 60 * 30;
   if (time() - $_SESSION['last_regeneration'] >= $interval)
   {
      regenerateSessionID();
   }
}

function regenerateSessionID()
{
   session_regenerate_id();
   $_SESSION['last_regeneration'] = time();
}