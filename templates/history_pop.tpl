<table class="page-content" width="100%">
    <tr class="even">
        <th colspan="2"><{$smarty.const._MA_ONLINEHISTORY_NAME}></th>
    </tr>
    <{foreach item=user from=$online_user}>
        <tr class="<{cycle values="odd,even"}>">
            <td align="left"><{$user.user}></td>
            <{if $xoops_isadmin != false}>
                <td align="right"><{$user.ip}></td>
            <{/if}>
            <td align="right"><{$user.module}></td>
        </tr>
    <{/foreach}>  
</table>
<{if $pagenav}>
    <div style="text-align: right;">
        <{$pagenav}>
    </div>
<{/if}>