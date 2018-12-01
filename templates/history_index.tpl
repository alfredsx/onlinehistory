<link rel="stylesheet" href='<{xoAppUrl}>modules/onlinehistory/assets/css/onlinehistory.css' type="text/css" />
<{if $breadcrumb}>
	<ol class="breadcrumb">
		<{$breadcrumb}>
	</ol>
<{/if}>
<br class="clear"/>

<div align="center">
    <h2><{$smarty.const._MA_ONLINEHISTORY_NAME}></h2>
    <small><{$timelife}></small>
</div>
<br class="clear"/>

<div class="col-md-12 bg-onlinehostory">
	<div class="col-md-2"><{$smarty.const._MA_ONLINEHISTORY_USERNAME}></div>
	<div class="col-md-3"><{$smarty.const._MA_ONLINEHISTORY_DATE}></div>
	<div class="col-md-2"><{$smarty.const._MA_ONLINEHISTORY_IP}></div>
	<div class="col-md-5"><{$smarty.const._MA_ONLINEHISTORY_WHO}></div>
</div>

<{foreach item=onliner from=$onlines name=ocount}>
	<div class="col-md-12 bg-onlinehostory <{cycle values='even,odd'}>">	
		<div class="col-md-2"><{if $onliner.uid > 0}><a href="<{$xoops_url}>/userinfo.php?uid=<{$onliner.uid}>"><{$onliner.name}></a><{else}><{$onliner.uid}><{/if}></div>
		<div class="col-md-3"><{$onliner.time}></div>
		<div class="col-md-2"><{if $xoops_isadmin}><a href="http://www.geoiptool.com/?IP=<{$onliner.ip}>" target="_blank"><{$onliner.ip}></a><{/if}></div>
		<div class="col-md-5"><{if $onliner.online}><{$onliner.modul}><{/if}></div>
	</div>
<{/foreach}>

<br class="clear"/>
<{if $pagenav}><{$pagenav}><{/if}>
<br class="clear"/>
