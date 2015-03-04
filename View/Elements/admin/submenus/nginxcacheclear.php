<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.8.1
  * @license    MIT lincense
  *
  */
?>
<tr>
    <th><?php echo __d('ngxcc_ja', 'Management menu'); ?></th>
    <td>
        <ul class="cleafix">
            <li>
                <?php echo $this->bcBaser->link(__d('ngxcc_ja', 'Nginx Cache Directory Update Management'), array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?>
            </li>
            <li>
                <?php echo $this->bcBaser->link(__d('ngxcc_ja', 'Localizing into Japanese'), array('controller'=>'nginxcacheclear', 'action'=>'setlocale')); ?>
            </li>
            <li>
                <?php echo $this->bcBaser->link(__d('ngxcc_ja', 'Locale Delete'), array('controller'=>'nginxcacheclear', 'action'=>'dellocale')); ?>
            </li>
        </ul>
    </td>
</tr>
