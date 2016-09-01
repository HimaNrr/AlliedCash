<link rel="stylesheet" href="<?php echo mvc_css_url('cc-store-locator', 'styles');?>" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'validate');?>"></script>
<script type="text/javascript" src="<?php echo mvc_js_url('cc-store-locator', 'jsrr');?>"></script>
<script type="text/javascript" lang="javascript">
    var pluginURL = '<?php echo MvcRouter::public_url(array( 'controller' => 'stores' )); ?>';
</script>

<ul class="tabbed">
    <li class="active"><a name="store-locator">Store Locator</a></li>
</ul>

<div class="page shadow">
    <div class="box-container clearFix">
        <div class="map_content">
            <div class="border_map">
                <table cellspacing="0" height="400px" cellpadding="0">
                    <tbody> 
                        <tr>
                            <td class="results_content" rowspan="2">
                                <div id="map_results"></div>
                            </td>
                            <td width="100%">
                                <input type="text" id="addressInput" value="<?php echo $postCode;?>"/>
                                <input type="button" value="Find &gt;" onclick="searchLocations()" class="button_map"/><span class="smallMapText">Click on the icon to get directions.</span>
                            </td>
                        </tr> 
                        <tr>
                            <td width="100%" style="vertical-align: top;"><div id="map" style="height: 400px;"></div> </td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <script type="text/javascript" language="javascript">
                loadGM();
            </script>
        </div>
    </div>
</div>
<?php
if( $postCode ) {
?>
<script>
    $(document).ready(function() {
        searchLocations('<?php echo $postCode;?>');
    });
</script>
<?php
}
?>