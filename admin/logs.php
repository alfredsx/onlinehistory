<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright      {@link http://xoops.org/ XOOPS Project}
 * @license        {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package
 * @since
 * @author         XOOPS Development Team, Raul Recio (AKA UNFOR)
 */

use Xmf\Request;

include_once __DIR__ . '/admin_header.php';
xoops_cp_header();

$op = Request::getString('op', Request::getString('op', '', 'POST'), 'GET');

$history_handler = xoops_getModuleHandler('history','onlinehistory');

switch ($op) {
	case 'del':
		$confirm     = Request::getInt('confirm', '', 'POST');
		if ($confirm) {
            if (!$history_handler->deleteAll()) {
                redirect_header('logs.php', 4, _AM_ONLINEHISTORY_DELETELOGS_LOGERROR);
            }
            redirect_header('logs.php', 2, sprintf(_AM_ONLINEHISTORY_DELETELOGS_ISDELETED, $name));
        } else {
            //xoops_cp_header();
            xoops_confirm(array('op' => 'del', 'confirm' => 1), 'logs.php', _AM_ONLINEHISTORY_DELETELOGS );
            xoops_cp_footer();
        }
		break;
	case 'default':
    default:

		$indexAdmin = new ModuleAdmin();
		$indexAdmin->addItemButton(_DELETE . ' ' . _AM_ONLINEHISTORY_FORM, 'logs.php?op=del', 'delete', '');
		echo $indexAdmin->addNavigation(basename(__FILE__));
		echo $indexAdmin->renderButton('right', '');
		
		$history_total = $history_handler->getCount();
		$limit = ($history_total > $xoopsModuleConfig['viewlimit']) ? $xoopsModuleConfig['viewlimit'] : $history_total;

		$start = XoopsRequest::getInt('start', 0);

		$criteria = new CriteriaCompo();
		$criteria->setLimit($limit);
		$criteria->setStart($start);
		$criteria->setOrder('time');
		$criteria->setSort('time');
		$criteria->setOrder('DESC');
		$history = $history_handler->getOnline($criteria);
		$count = count($history);

		echo 	"<table class='outer width100' cellspacing='1'>
			<tr>
                <th class='center width2'></th>
				<th class='center width10'>" . _AM_ONLINEHISTORY_TIME . "</th>
                <th class='center width10'>" . _AM_ONLINEHISTORY_IP . "</th>
				<th class='center width23'>" . _AM_ONLINEHISTORY_UNAME . "</th>
                <th class='center'>" . _AM_ONLINEHISTORY_NAME . "</th>
                <th class='center width10'>" . _AM_ONLINEHISTORY_ACTION . "</th>
            </tr>";

		if ($count > 0) {
			$class = 'odd';
			foreach ($history as $onliner) {		
			echo "<tr class='" . $class . "'>  
				<td class='center width2'></td>
				<td class='center width10'>" . $onliner['time'] . "</td>
				<td class='center width10'>" . $onliner['ip'] . "</td>
				<td class='center width23'>" . $onliner['name'] . "</td>
				<td class='center'>" . $onliner['uagent'] . "</td>
				<td class='center width10'></td>
			</tr>";
			$class = ($class == 'even') ? 'odd' : 'even';
		}
	} else {
		echo "  <tr>   
				<td class='center width100'><br /><br />" . _AM_ONLINEHISTORY_NOENTRY . "</td>
			</tr>";            
	}
    
	echo "</table><br />";

	if ($history_total > $limit) {
		include_once XOOPS_ROOT_PATH . "/class/pagenav.php";
		$pagenav = new XoopsPageNav($history_total, $limit, $start, 'start', '');
		echo $pagenav->renderNav(5);
		echo "<br />";
	} 
	break;
}

include_once __DIR__ . '/admin_footer.php';
