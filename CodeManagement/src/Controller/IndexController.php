<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CodeManagement\Controller;

use Application\Controller\ServiceActionController;
use CodeManagement\Model\Code;
use CodeManagement\Model\Manager\CodeManager;
use Zend\Mvc\MvcEvent;

class IndexController extends ServiceActionController
{
    public function doCodeAction()
    {
        $codeString = $this->params("code");
        /** @var CodeManager $codeManager */
        $codeManager = $this->get(CodeManager::class);

        /** @var Code $code */
        $code = $codeManager->getCodeByCode($codeString);
        if ($code != null)
        {
            $result = $code->resolveCode($this->getServiceLocator(), $this);
            $errorMessage = $code->getErrorMessage();
            if ($errorMessage == null)
            {
                $message = $code->getSuccessMessage();
                if ($message != null)
                {
                    $this->flashMessenger()->addSuccessMessage($message);
                }
            }
            else
            {
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }
            return $result;
//            return $this->redirect()->toRoute("home");
        }
        return $this->triggerDispatchError();
    }
}
