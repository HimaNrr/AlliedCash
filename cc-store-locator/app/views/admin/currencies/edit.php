<h2>Edit Currency Rate</h2>
<?php echo $this->html->admin_link('<< Currency list >>', array('controller' => 'currencies', 'action' => 'index')); ?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->html->object_link($object, array('controller' => 'currencies', 'text' => '<< View >>', 'target' => '_blank')); ?>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('currency_code', array('label' => 'Currency Code')); ?>
<?php echo $this->form->input('currency_description', array('label' => 'Currency Description', 'style' => 'width: 400px;')); ?>
<?php echo $this->form->input('buyback_rate', array('label' => 'Currency Buy Back Rate')); ?>
<?php echo $this->form->input('sell_rate', array('label' => 'Currency Sell Rate')); ?>
<?php //echo $this->form->input('date_updated', array('label' => 'Updated Date')); ?>
<?php echo $this->form->end('Update'); ?>