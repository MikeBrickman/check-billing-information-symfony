<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\CheckForm;
use AppBundle\Entity\Payment;
use Symfony\Component\HttpFoundation\Request;

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
                $this->addFlash(
                    'notice',
                    'All data is correct!'
                );

                return $this->render(
                    'AppBundle:Security:check.html.twig',
                    array('form' => $form->createView())
                );
            }
        }
        return $this->render(
            'AppBundle:Security:check.html.twig',
            array('form' => $form->createView())
        );
    }
}