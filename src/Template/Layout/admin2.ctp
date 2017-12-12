<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $title_for_layout; ?></title>
  <?= $this->Html->script(array('jquery.min.js', 'jquery-ui.min.js', 'bootstrap.min.js' )) ?>
  
    </head>
    <body>
<?= $this->Flash->render() ?> 
<div class="container clearfix">
<?= $this->fetch('content') ?>
</div>

 </body>
</html>