{*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.7                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2018                                |
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
{* this template is used for the dropdown menu of the "Actions" button on contacts. *}

<div id="crm-contact-actions-wrapper" data-edit-params='{ldelim}"cid": "{$contactId}", "class_name": "CRM_Contact_Page_Inline_Actions"{rdelim}'>
  {crmButton id="crm-contact-actions-link" href="#" icon="bars"}
    {ts}Actions{/ts}
  {/crmButton}
    {crmRegion name="contact-page-inline-actions"}
      <div class="ac_results" id="crm-contact-actions-list">
        <div class="crm-contact-actions-list-inner">
          <div class="crm-contact_activities-list">
          {include file="CRM/Activity/Form/ActivityLinks.tpl" as_select=false}
          </div>
          <div class="crm-contact_print-list">
            <ul class="contact-print">
              {foreach from=$actionsMenuList.otherActions item='row'}
                {if !empty($row.href) or !empty($row.tab)}
                <li class="crm-contact-{$row.ref}">
                  <a href="{if !empty($row.href)}{$row.href}{if strstr($row.href, '?')}&cid={$contactId}{/if}{else}#{/if}" title="{$row.title|escape}" data-tab="{$row.tab}" {if !empty($row.class)}class="{$row.class}"{/if}>
                    <span><i {if !empty($row.icon)}class="{$row.icon}"{/if}></i> {$row.title}</span>
                  </a>
                </li>
                {/if}
              {/foreach}
              {*NYSS 4715*}
              {* Check for permissions to provide Restore and Delete Permanently buttons for contacts that are in the trash. *}
              {if call_user_func(array('CRM_Core_Permission','check'), 'delete contacts')}
                {assign var='deleteParams' value=$urlParams|cat:"&reset=1&delete=1&cid=$contactId"}
                <li class="crm-contact-delete-action">
                  <a href="{crmURL p='civicrm/contact/view/delete' q=$deleteParams}" class="delete" title="{ts}Delete{/ts}">
                    <span><i class="crm-i fa-trash"></i> {ts}Delete Contact{/ts}</span>
                  </a>
                </li>
              {/if}
          </ul>
          </div>
          <div class="crm-contact_actions-list">
          <ul class="contact-actions">
            {foreach from=$actionsMenuList.moreActions item='row'}
            {if !empty($row.href) or !empty($row.tab)}
            <li class="crm-action-{$row.ref}">
              <a href="{if !empty($row.href)}{$row.href}{if strstr($row.href, '?')}&cid={$contactId}{/if}{else}#{/if}" title="{$row.title|escape}" data-tab="{$row.tab}" {if !empty($row.class)}class="{$row.class}"{/if}>{$row.title}</a>
            </li>
            {/if}
          {/foreach}
                </ul>
                </div>


          <div class="clear"></div>
        </div>
      </div>
    {/crmRegion}
  </div>
{literal}
{/literal}
