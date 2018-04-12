<?php
require("star.php");

foreach($departments as $d):
    echo new_templater($d);
endforeach;
