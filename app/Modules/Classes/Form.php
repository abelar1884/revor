<?php

namespace App\Modules\Classes;

class Form
{
    public static function open(array $args)
    {
        $file = $args['file']? 'enctype="multipart/form-data"': '';

        $class = array_key_exists('class',$args)? $args['class']: 'default';

        ?>
            <form action="<?= $args['url'] ?>" method="POST" <?= $file?> class="<?= $class?>">
            <?= csrf_field()?>
        <?php
    }

    public static function close()
    {
        ?>
            </form>
        <?php
    }
}