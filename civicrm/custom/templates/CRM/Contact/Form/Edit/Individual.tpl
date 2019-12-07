{*
 +--------------------------------------------------------------------+
 | CiviCRM version 5                                                  |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2019                                |
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
{* tpl for building Individual related fields *}
<script type="text/javascript">
{literal}
CRM.$(function($) {
  if ($('#contact_sub_type *').length == 0) {//if they aren't any subtype we don't offer the option
    $('#contact_sub_type').parent().hide();
  }
});
</script>
{/literal}

{assign var=formtextbig value='crm-form-text big'}{*NYSS*}
<table class="form-layout-compressed individual-contact-details">
  <tr>
    {if $form.prefix_id}
    <td>
      {$form.prefix_id.label}<br/>
      {$form.prefix_id.html}
    </td>
    {/if}
    {if $form.formal_title}
    <td>
      {$form.formal_title.label}<br/>
      {$form.formal_title.html}
    </td>
    {/if}
    {if $form.first_name}
    <td>
      {$form.first_name.label}<br />
      {$form.first_name.html}
    </td>
    {/if}
    {if $form.middle_name}
    <td>
      {$form.middle_name.label}<br />
      {$form.middle_name.html}
    </td>
    {/if}
    {if $form.last_name}
    <td>
      {$form.last_name.label}<br />
      {$form.last_name.html}
    </td>
    {/if}
    {if $form.suffix_id}
    <td>
      {$form.suffix_id.label}<br/>
      {$form.suffix_id.html}
    </td>
    {/if}
  </tr>

  <tr>
    {*NYSS*}
	<td>
		{$form.nick_name.label}<br />
		{$form.nick_name.html|crmReplace:class:$formtextbig}
	</td>
	<td>
		{assign var='custom_42' value=$groupTree.1.fields.42.element_name}
    {$form.$custom_42.label}<br />
		{$form.$custom_42.html}                    
	</td>
	<td>
		{assign var='custom_60' value=$groupTree.1.fields.60.element_name}
    {$form.$custom_60.label}<br />
		{$form.$custom_60.html}                    
	</td>
	<td>
		Other {$form.contact_source.label}<br />
		{$form.contact_source.html|crmReplace:class:$formtextbig}
	</td>
    <td>
		{$form.external_identifier.label}<br />
		{$form.external_identifier.value}
    </td>
    <td>
		<label for="internal_identifier">{ts}Internal Id{/ts}</label><br />
		{$contactId}
    </td>
  </tr>
</table>
