<?php
/**
 * OnlineHistory module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code 
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         onlinehistory
 * @since           2.4.0
 * @author          Dirk Herrmann <dhcst@users.sourceforge.net>
 * @version         $Id: xoops_version.php 1 2009-11-29 20:00:00 dhcst $
 */

$modversion['name']         = _MI_ONLINEHISTORY_NAME;
$modversion['version']      = 1.3;
$modversion['description']  = _MI_ONLINEHISTORY_DESC;
$modversion['author']       = "";
$modversion['credits']      = "The XOOPS Project";
$modversion['help']         = "";
$modversion['license']      = "GPL see LICENSE";
$modversion['official']     = 1;
$modversion['image']        = "images/onlinehistory.gif";
$modversion['dirname']      = "onlinehistory";

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['onUpdate'] = "sql/update.php";

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = "lastseen";

// Admin things
$modversion['hasAdmin'] = 1;

// Templates
$modversion['templates'] = array();
$modversion['templates'][1]['file']         = 'history_index.html';
$modversion['templates'][1]['description']  = '';
$modversion['templates'][2]['file']         = 'history_pop.html';
$modversion['templates'][2]['description']  = '';


// Blocks
$modversion['blocks'][1]['file']        = "onlinehistory.php";
$modversion['blocks'][1]['name']        = _MI_ONLINEHISTORY_BNAME1;
$modversion['blocks'][1]['description'] = _MI_ONLINEHISTORY_BNAME1_DESC;
$modversion['blocks'][1]['show_func']   = "b_onlinehistory_show";
$modversion['blocks'][1]['edit_func']   = "b_onlinehistory_edit";
$modversion['blocks'][1]['options']     = "1|10|20|0";
$modversion['blocks'][1]['template']    = 'history_block_online.html';

$modversion['blocks'][2]['file']	    = "onlinehistory.php";
$modversion['blocks'][2]['name']	    = _MI_ONLINEHISTORY_BNAME2;
$modversion['blocks'][2]['description']	= _MI_ONLINEHISTORY_BNAME2_DESC;
$modversion['blocks'][2]['show_func']	= "b_onlinehistory_checkshow";
$modversion['blocks'][2]['edit_func']   = "b_onlinehistory_checkedit";
$modversion['blocks'][2]['options']	    = '5|7';

// Menu
$modversion['hasMain'] = 1;

$i=0;
$modversion['config'][$i]['name']           = 'timelife';
$modversion['config'][$i]['title']          = '_MI_ONLINEHISTORY_TIMELIFE';
$modversion['config'][$i]['description']    = '_MI_ONLINEHISTORY_TIMELIFE_DESC';
$modversion['config'][$i]['formtype']       = 'select';
$modversion['config'][$i]['valuetype']      = 'int';
$modversion['config'][$i]['default']        = 24;
$modversion['config'][$i]['options']        = array('2' => 2, '6' => 6, '12' => 12, '24' => 24, '36' => 36, '48' => 48, '72' => 72);

$i++;
$modversion['config'][$i]['name']           = 'viewlimit';
$modversion['config'][$i]['title']          = '_MI_ONLINEHISTORY_VIEWLIMIT';
$modversion['config'][$i]['description']    = '_MI_ONLINEHISTORY_VIEWLIMIT_DESC';
$modversion['config'][$i]['formtype']       = 'select';
$modversion['config'][$i]['valuetype']      = 'int';
$modversion['config'][$i]['default']        = 20;
$modversion['config'][$i]['options']        = array('5' => 5, '10' => 10, '20' => 20, '50' => 50, '100' => 100);

$i++;
$modversion['config'][$i]['name']           = 'viewsumaonline';
$modversion['config'][$i]['title']          = '_MI_ONLINEHISTORY_DISPLAYSUMA';
$modversion['config'][$i]['description']    = '_MI_ONLINEHISTORY_DISPLAYSUMA_DESC';
$modversion['config'][$i]['formtype']       = 'yesno';
$modversion['config'][$i]['valuetype']      = 'int';
$modversion['config'][$i]['default']        = 1;

$i++;
$modversion['config'][$i]['name']           = 'viewmaxonline';
$modversion['config'][$i]['title']          = '_MI_ONLINEHISTORY_DISPLAYMAXUSER';
$modversion['config'][$i]['description']    = '_MI_ONLINEHISTORY_DISPLAYMAXUSER_DESC';
$modversion['config'][$i]['formtype']       = 'yesno';
$modversion['config'][$i]['valuetype']      = 'int';
$modversion['config'][$i]['default']        = 1;
?>