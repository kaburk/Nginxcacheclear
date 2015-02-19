<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.4.0
    * @license      MIT lincense
    *
    */
?>
<strong>Nginxcacheclear Edit Directory.</strong><br />
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
<table>
  <tr>
    <td><?php echo $this->bcForm->text('Nginxcacheclear.Cachedir'); ?></td>
  </tr>
</table>
<div class="submit">
  <?php echo $this->bcForm->submit('保存',array('class'=>'button')); ?>
</div>
<?php echo $this->bcForm->end(); ?>
