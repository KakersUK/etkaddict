<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// URI routes
$route['default_controller'] = 'home';
$route['characters/(:any)'] = 'characters/profile/$1';
$route['clans/(:any)'] = 'clans/clan/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['sitemap\.xml'] = "seo/sitemap";

// Characters
$route['search.json'] = 'json/characterSearch';

// Calculators
$route['wpnupgradecalculator.json'] = 'json/wpnUpgradeCalculator';
$route['itmupgradecalculator.json'] = 'json/itmUpgradeCalculator';
$route['expcalculator.json'] = 'json/expCalculator';

// Clans
$route['clan_(:any).json'] = 'json/clanRoster/$1';
$route['clans.json'] = 'json/clanList';


$route['world_rankings.json'] = 'json/playerRankings';

// Warrior Rankings
$route['warrior_rankings.json'] = 'json/playerRankings/Warrior';
$route['reaver_rankings.json'] = 'json/playerRankings/Reaver';
$route['knight_rankings.json'] = 'json/playerRankings/Knight';

// Rogue Rankings
$route['rogue_rankings.json'] = 'json/playerRankings/Rogue';
$route['vagabond_rankings.json'] = 'json/playerRankings/Vagabond';

// Mage Rankings
$route['mage_rankings.json'] = 'json/playerRankings/Mage';
$route['tempest_rankings.json'] = 'json/playerRankings/Tempest';
$route['neophyte_rankings.json'] = 'json/playerRankings/Neophyte';

// Poet Rankings
$route['poet_rankings.json'] = 'json/playerRankings/Poet';
$route['druid_rankings.json'] = 'json/playerRankings/Druid';

// Event & Other Rankings
$route['carnage_rankings.json'] = 'json/eventRankings/carnage';
$route['deathball_rankings.json'] = 'json/eventRankings/deathball';
$route['elixir_rankings.json'] = 'json/eventRankings/elixir';
$route['paintball_rankings.json'] = 'json/eventRankings/paintball';
$route['pillowfight_rankings.json'] = 'json/eventRankings/pillowfight';
$route['gold_rankings.json'] = 'json/goldRankings';
