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
use \AppBundle\Entity\Genero;
use \AppBundle\Form\FilmesType;

/**
 * Description of FilmesController
 *
 * @author aluno
 */
class FilmesController extends Controller {

    /**
     * 
     * @return \Doctrine\ORM\EntityManager
     */
    private function getEm() {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @Route("/filmes", name="filmes_index")
     * name é o apelido
     */
    public function indexAction() {
        /* Model */
        //return new Response('Pagina de filmes', 200);
        /**
         * Função Response('mensagem de retorno html, forçar status')
         */
        $doctrine = $this->getEm();

        $filmes = $doctrine->getRepository('AppBundle:Filmes'); // le o banco de dados
        /* $retorno = $filmes->findAll(); */
        /* $retorno = $filmes->findById(2); */
        /* $retorno = $filmes->findBy(array('genero'=>'Ação')); */
        /* $retorno = $filmes->findBy(array('genero'=>'Ação',
          'lancamento' => false)); */

        $retorno = $filmes->findAll();

        /* var_dump($retorno); */
        /* view */
        return $this->render('filmes/index.html.twig', array('filmes' => $retorno)
        );
    }
    
    /**
     * 
     * @Route("/filmes/filtrar/{filtro}", name="filmes_filtrar")
     */    
    public function filtrarAction($filtro)
    {
        $filmes = $doctrine->getRepository('AppBundle:Filmes');
        if($filtro == 'lancamento')
        {
            $retorno = $filmes->findBy(
                    array('lancamento' => true)
                    );
            }else
            {
                $retorno = $filmes ->findAll();
            }
        
        return $this->render('filmes/index.html.twig', array('filmes' => $retorno));
    }
    

    /**
     * @Route("/filmes/cadastro")
     */
    public function cadastroAction(Request $request) {
        $filme = new Filmes();
        $form = $this->createForm(FilmesType::class, $filme);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $pasta =  __DIR__ .'/../../../web/capas';
                    /*constante global que mostra o caminho completo da pasta
                     * volta 4 pastas
                     */           
            $imagem = $form['capa']->getData();
            $ext = $imagem->guessExtension();
            $nomeArquivo = uniqid().'.'.$ext;/*gera um nome de arquivo aleatório*/
            
            $imagem->move($pasta, $nomeArquivo);
            $filme->setCapa($nomeArquivo);
            //die($nomeArquivo);
            
            
//            $form['capa']->getData()->move($pasta, $someNewFilename);
            
            /*die($pasta); - imprime erros*/
            $doctrine = $this->getEm();
            $doctrine->persist($filme);//colocar no banco de dados filme
            $doctrine->flush();//sincroniza
            return $this->redirectToRoute('filmes_index');
            //getEm manipulador de entidades Entity Manager
        }
                //retorna true se o botão foi clicado
        
                //manda manipular o request        
/*      $doctrine = $this->getEm(); //motor que grava e le
        $doctrine->persist($filme); //pra gravar o objeto
        $doctrine->flush(); //flush sincroniza os objetos com o banco de dados
  */
        return $this->render('filmes/cadastro.html.twig', array(
            'form_filmes'=> $form->createView()
        ));
    }

    /**
     *  @Route("/filmes/genero", name="genero_index")
     */
    public function generoAction() {
        $repositorio = $this->getEm()->getRepository('AppBundle:Genero');
        $dados = $repositorio->findBy(
                array(),
                array('nome'=>"ASC")
                );
                //ORDENAR EM ORDEM CRESCENTE (ASC) OU DESCRESCENTE (DESC)
        return $this->render('filmes/genero.html.twig', array(
                    'dados' => $dados
        ));
    }

    /**
     * @Route("/filmes/genero/cadastro", name="genero_cadastro")
     */
    public function generoCadastroAction() {
        return $this->render('filmes/genero-cadastro.html.twig');
    }
    
    /**
     * @Route("/filmes/genero/criar")
     */
    public function criarGeneroAction(Request $request)
    {
        $nomeGenero = $request->get('nome');
        
        $genero = new Genero();
        $genero->setNome($nomeGenero);
        
        $doctrine = $this->getEm();
        $doctrine->persist($genero);
        
        $doctrine->flush();
        
        return $this->redirectToRoute('genero_index');
        //redireciona para página de index
    }

}
