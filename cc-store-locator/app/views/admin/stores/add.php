<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'jsrr_backend');?>"></script>

<h2>Add Store</h2>

<?php echo $this->html->admin_link('<< Store list >>', array('controller' => 'stores', 'action' => 'index')); ?>
<table border="0">
    <tr>
        <td valign="top">
            <?php echo $this->form->create($model->name); ?>
            <?php echo $this->form->input('name', array('label' => 'Location')); ?>
            <fieldset style="border: 1px solid #333333; margin-bottom: 10px; margin-top: 10px; padding: 10px;">
                <legend style="font-weight: bold;">Store Address - Google Map</legend>
                <?php echo $this->form->input('address', array('label' => 'Address', 'style' => 'width: 400px;')); ?>
                <?php echo $this->form->input('city'); ?>
                <?php echo $this->form->input('state', array('label' => 'County')); ?>
                <?php echo $this->form->input('zip', array('style' => 'width: 80px;', 'label' => 'Post Code')); ?>
                <input type="button" name="btnCalculate" value="Find Address" style="color: green; background-color: #CCC;" onclick="findAddress();">
                <?php echo $this->form->input('latitude', array('readonly' => 'readonly')); ?>
                <?php echo $this->form->input('longitude', array('readonly' => 'readonly')); ?>
            </fieldset>
            
            <?php echo $this->form->input('phone', array('label' => 'Telephone')); ?>
            
            <?php echo $this->form->checkbox_input('deletion', array('label' => 'Deletion')); ?>
            <?php echo $this->form->input('openingHours', array('label' => 'Opening Hours', 'style' => 'width: 400px;')); ?>
            <?php echo $this->form->end('Add'); ?>
        </td>
        <td valign="top">
            <fieldset style="border: 1px solid #333333; margin-bottom: 10px; margin-top: 10px; padding: 10px;">
                <legend style="font-weight: bold;">Google Maps</legend>
                <p>
                    Click on "Find Address" button at the left side to update the marker on the map.<br/>
                    If you click on the marker you will see the address provided by Google, remember that Google<br/> address is only a reference for you.<br/>
                    The address displayed to the user will be the one you enter in the address field at the left side.<br/>
                    You can also drag and drop the marker on the map to update the location of the store.
                </p>
                <div id="map" style="height: 400px; width: 590px; "></div>
            </fieldset>
        </td>
    </tr>
</table>

<script type="text/javascript" language="javascript">
    loadGM();
</script>