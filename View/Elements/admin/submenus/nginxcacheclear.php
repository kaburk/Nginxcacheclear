<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.8.0
  * @license    MIT lincense
  *
  */
?>
    <tr>
        <th><?php echo __d('nginxcacheclear', 'Management menu'); ?></th>
        <td>
            <ul class="cleafix">
                <li>
                    <?php echo $this->bcBaser->link(__d('nginxcacheclear', 'Nginx Cache Directory Update Management'), array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?>
                </li>
            </ul>
        </td>
    </tr>
