{*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
*}
<div class="batch-update form-item">
<fieldset>
<div class="help">
    {ts}Update field values for each contribution as needed. Click <strong>Update Contributions</strong> below to save all your changes. To set a field to the same value for ALL rows, enter that value for the first contribution and then click the <strong>Copy icon</strong> (next to the column title).{/ts}
</div>
    <table class="crm-copy-fields">
    <thead class="sticky">
            <tr class="columnheader">
             {foreach from=$readOnlyFields item=fTitle key=fName}
              <th>{$fTitle}</th>
            {/foreach}

             {foreach from=$fields item=field key=fieldName}
                <td><img  src="{$config->resourceBase}i/copy.png" alt="{ts 1=$field.title}Click to copy %1 from row one to all rows.{/ts}" fname="{$field.name}" class="action-icon" title="{ts}Click here to copy the value in row one to ALL rows.{/ts}" />{$field.title}</td>
             {/foreach}
            </tr>
          </thead>
            {foreach from=$componentIds item=cid}
             <tr class="{cycle values="odd-row,even-row"}" entity_id="{$cid}">
        {foreach from=$readOnlyFields item=fTitle key=fName}
           <td>{$contactDetails.$cid.$fName}</td>
        {/foreach}

              {foreach from=$fields item=field key=fieldName}
                {assign var=n value=$field.name}
                 <td class="compressed">{$form.field.$cid.$n.html}</td>
              {/foreach}
             </tr>
            {/foreach}
           </tr>
         </table>
         <div class="crm-submit-buttons">{if $fields}{$form._qf_Batch_refresh.html}{/if} &nbsp; {$form.buttons.html}</div>
        </fieldset>
</div>

{*include batch copy js js file*}
{include file="CRM/common/batchCopy.tpl"}
