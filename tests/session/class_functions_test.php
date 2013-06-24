<?php
/**
 *
 * @package testing
 * @copyright (c) 2011 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

require_once dirname(__FILE__) . '/../../phpBB/includes/session.php';
require_once dirname(__FILE__) . '/testable_factory.php';

class phpbb_class_functions_test extends phpbb_database_test_case
{
    public function getDataSet()
    {
        return $this->createXMLDataSet(dirname(__FILE__).'/fixtures/sessions_full.xml');
    }

    public function setUp()
    {
        $db = $this->new_dbal();
        $session_factory = new phpbb_session_testable_factory;

        $this->session = $session_factory->get_session($db);
    }

    public function test_session_extract_current_page()
    {
        $_REQUEST['PHP_SELF'] = 'blah';
        $this->assertStringEndsWith("uuuga booga", implode(',', phpbb_session::extract_current_page("/")));
    }
}