<?php
/**
  * Nginx Cache Clear Plugin.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  NginxCacheClear.config
  * @since			  v 1.5.0
  * @license      MIT lincense
  *
  */
  <tr>
    <th>管理メニュー</th>
    <td>
      <ul class="cleafix">
        <li>
          <?php echo $this->bcBaser->link('キャッシュディレクトリ名の変更', array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?>
        </li>
        <li>
          <?php echo $this->bcBaser->link('Nginxキャッシュ削除', array('controller'=>'nginxcacheclear', 'action'=>'clear')); ?>
        </li>
      </ul>
    </td>
  </tr>
