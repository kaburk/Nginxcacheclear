<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.6.7
  * @license    MIT lincense
  *
  */
?>
    <tr>
        <th>管理メニュー</th>
        <td>
            <ul class="cleafix">
                <li>
                    <?php echo $this->bcBaser->link('Nginxキャッシュディレクトリ更新管理', array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?>
                </li>
            </ul>
        </td>
    </tr>
