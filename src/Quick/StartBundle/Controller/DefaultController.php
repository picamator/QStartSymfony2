<?php

namespace Quick\StartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Quick\StartBundle\Entity\Blog;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $blog = new Blog();
        $form = $this->createForm('blog', $blog);
                
        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                // @TODO data should be saved to database
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Data were successfully saved.'
                );

                // @FIXME 1) solve poblem with override files with sinilar name
                // @FIXME 2) solve security issue for embeded code in image
                // @FIXME 3) solve security issue if authorization will be provided
                $blog->uploadImage();
            } else {
                // errors
                $this->get('session')->getFlashBag()->add(
                    'error',
                    'Data were not saved. Form contains errors. Please correct your data and try again.'
                );
            }
        }
        
        return $this->render('QuickStartBundle:Default:index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
