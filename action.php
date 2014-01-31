<?php
/**
 * DokuWiki Plugin UsfmTag (Action Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Yvonne Lu <yvonnel@leapinglaptop.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once DOKU_PLUGIN.'action.php';

class action_plugin_usfmtag extends DokuWiki_Action_Plugin {

   function register(&$controller) {
      $controller->register_hook('PARSER_WIKITEXT_PREPROCESS',
'BEFORE', $this, 'handle_parser_wikitext_preprocess');
   }

   function handle_parser_wikitext_preprocess(&$event, $param) {
       global $ID;
       if(substr($ID,-5) != '.usfm') return true;
       
            $event->data = "<USFM>\n".$event->data."\n</USFM>";

       /*     
       if ($this->getConf('frontmatter')){
           if (preg_match('/^---\s*\n(.*?\n?)^---\s*$\n?(.+)/sm',$event->data, $match)){
               $event->data = sprintf("%s<markdown>\n%s\n</markdown>", $match[1], $match[2]);
           }else{
               $event->data = "<markdown>\n".$event->data."\n</markdown>";
           }
       }else{
           $event->data = "<markdown>\n".$event->data."\n</markdown>";
       }*/
   }

}