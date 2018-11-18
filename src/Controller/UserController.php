<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Created by PhpStorm.
 * User: spencerryan
 * Date: 18/11/2018
 * Time: 23:19
 */

/**
 * Class UserController
 * @Route("/user")
 * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
 */
class UserController extends Controller
{
    /**
     * @Route("/view/{user}", name="app_user_view")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function view(User $user = null)
    {
        if (is_null($user)) {
            $user = $this->get('security.token_storage')->getToken()->getUser();
        }

        return $this->render('user/view.html.twig', [
            'user' => $user,
        ]);
    }
}