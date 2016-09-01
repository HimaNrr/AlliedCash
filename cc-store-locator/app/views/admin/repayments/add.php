<h2>Add Repayment</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('borrow_amount', array('label' => 'Borrow')); ?>
<?php echo $this->form->input('payback_amount', array('label' => 'Payback')); ?>

<?php echo $this->form->end('Add'); ?>