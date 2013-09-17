<?php

namespace Liip\TranslationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TranslationController extends Controller
{
    public function indexAction()
    {
        return $this->render('LiipTranslationBundle:Default:index.html.twig', array(
            'items' => $this->get('liip.translation.storage')->getAllTranslationUnits(),
            'columns' => $this->get('liip.translation.manager')->getLocaleList()
        ));
    }

    public function cacheClearAction()
    {
        $this->get('liip.translation.manager')->clearSymfonyCache();
        $this->get('session')->getFlashBag()->set('success', 'Cache cleared');

        return $this->redirect($this->generateUrl('liip_translation_interface'));
    }
}
