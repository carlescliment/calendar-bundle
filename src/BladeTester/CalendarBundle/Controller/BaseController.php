<?php

namespace BladeTester\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BaseController extends Controller {

    protected function redirectFromRequest(Request $request) {
        $redirect = $request->server->get("HTTP_REFERER");
        if ($request->get('destination')) {
            $redirect = $request->get('destination');
        }
        return $this->redirect($redirect);
    }

    protected function addFlashMessage($message_id, array $arguments = array()) {
        $message = $this->trans($message_id, $arguments);
        $this->get('session')->getFlashBag()->add('notice', $message);
    }

    protected function trans($message_id, array $arguments = array()) {
        $translator = $this->get('translator');
        return $translator->trans($message_id, $arguments);
    }

}