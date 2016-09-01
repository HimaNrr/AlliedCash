<h2>Edit Market Comparison</h2>

<?php echo $this->html->admin_link('<< Comparisons list >>', array('controller' => 'comparisons', 'action' => 'index')); ?>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('retailer', array('label' => 'Retailer')); ?>
<?php echo $this->form->input('euro', array('label' => 'Euro')); ?>
<?php echo $this->form->input('us_dollar', array('label' => 'US Dollar')); ?>
<?php //echo $this->form->input('date_updated', array('label' => 'Updated Date')); ?>
<?php echo $this->form->checkbox_input('compare_flag', array('label' => 'Compare Market')); ?>

<?php echo $this->form->end('Update'); ?>