<div align="center">
    <h2><{$smarty.const._MA_ONLINEHISTORY_NAME}></h2>
    <br />
    <{$timelife}>
</div>
<br />
<table width="100%" summary="<{$smarty.const._MA_ONLINEHISTORY_NAME}>">
  <tr>
    <th>&nbsp;</th>
    <th><{$smarty.const._MA_ONLINEHISTORY_USERNAME}></th>
    <th><{$smarty.const._MA_ONLINEHISTORY_DATE}></th>
    <th><{$smarty.const._MA_ONLINEHISTORY_IP}></th>
    <th><{$smarty.const._MA_ONLINEHISTORY_WHO}></th>
  </tr>
  <{foreach item=onliner from=$onlines name=ocount}>
    <tr class="<{cycle values='even,odd'}>">
      <td><{$smarty.foreach.ocount.iteration}></td>
      <td><a href="<{$xoops_url}>/userinfo.php?uid=<{$onliner.uid}>"><{$onliner.name}></a></td>
      <td><{$onliner.time}></td>
      <td>
        <{if $xoops_isadmin}>
          <a href="http://www.geoiptool.com/?IP=<{$onliner.ip}>" target="_blank"><{$onliner.ip}></a>
        <{else}>
          &nbsp;
        <{/if}>
      </td>
      <td><{if $onliner.online}><{$onliner.modul}><{/if}></td>
    </tr>
  <{/foreach}>
</table>
<br />
<{if $pagenav}><{$pagenav}><{/if}>
