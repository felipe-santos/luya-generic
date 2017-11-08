<?php

namespace cmstests\src\frontend\blocks;

use luya\generic\tests\GenericBlockTestCase;

class FileListBlockTest extends GenericBlockTestCase
{
    public $blockClass = 'luya\generic\blocks\FileListBlock';
    
    public function testEmpty()
    {
        $this->assertEmpty($this->renderFrontend());
    }
    
    public function testFiles()
    {
        $this->block->addExtraVar('fileList', [
                ['href' => 'path/to/image.jpg', 'caption' => 'foobar', 'extension' => 'jpg'],
        ]);
        $this->assertContains('<ul><li><a target="_blank" href="path/to/image.jpg">foobar</a></li></ul>', $this->renderFrontendNoSpace());
    }

    public function testFilesWithSuffix()
    {
        $this->block->setCfgValues(['showType' => 1]);
        $this->block->addExtraVar('fileList', [
                ['href' => 'path/to/image.jpg', 'caption' => 'foobar', 'extension' => 'jpg'],
        ]);
        $this->assertContains('<ul><li><a target="_blank" href="path/to/image.jpg">foobar (jpg)</a></li></ul>', $this->renderFrontendNoSpace());
    }
}
