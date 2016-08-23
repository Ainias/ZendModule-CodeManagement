<?php

namespace Ainias\CodeManagement\Model\Manager;

use Ainias\Core\Model\Manager\StandardManager;
use Ainias\CodeManagement\Model\Code;
use Ainias\CodeManagement\Model\Repository\CodeRepository;

class CodeManager extends StandardManager
{
    const CODE_DEFAULT_LENGTH = 255;

    private static $seedIsGenerated = false;

    /** @var  CodeRepository */
    protected $repository;

    public function __construct(CodeRepository $repository, Code $entity = null)
    {
        parent::__construct($repository, $entity);
    }

    public function generateCode(Code $code = null, $length = CodeManager::CODE_DEFAULT_LENGTH)
    {
        /** @var Code $code */
        $code = $this->selectCorrectEntity($code);

        if (!self::$seedIsGenerated) {
            mt_srand();
            self::$seedIsGenerated = true;
        }

        do {
            $codeString = "";
            for ($n = 0; $n < $length; $n++) {
                $rand = rand(0, 61);
                if ($rand < 26) {
                    $codeString .= chr(rand(ord('a'), ord('z')));
                } elseif ($rand < 52) {
                    $codeString .= chr(rand(ord('A'), ord('Z')));
                } elseif ($rand < 62) {
                    $codeString .= rand(0, 9);
                }
            }
        } while ($this->getCodeByCode($codeString) != null);

        $code->setCode($codeString);
        return $code;
    }

    public function remove(Code $code = null)
    {
        $code = $this->selectCorrectEntity($code);
        $this->repository->remove($code);
    }

    /**
     * @param $code
     * @return null|object|Code
     */
    public function getCodeByCode($code)
    {
        $this->entity = $this->repository->findOneBy(array('code' => $code));
        return $this->entity;
    }

    public function getCodeByClass($class)
    {
        return $this->repository->getCodeByClass($class);
    }
}