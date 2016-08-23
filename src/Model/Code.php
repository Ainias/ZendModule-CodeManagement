<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 31.01.15
 * Time: 12:12
 */

namespace Ainias\CodeManagement\Model;

use Ainias\Core\Controller\ServiceActionController;
use Ainias\Core\Model\StandardModel;
use Doctrine\ORM\Mapping as ORM;
use Interop\Container\ContainerInterface;

/**
 * @ORM\Entity(repositoryClass="\Ainias\CodeManagement\Model\Repository\CodeRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 */
abstract class Code extends StandardModel
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $id;

	/** @ORM\Column(type="string", unique=true) */
	protected $code;

    /** @ORM\Column(type="datetime") */
	protected $creationDate;

    /** @var  string */
    protected $errorMessage = "";

    /** @var  string */
    protected $successMessage = "Der Code wurde erfolgreich aktiviert.";

	public function __construct()
	{
		$this->creationDate = new \DateTime();
 	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * @param mixed $code
	 */
	public function setCode($code)
	{
		$this->code = $code;
	}

	/**
	 * @return mixed
	 */
	public function getCreationDate()
	{
		return $this->creationDate;
	}

	/**
	 * @param mixed $creationDate
	 */
	public function setCreationDate($creationDate)
	{
		$this->creationDate = $creationDate;
	}

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return string
     */
    public function getSuccessMessage()
    {
        return $this->successMessage;
    }

    /**
     * @param string $successMessage
     */
    public function setSuccessMessage($successMessage)
    {
        $this->successMessage = $successMessage;
    }

    public function resolveCode(ContainerInterface $sm, ServiceActionController $serviceActionController)
    {
        $result = $this->doAction($sm, $serviceActionController);
        if ($result === null)
        {
            $result = $serviceActionController->redirect()->toRoute("home");
        }
        return $result;
    }

    abstract public function doAction(ContainerInterface $sm, ServiceActionController $serviceActionController);
}
