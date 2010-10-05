{*
 +--------------------------------------------------------------------+
 | CiviCRM version 3.1                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2010                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*}
{if $form.address.$blockId.street_address}
    <tr id="streetAddress_{$blockId}">
        <td colspan="2">
           <strong>{$form.address.$blockId.street_address.label}</strong><br />
           {$form.address.$blockId.street_address.html}
        {if $parseStreetAddress eq 1 && $action eq 2}
           &nbsp;&nbsp;<a href="#" title="{ts}Edit Address Elements{/ts}" onClick="processAddressFields( 'addressElements' , '{$blockId}', 1 );return false;">{ts}Edit Address Elements{/ts}</a>
           {help id="id-edit-street-elements" file="CRM/Contact/Form/Contact.hlp"}
        {/if}
        <br />
        <span class="description font-italic">{ts}Street number, street name, apartment/unit/suite - OR P.O. box{/ts}</span>
        </td>
    </tr>
        
    {if $parseStreetAddress eq 1 && $action eq 2}
           <tr id="addressElements_{$blockId}" class=hiddenElement>
               <td>
                  {$form.address.$blockId.street_number.label}<br />
                  {$form.address.$blockId.street_number.html}
                </td>
           
               <td>
                  {$form.address.$blockId.street_name.label}<br />
                  {$form.address.$blockId.street_name.html}<br />
               </td>
               
               <td colspan="2">
                  {$form.address.$blockId.street_unit.label}x<br />       
                  {$form.address.$blockId.street_unit.html}
                  <a href="#" title="{ts}Edit Street Address{/ts}" onClick="processAddressFields( 'streetAddress', '{$blockId}', 1 );return false;">{ts}Edit Complete Street Address{/ts}</a>
                  {help id="id-edit-complete-street" file="CRM/Contact/Form/Contact.hlp"} 
               </td>
           </tr>
    {/if}

<!--{if $smarty.get.lcd eq 1}{$allAddressFieldValues}{/if}-->

{if $parseStreetAddress eq 1}
{literal}
<script type="text/javascript">
function processAddressFields( name, blockId, loadData ) {

	if ( loadData ) { 
        var allAddressValues = {/literal}{if $allAddressFieldValues}{$allAddressFieldValues}{else}''{/if}{literal};
	    var streetName   	 = eval( "allAddressValues.street_name_"    + blockId );
			if (streetName == null) { streetName = ''; }
	    var streetUnit    	 = eval( "allAddressValues.street_unit_"    + blockId );
			if (streetUnit == null) { streetUnit = ''; }
	    var streetNumber  	 = eval( "allAddressValues.street_number_"  + blockId );
			if (streetNumber == null) { streetNumber = ''; }
	    var streetAddress 	 = eval( "allAddressValues.street_address_" + blockId );
			if (streetAddress == null) { streetAddress = ''; }
		
		//http://senatedev.senate.state.ny.us/issues/show/2367
		/*var suppAddress1 	 = eval( "allAddressValues.supplemental_address_1_" + blockId ).toUpperCase(); //NYSS - LCD
			if (suppAddress1 == null) { suppAddress1 = ''; }
		var suppAddress2 	 = eval( "allAddressValues.supplemental_address_2_" + blockId ).toUpperCase(); //NYSS - LCD
			if (suppAddress2 == null) { suppAddress2 = ''; }*/
	}

	var showBlockName = '';
	var hideBlockName = '';

    if ( name == 'addressElements' ) {
    	if ( loadData ) {
	    	streetAddress = '';
	    } 
		/*{/literal}{if $smarty.get.lcd eq 1}{literal}alert(streetAddress);{/literal}{/if}{literal}*/
    	showBlockName = 'addressElements_' + blockId;		   
		hideBlockName = 'streetAddress_' + blockId;
	} else {
        if ( loadData ) {
        	streetNumber = streetName = streetUnit = ''; 
        }
		showBlockName = 'streetAddress_' + blockId;
        hideBlockName = 'addressElements_'+ blockId;
    }

    show( showBlockName );
    hide( hideBlockName );

    // set the values.
    if ( loadData ) {
    	cj( '#address_' + blockId +'_street_name'    ).val( streetName    );   
        cj( '#address_' + blockId +'_street_unit'    ).val( streetUnit    );
        cj( '#address_' + blockId +'_street_number'  ).val( streetNumber  );
        cj( '#address_' + blockId +'_street_address' ).val( streetAddress );
        /*cj( '#address_' + blockId +'_supplemental_address_1' ).val( suppAddress1 ); //NYSS - LCD
        cj( '#address_' + blockId +'_supplemental_address_2' ).val( suppAddress2 ); //NYSS - LCD*/
    }
}

</script>
{/literal}
{/if}
{/if}

