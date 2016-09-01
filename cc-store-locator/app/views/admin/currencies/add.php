<h2>Add Currency Rate</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('currency_code', array('label' => 'Currency Code')); ?>
<?php echo $this->form->input('currency_description', array('label' => 'Currency Description', 'style' => 'width: 400px;')); ?>
<?php echo $this->form->input('buyback_rate', array('label' => 'Currency Buy Back Rate')); ?>
<?php echo $this->form->input('sell_rate', array('label' => 'Currency Sell Rate')); ?>
<?php //echo $this->form->input('date_updated', array('label' => 'Updated Date')); ?>
<?php echo $this->form->end('Add'); ?>