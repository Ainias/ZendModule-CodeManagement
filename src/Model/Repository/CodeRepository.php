<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 31.01.15
 * Time: 12:14
 */

namespace Ainias\CodeManagement\Model\Repository;

use Ainias\Core\Model\Repository\StandardRepository;
use Ainias\CodeManagement\Model\Code;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping;

class CodeRepository extends StandardRepository
{
    public function __construct(EntityManager $em, Mapping\ClassMetadata $class)
    {
        parent::__construct($em, $class);
    }

    public function getCodeByClass($class)
    {
        $queryManager = $this->_em->createQueryBuilder();
        $queryManager->select('c')->from(Code::class, 'c');
        $queryManager->where($queryManager->expr()->isInstanceOf('c', $class));
        return $queryManager->getQuery()->getResult();
    }
}