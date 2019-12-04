<?php
/**
 * Created by PhpStorm.
 * User: 
 * Date: 
 * Time: 
 */

namespace Cadastros\Service;
use Zend\Crypt\Password\Bcrypt;
use Doctrine\ORM\EntityManager;
use Cadastros\Entity\Anuncio;

class AnuncioService
{
    const ENTITY = 'Cadastros\Entity\Anuncio';
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save($data)
    {        

        
        $anuncio = $this->em->find(self::ENTITY, (int) $data['id']);          
        $usuario = $this->em->find('Auth\Entity\oauth_users', (int) $data['usuario']);          

        if (!$anuncio) {   
            $anuncio = new Anuncio();          
        }
        $data['usuario'] = $usuario;
        //$data['data_nascimento'] = new \DateTime($data['data_nascimento']);
        
        $anuncio->setData($data);      
        
        $this->em->persist($anuncio);
        $this->em->flush();
    }

    public function fetch($id)
    {     
        $anuncio = $this->em->find(self::ENTITY, $id);   
        $usuario = $this->em->find('Auth\Entity\oauth_users', $anuncio->usuario); 
        $anuncio = $anuncio->getArrayCopy();       
        $usuario = $usuario->getArrayCopy();       

        $anuncio['usuario'] = array_splice($usuario, 3);
        return $anuncio;

    }


    public function fetchAll($params = null)
    {   
        $categoria = (int) $_GET['categoria'];
        $select = $this->em->createQueryBuilder()
            ->select('anuncio')
            ->from('Cadastros\Entity\Anuncio', 'anuncio') 
            ->where('anuncio.categoria = :categoria')
            ->setParameter('categoria', $categoria);
        

        $result = $select->getQuery()->getArrayResult();     
        
        return $result;
    }


    public function delete($id)
    {
        $parametro = $this->em->find(self::ENTITY, $id);
        $this->em->remove($parametro);
        $this->registraLog($parametro, null, 'delete');
        $this->em->flush();

        return true;
    }

}
