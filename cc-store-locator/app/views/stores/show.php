<h2><?php echo $object->name; ?></h2>
 
<?php
    echo '<div>'.$object->address1.'</div>';
    if (!empty($object->address2)) {
        echo '<div>'.$object->address2.'</div>';
    }
    echo '<div>'.$object->city.', '.$object->state.', '.$object->zip.'</div>';
?>

<p>
	<?php echo $this->html->link('&#8592; All Stores', array('controller' => 'stores')); ?>
</p>