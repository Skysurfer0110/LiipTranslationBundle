<?php

namespace Liip\TranslationBundle\Tests\Controller;

use Liip\TranslationBundle\Tests\BaseWebTestCase;

/**
 * To be completed
 *
 * This file is part of the LiipTranslationBundle test suite.
 * For more information concerning the bundle, see the README.md file at the project root.
 *
 * @package Liip\TranslationBundle\Tests\Controller
 * @version 0.0.1
 *
 * @license http://opensource.org/licenses/MIT MIT License
 * @author David Jeanmonod <david.jeanmonod@liip.ch>
 * @author Gilles Meier <gilles.meier@liip.ch>
 * @copyright Copyright (c) 2013, Liip, http://www.liip.ch
 */
class TranslationControllerTest extends BaseWebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $this->getUrl('liip_translation_interface'));
        $this->assertNoError($client);
    }

    public function testClearCache()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $this->getUrl('liip_translation_cache_clear'));
        $this->assertRedirect($client);
    }
}
