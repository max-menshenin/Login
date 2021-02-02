<?php
if (!empty($user)) {
    setcookie('user',$user['name'], time() - 3600,'/Login');
}
