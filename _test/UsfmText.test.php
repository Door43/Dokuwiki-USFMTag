<?php
/**
 * Name: UsfmText.test.php
 * Description:
 *
 * Created by PhpStorm.
 *
 * Author: Phil Hopper
 * Date:   11/9/15
 * Time:   5:05 PM
 */

class UsfmText_test extends DokuWikiTest {

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();

        // copy the test data
        TestUtils::rcopy(TMP_DIR, dirname(__FILE__) . '/data/');
    }

    public function setUp() {
        $this->pluginsEnabled[] = 'include';
        $this->pluginsEnabled[] = 'usfmtag';

        parent::setUp();
    }

    /**
     * Verify the button was correctly rendered.
     */
    public function test_setChapterLabel_bug () {

        plugin_load('syntax', 'usfmtag');
        $request = new TestRequest();
        $response = $request->get(array('id' => 'psalm1-1test'), '/doku.php');
        $content = $response->getContent();

        // output check
        $this->assertNotEmpty($content);
        $this->assertContains('<h1 class="sectionedit1" id="psalms_0011-2">Psalms 001:1-2</h1>', $content);
        $this->assertNotContains('<usfm>', $content);
        $this->assertNotContains('\c', $content);
        $this->assertNotContains('\v', $content);
    }
}
