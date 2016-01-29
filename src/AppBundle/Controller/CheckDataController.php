<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\CheckForm;
use AppBundle\Entity\Payment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CheckDataController extends Controller
{
    /**
     * Checking data.
     */
    public function checkAction(Request $request)
    {
        $payment_data = new Payment();
        $form = $this->createForm(new CheckForm(), $payment_data);

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                // валидация прошла успешно, можно выполнять дальнейшие действия с объектом $author

                return $this->render(
                    'AppBundle:Security:check.html.twig',
                    array('form' => $form->createView())
                );
            }
        }
//
//        return $this->render('BlogBundle:Author:form.html.twig', array(
//            'form' => $form->createView(),
//        ));

        return $this->render(
            'AppBundle:Security:check.html.twig',
            array('form' => $form->createView())
        );
    }
}