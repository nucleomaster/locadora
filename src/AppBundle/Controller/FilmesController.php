<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Filmes;
/**
 * Description of FilmesController
 *
 * @author aluno
 */
class FilmesController extends Controller
{
    /**
     * @Route("/filmes", name="filmes_index")
     * name é o apelido
     */
    public function indexAction()
    {
        //return new Response('Pagina de filmes', 200);
        /**
         * Função Response('mensagem de retorno html, forçar status')
         */
        return $this->render('filmes/index.html.twig');
    }
    /**
     * @Route("/filmes/cadastro")
     */
    public function cadastroAction()
    {
        $filme = new Filmes();
        $filme->setGenero('Terror');
        $filme->setLancamento(true);
        $filme->setNome('Rec');
        
        $doctrine = $this->getDoctrine()->getEntityManager();//motor que grava e le
        $doctrine->persist($filme);
        $doctrine->flush();//flush sincroniza os objetos com o banco de dados
        return $this->render('filmes/cadastro.html.twig');
        
    }
}
