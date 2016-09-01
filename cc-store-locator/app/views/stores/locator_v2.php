<link rel="stylesheet" href="<?php echo mvc_css_url('cc-store-locator', 'styles');?>" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAYy19t-FV_JDiYDSEjqpjCRS-RFP52VEL9LKI63ZLO7KzJtzkpBTajktb8GQ4nTKeIbDVxCaV8VGgOw"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'maps.streetviewcontrol');?>"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'validate');?>"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'jsrr');?>"></script>
<script type="text/javascript" lang="javascript">
    var pluginURL = '<?php echo MvcRouter::public_url(array( 'controller' => 'stores' )); ?>';
</script>
<h2>Store Locator</h2>
<div class="map_content">
    <div class="border_map_option">
        <label for="addressInput">Postal Code:</label> <input type="text" id="addressInput"/>
        
        <label for="radiusSelect">Radius:</label> <select id="radiusSelect">
            <option value="25">25</option>
            <option value="100" selected>100</option>
            <option value="200">200</option>
        </select>
            
        <input type="button" value="Search Stores" onclick="searchLocations()" class="button_map"/>
    </div>
    <div class="border_map">
        <table cellspacing="0" height="500px" cellpadding="0">
            <tbody> 
                <tr>
                    <td class="results_content">
                        <div id="map_results"></div>
                    </td>
                    <td width="100%"><div id="map" style="height: 500px;"></div> </td>
                </tr> 
            </tbody>
        </table>
    </div>
    <script type="text/javascript" language="javascript">
        loadGM();
    </script>
</div>