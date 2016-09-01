<h2>Edit Repayment</h2>

<?php echo $this->html->admin_link('<< Repayment list >>', array('controller' => 'repayments', 'action' => 'index')); ?>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('borrow_amount', array('label' => 'Borrow')); ?>
<?php echo $this->form->input('payback_amount', array('label' => 'Payback')); ?>

<?php echo $this->form->end('Update'); ?>