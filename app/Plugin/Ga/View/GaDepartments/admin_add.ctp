<?php echo $this->extend('_form');?>

<?php echo $this->start('js');?>
<script src="/ga/js/department_add.js" type="text/javascript" charset="utf-8"></script>
<script>
  $(document).ready(function() { $("#MetaScope").select2(); });
</script>
<?php echo $this->end();?>
