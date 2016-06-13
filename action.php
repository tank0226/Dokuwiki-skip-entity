<?php
/**
 * Action Component for the Wrap Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Gohr <andi@splitbrain.org>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');

class action_plugin_skipentity extends DokuWiki_Action_Plugin {

    /**
     * register the eventhandlers
     *
     * @author Andreas Gohr <andi@splitbrain.org>
     */
    function register(Doku_Event_Handler $controller){
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'handle_toolbar', array ());    
    }

    function handle_toolbar(Doku_Event $event, $param) {
        $syntaxDiv = $this->getConf('syntaxDiv');
        $syntaxSpan = $this->getConf('syntaxSpan');

        $event->data[] = array (
            'type' => 'picker',
            'title' => $this->getLang('picker'),
            'icon' => '../../plugins/skipentity/skent.png',
            'list' => array(
                array(
                    'type'   => 'format',
                    'title'  => 'white',
                    'icon'   => '../../plugins/skipentity/tt-w.png',
                    'open'   => '```',
                    'close'  => '```',
                ),
                array(
                    'type'   => 'format',
                    'title'  => 'gray',
                    'icon'   => '../../plugins/skipentity/tt-g.png',
                    'open'   => '``',
                    'close'  => '``',
                ),
            )
        );
    }


}

